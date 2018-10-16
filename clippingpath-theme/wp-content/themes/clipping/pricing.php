<?php 

 // Template Name: pricing 

?>

<?php get_header();?>
 <section id="inner-banner">
        <div class="twentytwenty-container-2">
             <img src="<?php echo cs_get_option('price');?>" class="img-fluid" alt="After1">
             <img src="<?php echo cs_get_option('pricer');?>" class="img-fluid" alt="Before">
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

<?php get_footer();?>