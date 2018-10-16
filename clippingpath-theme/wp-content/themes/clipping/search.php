
 <?php get_header();?>
<div class="container" style="padding:50px 0px"> 
    <h3 class="searh_result"><?php printf('Search Result For : <span style="color:#2972cf">%s</span>' , get_search_query());?></h3>
         
<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>
    <?php if(isset($_GET['post_type'])) {
        $type = $_GET['post_type'];
           if($type == 'service') {?>
             this is service
           <?php }
		   
		    } else { ?>

            	<div class="single_search">
					<h3><a href="<?php the_permalink();?>">
					<?php echo the_title();?></a>
					</h3>
					<p><?php echo wp_trim_words(get_the_content(), '55', '...' );?><a href="<?php the_permalink();?>">Read More</a></p>
					<?php if($type=='service'){echo 'service';}?>
				</div>
			  
<?php } ?>
<?php endwhile; else: ?>

 <div class='search_opps'><p>opp's <br /> No Search result</p></div>

<?php endif; ?>
</div>
<?php get_footer();?> 