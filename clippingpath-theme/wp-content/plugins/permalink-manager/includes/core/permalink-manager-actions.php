<?php
/**
* Additional hooks for "Permalink Manager Pro"
*/
class Permalink_Manager_Actions extends Permalink_Manager_Class {

	public function __construct() {
		add_action('admin_init', array($this, 'trigger_action'), 9);
		add_action('admin_init', array($this, 'extra_actions'));

		// Ajax-based bulk tools
		add_action('wp_ajax_pm_bulk_tools', array($this, 'pm_bulk_tools'));

		add_action('clean_permalinks_event', array($this, 'clean_permalinks_hook'));
		add_action('init', array($this, 'clean_permalinks_cronjob'));
	}

	/**
	* Actions
	*/
	public function trigger_action() {
		global $permalink_manager_after_sections_html;

		// 1. Check if the form was submitted
		if(empty($_POST)) { return; }

		$actions_map = array(
			'uri_editor' => array('function' => 'update_all_permalinks', 'display_uri_table' => true),
			//'regenerate' => array('function' => 'regenerate_all_permalinks', 'display_uri_table' => true),
			//'find_and_replace' => array('function' => 'find_and_replace', 'display_uri_table' => true),
			'permalink_manager_options' => array('function' => 'save_settings'),
			'permalink_manager_permastructs' => array('function' => 'save_permastructures'),
			'flush_sitemaps' => array('function' => 'flush_sitemaps'),
			'import' => array('function' => 'import_custom_permalinks_uris'),
		);

		// 2. Find the action
		foreach($actions_map as $action => $map) {
			if(isset($_POST[$action]) && wp_verify_nonce($_POST[$action], 'permalink-manager')) {
				// Execute the function
				$output = call_user_func(array($this, $map['function']));

				// Get list of updated URIs
				if(!empty($map['display_uri_table'])) {
					$updated_slugs_count = (isset($output['updated_count']) && $output['updated_count'] > 0) ? $output['updated_count'] : false;
					$updated_slugs_array = ($updated_slugs_count) ? $output['updated'] : '';
				}

				// Trigger only one function
				break;
			}
		}

		// 3. Display the slugs table (and append the globals)
		if(isset($updated_slugs_count)) {
			$permalink_manager_after_sections_html .= Permalink_Manager_Admin_Functions::display_updated_slugs($updated_slugs_array);
		}
	}

	/**
	* Save settings
	*/
	public static function save_settings($field = false, $value = false, $display_alert = true) {
		global $permalink_manager_options, $permalink_manager_before_sections_html;

		// Info: The settings array is used also by "Screen Options"
		$new_options = $permalink_manager_options;
		//$new_options = array();

		// Save only selected field/sections
		if($field && $value) {
			$new_options[$field] = $value;
		} else {
			$post_fields = $_POST;

			foreach($post_fields as $option_name => $option_value) {
				$new_options[$option_name] = $option_value;
			}
		}

		// Sanitize & override the global with new settings
		$new_options = Permalink_Manager_Helper_Functions::sanitize_array($new_options);
		$permalink_manager_options = $new_options = array_filter($new_options);

		// Save the settings in database
		update_option('permalink-manager', $new_options);

		// Display the message
		$permalink_manager_before_sections_html .= ($display_alert) ? Permalink_Manager_Admin_Functions::get_alert_message(__( 'The settings are saved!', 'permalink-manager' ), 'updated') : "";
	}

