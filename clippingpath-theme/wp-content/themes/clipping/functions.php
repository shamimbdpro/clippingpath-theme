<?php

 function theme_support(){
	add_theme_support('post-thumbnails');
	add_theme_support('html5');
	register_nav_menus(array(
       'mainmenu' => 'Main Menu',
	));
}
add_action('after_setup_theme','theme_support');

/******************************** **
      Custom css and js
************************************/
function custom_css_and_js() {
// css
wp_enqueue_style( 'google Fonts','https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800');
wp_enqueue_style( 'font-awesome',get_template_directory_uri().'/css/font-awesome.min.css');
wp_enqueue_style( 'bootstrap-min-css',get_template_directory_uri().'/css/bootstrap.min.css');
wp_enqueue_style( 'slick-css',get_template_directory_uri().'/css/slick.css');
wp_enqueue_style( 'venobox-css',get_template_directory_uri().'/css/venobox.css');
wp_enqueue_style( 'flaticon-css',get_template_directory_uri().'/fonts/flaticon/flaticon.css');
wp_enqueue_style( 'twentytwenty-css',get_template_directory_uri().'/css/twentytwenty.css');




wp_enqueue_style( 'jClocksGMT1.css',get_template_directory_uri().'/css/clock/jClocksGMT.css');

wp_enqueue_style( 'style.css',get_template_directory_uri().'/css/style.css');
wp_enqueue_style( 'device-min-css',get_template_directory_uri().'/css/device.min.css');  
wp_enqueue_style('main_style',get_stylesheet_uri()); 




 
  wp_enqueue_script('jquery.js',get_template_directory_uri().'/js/jquery-v1.12.4.js','null','1.0.0',true);
    
  wp_enqueue_script('bootstrap.js',get_template_directory_uri().'/js/bootstrap.min.js','null','1.0.0',true);
  wp_enqueue_script('venobox.js',get_template_directory_uri().'/js/venobox.min.js','null','1.0.0',true);
  wp_enqueue_script('slick.js',get_template_directory_uri().'/js/slick.min.js','null','1.0.0',true);
  wp_enqueue_script('jquery-cpaaid.js',get_template_directory_uri().'/js/jquery-cpaaid.js','null','1.0.0',true);
  wp_enqueue_script('event.move.js',get_template_directory_uri().'/js/jquery.event.move.js','null','1.0.0',true);
  wp_enqueue_script('jClocksGMT.js',get_template_directory_uri().'/js/clock/jClocksGMT.js','null','1.0.0',true);
  wp_enqueue_script('rotate.js',get_template_directory_uri().'/js/clock/jquery.rotate.js','null','1.0.0',true);
  wp_enqueue_script('custom.js',get_template_directory_uri().'/js/custom.js','null','1.0.0',true);
  wp_enqueue_script('myjs.js',get_template_directory_uri().'/js/my.js','null','1.0.0',true); 
  
    
}
add_action( 'wp_enqueue_scripts', 'custom_css_and_js' );



function custom_post()
{
      /***********************************************
                     Home Slider
     ************************************************/
  register_post_type( 'slider',
    [
      'labels' => array(
        'name' => __( 'slider','cliping' ),
        'singular_name' => __( 'slider','cliping' )
      ),
      'public' => true,
      'has_archive' => true,
      'menu_icon'  => "dashicons-media-text",
      'supports' => array(
        'title','thumbnail',
      ),
    ]
  );
}   

/***********************************************
            Servuce
     ************************************************/
  register_post_type( 'service',
    [
      'labels' => array(
        'name' => __( 'service','cliping' ),
        'singular_name' => __( 'Service','cliping' )
      ),
      'hierarchical' => false,
      'public' => true,
	    'rewrite'     => true, // always set this to false
      'has_archive' => true,
      'menu_icon'  => "dashicons-media-text",
      'supports' => array(
        'title','thumbnail','editor',
      ),
    ]
  );

/***********************************************
            Testimonial
************************************************/
  register_post_type( 'testimonial',
    [
      'labels' => array(
        'name' => __( 'testimonial','cliping' ),
        'singular_name' => __( 'testimonial','cliping' )
      ),
      'hierarchical' => false,
      'public' => true,
      'has_archive' => true,
      'menu_icon'  => "dashicons-media-text",
      'supports' => array(
        'title','thumbnail','editor',
      ),
    ]
  );
  
  
/***********************************************
            Testimonial
************************************************/
  register_post_type( 'sameplework',
    [
      'labels' => array(
        'name' => __( 'sample work','cliping' ),
        'singular_name' => __( 'sample work','cliping' ),
        'add_new' => __( 'Add New sample work','cliping' ),
        'all_items' => __( 'all sameple work','cliping' )
      ),
      'hierarchical' => false,
      'public' => true,
      'has_archive' => true,
      'menu_icon'  => "dashicons-media-text",
      'supports' => array(
        'title',
      ),
    ]
  );


add_action('init', 'custom_post');



function theme_widget() {
	register_sidebar(array(
      'MyWidget' => 'FooterWidget',
    ));
}
add_action( 'widgets_init', 'theme_widget' );




   
// Codestart framework
require_once  get_template_directory().'/framework/codestar/cs-framework.php';
require_once  get_template_directory().'/framework/custom.php';

// CMB2 framework
require_once  get_template_directory().'/framework/CMB2/init.php';
require_once  get_template_directory().'/framework/customcmb.php';





/* Main menu style */

function add_link_atts($atts) {
  $atts['class'] = "nav-link";
  return $atts;
}
add_filter( 'nav_menu_link_attributes', 'add_link_atts');


function atg_menu_classes($classes, $item, $args) {
  if($args->theme_location == 'mainmenu') {
    $classes[] = 'nav-item';
  }
  return $classes;
}
add_filter('nav_menu_css_class', 'atg_menu_classes', 1, 3);
