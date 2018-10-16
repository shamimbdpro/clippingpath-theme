<?php get_header();?>
   <section id="inner-banner" style="background: url(<?php echo get_template_directory_uri();?>/images/blog/blog-banner.jpg) no-repeat center; background-size: cover;">
        <div class="overlay">
            <div class="container">
                <div class="row">
                    <div class="col-12 p-0">
                        <h1>Blog Title</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="breadcumb">
        <div class="container">
            <div class="row">
                <div class="col-12 p-0">
                    <ul>
                       <li><a href="<?php bloginfo('home')?>"><i class="fa fa-home"></i>Home</a></li>
                        <li><i class="fa fa-chevron-right"></i><li>
                        <li><a href="#">Blog</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    
    <section id="blog_page">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
               <?php 
              if(have_posts())
                while(have_posts()){
                    the_post();
					 $blog_mage = get_the_post_thumbnail_url(get_the_ID(),'full'); 
                 $shortdes=get_post_meta(get_the_ID(),'_service_shortdes',true); ?>
                 <div class="single_blog">
                    <img src="<?php echo $blog_mage; ?>" class="img-fluid" alt="">
			
					<div class="blog_info">
					<h6><?php the_date();?><span style="color: #8b8888;font-size: 13px;padding-left:30px;text-transform:lowercase">author : <?php the_author();?></span></h6>
					 <span><?php the_title();?></span>
                    </div>
                   <p><?php the_content();?></p>
				   
				  </div>
                    <?php
                }
              ?>

					
				<div id="disqus_thread"></div>
<script>
(function() { // DON'T EDIT BELOW THIS LINE
var d = document, s = d.createElement('script');
s.src = 'https://http-clippingpathaid-com.disqus.com/embed.js';
s.setAttribute('data-timestamp', +new Date());
(d.head || d.body).appendChild(s);
})();
</script>
<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>	
					
					
					
					
					
					
			   </div>
                <div class="col-lg-3">
                   <?php get_sidebar();?>
                </div>
            </div>
        </div>
    </section>
    
    <?php get_footer();?>