	/**
	 * Trigger bulk tools via AJAX
	 */
	function pm_bulk_tools() {
		// Define variables
		$return = array('alert' => Permalink_Manager_Admin_Functions::get_alert_message(__( '<strong>No slugs</strong> were updated!', 'permalink-manager' ), 'error updated_slugs'));

		// Get the name of the function
		if(isset($_POST['regenerate']) && wp_verify_nonce($_POST['regenerate'], 'permalink-manager')) {
			$function_name = 'regenerate_all_permalinks';
			$uniq_id = $_POST['pm_session_id'];
		} else if(isset($_POST['find_and_replace']) && wp_verify_nonce($_POST['find_and_replace'], 'permalink-manager') && !empty($_POST['old_string']) && !empty($_POST['new_string'])) {
			$function_name = 'find_and_replace';
			$uniq_id = $_POST['pm_session_id'];
		}

		// Check if both strings are set for "Find and replace" tool
		if(!empty($function_name)) {
			// Get the mode
			$mode = isset($_POST['mode']) ? $_POST['mode'] : 'custom_uris';

			// Get the content type
			if(!empty($_POST['content_type']) && $_POST['content_type'] == 'taxonomies') {
				$class_name = 'Permalink_Manager_URI_Functions_Tax';
			} else {
				$class_name = 'Permalink_Manager_URI_Functions_Post';
			}

			// Get items (try to get them from transient)
			$items = get_transient("pm_{$uniq_id}");
			$first_chunk = true;

			if(empty($items)) {
				$items = $class_name::get_items();

				// Split items array into chunks and save them to transient
				$items = array_chunk($items, 25);

				set_transient("pm_{$uniq_id}", $items, 300);

				// $return['first_chunk'] = $first_chunk = true;
			}

			// Get homepage URL and ensure that it ends with slash
			$home_url = Permalink_Manager_Helper_Functions::get_permalink_base() . "/";

			// Process the variables from $_POST object
			$old_string = (!empty($_POST['old_string'])) ? str_replace($home_url, '', esc_sql($_POST['old_string'])) : '';
			$new_string = (!empty($_POST['old_string'])) ? str_replace($home_url, '', esc_sql($_POST['new_string'])) : '';

			// Process only one subarray
			if(!empty($items[0])) {
				$chunk = $items[0];

				// Remove from array & update the transient
				unset($items[0]);
				$items = array_values($items);
				set_transient("pm_{$uniq_id}", $items, 300);

				// Check if posts or terms should be updated
				if($function_name == 'find_and_replace') {
					$output = $class_name::find_and_replace($chunk, $mode, $old_string, $new_string);
				} else {
					$output = $class_name::regenerate_all_permalinks($chunk, $mode);
				}

				if(!empty($output['updated_count'])) {
					$return = array_merge($return, (array) Permalink_Manager_Admin_Functions::display_updated_slugs($output['updated'], true, $first_chunk));
					$return['updated_count'] = $output['updated_count'];
				}

				// Check if there are any chunks left
				if(count($items) > 0) {
					$return['left_chunks'] = true;
				} else {
					delete_transient("pm_{$uniq_id}");
				}
			}
		}

		wp_send_json($return);
		die();
	}

	/**
	* Update all permalinks in "Permalink Editor"
	*/
	function update_all_permalinks() {
		// Check if posts or terms should be updated
		if(!empty($_POST['content_type']) && $_POST['content_type'] == 'taxonomies') {
			return Permalink_Manager_URI_Functions_Tax::update_all_permalinks();
		} else {
			return Permalink_Manager_URI_Functions_Post::update_all_permalinks();
		}
	}

	/**
	 * Additional actions
	 */
	public static function extra_actions() {
		if(isset($_GET['flush_sitemaps'])) {
			self::flush_sitemaps();
		} else if(isset($_GET['clear-permalink-manager-uris'])) {
			self::clear_all_uris();
		} else if(!empty($_REQUEST['remove-uri'])) {
			$uri_key = sanitize_text_field($_REQUEST['remove-uri']);
			self::force_clear_single_element_uris_and_redirects($uri_key);
		} else if(!empty($_REQUEST['remove-redirect'])) {
			$redirect_key = sanitize_text_field($_REQUEST['remove-redirect']);
			self::force_clear_single_redirect($redirect_key);
		} else if(!empty($_POST['screen-options-apply'])) {
			self::save_screen_options();
		}
	}

	/**
	 * Save "Screen Options"
	 */
	public static function save_screen_options() {
		check_admin_referer( 'screen-options-nonce', 'screenoptionnonce' );

		// The values will be sanitized inside the function
		self::save_settings('screen-options', $_POST['screen-options']);
	}

