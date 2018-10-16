<?php

class Htmlblock {

    private static $initiated = false;

    public static function init() {
        if ( ! self::$initiated ) {
            self::init_hooks();
        }
    }

    /**
     * Initializes WordPress hooks
     */
    private static function init_hooks() {

        self::$initiated = true;
        self::wphtmlblock_post_type();

        add_action( 'admin_enqueue_scripts', array( 'Htmlblock', 'wphtmlblock_enqueue_scripts' ) );
        add_filter( 'enter_title_here', array( 'Htmlblock', 'wphtmlblock_change_title_text' ) );
        add_action( 'edit_form_after_title', array( 'Htmlblock', 'wphtmlblock_edit_form_after_title' ) );
        add_filter( 'manage_html-block_posts_columns', array( 'Htmlblock', 'wphtmlblock_set_columns' ) );
        add_action( 'manage_html-block_posts_custom_column',  array( 'Htmlblock', 'wphtmlblock_custom_columns' ), 10, 2 );
        //add_action( 'admin_head-edit.php', array( 'Htmlblock', 'wphtmlblock_column_blockid_width' ) );
        add_action( 'add_meta_boxes', array( 'Htmlblock', 'wphtmlblock_add_meta_box' ) );
        add_action( 'save_post', array( 'Htmlblock', 'wphtmlblock_save_metadata' ), 10, 2);
        add_filter( 'post_updated_messages', array( 'Htmlblock', 'wphtmlblock_updated_messages' ) );
        add_action( 'contextual_help', array( 'Htmlblock', 'wphtmlblock_add_help_text' ), 10, 3 );
        //add_shortcode( 'wphtmlblock', array( 'Htmlblock', 'wphtmlblock_add_shortcode' ) );
        add_action( 'do_meta_boxes', array( 'Htmlblock', 'wphtmlblock_rename_featured_image_box' ) );
        add_filter( 'admin_post_thumbnail_html', array( 'Htmlblock', 'wphtmlblock_rename_set_featured_image_text' ) );
        add_action( 'wp_ajax_wphtmlblock_active_toggle', array( 'Htmlblock', 'wphtmlblock_active_toggle_callback' ) );

    }

//    public static function wphtmlblock_add_shortcode( $atts ) {
//        $atts = shortcode_atts( array(
//            'id' => 0,
//        ), $atts, 'wphtmlblock' );
//
//        return self::wphtmlblock( $atts );
//    }
//
//    public static function wphtmlblock( $atts ) {
//        return $atts['id'];
//    }

    public static function wphtmlblock_post_type() {

        $labels = array(
            'name'                  => _x( 'HTML Blocks', 'Post Type General Name', 'wphtmlblock' ),
            'singular_name'         => _x( 'HTML Block', 'Post Type Singular Name', 'wphtmlblock' ),
            'menu_name'             => __( 'HTML Block', 'wphtmlblock' ),
            'name_admin_bar'        => __( 'HTML Block', 'wphtmlblock' ),
            'parent_item_colon'     => __( 'HTML Block:', 'wphtmlblock' ),
            'all_items'             => __( 'All HTML Blocks', 'wphtmlblock' ),
            'add_new_item'          => __( 'Add HTML Block', 'wphtmlblock' ),
            'add_new'               => __( 'Add New', 'wphtmlblock' ),
            'new_item'              => __( 'New HTML Block', 'wphtmlblock' ),
            'edit_item'             => __( 'Edit HTML Block', 'wphtmlblock' ),
            'update_item'           => __( 'Update HTML Block', 'wphtmlblock' ),
            'view_item'             => __( 'View HTML Block', 'wphtmlblock' ),
            'search_items'          => __( 'Search HTML Block', 'wphtmlblock' ),
            'not_found'             => __( 'Not found', 'wphtmlblock' ),
            'not_found_in_trash'    => __( 'Not found in Trash', 'wphtmlblock' ),
            'items_list'            => __( 'HTML Block list', 'wphtmlblock' ),
            'items_list_navigation' => __( 'HTML Block list navigation', 'wphtmlblock' ),
            'filter_items_list'     => __( 'Filter HTML Block list', 'wphtmlblock' ),
        );
        $args = array(
            'label'                 => __( 'HTML Block', 'wphtmlblock' ),
            'labels'                => $labels,
            'supports'              => array( 'title', 'editor', 'thumbnail' ),
            'taxonomies'            => array(),
            'hierarchical'          => false,
            'public'                => false,
            'show_ui'               => true,
            'show_in_menu'          => true,
            'menu_position'         => 22,
            'menu_icon'             => 'dashicons-media-code',
            'show_in_admin_bar'     => true,
            'show_in_nav_menus'     => true,
            'can_export'            => true,
            'has_archive'           => true,
            'exclude_from_search'   => true,
            'publicly_queryable'    => false,
        );
        register_post_type( 'html-block', $args );

    }

