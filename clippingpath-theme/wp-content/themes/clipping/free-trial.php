<?php 
//  Template Name: free-trial.php
?>

<?php get_header();?>
    <section id="inner-banner">
        <div class="twentytwenty-container-2">
             <img src="<?php echo cs_get_option('Freetrial');?>" class="img-fluid" alt="After1">
             <img src="<?php echo cs_get_option('Freetrialr');?>" class="img-fluid" alt="Before">
        </div>
    </section>
    <section id="breadcumb">
        <div class="container">
            <div class="row">
                <div class="col-12 p-0">
                    <ul>
                        <li><a href="<?php bloginfo('home')?>"><i class="fa fa-home"></i>Home</a></li>
                        <li><i class="fa fa-chevron-right"></i><li>
                        <li><a href="#"><?php the_title();?></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
 <section id="free-trial">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 p-0 ">
                    <h2>Free Trial</h2>
                    <p> We offer free trial service of clipping path, masking, retouching, color correction, neck joint, photo restoration, etc. to justify our quality and quick turnaround before you submit an order. Don't worry, your images will be 100% safe to us. Please read through our Privacy Policy and FAQ. page to get more.

You can upload 2 images with the maximum size you have, or if you want to judge us with few images can request us for an FTP account, we will open an unique ftp account for you within less than an hour. But we do recommend you to open an account in our website, so that you can view your submitted order for future reference. </p>
                </div>
                <div class="col-lg-12 get-free p-0">
                    <h2>Get a Free Trial with No Cost or Obligation</h2>
                    <p><span>Tradexcel Graphics is a leading provider of image editing services to clients throughout the world.</span>
                    <span>
We’re so confident you’ll love working with us, we’re letting you try our image editing services 100% FREE with absolutely NO cost or obligation whatsoever.</span><span>Simply fill out the form to the right with 1-3 images you’d like us to edit, and some notes about your project.</span>

Then, we’ll be in touch within 1 business day, and you’ll get professionally editing images for FREE!</p>
                </div>
                 <?php echo do_shortcode('[contact-form-7 id="51" title="Free Trial"]')?>
             
            </div>
        </div>
    </section>
    
    
   <?php get_footer();?>