	/**
	* Save permastructures
	*/
	public static function save_permastructures() {
		global $permalink_manager_permastructs;

		$post_fields = $_POST;
		$new_options = array();

		foreach($post_fields as $option_name => $option_value) {
			$new_options[$option_name] = $option_value;
		}

		// Trim the trailing slashes & remove empty permastructures
		$new_options = Permalink_Manager_Helper_Functions::multidimensional_array_map('untrailingslashit', $new_options);
		foreach($new_options as $group_name => $group) {
			if(is_array($group)) {
				foreach($group as $element => $permastruct) {
					// Trim slashes
					$permastruct = trim($permastruct, "/");
				}
			} else {
				unset($new_options[$group_name]);
			}
		}

		// Override the global with settings
		$permalink_manager_permastructs = $new_options;

		// Save the settings in database
		update_option('permalink-manager-permastructs', $new_options);
	}

	/**
	 * Clear URIs
	 */
	public static function clear_all_uris() {
		global $permalink_manager_uris, $permalink_manager_redirects, $wpdb, $permalink_manager_before_sections_html;

		// Check if array with custom URIs exists
		if(empty($permalink_manager_uris)) { return; }

		// Count removed URIs & redirects
		$removed_uris = 0;
		$removed_redirects = 0;

		// Get all element IDs
		$element_ids = array_merge(array_keys((array) $permalink_manager_uris), array_keys((array) $permalink_manager_redirects));

		// 1. Remove unused custom URI & redirects for deleted post or term
		foreach($element_ids as $element_id => $uri) {
			$count = self::clear_single_element_uris_and_redirects($element_id, true);

			$removed_uris = (!empty($count[0])) ? $count[0] + $removed_uris : $removed_uris;
			$removed_redirects = (!empty($count[1])) ? $count[1] + $removed_redirects : $removed_redirects;
		}

		// 2. Keep only a single redirect (make it unique)
		$removed_redirects += self::clear_redirects_array(true);

		// 3. Optional method to keep the permalinks unique
		if(apply_filters('permalink_manager_fix_uri_duplicates', false) == true) {
			self::fix_uri_duplicates();
		}

		// Save cleared URIs & Redirects
		if($removed_uris > 0 || $removed_redirects > 0) {
			update_option('permalink-manager-uris', array_filter($permalink_manager_uris));
			update_option('permalink-manager-redirects', array_filter($permalink_manager_redirects));

			$permalink_manager_before_sections_html .= Permalink_Manager_Admin_Functions::get_alert_message(sprintf(__( '%d Custom URIs and %d Custom Redirects were removed!', 'permalink-manager' ), $removed_uris, $removed_redirects), 'updated updated_slugs');
		} else {
			$permalink_manager_before_sections_html .= Permalink_Manager_Admin_Functions::get_alert_message(__( 'No Custom URIs or Custom Redirects were removed!', 'permalink-manager' ), 'error updated_slugs');
		}
	}

	/**
	 * Check if the post/term uses the same URI for both permalink & custom redirects
	 */
	public static function clear_single_element_duplicated_redirect($element_id, $count_removed = false, $uri = null) {
		global $permalink_manager_uris, $permalink_manager_redirects;

		$custom_uri = (empty($uri) && !empty($permalink_manager_uris[$element_id])) ? $permalink_manager_uris[$element_id] : $uri;

		if($custom_uri && !empty($permalink_manager_redirects[$element_id]) && in_array($custom_uri, $permalink_manager_redirects[$element_id])) {
			$duplicated_redirect_id = array_search($custom_uri, $permalink_manager_redirects[$element_id]);
			unset($permalink_manager_redirects[$element_id][$duplicated_redirect_id]);
		}

		// Check if function should only return the counts or update
		if($count_removed) {
			return (isset($duplicated_redirect_id)) ? 1 : 0;
		} else if(isset($duplicated_redirect_id)) {
			update_option('permalink-manager-redirects', array_filter($permalink_manager_redirects));
			return true;
		}
	}