    public static function wphtmlblock_rename_featured_image_box() {
        remove_meta_box( 'postimagediv', 'html-block', 'side' );
        add_meta_box('postimagediv', __('Block Image'), 'post_thumbnail_meta_box', 'html-block', 'side', 'low');
    }

    public static function wphtmlblock_rename_set_featured_image_text( $content ) {
        return $content = str_replace( __( 'Set featured image' ), __( 'Set block image' ), $content);
    }

    public function wphtmlblock_save_metadata( $post_id, $post ) {
        $post_types = array('html-block');
        if ( !in_array($post->post_type, $post_types) ) {
            return;
        }
        if ( ! isset( $_POST['wphtmlblock_metadata_nonce'] ) || ! wp_verify_nonce( $_POST['wphtmlblock_metadata_nonce'], 'wphtmlblock_metadata' ) ) {
            return;
        } else {
            if ( isset( $_POST['htmlblock_description'] ) ) {
                update_post_meta( $post_id, '_htmlblock_description', sanitize_text_field( $_POST['htmlblock_description'] ) );
            }
            if ( isset( $_POST['htmlblock_wrapper_class'] ) ) {
                update_post_meta( $post_id, '_htmlblock_wrapper_class', sanitize_text_field( $_POST['htmlblock_wrapper_class'] ) );
            }
            if( isset( $_POST['htmlblock_active'] ) ) {
                update_post_meta( $post_id, '_htmlblock_active', sanitize_text_field( $_POST['htmlblock_active'] ) );
            }
            if( isset( $_POST['htmlblock_display_title'] ) ) {
                update_post_meta( $post_id, '_htmlblock_display_title', sanitize_text_field( $_POST['htmlblock_display_title'] ) );
            }
            if( isset( $_POST['htmlblock_display_desc'] ) ) {
                update_post_meta( $post_id, '_htmlblock_display_desc', sanitize_text_field( $_POST['htmlblock_display_desc'] ) );
            }
            if( isset( $_POST['htmlblock_include_img'] ) ) {
                update_post_meta( $post_id, '_htmlblock_include_img', sanitize_text_field( $_POST['htmlblock_include_img'] ) );
            }
            if( isset( $_POST['htmlblock_img_location'] ) ) {
                update_post_meta( $post_id, '_htmlblock_img_location', sanitize_text_field( $_POST['htmlblock_img_location'] ) );
            }
            if( isset( $_POST['htmlblock_img_size'] ) ) {
                update_post_meta( $post_id, '_htmlblock_img_size', sanitize_text_field( $_POST['htmlblock_img_size'] ) );
            }

        }
    }

