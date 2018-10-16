<?php 
//  Template Name: index.php
?>
  
   <?php get_header();?>


<section id="banner">
        <div id="banner-slide">
			
			        <?php 
               $slider=new WP_Query(array(
               'post_type' => 'slider',
                'posts_per_page' => -1,
				  'order'       => 'ASC',
               ));
              if($slider->have_posts()){
                     $x=0;
                while($slider->have_posts()){
                     $x++;
                    $slider->the_post();
                     $img= wp_get_attachment_url(get_post_thumbnail_id(get_the_ID()));
              ?>     
					<div class="banner-item">
						<img src="<?php echo $img; ?>" class="img-fluid w-100" alt="">
					</div>
                    <?php
                }
              }
              ?>
			
            
         
			
			
        </div>
    </section>
    <section id="what_we_do">
        <div class="container pl-sm-0">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2><span>expert our</span>What we can do</h2>
                </div>
				<div class="col-lg-3 col-md-3 col-sm-6 p5 text-center">
                    <div class="direction">
                        <img src="<?php echo get_template_directory_uri();?>/images/l-icon-4.png" class="img-fluid" alt="">
                        <img src="<?php echo get_template_directory_uri();?>/images/l-icon-4-h.png" class="img-fluid after" alt="">
                        <h4>Requirements</h4>
                        <p>Big size, large quantity image transfer</p>
                        <a class="btn-linked" href="#">Read More</a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 p5 text-center">
                    <div class="direction">
                        <img src="<?php echo get_template_directory_uri();?>/images/l-icon-1.png" class="img-fluid" alt="">
                        <img src="<?php echo get_template_directory_uri();?>/images/l-icon-1-h.png" class="img-fluid after" alt="">
                        <h4>Need FTP Account?</h4>
                        <p>Big size, large quantity image transfer</p>
                        <a class="btn-linked" href="#">Video Instruction</a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 p5 text-center">
                    <div class="direction">
                        <img src="<?php echo get_template_directory_uri();?>/images/l-icon-2.png" class="img-fluid" alt="">
                        <img src="<?php echo get_template_directory_uri();?>/images/l-icon-2-h.png" class="img-fluid after" alt="">
                        <h4>100% Satisfaction</h4>
                        <p>Reasonable price guaranteed.Try Our Service Today</p>
                        <a class="btn-linked" href="#">Place an Order</a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 p5 text-center">
                    <div class="direction">
                        <img src="<?php echo get_template_directory_uri();?>/images/l-icon-3.png" class="img-fluid" alt="">
                        <img src="<?php echo get_template_directory_uri();?>/images/l-icon-3-h.png" class="img-fluid after" alt="">
                        <h4>Web Upload Account?</h4>
                        <p>Any size any quantity image transfer</p>
                        <a class="btn-linked" href="#">Video Instruction</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <section id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 pl-0 order-1 order-md-1 order-sm-1 order-lg-0 mpr0">
                    <div class="row mmr0">
                        <div class="col-12 strength-md">
                            <h2><span>expert our</span>Our Strength</h2>
                        </div>
                        <div class="col-12 strength mp0">
                            <ul>
                                <?php $stranges= cs_get_option('strange');
                                   if($stranges){
                                    foreach($stranges as $strange){  ?>
                                       <li>
                                            <div class="text">
                                                <i class="<?php echo $strange['sicon']?>"></i>
                                                <h5><?php echo $strange['shamim_title']?></h5>
                                                <span><?php echo $strange['shamim_p']?></span>
                                            </div>
                                        </li>  
                                       
                                  <?php }
                                       }
                                
                                ?>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 pr-0 order-0 order-sm-0 order-md-0 order-lg-1 pl0 spl mp0 m-about">
                    <h2><span>expert our</span>About Clipping path Aid</h2>
                    <?php echo cs_get_option('choose')?>
					  <a class="btn-linked" href="#">Read More <i class="fa fa-chevron-right"></i></a>
                </div>
            </div>
        </div>
    </section>
  
    <section id="service">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2><span>expert our</span>Our Services</h2>
                </div>
                <div class="col-12">
                    <div class="row">     
         <?php 
               $service=new WP_Query(array(
               'post_type' => 'service',
               'posts_per_page' => 8,
                'order'         => 'ASC',
               ));
              if($service->have_posts()){
                   
                while($service->have_posts()){
                    $service->the_post();
                 $shortdes=get_post_meta(get_the_ID(),'_service_shortdes',true);
                 $before_img=get_post_meta(get_the_ID(),'_service_beforeimg',true);
                 $after_img=get_post_meta(get_the_ID(),'_service_afterimg',true); ?>
                        <div class="col-lg-3 col-md-4 text-center p-0">
                            <div class="service-item">
                                <div class="twentytwenty-container">
                                     <img src="<?php echo $before_img;?>" class="img-fluid" alt="After1">
                                     <img src="<?php echo $after_img;?>" class="img-fluid" alt="Before">
                                </div>
                                <div class="service-content">
                                    <h3><?php the_title();?></h3>
                                    <p><?php echo wp_trim_words($shortdes, '16', '' );?></p>
                                    <a class="btn-linked" href="<?php the_permalink();?>">Read More</a>
                                </div>
                            </div>
                        </div>
                        
                    <?php
                }
              }
              ?>
                       
                        
                    </div>
                </div>
                <div class="col-12 more-project text-center">
                    <a class="btn-linked" href="<?php the_permalink();?>">More Project <i class="fa fa-chevron-right"></i></a>
                </div>
            </div>
        </div>
    </section>
    
 
    
    
    <section id="why-chose-us">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 pl0">
                    <div class="row">
                        <div class="col-lg-12">
                            <h2><span>expert our</span>why choose us</h2>
                        </div>
                        <div class="col-12">
                            <div id="accordion">
                              <div class="card">
                                <div class="card-header active" id="headingOne">
                                  <h5 class="mb-0">
                                    <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                      <span class="flaticon-quality"></span>Quality and Commitment
                                    </button>
                                  </h5>
                                </div>

                                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                                  <div class="card-body">
                                    <p>Your satisfaction is our highest priority. we have an hard-line commitment to producing your most quality work and services, whereas meeting the best level of moral standards and performance in our jobs.</p>
                                  </div>
                                </div>
                              </div>
                              <div class="card">
                                <div class="card-header" id="headingTwo">
                                  <h5 class="mb-0">
                                    <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                     <span class="flaticon-best"></span>Best Price & Excellent Service
                                    </button>
                                  </h5>
                                </div>
                                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                                  <div class="card-body">
                                    <p>Clipping Path Aid offers you the right value that you just need. We assure you may get the foremost competitive value at an economic rate with utmost quality that you would like. for selecting the most effective possibility simply undergo our value menu, inform North American country and be our valued prospects.</p>
                                  </div>
                                </div>
                              </div>
                              <div class="card">
                                <div class="card-header" id="headingThree">
                                  <h5 class="mb-0">
                                    <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                      <span class="flaticon-send"></span>Fast Delivery Guarantee
                                    </button>
                                  </h5>
                                </div>
                                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                                  <div class="card-body">
                                    <p>We are greatly attentive to the very fact that point earns money. briefly schedule or within the time of emergencies, Clipping Path Aid continuously cares regarding it slow span. we'll deliver our service as we have a tendency to commit that’s needless to say.</p>
                                  </div>
                                </div>
                              </div>
                              <div class="card">
                                <div class="card-header" id="headingFour">
                                  <h5 class="mb-0">
                                    <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                      <span class="flaticon-upload"></span>Upload Platform
                                    </button>
                                  </h5>
                                </div>
                                <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordion">
                                  <div class="card-body">
                                    <p>Our valued clients enjoy individual FTP accounts that sharing theirfiles become easy either in case of download or upload. We have dedicated server of our own which sole purpose is to provide speedy service securing quality of the given project..</p>
                                  </div>
                                </div>
                              </div>
                              <div class="card">
                                <div class="card-header" id="headingFive">
                                  <h5 class="mb-0">
                                    <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                      <span class="flaticon-support"></span>24/7 Live Support
                                    </button>
                                  </h5>
                                </div>
                                <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordion">
                                  <div class="card-body">
                                    <p>We are 24/7 active in 365 days that our clients find us any moments at their service. You can knock us any moment because we are always live for you to act at your call. Your satisfaction is our goal and ensure supreme service is our business policy.</p>
                                  </div>
                                </div>
                              </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 col-md-6 offset-lg-1 sm-test">
                    <div class="row">
                        <div class="col-lg-12 mp0">
                            <h2><span>expert our</span>Testimonial</h2>
                        </div>
                        <div class="col-lg-12 text-center testimonial p-0">
                            <div class="row mmr0 testimonial-slide">            
                      <?php 
                           $testimonial=new WP_Query(array(
                           'post_type' => 'testimonial',
                            'posts_per_page' =>3,
                            'order'   => 'ASC',
                           ));
                          if($testimonial->have_posts()){

                            while($testimonial->have_posts()){
                                $testimonial->the_post();
                             $testimonialName=get_post_meta(get_the_ID(),'_testimonial_testimonial_name',true);
                             $testimonialImg=get_post_meta(get_the_ID(),'_testimonial_testimonailimg',true);
                             $testimonailtitle=get_post_meta(get_the_ID(),'_testimonial_testimonialtitle',true);
                            ?>
                                <div class="col-12">
                                    <i class="fa fa-quote-right"></i>
                                    <p><?php the_content();?></p>
                                    <img src="<?php echo $testimonialImg;?>" class="img-fluid" alt="">
                                    <h4><?php echo $testimonialName;?></h4>
                                    <span><?php echo $testimonailtitle;?></span>
                                </div>
                            <?php
                            }
                          }
                          ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <section id="pricing-table" class="hide">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2><span>expert our</span>Pricing table</h2>
                </div>
                <div class="col-12 text-center">
                   <?php echo do_shortcode('[wphtmlblock id="64"]')?>
                </div>
                <div class="col-12 text-center price-request">
                    <p>The above prices are for clipping path service only. If you need any other service<br> please request a quote.</p>
                   <a class="btn-linked" href="#">Request a Quote</a>
                </div>
            </div>
        </div>
    </section>
    
    <section id="video-part">
        <div class="video-overlay">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <h3>We take our task with high priority and,<br>ensure of the project or its costs.</h3>
                        <a class="venobox" data-autoplay="true" data-vbtype="video" href="https://youtu.be/P0LfG1190eE">
                            <i class="fa fa-play"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <section id="sample-project">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center s-t-head">
                    <h2><span>expert our</span>Samples Projects</h2>
                    <p>Browse our recent projects with all of our services</p>
                </div>
                <div class="col-12 p-0">
                    <div class="row mmr0 sample-slide">
                        <div class="col-12">
                            <div class="row">
					  <?php 
					  
                           $sameplework=new WP_Query(array(
                           'post_type' => 'sameplework',
                           'posts_per_page' =>12,
                            'order'   => 'ASC',
                           ));
                          if($sameplework->have_posts()){

					  
                            while($sameplework->have_posts()){
								 $sample_position=get_post_meta(get_the_ID(),'_sameplework_sample_position',true);
								   $sameplework->the_post();
					     if($sample_position=='standard'){
                              
                             $testimonailimg=get_post_meta(get_the_ID(),'_sameplework_testimonailimg',true);
                             $samplecat=get_post_meta(get_the_ID(),'_sameplework_samplecat',true);
                             $sampleurl=get_post_meta(get_the_ID(),'_sameplework_sampleurl',true);
                            ?>
                             
                                <div class="col-lg-4 col-md-6 col-sm-6 text-center">
                                   <div class="sample">
                                        <img src="<?php echo $testimonailimg;?>" class="img-fluid" alt="">
                                        <div class="sample-overlay">
                                            <div class="sample-text">
                                               <h4><?php the_title();?></h4>
                                                <p><?php echo $samplecat?></p>
                                                <a href="<?php echo $sampleurl;?>"><i class="fa fa-link"></i></a>
                                               <a class="venobox" data-gall="gallery01" href="image02-big.jpg">
                                                   <i class="fa fa-search-plus"></i>
                                               </a>
                                            </div>
                                        </div>
                                   </div>
                                </div>
                            <?php
                            }
							}
                          }
							?>
							
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="row">
							  <?php 
                           $sameplework=new WP_Query(array(
                           'post_type' => 'sameplework',
                           'posts_per_page' =>12,
                            'order'   => 'ASC',
                           ));
                          if($sameplework->have_posts()){

					  
                            while($sameplework->have_posts()){
							$sample_position=get_post_meta(get_the_ID(),'_sameplework_sample_position',true);
							$sameplework->the_post();
					     if($sample_position=='custom'){
                             $testimonailimg=get_post_meta(get_the_ID(),'_sameplework_testimonailimg',true);
                             $samplecat=get_post_meta(get_the_ID(),'_sameplework_samplecat',true);
                             $sampleurl=get_post_meta(get_the_ID(),'_sameplework_sampleurl',true);
                            ?>
                             
                               <div class="col-lg-4 col-md-6 col-sm-6 text-center">
                                   <div class="sample">
                                        <img src="<?php echo $testimonailimg;?>" class="img-fluid" alt="">
                                        <div class="sample-overlay">
                                            <div class="sample-text">
                                                <h4><?php the_title();?></h4>
                                                <p><?php echo $samplecat?></p>
                                                <a href="<?php echo $sampleurl;?>"><i class="fa fa-link"></i></a>
                                               <a class="venobox" data-gall="gallery01" href="image02-big.jpg">
                                                   <i class="fa fa-search-plus"></i>
                                               </a>
                                            </div>
                                        </div>
                                   </div>
                                </div>
                            <?php
                            }
							}
                          }
							?>
							
								
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 text-center more-sample">
                    <a class="btn-linked" href="#">More PROJECTS <i class="fa fa-chevron-right"></i></a>
                </div>
            </div>
        </div>
    </section>
    
    <section id="working-process">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 p-0">
                   <h2>We Follow a Working Process</h2>
                    <img src="https://clippingpathaid.com/wp-content/uploads/2018/10/working-process-New.jpg" class="img-fluid w-100" alt="">
                </div>
            </div>
        </div>
    </section>
    
    <section id="blog">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h2><span>expert our</span>clipping Path Aid Blog</h2>
                </div>
                <div class="col-12">
                    <div class="row blog-slide">
					      <?php 
				  $recent=new WP_Query(array(
				    'posts_per_page' =>4,
					'order' => 'ASC',
				  ));
              if($recent->have_posts())
                while($recent->have_posts()){
                    $recent->the_post();
					 $blog_mage = get_the_post_thumbnail_url(get_the_ID(),'full'); ?>
				       <div class="col-6 blog-text">
                            <div class="row">
                                <div class="col-lg-6 col-md-12 p-0">
                                    <img src="<?php echo $blog_mage; ?>" class="img-fluid" alt="post-1">
                                </div>
                                <div class="col-lg-6 col-md-12 post">
                                    <h5><?php echo get_the_date(); ?></h5>
                                    <h3><?php the_title();?></h3>
                                    <em>by <?php the_author();?></em>
                                
								
									<p><?php echo wp_trim_words( get_the_content(), 24, '' );?> <a href="<?php the_permalink();?>"> Read more</a></p>

                                </div>
                            </div>
                        </div>
						
                    <?php
                }
              ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <section id="partners">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <ul class="partner-slide">
                        <li><a href="#"><img src="<?php echo get_template_directory_uri();?>/images/partner1.jpg" class="img-fluid" alt=""></a></li>
                        <li><a href="#"><img src="<?php echo get_template_directory_uri();?>/images/partner2.jpg" class="img-fluid" alt=""></a></li>
                        <li><a href="#"><img src="<?php echo get_template_directory_uri();?>/images/partner3.jpg" class="img-fluid" alt=""></a></li>
                        <li><a href="#"><img src="<?php echo get_template_directory_uri();?>/images/partner4.jpg" class="img-fluid" alt=""></a></li>
                        <li><a href="#"><img src="<?php echo get_template_directory_uri();?>/images/partner5.jpg" class="img-fluid" alt=""></a></li>
                        <li><a href="#"><img src="<?php echo get_template_directory_uri();?>/images/partner3.jpg" class="img-fluid" alt=""></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    
    <!-- time area -->
    <section id="time_zone" class="hidden-xs">
        <div class="container">
           <div class="row">
               <div class="col-md-3">
                   <div id="clock_hou"></div>
               </div>
               <div class="col-md-3">
                   <div id="clock_india"></div>
               </div>
               <div class="col-md-3">
                   <div id="clock_korea"></div>
               </div>
               <div class="col-md-3">
                   <div id="clock_uk"></div>
               </div>
           </div>
        </div>
    </section>
<!-- time area -->
    
    
   <?php get_footer();?>