	/**
	 * Remove unused custom URI & redirects for deleted post or term
	 */
 	public static function clear_single_element_uris_and_redirects($element_id, $count_removed = false) {
		global $wpdb, $permalink_manager_uris, $permalink_manager_redirects;

		// Count removed URIs & redirects
		$removed_uris = 0;
		$removed_redirects = 0;

		// Only admin users can remove the broken URIs for removed post types & taxonomies
		$check_if_exists = (is_admin()) ? true : false;

		// 1. Check if element exists
		if(strpos($element_id, 'tax-') !== false) {
			$term_id = preg_replace("/[^0-9]/", "", $element_id);
			$taxonomy = $wpdb->get_var($wpdb->prepare("SELECT t.taxonomy FROM $wpdb->term_taxonomy AS t WHERE t.term_id = %s LIMIT 1", $term_id));

			// Remove custom URIs for removed terms or disabled taxonomies
			$remove = (!empty($taxonomy)) ? Permalink_Manager_Helper_Functions::is_disabled($taxonomy, 'taxonomy', $check_if_exists) : true;
		} else if(is_numeric($element_id)) {
			$post_type = $wpdb->get_var("SELECT post_type FROM {$wpdb->prefix}posts WHERE ID = {$element_id} AND post_status NOT IN ('auto-draft', 'trash') AND post_type != 'nav_menu_item'");

			// Remove custom URIs for removed, auto-draft posts or disabled post types
			$remove = (!empty($post_type)) ? Permalink_Manager_Helper_Functions::is_disabled($post_type, 'post_type', $check_if_exists) : true;

			// Remove custom URIs for attachments redirected with Yoast's SEO Premium
			$yoast_permalink_options = (class_exists('WPSEO_Premium')) ? get_option('wpseo_permalinks') : array();

			if(!empty($yoast_permalink_options['redirectattachment']) && $post_type == 'attachment') {
				$attachment_parent = $wpdb->get_var("SELECT post_parent FROM {$wpdb->prefix}posts WHERE ID = {$element_id} AND post_type = 'attachment'");
				if(!empty($attachment_parent)) {
					$remove = true;
				}
			}
		}

		// 2A. Remove ALL unused custom permalinks & redirects
		if(!empty($remove)) {
			// Remove URI
			if(!empty($permalink_manager_uris[$element_id])) {
				$removed_uris = 1;
				unset($permalink_manager_uris[$element_id]);
			}

			// Remove all custom redirects
			if(!empty($permalink_manager_redirects[$element_id]) && is_array($permalink_manager_redirects[$element_id])) {
				$removed_redirects = count($permalink_manager_redirects[$element_id]);
				unset($permalink_manager_redirects[$element_id]);;
			}
		}
		// 2B. Check if the post/term uses the same URI for both permalink & custom redirects
		else {
			$removed_redirect = self::clear_single_element_duplicated_redirect($element_id, true);
			$removed_redirects = (!empty($removed_redirect)) ? 1 : 0;
		}

		// Check if function should only return the counts or update
		if($count_removed) {
			return array($removed_uris, $removed_redirects);
		} else if(!empty($removed_uris) || !empty($removed_redirects)) {
			update_option('permalink-manager-uris', array_filter($permalink_manager_uris));
			update_option('permalink-manager-redirects', array_filter($permalink_manager_redirects));
			return true;
		}
 	}

	/**
	 * Make the redirects unique
	 */
	public static function clear_redirects_array($count_removed = false) {
		global $permalink_manager_redirects;

		$removed_redirects = 0;

		$all_redirect_duplicates = Permalink_Manager_Helper_Functions::get_all_duplicates(true);

		foreach($all_redirect_duplicates as $single_redirect_duplicate) {

			$last_element = end($single_redirect_duplicate);
			foreach($single_redirect_duplicate as $redirect_key) {
				// Keep a single redirect
				if($last_element == $redirect_key) { continue; }
				preg_match("/redirect-([\d]+)_([\d]+)/", $redirect_key, $ids);

				if(!empty($ids[2]) && !empty($permalink_manager_redirects[$ids[2]][$ids[1]])) {
					$removed_redirects++;
					unset($permalink_manager_redirects[$ids[2]][$ids[1]]);
				}
			}
		}

		// Check if function should only return the counts or update
		if($count_removed) {
			return $removed_redirects;
		} else if(isset($duplicated_redirect_id)) {
			update_option('permalink-manager-redirects', array_filter($permalink_manager_redirects));
			return true;
		}
	}

