      <div class="catagory">
                        <h3>CATEGORY</h3>
                        <ul>
                            <?php echo do_shortcode('[wphtmlblock id="70"]')?>
                        </ul>
                    </div>
                    <div class="top_post">
                        <h3>Top Post</h3>
						<div class="post_short"> 
                        <ul>
			       <?php 
				  $recent=new WP_Query(array(
				    'posts_per_page' => 6,
				  ));
              if($recent->have_posts())
                while($recent->have_posts()){
                    $recent->the_post();
					 $blog_mage = get_the_post_thumbnail_url(get_the_ID(),'full'); ?>
				    <li><a href="<?php the_permalink();?>">
                                <img src="<?php echo $blog_mage; ?>" alt="">
                                <h5><?php the_title();?></h5>
                                <span><?php echo get_the_date('M-d-y'); ?></span>
                            </a></li>
                    <?php
                }
              ?>	
                        </ul>
                      </div>
                    </div>
					