    public static function wphtmlblock_add_help_text( $contextual_help, $screen_id, $screen ) {
        if ( 'html-block' == $screen->id || 'edit-html-block' == $screen_id ) {
            $contextual_help =
                '<h2>' . __('Things to remember:', 'wphtmlblock') . '</h2>' .
                '<p>' . __('If you want to return a value and save it to variable:', 'wphtmlblock') . '</p>' .
                '<h4>&lt;?php $block = wphtmlblock( array ( 9 ), true ) ?&gt;</h4>' .
                '<p>' . __('Or, you can simply place a shortcode any where in posts, pages editor or widgets:', 'wphtmlblock') . '</p>' .
                '<h4>[wphtmlblock id="9"]</h4>' .
                '<p>' . __('Or, if you want to place a shortcode in .php file:', 'wphtmlblock') . '</p>' .
                '<h4>&lt;?php do_shortcode( \'[wphtmlblock id="9"]\' ) ?&gt;</h4>' .
                '<h2>' . __('For more information:', 'wphtmlblock') . '</h2>' .
                '<ul>'.
                '<li>' . __('<a href="#" target="_blank">Documentation</a>', 'wphtmlblock') . '</li>' .
                '<li>' . __('<a href="#" target="_blank">Support Forums</a>', 'wphtmlblock') . '</li>' .
                '</ul>';
            $screen->add_help_tab( array(
                'id'   => 'wphtmlblock-help',
                'title'   => __('HTML Block Help'),
                'content'   => $contextual_help,
            ));
        }

    }

