<?php
if ( file_exists( dirname( __FILE__ ) . '/cmb2/init.php' ) ) {
	require_once dirname( __FILE__ ) . '/cmb2/init.php';
} elseif ( file_exists( dirname( __FILE__ ) . '/CMB2/init.php' ) ) {
	require_once dirname( __FILE__ ) . '/CMB2/init.php';
}


add_action( 'cmb2_admin_init', 'methabox' );
  
function methabox(){
    
//    service
    
   $pref='_service_';
	
	
	
	

	
	
	
	
	
   $service = new_cmb2_box( array(
      'id'           => 'srevice_meta',
      'title'        => 'Service metabox',
      'object_types' => array( 'service' ),
    ));
	
	
	  $service->add_field( array(
		'name'       => esc_html__( 'Breadcum Before Image', 'cliping' ),
		'desc'       => esc_html__( 'Breadcum Before image', 'cliping' ),
		'id'         => $pref.'breadbefore',
		'type'       => 'file',
	  ));
	
	  $service->add_field( array(
		'name'       => esc_html__( 'Breadcum After Image', 'cliping' ),
		'desc'       => esc_html__( 'Breadcum After image', 'cliping' ),
		'id'         => $pref.'breadafter',
		'type'       => 'file',
	  ));
	
    
  $service->add_field( array(
    'name'       => esc_html__( 'short description', 'cliping' ),
    'desc'       => esc_html__( 'short descriptio', 'cliping' ),
    'id'         => $pref.'shortdes',
    'type'       => 'textarea',
  ));
    
  $service->add_field( array(
    'name'       => esc_html__( 'Before Image', 'cliping' ),
    'desc'       => esc_html__( 'Before image', 'cliping' ),
    'id'         => $pref.'beforeimg',
    'type'       => 'file',
  ));
    
  $service->add_field( array(
    'name'       => esc_html__( 'After Image', 'cliping' ),
    'desc'       => esc_html__( 'Before image', 'cliping' ),
    'id'         => $pref.'afterimg',
    'type'       => 'file',
  ));

  
    //    Testimonial
    
   $pref='_testimonial_';
   $slider_item = new_cmb2_box( array(
      'id'           => 'testimonial_meta',
      'title'        => 'testimonial metabox',
      'object_types' => array( 'testimonial' ),
    ));
    
  $slider_item->add_field( array(
    'name'       => esc_html__( 'Testimonial Name', 'cliping' ),
    'desc'       => esc_html__( 'Testimonail Name', 'cliping' ),
    'id'         => $pref.'testimonial_name',
    'type'       => 'text',
  ));
    
  $slider_item->add_field( array(
    'name'       => esc_html__( 'Testimonial image', 'cliping' ),
    'desc'       => esc_html__( 'Testimonial image', 'cliping' ),
    'id'         => $pref.'testimonailimg',
    'type'       => 'file',
  ));
    
  $slider_item->add_field( array(
    'name'       => esc_html__( 'Testimonial Title', 'cliping' ),
    'desc'       => esc_html__( 'Testimonial Title', 'cliping' ),
    'id'         => $pref.'testimonialtitle',
    'type'       => 'text',
  ));
 
  //    sameplework
    
   $pref='_sameplework_';
   $sameplework = new_cmb2_box( array(
      'id'           => 'sameplework_meta',
      'title'        => 'sameplework metabox',
      'object_types' => array( 'sameplework' ),
    ));
    

  $sameplework->add_field( array(
    'name'       => esc_html__( 'Sample image', 'cliping' ),
    'desc'       => esc_html__( 'Sample image', 'cliping' ),
    'id'         => $pref.'testimonailimg',
    'type'       => 'file',
  ));
    
  $sameplework->add_field( array(
    'name'       => esc_html__( 'project category', 'cliping' ),
    'desc'       => esc_html__( 'add project cetegory', 'cliping' ),
    'id'         => $pref.'samplecat',
    'type'       => 'text',
  )); 
  
  $sameplework->add_field( array(
    'name'       => esc_html__( 'project url', 'cliping' ),
    'desc'       => esc_html__( 'add project url', 'cliping' ),
    'id'         => $pref.'sampleurl',
    'type'       => 'text_url',
  )); 

  $sameplework->add_field( array(
	'name'    => esc_html__('work position','cliping'),
	 'desc'       => esc_html__( 'top position will show top and bottom possion will show bottom', 'cliping' ),
	'id'      => $pref . 'sample_position',
	'type'    => 'radio',
	'options' => array(
		'standard' => __( 'Top column', 'cliping' ),
		'custom'   => __( 'Bottom column', 'cliping' ),
		
	),
	//'default' => 'standard',
));
  
       
    
    
}