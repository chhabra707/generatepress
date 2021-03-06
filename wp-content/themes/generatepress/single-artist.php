<?php get_header(); ?>



<script src="https://use.fontawesome.com/1edfd4b563.js"></script>

<?php
$post_id = get_the_ID();

$taxonomy = get_post_taxonomies($post_id);

$args = array('orderby' => 'name', 'order' => 'ASC', 'fields' => 'all');

$terms = wp_get_post_terms($post_id, $taxonomy, $args);

//var_dump ($terms);

$length = count($terms);

//echo $length;
?>

<div id="arts-participant-detailed-page">

    <div id="arts_participant_desc">

        <div class="wrapper">

            <div id="each_artist" class="clear_both">

                <div id="artist_image">

                    <img src="<?php echo get_field('artist_image'); ?>" />

                </div>

                <div id="artist_description">

                    <div id="artist_number">/<?php echo get_field('number'); ?> </div> 

                    <h3 id="artist_prof">

                        <?php
//var_dump($terms); die;   
// foreach($terms as $termObject) :
// if($termObject->parent == 0) {
// echo $termObject->name;
// }
// endforeach;
// foreach($terms as $termObject) :
// if($termObject->parent !=0) {
// echo  ' / ' .$termObject->name;
// }
// endforeach

                        echo get_field('artist_category');
                        ?>

                        <div id="artist_90"></div>

                    </h3>



                    <h1 id="artist_name"><?php echo get_the_title(); ?></h1>

                    <ul class="clear_both">
                        <?php if (get_field('nom_de_famille')): ?>
                                                        <!--<li class="town"><strong><?php echo get_field('nom_de_famille'); ?></strong> </li>--> 
                        <?php endif; ?>
                        <?php if (get_field('nom')): ?>
                                                        <!--<li class="town"><?php echo get_field('nom'); ?> </li>--> 
                        <?php endif; ?>

									<?php if( get_field('address') ): ?>

										<li class="address"><?php echo get_field('address'); ?> </li> 

									<?php endif; ?>

									<?php if( get_field('town') ): ?>

										<li class="town"><?php echo get_field('town'); ?> </li>

									<?php endif; ?>

									<?php if( get_field('phone_first') ): ?>

										<li class="phone"> <?php echo get_field('phone_first'); if( get_field('phone_second')) echo '/'; echo get_field('phone_second');?> </li> 

									<?php endif; ?> 

									<?php if( get_field('artist_email') ): ?>

										<li class="mail"><a class="fixunderline" href="mailto:<?php  echo get_field('artist_email'); ?>"><?php  echo get_field('artist_email'); ?></a> </li>

									<?php endif; ?>

									

									<?php if( get_field('website') ): ?>

										<li class="website"><a class="fixunderline" href="<?php echo 'http://'. get_field('website'); ?>"><?php echo get_field('website'); ?> </a> </li>

									<?php endif; ?>







                        <?php if (get_field('facebook_link') || get_field('twitter_link') || get_field('pinterest_link') || get_field('instagram_link')) : ?>

                            <li class="share">Me suivre

                                <span class="share_soc clear_both">

                                    <?php if (get_field('facebook_link')): ?>

                                        <a href="<?php echo get_field('facebook_link'); ?> " target="_blank" class="fb fixunderline"></a>

                                    <?php endif; ?>



                                    <?php if (get_field('twitter_link')): ?>

                                        <a href="<?php echo get_field('twitter_link'); ?> " target="_blank" class="twitter fixunderline"></a>

                                    <?php endif; ?>



                                    <?php if (get_field('pinterest_link')): ?>

                                        <a href="<?php echo get_field('pinterest_link'); ?>" target="_blank" class="pinterest fixunderline"></a> 

                                    <?php endif; ?>



                                    <?php if (get_field('instagram_link')): ?>

                                        <a href="<?php echo get_field('instagram_link'); ?>" target="_blank" class="insta fixunderline"></a>

                                    <?php endif; ?>

                                </span>

                            </li>

                        <?php endif; ?>

                    </ul>

                </div>

                <?php if (get_field('artist_featured_work')): ?>

                    <div id="artist_item_image">

                        <img src="<?php echo get_field('artist_featured_work'); ?>" />

                    </div>

                <?php endif; ?>

                <div id="artist_item_description">      

                    <div class="apropos">

                        <?php if (get_field('about_artist')): ?>

                            <h4 class="apropos_title">/À propos</h4>

                            <div class="apropos_desc"><?php echo get_field('about_artist'); ?></div>

                        <?php endif; ?>

                    </div>

                    <div class="apropos">

                        <?php if (get_field('about_second')): ?>

                            <h4 class="apropos_title">/heures d’ouverture</h4>

                            <div class="apropos_desc"><?php echo get_field('about_second'); ?></div>

                        <?php endif; ?>

                    </div>


                </div>
                <div class="clearfix"></div>
