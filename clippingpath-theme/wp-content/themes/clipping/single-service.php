<?php 
//  Template Name: single service
?>
   
<?php get_header();?>
  <?php $breadbefore=get_post_meta(get_the_ID(),'_service_breadbefore',true);?>
  <?php $breadafter=get_post_meta(get_the_ID(),'_service_breadafter',true);?>
      <section id="inner-banner">
        <div class="twentytwenty-container-2">
             <img src="<?php echo $breadbefore;?>" class="img-fluid" alt="After1">
             <img src="<?php echo $breadafter;?>" class="img-fluid" alt="Before">
        </div>
      </section>
    <section id="breadcumb">
        <div class="container">
            <div class="row">
                <div class="col-12 p-0">
                    <ul>
                        <li><a href="index.html"><i class="fa fa-home"></i>Home</a></li>
                        <li><i class="fa fa-chevron-right"></i><li>
                        <li><a href="#">request-a-quote</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <section id="clippingpath">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 pl-0">
				 <?php echo do_shortcode('[wphtmlblock id="69"]')?>
           <!--         <div class="all-service">
                        <h2>Our All Service</h2>
                        <h4>Basic Image Editing</h4>
                        <ul>
                            <li><a href="#">Clipping Path</a></li>
                            <li><a href="#">Multi Clipping Path</a></li>
                            <li><a href="#">Neck Joint</a></li>
                            <li><a href="#">Shadow Creation</a></li>
                        </ul>
                        <h4>Image Inhancement</h4>
                        <ul>
                            <li><a href="#">Image Retouch</a></li>
                            <li><a href="#">Color Correction</a></li>
                            <li><a href="#">Exposure Correction</a></li>
                            <li><a href="#">jewelery Retouch</a></li>
                        </ul>
                        <h4>Image Manipulation</h4>
                        <ul>
                            <li><a href="#">Image Masking</a></li>
                            <li><a href="#">Photo Restoration</a></li>
                            <li><a href="#">Raster to Vector</a></li>
                            <li><a href="#">Image Manipulation</a></li>
                        </ul>
                        <h4>Advanced Design</h4>
                        <ul>
                            <li><a href="#">Advertisement/ Poster Design</a></li>
                            <li><a href="#">Brochure/ Look book Design</a></li>
                            <li><a href="#">E-commerce Image </a></li>
                        </ul> 
                    </div> -->
                </div>
                <div class="col-lg-9 clippingpath-details">
                    <div class="row">
                        <div class="col-lg-12 pr-0">
                            <h2><?php the_title();?></h2>
                        </div>
                        <div class="col-lg-12 pr-0">
                           
                        <?php $shortdes=get_post_meta(get_the_ID(),'_service_shortdes',true);?>
                            <p><?php echo $shortdes;?></p>
                        </div>
                        
                        <?php  $service=new WP_Query(array(
                           'post_type' => 'service',
                            'page_id'  => get_the_Id(),
                           ));
                          if($service->have_posts()){

                            while($service->have_posts()){
                                $service->the_post();
                                 the_content();   

                            }
                          }
                          ?>
                       <?php echo do_shortcode('[contact-form-7 id="51" title="Free Trial"]')?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <br>    
    <br>    
    <br>    