    public static function wphtmlblock_updated_messages( $messages ) {

        $post             = get_post();
        $post_type        = get_post_type( $post );
        $post_type_object = get_post_type_object( $post_type );

        $messages['html-block'] = array(
            0  => '', // Unused. Messages start at index 1.
            1  => __( 'HTML Block updated.', 'wphtmlblock' ),
            2  => __( 'Custom field updated.', 'wphtmlblock' ),
            3  => __( 'Custom field deleted.', 'wphtmlblock' ),
            4  => __( 'HTML Block updated.', 'wphtmlblock' ),
            /* translators: %s: date and time of the revision */
            5  => isset( $_GET['revision'] ) ? sprintf( __( 'HTML Block restored to revision from %s', 'wphtmlblock' ), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
            6  => __( 'HTML Block published.', 'wphtmlblock' ),
            7  => __( 'HTML Block saved.', 'wphtmlblock' ),
            8  => __( 'HTML Block submitted.', 'wphtmlblock' ),
            9  => sprintf(
                __( 'HTML Block scheduled for: <strong>%1$s</strong>.', 'wphtmlblock' ),
                // translators: Publish box date format, see http://php.net/date
                date_i18n( __( 'M j, Y @ G:i', 'wphtmlblock' ), strtotime( $post->post_date ) )
            ),
            10 => __( 'HTML Block draft updated.', 'wphtmlblock' )
        );

        if ( $post_type_object->publicly_queryable ) {
            $permalink = get_permalink( $post->ID );

            $view_link = sprintf( ' <a href="%s">%s</a>', esc_url( $permalink ), __( 'View HTML Block', 'your-plugin-textdomain' ) );
            $messages[ $post_type ][1] .= $view_link;
            $messages[ $post_type ][6] .= $view_link;
            $messages[ $post_type ][9] .= $view_link;

            $preview_permalink = add_query_arg( 'preview', 'true', $permalink );
            $preview_link = sprintf( ' <a target="_blank" href="%s">%s</a>', esc_url( $preview_permalink ), __( 'Preview HTML Block', 'wphtmlblock' ) );
            $messages[ $post_type ][8]  .= $preview_link;
            $messages[ $post_type ][10] .= $preview_link;
        }

        return $messages;

    }

    public static function wphtmlblock_set_columns( $columns ) {

        $columns = array(
            'cb' => '<input type="checkbox" />',
            'block_id' => __('ID', 'wphtmlblock'),
            'title' => __('HTML Block Title', 'wphtmlblock'),
            'description' => __('Description', 'wphtmlblock'),
            'shortcode' => __('Shortcode', 'wphtmlblock'),
            'php_code' => __('PHP Code', 'wphtmlblock'),
        );
        return $columns;

    }

    public static function wphtmlblock_custom_columns( $column, $post_id) {
        $class = 'block-inactive dashicons-no-alt';
        if( get_post_meta( $post_id, '_htmlblock_active', true ) == 'Yes' ) {
            $class = 'block-active dashicons-yes';
        }
        switch ( $column ) {
            case 'block_id':
                echo '<span data-id="'.$post_id.'" class="active-toggle dashicons-before '.$class.'"></span>' . $post_id;
                break;
            case 'description':
                echo esc_attr(get_post_meta( $post_id, '_htmlblock_description', true ));
                break;
            case 'shortcode':
                echo '<pre class="copy-code" title="Click to Copy">[wphtmlblock id="'.$post_id.'"]</pre>';
                break;
            case 'php_code':
                echo '<pre class="copy-code" title="Click to Copy">&lt;?php wphtmlblock( array ( \'id\' => '.$post_id.' ) ) ?&gt;</pre>';
                break;
        }
    }

    public static function wphtmlblock_active_toggle_callback() {
        $id = $_POST['block_id'];
        $prev = get_post_meta( $id, '_htmlblock_active', true );
        $next = 'Yes';
        $message = 'active';
        if($prev == 'Yes') {
            $next = 'No';
            $message = 'inactive';
        }
        update_post_meta( $id, '_htmlblock_active', $next );
        echo $message;
        wp_die();
    }

    public static function wphtmlblock_change_title_text( $title ){
        $screen = get_current_screen();

        if  ( 'html-block' == $screen->post_type ) {
            $title = __('Enter HTML Block Title', 'wphtmlblock');
        }

        return $title;
    }

    public static function wphtmlblock_edit_form_after_title( $post ) {
        $screen = get_current_screen();
        if  ( 'html-block' != $screen->post_type ) {
            return;
        }
        ?>
        <div id="descriptiondiv">
            <div id="descriptionwrap">
                <label for="description" id="description-prompt-text" class="<?php echo get_post_meta( $post->ID, '_htmlblock_description', true ) ? 'screen-reader-text' : ''; ?>">Description</label>
                <input type="text" autocomplete="off" spellcheck="true" id="description" value="<?php echo
                esc_attr(get_post_meta( $post->ID, '_htmlblock_description', true )) ?>" name="htmlblock_description">
                <?php
                wp_nonce_field( 'wphtmlblock_metadata', 'wphtmlblock_metadata_nonce' );
                ?>
            </div>
            <div class="inside"></div>
        </div>
        <?php
    }

    public static function wphtmlblock_add_meta_box( $post_type ) {
        if( $post_type == 'html-block' ) {
            add_meta_box(
                'wphtmlblock_settings',
                __( 'Block Settings', 'wphtmlblock' ),
                array('Htmlblock', 'wphtmlblock_meta_box_callback' ),
                'html-block',
                'side',
                'low'
            );
        }
    }

    public static function wphtmlblock_meta_box_callback( $post ) {
        //echo 'Here - ' . $post->ID;
        ?>
        <div id="wphtmlblock_settings">
            <p>
                <label for="block-active">Active</label>
                <select id="block-active" name="htmlblock_active">
                    <option value="Yes" <?php selected( get_post_meta( $post->ID, '_htmlblock_active', true ), 'Yes' ); ?>>Yes</option>
                    <option value="No" <?php selected( get_post_meta( $post->ID, '_htmlblock_active', true ), 'No' ); ?>>No</option>
                </select>
            </p>
            <p>
                <label for="block-wrapper-class">Wrapper Class</label>
                <input type="text" id="block-wrapper-class" name="htmlblock_wrapper_class" value="<?php echo
                esc_attr(get_post_meta( $post->ID, '_htmlblock_wrapper_class', true )) ?>">
            </p>
            <p>
                <label for="block-display-title">Display Title</label>
                <select id="block-display-title" name="htmlblock_display_title">
                    <option value="Yes" <?php selected( get_post_meta( $post->ID, '_htmlblock_display_title', true ), 'Yes' ); ?>>Yes</option>
                    <option value="No" <?php selected( get_post_meta( $post->ID, '_htmlblock_display_title', true ), 'No' ); ?>>No</option>
                </select>
            </p>
            <p>
                <label for="block-display-desc">Display Description</label>
                <select id="block-display-desc" name="htmlblock_display_desc">
                    <option value="Yes" <?php selected( get_post_meta( $post->ID, '_htmlblock_display_desc', true ), 'Yes' ); ?>>Yes</option>
                    <option value="No" <?php selected( get_post_meta( $post->ID, '_htmlblock_display_desc', true ), 'No' ); ?>>No</option>
                </select>
            </p>
            <p>
                <label for="block-include-img">Include Image</label>
                <select id="block-include-img" name="htmlblock_include_img">
                    <option value="Yes" <?php selected( get_post_meta( $post->ID, '_htmlblock_include_img', true ), 'Yes' ); ?>>Yes</option>
                    <option value="No" <?php selected( get_post_meta( $post->ID, '_htmlblock_include_img', true ), 'No' ); ?>>No</option>
                </select>
            </p>
            <p>
                <label for="block-img-location">Image Location</label>
                <select id="block-img-location" name="htmlblock_img_location">
                    <option value="Top" <?php selected( get_post_meta( $post->ID, '_htmlblock_img_location', true ), 'Top' ); ?>>Top</option>
                    <option value="Right" <?php selected( get_post_meta( $post->ID, '_htmlblock_img_location', true ), 'Right' ); ?>>Right</option>
                    <option value="Bottom" <?php selected( get_post_meta( $post->ID, '_htmlblock_img_location', true ), 'Bottom' ); ?>>Bottom</option>
                    <option value="Left" <?php selected( get_post_meta( $post->ID, '_htmlblock_img_location', true ), 'Left' ); ?>>Left</option>
                </select>
            </p>
            <p>
                <label for="block-img-size">Image Size</label>
                <select id="block-img-size" name="htmlblock_img_size">
                    <?php
                    foreach( get_intermediate_image_sizes() as $size ) {
                        //print_r($size);
                        if( $size != 'medium_large' ) {
                            if ( in_array( $size, array( 'thumbnail', 'medium', 'large' ) ) ) {
                                $width  = get_option( $size.'_size_w' );
                                $height  = get_option( $size.'_size_h' );
                            } else {
                                global $_wp_additional_image_sizes;
                                $width  = $_wp_additional_image_sizes[ $size ]['width'];
                                $height  = $_wp_additional_image_sizes[ $size ]['height'];
                            }
                            ?>
                            <option value="<?php echo $size ?>" <?php selected( get_post_meta( $post->ID, '_htmlblock_img_size', true ), $size ); ?>><?php echo $size .' ['. $width . ' x ' . $height . ' ]'; ?></option>
                            <?php
                        }
                    }
                    ?>
                    <option value="full">full</option>
                </select>
            </p>
        </div>
        <?php
    }

    public function wphtmlblock_enqueue_scripts( $hook ) {
        $enqueue = false;
        if( $hook == 'post.php' ) {
            global $post;
            if( get_post_type( $post->ID ) == 'html-block' ) {
                $enqueue = true;
            }
        }

        if ( ($hook == 'edit.php' || $hook == 'post-new.php') && isset($_GET['post_type']) && $_GET['post_type'] == 'html-block' ) {
            $enqueue = true;
        }

        if( $enqueue ) {
            wp_enqueue_script( 'wphtmlblock-script', WPHTMLBLOCK_PLUGIN_URL . 'js/scripts.js'  );
            wp_enqueue_style( 'wphtmlblock-style', WPHTMLBLOCK_PLUGIN_URL . 'css/style.css' );
            wp_localize_script(
                'wphtmlblock-script',
                'wphtmlblock_ajax',
                array(
                    'ajax_url' => admin_url( 'admin-ajax.php' ),
                )
            );
        }
    }

    /*public static function wphtmlblock_column_blockid_width() {
        ?>
        <style>
            #block_id.column-block_id {
                width: 3em;
            }
        </style>
        <?php
    }*/

}