<?php 
	$array_cases = get_field('ateliersactivites');
	$args = array( 'post_type' => 'workshop', 'post_status' => 'publish', 'post__in' => $array_cases); 
	$catPosts = new WP_Query( $args );

	if( $catPosts->have_posts() && !empty($array_cases) ) : ?>				
                <div class="apropos">
                    <h4 class="apropos_title h4-title">/Atelier(s) de création disponible(s)</h4>
		<?php while ($catPosts->have_posts()) : $catPosts->the_post(); ?>
                    <div class="section-box">
                        <div class="box-img"><img src="<?php echo get_field('activity_image'); ?>" width="142" height="92"/></div>
                        <div class="box-content apropos_desc">
							<strong><?php the_title(); ?></strong>  

                            <!--</p>-->
                            <a href="<?php the_permalink();?>" alt=""><button class="det-btn">Détails</button></a>
                        </div>
                    </div>
		<?php endwhile; ?>                
	
                </div>

	<?php endif;  wp_reset_postdata(); ?>
				
            </div>

        </div>


    </div>

    <div id="arts_participant_gallery">

        <div class="wrapper">

            <!-- <h3>/mes œuvres</h3> -->

            <ul class="owl-carousel">

                <?php if (get_field('gallery')): ?>

                    <?php $images = get_field('gallery'); ?>

                    <?php foreach ($images as $image): ?>

                        <li data-id="<?php echo $image['id']; ?>"><img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" /></li>

                    <?php endforeach; ?>

                <?php endif; ?>

            </ul>

        </div>

    </div>

    <div id="arts_participant_share">

        <div class="wrapper">

            <ul id="arts_participant_share_left">

                <li class=""><a class="fixunderline" href="mailto:<?php echo get_field('artist_email'); ?>"><i class="fa fa-envelope-o fa-2x env-cl" aria-hidden="true"></i> M’écrire</a></li> 

                <?php if (get_field('website')): ?>

                    <li><a class="fixunderline" href="http://<?php echo get_field('website'); ?> " target="_blank"> <?php echo get_field('website'); ?> </a></li>

                <?php endif; ?>

                <?php if (get_field('phone_first')): ?>

                    <li> <?php echo get_field('phone_first'); ?> </li> 

                <?php endif; ?> 

                <?php
                $location = get_field('location');
                $lat = $location["lat"];
                $lng = $location["lng"];
                ?>

                <li class="location"><a class="fixunderline" target="_blank" href="http://www.google.com/maps/place/<?php echo $lat; ?>,<?php echo $lng; ?>"> Obtenir l’itinéraire </a></li>

            </ul>

            <div id="arts_participant_share_right" class="shared">

                Partager

                <ul>

                    <li class="fb">	<a class="fixunderline" href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;"></a></li>

                    <li class="twitter"><a class="fixunderline" href="https://twitter.com/share?text=<?php the_title(); ?>&url=<?php the_permalink(); ?>" target="_blank"></a></li>

                    <li class="pinterest"><a class="fixunderline" href="//pinterest.com/pin/create/button/?url=<?php echo get_permalink(); ?>&media=<?php echo wp_get_attachment_url(get_post_thumbnail_id()); ?>&description=<?php the_title(); ?>"></a></li>

                </ul>

            </div>

        </div>

    </div>

    <?php
    $prev_post = get_previous_post();

    $next_post = get_next_post();
    ?>

    <div style="<?php
    if (empty($prev_post) || empty($next_post)) {
        echo 'width:220px;';
    }
    ?>" class="single-share-wrapper">  

        <?php if (!empty($prev_post)): ?>

            <a class="prev-button fixunderline" href="<?php echo get_permalink($prev_post->ID); ?>">PARTICIPANT</br>PRÉCÉDENT</a>

        <?php endif ?> 

        <?php if (!empty($next_post)): ?>

            <a class="next-button fixunderline" href="<?php echo get_permalink($next_post->ID); ?>">PARTICIPANT</br>SUIVANT</a>

        <?php endif; ?>    

    </div>

</div>



<?php get_footer(); ?>