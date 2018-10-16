<?php
/*
Plugin Name: WP HTML Block
Plugin URI: http://phpprogrammernepal.com/wp-html-block
Description: WP HTML Block help you to create HTML Block so that you can insert it to any place like page, post, custom post type, widget etc via shortcode.
Author: Prayas Sapkota
Version: 1.0.1
Author URI: http://prayas-sapkota.com.np/
Text Domain: wphtmlblock
*/

define( 'WPHTMLBLOCK_VERSION', '1.0.1' );
define( 'WPHTMLBLOCK_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
define( 'WPHTMLBLOCK_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );

require_once( WPHTMLBLOCK_PLUGIN_DIR . 'class.wphtmlblock.php' );

add_action( 'init', array( 'Htmlblock', 'init' ) );
add_action( 'wp_head', 'wphtmlblock_add_css', 1000 );
add_shortcode( 'wphtmlblock', 'wphtmlblock_add_shortcode' );
/**
 * Add support for shortcode in widget area
 */
add_filter('widget_text', 'do_shortcode');

function wphtmlblock_add_shortcode( $atts ) {
    $atts = shortcode_atts( array(
        'id' => 0,
    ), $atts, 'wphtmlblock' );

    return wphtmlblock( $atts, true );
}

/**
 * Generate Custom CSS on front-end
 */
if( ! function_exists( 'wphtmlblock_add_css' ) ) {

    function wphtmlblock_add_css(){
        echo '<style id="wphtmlblock-css">' .
            '.wphtmlblock-container.content-right {
                float: right;
                width: 60%;
            }' .
            'figure.image-left {
                float: left;
                width: 35%;
            }' .
            '.wphtmlblock-container.content-left {
                float: left;
                width: 60%;
            }' .
            'figure.image-right {
                float: right;
                width: 35%;
            }' .
            '</style>';
    }

}

function wphtmlblock( $atts, $return = false ) {
    $id = $atts['id'];
    $active = get_post_meta( $id, '_htmlblock_active', true ) == 'Yes' ? true : false;
    if( $active ) {
        $block = get_post( $id );
        $display_title = get_post_meta( $id, '_htmlblock_display_title', true ) == 'Yes' ? true : false;
        $display_desc = get_post_meta( $id, '_htmlblock_display_desc', true ) == 'Yes' ? true : false;
        $include_image = get_post_meta( $id, '_htmlblock_include_img', true ) == 'Yes' ? true : false;
        if( !has_post_thumbnail( $id ) ) {
            $include_image = false;
        }
        if( $include_image ) {
            $image_location = get_post_meta( $id, '_htmlblock_img_location', true );
            $image_size = get_post_meta( $id, '_htmlblock_img_size', true );
            $image = wp_get_attachment_image_src( get_post_thumbnail_id( $id ), $image_size );
            $image_alt_text = get_post_meta( get_post_thumbnail_id( $id ), '_wp_attachment_image_alt', true );
            $image_container = '<figure class="'.$image_size.' image-'.strtolower($image_location).'">' .
                '<img alt="'.$image_alt_text.'" src="'.$image[0].'">' .
                '</figure>';
        }
        $wrapper_class = esc_attr(get_post_meta( $id, '_htmlblock_wrapper_class', true ));
        $content = '<div class="wphtmlblock '.$wrapper_class.'" id="wphtmlblock-'.$block->post_name.'">';
        if( $include_image && ( $image_location == 'Left' || $image_location == 'Top' || $image_location == 'Right' ) ) {
            $content .= $image_container;
        }
        $container_class = '';
        if( $image_location == 'Right' ) {
            $container_class = 'content-left';
        }
        if( $image_location == 'Left' ) {
            $container_class = 'content-right';
        }
        $content .= '<div class="wphtmlblock-container '.$container_class.'">';
        if( $display_title ) {
            $content .= '<h3 class="block-title">'.$block->post_title.'</h3>';
        }
        if( $display_desc ) {
            $content .= '<div class="block-description">'.esc_attr(get_post_meta( $id, '_htmlblock_description', true )).'</div>';
        }
        $content .= apply_filters( 'the_content', $block->post_content );
        $content .= '</div>';
        if( $include_image && $image_location == 'Bottom' ) {
            $content .= $image_container;
        }
        $content .= '</div>';
        if($return) {
            return $content;
        } else {
            echo $content;
        }
    }
}