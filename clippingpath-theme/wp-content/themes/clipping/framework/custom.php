<?php 
   /********************************************
               Change theme option name
   ********************************************/
 add_filter('cs_framework_settings','change_theme_option_name');
 function change_theme_option_name(array $settings){
   $settings=[
  'menu_title'      => 'them Option',
  'menu_type'       => 'menu', // menu, submenu, options, theme, etc.
  'menu_slug'       => 'cs-framework',
  'ajax_save'       => false,
  'show_reset_all'  => false,
  'framework_title' => 'Codestar Framework <small>by Codestar</small>',
];
 return $settings;
}



// framework options filter example
function extra_cs_framework_options( $options ) {

  $options      = array(); // remove old options

 /******************************************
             Theme setting
  *********************************************/
 $options[]     =[
    'name'      => 'settings',
    'title'     => 'Theme Settings',
    'icon'      => 'fa fa-star',
    'fields'    => [
//        Logo
     [
        'id'    => 'logo',
        'type'  => 'upload',
        'title' => 'Header Logo',
      ],
       
	  [
        'id'    => 'footerlogo',
        'type'  => 'upload',
        'title' => 'Footer Logo',
      ],	
		
		
      [
        'id'    => 'Theme_top_email',
        'type'  => 'text',
        'title' => 'Theme TopBar Email',
        'default' => 'example@gmail.com',
      ],
        [
        'id'    => 'top_phone',
        'type'  => 'text',
        'title' => 'Theme TopBar Phone',
        'default' => '01794939992',
      ], 
          
      [
        'id'    => 'fb_link',
        'type'  => 'text',
        'title' => 'Facebook link',
        'desc'    => 'Enter Facebook url like example(http://www.facebook.com/example)',
        'attributes'    => array(
            'placeholder' => 'Enter your facebook link'
         )
      ],  
        
      [
        'id'    => 'twitter_link',
        'type'  => 'text',
        'title' => 'Twitter link',
        'desc'    => 'Enter Twitter url like example(http://www.Twitter.com/example)',
        'attributes'    => array(
            'placeholder' => 'Enter your Twitter link'
         )
      ], 
      [
        'id'    => 'linkedin_link',
        'type'  => 'text',
        'title' => 'linkedin link',
        'desc'    => 'Enter linkedin url like example(http://www.linkedin.com/example)',
        'attributes'    => array(
            'placeholder' => 'Enter your linkedin link'
         )
      ], 
      [
        'id'    => 'Google_plus_link',
        'type'  => 'text',
        'title' => 'Googleplus link',
        'desc'    => 'Enter Googleplus url like example(http://www.Googleplus.com/example)',
        'attributes'    => array(
            'placeholder' => 'Enter your Googleplus link'
         )
      ], 
       [
        'id'    => 'printerest',
        'type'  => 'text',
        'title' => 'printerest link',
        'desc'    => 'Enter printerest url like example(http://www.printerest.com/example)',
        'attributes'    => array(
            'placeholder' => 'Enter your printerest link'
         )
      ],
      
    ]
 ]; 
 
    /**********************************
               Brad cum Image
  ***************************************/  
   
    $options[]     =[
    'name'      => 'breadcum',
    'title'     => 'Breadcum Image Settings',
    'icon'      => 'fa fa-star',
    'fields'    => [ 
	  [
        'id'    => 'aboutpage',
        'type'  => 'upload',
        'title' => 'About Page Before Image',
      ],
      [
        'id'    => 'aboutpager',
        'type'  => 'upload',
        'title' => 'About Page After Image',
      ],
	  [
        'id'    => 'blogpage',
        'type'  => 'upload',
        'title' => 'Blog Page before image',
      ], 
       [
        'id'    => 'blogpager',
        'type'  => 'upload',
        'title' => 'Blog Page after image',
      ], 
	  [
        'id'    => 'Service',
        'type'  => 'upload',
        'title' => 'Service Page befoe image',
      ], 
      
       [
        'id'    => 'Servicer',
        'type'  => 'upload',
        'title' => 'Service Page after image',
      ], 
      
	  
	  [
        'id'    => 'Freetrial',
        'type'  => 'upload',
        'title' => 'Free Trial Page before image',
      ], 
      
       [
        'id'    => 'Freetrialr',
        'type'  => 'upload',
        'title' => 'Free Trial Page after image',
      ], 

	  [
        'id'    => 'price',
        'type'  => 'upload',
        'title' => 'Price Page before image',
      ], 
      
       [
        'id'    => 'pricer',
        'type'  => 'upload',
        'title' => 'Price Page after image',
      ], 
      
	  [
        'id'    => 'Contact',
        'type'  => 'upload',
        'title' => 'Contact Page before image',
      ],
      
        [
        'id'    => 'Contactr',
        'type'  => 'upload',
        'title' => 'Contact Page after image',
      ],
      
	  [
        'id'    => 'single_service',
        'type'  => 'upload',
        'title' => 'Service Page before image',
      ], 
        [
        'id'    => 'single_servicer',
        'type'  => 'upload',
        'title' => 'Service Page after image',
      ], 
	  [
        'id'    => 'quote_page',
        'type'  => 'upload',
        'title' => 'Requesta quote Page before image',
      ],
      
       [
        'id'    => 'quote_pager',
        'type'  => 'upload',
        'title' => 'Requesta quote Page after image',
      ],
       
   
    ]
 ]; 
     

$options[]     =[
    'name'      => 'HomePage',
    'title'     => 'Home Page',
    'icon'      => 'fa fa-star',
    'sections'    => [

 [
    'name'      => 'OURSTRENGTH',
    'title'     => 'OUR STRENGTH',
    'icon'      => 'fa fa-star',
    'fields'    => [
 
 [
  'id'              => 'strange',
  'type'            => 'group',
  'title'           => 'Add Out Strange item',
  'button_title'    => 'Add New',
  'accordion_title' => 'Add New Item',
  'fields'          => [
    [
      'id'    => 'sicon',
      'type'  => 'text',
      'title' => 'Type Hre your Flat Icon Name',
    ],
    [
      'id'    => 'shamim_title',
      'type'  => 'text',
      'title' => 'type here your title',
    ],
    [
      'id'    => 'shamim_p',
      'type'  => 'text',
      'title' => 'type here text',
    ],
  ],
],      
  
      
    ]
 ],      
        
[
    'name'      => 'WhyChoosUs',
    'title'     => 'Why Choose Us',
    'icon'      => 'fa fa-star',
    'fields'    => [
     [
        'id'    => 'choose',
        'type'  => 'Wysiwyg',
        'title' => 'About Area',
     ],
    ]
 ],       
  
  ]
 ];    
    
    
   

   
   
   
   
   
   
   
   


  return $options;

}
add_filter( 'cs_framework_options', 'extra_cs_framework_options' );