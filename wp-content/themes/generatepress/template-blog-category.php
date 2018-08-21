<?php
	/*template name: Blog Category*/
 ?>
 
<?php  get_header(); ?>
	  <div id="blog_category">
                    <div class="wrapper">
						<?php
						$posts = get_posts(array(
							'post_type' => 'post',
							'numberposts' => -1,
							'orderby' => 'date',  
						));
						$i = 1;
						foreach( $posts as $post ) {
								setup_postdata($post);
							if($i == 1) { 
						
							$i++; 
							
							?> 
						 <div id="category_image_desc" class="clear_both">
						 <a class="fixunderline" href="<?php echo get_the_permalink(); ?>">
                            <div id="category_image"><?php the_post_thumbnail(); ?></div>
                            <div id="category_desc">
                                <div id="category_desc_article">Dernier article</div>
                                <div id="category_desc_title"><?php the_title(); ?></div>
                            </div>
						</a> 
                        </div>
                        <div id="search_count" class="blog">Articles précédents</div>
                        <div id="category_list" class="blog clear_both">
							<?php  } else {
							setup_postdata( $post );  ?>
								<div class="items">
									<a class="fixunderline" href="<?php echo get_the_permalink(); ?>">
										<div class="item_image">
											<?php the_post_thumbnail(); ?>
										</div>
										<div class="item_ad clear_both"> 
											<?php the_title(); ?>
										</div>
									</a>							
								</div>
						<?php  } wp_reset_postdata();	}   ?>
                        </div>
                        <div id="paging">
                            <div id="paging_count"><span class="first">12</span> – <span class="second">22</span> sur <span class="all">22</span> nouvelles</div>
                        </div>
                    </div>
                </div>

<?php get_footer(); ?>