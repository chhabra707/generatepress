<?php get_header(); ?>
<?php 
	$post_id = get_the_ID();
	$taxonomy = get_post_taxonomies( $post_id ); 
	$args = array('orderby' => 'name', 'order' => 'ASC', 'fields' => 'all');
	$terms = wp_get_post_terms( $post_id, $taxonomy, $args ); 
	//var_dump ($terms);
	$length  = count($terms);
	//echo $length;
 ?>
                <div id="workshop-detailed-page">
                    <div id="workshop_desc">
                        <div class="wrapper">
                            <div id="each_workshop" class="clear_both">
                                <div id="workshop_image">
                                    <img src="<?php echo get_field('activity_image'); ?>" />
                                </div>
                                <div id="workshop_description">
                                    <h3 id="workshop_prof"><?php echo get_field('technique'); ?></h3>
                                    <h2 id="workshop_name"><?php the_title();  ?></h2>
                                    <div id="workshop_animation">
                                        <span class="animation"></span><?php echo get_field('nom_de');  ?>
                                    </div>
                                    <div id="workshop-participant">
                                        <a href="<?php echo get_field("participant_url"); ?>">
                                            <div class="workshop-participant-image-wrapper">
                                            <img src="<?php echo get_field("participant_image"); ?>"/>
                                            </div>
                                            <div class="participant-info-wrapper">
                                                <span class="participant-name">Nom de l'animateur(trice) : </span>
                                                <span class="participant-name-value"><?php echo get_field("participant_name"); ?></span>
                                            </div>
                                        </a>
                                    </div>
                                </div>
									<div id="workshop_share">Partager
										<span class="share_soc clear_both">
											<a class="fb fixunderline" href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;"></a>
											<a class="twitter fixunderline" href="https://twitter.com/share?text=<?php the_title(); ?>&url=<?php the_permalink(); ?>" target="_blank"></a>
											<a class="pinterest fixunderline" href="//pinterest.com/pin/create/button/?url=<?php echo get_permalink(); ?>&media=<?php echo wp_get_attachment_url( get_post_thumbnail_id() ); ?>&description=<?php the_title(); ?>"></a>
										</span>
									</div>
                                <div id="workshop_item_description">
									<?php if(get_field('description')) : ?>
										<div class="apropos">
											<?php echo get_field('description'); ?> 
										</div>
									<?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
		<?php get_footer(); ?>