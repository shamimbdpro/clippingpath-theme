<?php 
//  Template Name: Contact Page
?>
   
<?php get_header();?>
      <section id="inner-banner">
        <div class="twentytwenty-container-2">
             <img src="<?php echo cs_get_option('Contact');?>" class="img-fluid" alt="After1">
             <img src="<?php echo cs_get_option('Contactr');?>" class="img-fluid" alt="Before">
        </div>
    </section>
    
    <section id="breadcumb">
        <div class="container">
            <div class="row">
                <div class="col-12 p-0">
                    <ul>
                        <li><a href="<?php bloginfo('home')?>"><i class="fa fa-home"></i>Home</a></li>
                        <li><i class="fa fa-chevron-right"></i><li>
                        <li><?php the_title();?></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    
    <section id="contact-page">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2>Contact Us</h2>
                    <p>You can contact us at any given time with queries or concerns. We are here to help you 24/7 and 365 days of the year. No matter what the nature of your concern is, your satisfaction is our ultimate concern.</p>
                </div>
                <div class="col-12 address">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="row">
								<div class="col-lg-12 col-md-4">
									<h3>Dhaka Office</h3>
									<p>2901 Company Location Here<br>
									Dhanmondi, Dhaka-1205<br>
									1-234-7890, 1-234-7890</p>
								</div>
								<div class="col-lg-12 col-md-4">
									<h3>USA Office</h3>
									<p>2901 Company Location Here<br>
									Dhanmondi, Dhaka-1205<br>
									1-234-7890, 1-234-7890</p>
								</div>
								<div class="col-lg-12 col-md-4">
									<h3>UK Office</h3>
									<p>2901 Company Location Here<br>
									Dhanmondi, Dhaka-1205<br>
									1-234-7890, 1-234-7890</p>
								</div>
							</div>
                        </div>
                        <div class="col-lg-8 form_part">
                           <!-- <form action="" method="">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <input type="text" placeholder="Name" id="" name="" class="contact-fields">
                                    </div>
                                    <div class="col-lg-6">
                                        <input type="email" placeholder="Email" id="" name="" class="contact-fields">
                                    </div>
                                    <div class="col-lg-12">
                                        <input type="text" placeholder="Subject" id="" name="" class="contact-fields">
                                    </div>
                                    <div class="col-lg-12">
                                        <textarea name="" placeholder="Message" class="contact-fields"></textarea>
                                    </div>
                                    <div class="col-lg-12 submit">
                                        <button type="submit">Submit</button>
                                    </div>
                                </div>
                            </form> -->
							<?php echo do_shortcode('[contact-form-7 id="50" title="contact us"]')?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <section id="contact-map">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3650.3350859971156!2d90.36429921550865!3d23.806680684561663!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755b8b221929b83%3A0xf6184d24076e8248!2z4Kau4Ka_4Kaw4Kaq4KeB4KawIOCmuOCnnOCmlSwg4Kai4Ka-4KaV4Ka-!5e0!3m2!1sbn!2sbd!4v1537813952405" frameborder="0" style="border:0" allowfullscreen></iframe>
    </section>
    
   <?php get_footer();?>