	/**
	 * Remove custom URI & redirects for any requested post or term
	 */
	public static function force_clear_single_element_uris_and_redirects($uri_key) {
		global $permalink_manager_uris, $permalink_manager_redirects, $permalink_manager_before_sections_html;

		// Check if custom URI is set
		if(isset($permalink_manager_uris[$uri_key])) {
			$uri = $permalink_manager_uris[$uri_key];

			unset($permalink_manager_uris[$uri_key]);
			update_option('permalink-manager-uris', $permalink_manager_uris);

			$permalink_manager_before_sections_html .= Permalink_Manager_Admin_Functions::get_alert_message(sprintf(__( 'URI "%s" was removed successfully!', 'permalink-manager' ), $uri), 'updated');
			$updated = true;
		}

		// Check if custom redirects are set
		if(isset($permalink_manager_redirects[$uri_key])) {
			unset($permalink_manager_redirects[$uri_key]);
			update_option('permalink-manager-redirects', $permalink_manager_redirects);

			$permalink_manager_before_sections_html .= Permalink_Manager_Admin_Functions::get_alert_message(__( 'Broken redirects were removed successfully!', 'permalink-manager' ), 'updated');
			$updated = true;
		}

		if(empty($updated)) {
			$permalink_manager_before_sections_html .= Permalink_Manager_Admin_Functions::get_alert_message(__( 'URI and/or custom redirects does not exist or were already removed!', 'permalink-manager' ), 'error');
		}
	}

	public static function force_clear_single_redirect($redirect_key) {
		global $permalink_manager_redirects, $permalink_manager_before_sections_html;

		preg_match("/redirect-([\d]+)_([\d]+)/", $redirect_key, $ids);

		if(!empty($permalink_manager_redirects[$ids[2]][$ids[1]])) {
			unset($permalink_manager_redirects[$ids[2]][$ids[1]]);

			update_option('permalink-manager-redirects', array_filter($permalink_manager_redirects));

			$permalink_manager_before_sections_html = Permalink_Manager_Admin_Functions::get_alert_message(__( 'The redirect was removed successfully!', 'permalink-manager' ), 'updated');
		}
	}

	/**
	 * Keep the permalinks unique
	 */
	public static function fix_uri_duplicates() {
		global $permalink_manager_uris;

		$duplicates = array_count_values($permalink_manager_uris);

		foreach($duplicates as $uri => $count) {
			if($count == 1) { continue; }

			$ids = array_keys($permalink_manager_uris, $uri);
			foreach($ids as $index => $id) {
				$permalink_manager_uris[$id] = ($index > 0) ? "{$uri}-{$index}" : $uri;
			}
		}

		update_option('permalink-manager-uris', $permalink_manager_uris);
	}

	/**
	 * Clear sitemaps cache
	 */
	function flush_sitemaps($types = array()) {
		global $permalink_manager_before_sections_html;

		if(class_exists('WPSEO_Sitemaps_Cache')) {
			$sitemaps = WPSEO_Sitemaps_Cache::clear($types);

			$permalink_manager_before_sections_html .= Permalink_Manager_Admin_Functions::get_alert_message(__( 'Sitemaps were updated!', 'permalink-manager' ), 'updated');
		}
	}

	/**
	 * Import old URIs from "Custom Permalinks" (Pro)
	 */
	function import_custom_permalinks_uris() {
		Permalink_Manager_Third_Parties::import_custom_permalinks_uris();
	}

	/**
	 * "Automatically remove duplicates" (if enabled) in background
	 */
	function clean_permalinks_hook() {
		global $permalink_manager_uris, $permalink_manager_redirects;

		// Backup the custom URIs
		if(is_array($permalink_manager_uris)) {
			update_option('permalink-manager-uris_backup', $permalink_manager_uris);
		}
		// Backup the custom redirects
		if(is_array($permalink_manager_redirects)) {
			update_option('permalink-manager-redirects_backup', $permalink_manager_redirects);
		}

		self::clear_all_uris();
	}

	function clean_permalinks_cronjob() {
		global $permalink_manager_options;

		$event_name = 'clean_permalinks_event';

		// Set-up the "Automatically remove duplicates" function that runs in background once a day
		if(!empty($permalink_manager_options['general']['auto_remove_duplicates'])) {
			if(!wp_next_scheduled($event_name)) {
				wp_schedule_event(time(), 'daily', $event_name);
			}
		} else if(wp_next_scheduled($event_name)) {
			$event_timestamp = wp_next_scheduled($event_name);
			wp_unschedule_event($event_timestamp, $event_name);
		}
	}

}

?>
