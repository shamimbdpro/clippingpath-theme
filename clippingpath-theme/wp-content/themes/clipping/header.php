<!DOCTYPE html>
<html <?php language_attributes();?>>
<head>
    <meta charset="<?php bloginfo('charset')?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>
    <?php if(is_front_page() || is_home()){
        echo get_bloginfo('name');
    } else{
        echo wp_title('');
    }?>
</title>
    <link rel="icon" href="<?php echo get_template_directory_uri();?>/images/favicon.png" type="image/icon">
 <?php wp_head();?>  
</head>

<body <?php body_class(); ?>>
    <header>
        <div class="header-top hide">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7 col-md-7 col-sm-8 p-0 mail">
                        <ul>
                            <li><a href="#"><i class="fa fa-envelope"></i><?php echo cs_get_option('Theme_top_email');?></a></li>
                            <li><a href="#"><i class="fa fa-envelope"></i> call us: <?php echo cs_get_option('top_phone')?></a></li>
                        </ul>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-4 text-right sign-in p-0">
                        <ul>
                            <li><a href="#"><i class="fa fa-sign-out"></i>Login</a></li>
                            <li><a href="#"><i class="fa fa-sign-in"></i>Sign Up</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-2 col-md-2 text-right social d-sm-none d-md-block d-lg-block p-0">
                        <ul>
                            <li><a href="<?php echo cs_get_option('fb_link')?>"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="<?php echo cs_get_option('twitter_link')?>"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="<?php echo cs_get_option('linkedin_link')?>"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="<?php echo cs_get_option('Google_plus_link')?>"><i class="fa fa-google-plus"></i></a></li>
                            <li><a href="<?php echo cs_get_option('printerest')?>"><i class="fa fa-pinterest"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="logo-area hide">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-4 p-0">
                        <a href="<?php bloginfo('home')?>"><img src="<?php echo cs_get_option('logo')?>" class="img-fluid" alt=""></a>
                    </div>
                    <div class="col-lg-8 col-md-8 col-sm-8 text-right p-0">
                        <ul>
                            <li><a href="#"><?php _e( 'Trial Period', 'cliping_path' ); ?></a></li>
                            <li><a href="http://clippingpathaid.com/quote/"><?php _e('get a quote','cliping_path')?></a></li>
                            <li><a href="#"><?php _e('FAQ','cliping_path')?></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="navigation">
            <div class="container">
                <div class="row">
                    <div class="col-12 p-0">

                        <nav class="navbar navbar-expand-md navbar-light p-0">
                       <a class="navbar-brand d-sm-none d-md-none d-lg-none d-xl-none" href="#">
                              <img src="<?php echo get_template_directory_uri();?>/images/logo.png" class="img-fluid" alt="">
                          </a>
                           <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                          </button>

                          <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <!--<ul class="navbar-nav mr-auto">
                              <li class="nav-item">
                                <a class="nav-link active" href="<?php bloginfo('home')?>"><i class="flaticon-home-page"></i>Home</a>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link" href="about.html"><i class="flaticon-info"></i>About Us</a>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link" href="#"><i class="flaticon-folder"></i>sample</a>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link" href="clippingpath.html"><i class="flaticon-repairing-service"></i>Services</a>
                                <div class="megamenu">
                                    <div class="row">
                                        <div class="col-lg-3">
                                            <h3>Basic Image Editing</h3>
                                            <ul>
                                                <li><a href="#"><i class="fa fa-chevron-right"></i>Clippingpath</a></li>
                                                <li><a href="#"><i class="fa fa-chevron-right"></i>Multi clippingpath</a></li>
                                                <li><a href="#"><i class="fa fa-chevron-right"></i>Multi clippingpath</a></li>
                                                <li><a href="#"><i class="fa fa-chevron-right"></i>Multi clippingpath</a></li>
                                            </ul>
                                        </div>
                                        <div class="col-lg-3">
                                            <h3>Image Enhancement</h3>
                                            <ul>
                                                <li><a href="#"><i class="fa fa-chevron-right"></i>Clippingpath</a></li>
                                                <li><a href="#"><i class="fa fa-chevron-right"></i>Multi clippingpath</a></li>
                                                <li><a href="#"><i class="fa fa-chevron-right"></i>Multi clippingpath</a></li>
                                                <li><a href="#"><i class="fa fa-chevron-right"></i>Multi clippingpath</a></li>
                                            </ul>
                                        </div>
                                        <div class="col-lg-3">
                                            <h3>Image Manipulation</h3>
                                            <ul>
                                                <li><a href="#"><i class="fa fa-chevron-right"></i>Clippingpath</a></li>
                                                <li><a href="#"><i class="fa fa-chevron-right"></i>Multi clippingpath</a></li>
                                                <li><a href="#"><i class="fa fa-chevron-right"></i>Multi clippingpath</a></li>
                                                <li><a href="#"><i class="fa fa-chevron-right"></i>Multi clippingpath</a></li>
                                            </ul>
                                        </div>
                                        <div class="col-lg-3">
                                            <h3>Advanced Design</h3>
                                            <ul>
                                                <li><a href="#"><i class="fa fa-chevron-right"></i>Clippingpath</a></li>
                                                <li><a href="#"><i class="fa fa-chevron-right"></i>Multi clippingpath</a></li>
                                                <li><a href="#"><i class="fa fa-chevron-right"></i>Multi clippingpath</a></li>
                                                <li><a href="#"><i class="fa fa-chevron-right"></i>Multi clippingpath</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link" href="#"><i class="flaticon-price-tag"></i>Prices</a>
                              </li>
                              
                              <li class="nav-item">
                                <a class="nav-link" href="<?php echo get_template_directory_uri();?>/free-trial.php"><i class="flaticon-support"></i>Free Trial</a>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link" href="#"><i class="flaticon-wifi"></i>Blog</a>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link" href="#"><i class="flaticon-speak"></i>Contact</a>
                              </li> </ul>--> 
                           
                                <?php wp_nav_menu([
                                 'theme_location' => 'mainmenu',
                                  'menu_class'    => 'nav-item',
                                  'menu_id'       =>   'nav',
                                  'container'     => 'ul',
                                 'items_wrap' => '<ul class="navbar-nav mr-auto">%3$s</ul>',
                                 
                                ])?>
                                
                        
							<?php get_search_form()?>
                          </div>  
                        
                          
                        </nav>
                      
                      

                    </div>
                </div>
            </div>
        </div>
    </header>
