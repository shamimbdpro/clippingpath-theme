 
    <footer>
        <div class="footer-content">
            <div class="container">
                <div class="row">
                    <div class="col-12 footer-menu">
                        <div class="row">
                            <div class="col-lg-3 col-md-6 col-sm-6">
                                <a href="<?php bloginfo('home')?>"><img src="<?php echo cs_get_option('footerlogo')?>" class="img-fluid" alt=""></a>
                            </div>
                            <div class="col-lg-6 d-none d-sm-none d-md-none d-lg-block d-xl-block">
                                <ul class="footer-navs">
                                    <!--<li><a class="active" href="#">Home</a></li>
                                    <li><a href="#">About Us</a></li>
                                    <li><a href="#">Services</a></li>
                                    <li><a href="#">Prices</a></li>
                                    <li><a href="#">Blog</a></li>
                                    <li><a href="#">Contact</a></li>-->
									<?php echo do_shortcode('[wphtmlblock id="71"]')?>
                                </ul>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-6 text-right">
                                <a class="btn-linked" href="https://clippingpathaid.com/free-trial/">Request Us To Get<br>Quick Estimate</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="row">
                            <div class="col-lg-3 col-sm-6 col-md-6 order-sm-2 order-md-2 order-lg-1">
                                <address>
                                    <h3>Address</h3>
                                    <h4>Bangladesh Office:</h4>
                                    <p>123, Road Name Here House #1, Sector #4, Dhanmondi, Dhaka-1205.</p>
                                    <h4>USA Office:</h4>
                                    <p>123, Road Name Here House #1, Sector #4, Dhanmondi, Dhaka-1205.</p>
                                    <h4>UK Office:</h4>
                                    <p>123, Road Name Here House #1, Sector #4, Dhanmondi, Dhaka-1205.</p>
                                </address>
                            </div>
                            <div class="col-lg-7 order-md-1 order-sm-1 order-lg-2 md-gape mobile-service">
                                <div class="row">
                                    <div class="col-12">
                                        <h3>Services</h3>
                                    </div>
									
                                    <div class="col-lg-4 col-md-4 col-sm-6">
                                        <ul class="footer-service">
                                            <li><a href="#"><i class="fa fa-circle"></i>Clipping Path Service</a></li>
                                            <li><a href="#"><i class="fa fa-circle"></i>Color/Multi Clipping Path</a></li>
                                            <li><a href="#"><i class="fa fa-circle"></i>Image Masking Service</a></li>
                                            <li><a href="#"><i class="fa fa-circle"></i>Drop Shadow Service</a></li>
                                            <li><a href="#"><i class="fa fa-circle"></i>Image Retouching Service</a></li>
                                            <li><a href="#"><i class="fa fa-circle"></i>Photo Editing Service</a></li>
                                            <ul class="d-md-none">
                                                <li><a href="#"><i class="fa fa-circle"></i>Neck Joint</a></li>
                                                <li><a href="#"><i class="fa fa-circle"></i>Color Correction Service</a></li>
                                            </ul>
                                        </ul>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-6">
                                        <ul class="footer-service">
                                            <li><a href="#"><i class="fa fa-circle"></i>Raster to Vector Conversion</a></li>
                                            <li><a href="#"><i class="fa fa-circle"></i>Exposure Correction</a></li>
                                            <li><a href="#"><i class="fa fa-circle"></i>Image Manipulation Service</a></li>
                                            <li><a href="#"><i class="fa fa-circle"></i>Image Compositing</a></li>
                                            <li><a href="#"><i class="fa fa-circle"></i>Neck Joint</a></li>
                                            <ul class="d-md-none">
                                                <li><a href="#"><i class="fa fa-circle"></i>Color Correction Service</a></li>
                                                <li><a href="#"><i class="fa fa-circle"></i>Photo Editing Service</a></li>
                                                <li><a href="#"><i class="fa fa-circle"></i>Image Compositing</a></li>
                                            </ul>
                                        </ul>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-6 d-sm-none d-md-block d-lg-block">
                                        <ul class="footer-service">
                                            <li><a href="#"><i class="fa fa-circle"></i>Color Correction Service</a></li>
                                            <li><a href="#"><i class="fa fa-circle"></i>Photo Editing Service</a></li>
                                            <li><a href="#"><i class="fa fa-circle"></i>Image Compositing</a></li>
                                            <li><a href="#"><i class="fa fa-circle"></i>Neck Joint</a></li>
                                            <li><a href="#"><i class="fa fa-circle"></i>Color Correction Service</a></li>
                                        </ul>
                                    </div>
									
									
									
                                </div>
                            </div>
                            <div class="col-lg-2 col-sm-6 col-md-6 order-sm-3 order-md-3 order-lg-3 payment text-md-right text-lg-left">
                                <h3>We Accept</h3>
                                <img src="<?php echo get_template_directory_uri()?>/images/payment-system.png" class="img-fluid" alt="">
                                <h4 class="social">Social Media</h4>
                                <ul>
                                     <li><a href="<?php echo cs_get_option('fb_link')?>"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="<?php echo cs_get_option('twitter_link')?>"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="<?php echo cs_get_option('linkedin_link')?>"><i class="fa fa-linkedin"></i></a></li>
                                    <li><a href="<?php echo cs_get_option('Google_plus_link')?>"><i class="fa fa-google-plus"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="copy-right text-center">
            <p>Copyright © 2018 Clippingpathaid.com. All rightes reserved.</p>
        </div>
    </footer>

    <i class="fa fa-chevron-up up-btn"></i>
    
    <?php wp_footer();?>
</body>
</html>