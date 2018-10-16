<?php /* template name: blog page  */?>
<?php get_header();?>
  <section id="inner-banner">
        <div class="twentytwenty-container-2">
             <img src="<?php echo cs_get_option('blogpage');?>" class="img-fluid" alt="After1">
             <img src="<?php echo cs_get_option('blogpager');?>" class="img-fluid" alt="Before">
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
    
    <section id="blog_page" class="blog_oage" style="margin-top:-50px">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
		   <?php 
              if(have_posts()){
                while(have_posts()){
                    the_post();
					 $blog_mage = get_the_post_thumbnail_url(get_the_ID(),'full');  ?>
                 <div class="single_blog">
                    <img src="<?php echo $blog_mage; ?>" class="img-fluid" alt="">
			
					<div class="blog_info">
					<h6><?php the_date();?><span style="color: #8b8888;font-size: 13px;padding-left:30px;text-transform:lowercase">author : <?php the_author();?></span></h6>
					 <span><?php the_title();?></span>
                    </div>
					 <p><?php the_excerpt(); ?></p> 
				   <div class="read_more"> 
						<a href="<?php the_permalink();?>" class="btn btn-primary">Read More</a>
				    </div>
				  </div>
                    <?php
                } 
			   
				   the_posts_pagination( array(
				   'screen_reader_text' => ' ', 
				   'mid_size' => 5,
				     'prev_text' => __('«'),
                     'next_text' => __('»'),
				   ) );
				   
			  }else{
				  echo 'no blog post here';
			  }
              ?>
                </div>
                <div class="col-lg-3">
                   <?php get_sidebar();?>
                </div>
            </div>
        </div>
    </section>
    

    
   <?php get_footer();?>