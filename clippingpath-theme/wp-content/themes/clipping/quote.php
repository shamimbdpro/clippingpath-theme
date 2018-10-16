<?php /* template name: quote page  */?>
<?php get_header();?>
   <section id="inner-banner">
        <div class="twentytwenty-container-2">
             <img src="<?php echo cs_get_option('quote_page');?>" class="img-fluid" alt="After1">
             <img src="<?php echo cs_get_option('quote_pager');?>" class="img-fluid" alt="Before">
        </div>
    </section>
    <section id="breadcumb">
        <div class="container">
            <div class="row">
                <div class="col-12 p-0">
                    <ul>
                        <li><a href="index.html"><i class="fa fa-home"></i>Home</a></li>
                        <li><i class="fa fa-chevron-right"></i><li>
                        <li><a href="about.html">About</a></li>
                        <li><i class="fa fa-chevron-right"></i><li>
                        <li><a href="#">request-a-quote</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <section id="request-a-quote">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 p-0">
                    <h2>Request A Quote</h2>
                    <p>Please read the form and fill up the form which is given below to send us your free trial. Delivery of your image will take minimum 12 hours and depending upon the complexity of your received image. Here you can upload your trial images directly. Please fill up the form and type instructions here. The accepted file formats are: JPEG,TIF, PNG, BMP etc.</p>
                </div>
                <div class="col-12">
                    <div class="row">
                        <div class="col-lg-12 quote-bg text-center p-0">
                            <div class="overlay">
                                <h5>Fields marked with [<span>*</span>] are required</h5>
                            </div>
                        </div>
						
						<!-- Quote  -->
						 <?php echo do_shortcode('[contact-form-7 id="54" title="quote"]')?>
						
             
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <section id="free-trial">
        <div class="container">
            <div class="row">
                
            </div>
        </div>
    </section>
    
   <?php get_footer();?>