<!--
    
    <section class="services" id="free-trial">
        <div class="container">
            <div class="row">
                <div class="col-12 trial">
                    <div class="row">
                        <div class="col-lg-12 p-0">
                            <div class="row">
                                <div class="col-12 p-0">
                                    <h2>Get a Free Trial Now</h2>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="row">
                                        <div class="col-lg-3 p-0">
                                            <h4>NAME<span>*</span></h4>
                                        </div>
                                        <div class="col-lg-9">
                                            <input type="text" class="trial-text" name="">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="row">
                                        <div class="col-lg-3 p-0">
                                            <h4>ADDRESS<span>*</span></h4>
                                        </div>
                                        <div class="col-lg-9">
                                            <input type="text" class="trial-text" name="">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="row">
                                        <div class="col-lg-3 p-0">
                                            <h4>E-MAIL<span>*</span></h4>
                                        </div>
                                        <div class="col-lg-9">
                                            <input type="email" class="trial-text" name="">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="row">
                                        <div class="col-lg-3 p-0">
                                            <h4>COUNTRY<span>*</span></h4>
                                        </div>
                                        <div class="col-lg-9">
                                            <select class="trial-text" name="">
                                                <option value="0">Select Country</option>
                                                <option value="1">America</option>
                                                <option value="2">Australia</option>
                                                <option value="3">Bangladesh</option>
                                                <option value="4">Canada</option>
                                                <option value="5">India</option>
                                                <option value="6">Pakistan</option>
                                                <option value="7">Netherland</option>
                                                <option value="8">Denmark</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="row">
                                        <div class="col-lg-3 p-0">
                                            <h4>TURNAROUND<span>*</span></h4>
                                        </div>
                                        <div class="col-lg-9">
                                            <select class="trial-text" name="">
                                                <option value="0">Select Turnaround</option>
                                                <option value="2">1Hour - 3Hour</option>
                                                <option value="3">3Hour - 6Hour</option>
                                                <option value="4">6Hour - 12Hour</option>
                                                <option value="5">12Hour - 24Hour</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="row">
                                        <div class="col-lg-3 p-0">
                                            <h4>HOW FOUND US?<span>*</span></h4>
                                        </div>
                                        <div class="col-lg-9">
                                            <input type="text" class="trial-text" name="">
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                        <div class="col-lg-6 text-right right-field">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="row">
                                        <div class="col-lg-3 p-0">
                                            <h4>COMPANY NAME<span>*</span></h4>
                                        </div>
                                        <div class="col-lg-9">
                                            <input type="text" class="trial-text" name="">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="row">
                                        <div class="col-lg-3 p-0">
                                            <h4>WEBSITE<span>*</span></h4>
                                        </div>
                                        <div class="col-lg-9">
                                            <input type="text" class="trial-text" name="">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="row">
                                        <div class="col-lg-3 p-0">
                                            <h4>PHONE<span>*</span></h4>
                                        </div>
                                        <div class="col-lg-9">
                                            <input type="number" class="trial-text" name="">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="row">
                                        <div class="col-lg-3 p-0">
                                            <h4>jOB TITLE<span>*</span></h4>
                                        </div>
                                        <div class="col-lg-9">
                                            <select class="trial-text" name="">
                                                <option value="0">Select Job Title</option>
                                                <option value="2">Clipping Path</option>
                                                <option value="3">Multi Clipping Path</option>
                                                <option value="4">Image Retouching</option>
                                                <option value="5">Neck Joint</option>
                                                <option value="5">Image Masking</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="row">
                                        <div class="col-lg-3 p-0">
                                            <h4>RETURN FILE AS<span>*</span></h4>
                                        </div>
                                        <div class="col-lg-9">
                                            <select class="trial-text" name="">
                                                <option value="0">Select File Type</option>
                                                <option value="2">JPG</option>
                                                <option value="3">PNG</option>
                                                <option value="4">GIF</option>
                                                <option value="5">PSD</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 message">
                            <h4>JOB DESCRIPTION<span>*</span></h4>
                            <textarea class="trial-text" placeholder="Please enter job Description"></textarea>
                        </div>
                        <div class="col-lg-6">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="row">
                                        <div class="col-lg-3 p-0">
                                            <h4>UPLOAD FILE<span>*</span></h4>
                                        </div>
                                        <div class="col-lg-9">
                                            <input type="file" class="" name="">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 captcha">
                                    <div class="row">
                                        <div class="col-lg-3 p-0">
                                            <h4>CAPTCHA<span>*</span></h4>
                                        </div>
                                        <div class="col-lg-6">
                                            <input type="text" class="trial-text" name="">
                                        </div>
                                        <div class="col-lg-3">
                                            <img src="images/free-trial/captcha.jpg" class="img-fluid w-100" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 submit p-0">
                    <label><input type="checkbox">I agree to the terms & conditions</label>
                    <button type="submit">Submit</button>
                </div>
            </div>
        </div>
    </section>
-->
    
  <?php get_footer();?>