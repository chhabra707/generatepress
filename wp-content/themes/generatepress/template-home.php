<?php
/* template name: Home */
?>



<?php get_header('home'); ?>



<div id="homepage">



    <div id="logo">

        <a href="<?php echo get_home_url(); ?>">

            <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/rasr-logo_03.svg" />

        </a>

    </div>

    <div class="main">

        <div id="homepage_bigimage">

            <div class="owl-carousel">

                <?php
                if (have_rows('home_page_slider', 'option')):

                    while (have_rows('home_page_slider', 'option')): the_row();
                        ?>	<div class="text-align">

                            <div class="homepage_bigimage_image"><img src="<?php echo get_sub_field('slide_image', 'option'); ?>" /></div>

                            <div class="homepage_bigimage_desc">

                                <div class="title"><h2><?php echo get_sub_field('slide_title', 'option'); ?></h2></div>

                                <div class="desc"><?php echo get_sub_field('slide_description', 'option'); ?></div>
                                <div style="display: block;"></div>

                                <a href="<?php echo get_sub_field('slide_url', 'option'); ?>" class="red-btn">CARTE INTERACTIVE</a>
								<a href="http://www.routeartssaveursrichelieu.com/wp-content/uploads/2018/05/carte-villes-RASR-2018.pdf" class="red-btn">CARTES EN PDF</a>

                            </div>

                        </div>

                        <!--</a> -->

                    <?php endwhile; ?>

                <?php endif; ?>

            </div>

        </div>



        <div id="content" class="<?php echo is_page(568) ? 'contact' : ''; ?> <?php echo is_page(178) ? 'partners' : ''; ?> <?php echo is_page_template('template-map-main.php') ? 'map-wrapper-main' : ''; ?>">

            <div id="homepage">





                <div class="inner_wrapper">





                    <div id="homepage_experience" class="clear_both">

                        <div id="homepage_experience_desc" class="clear_both">

                            <div class="spacer"></div>

                            <div id="homepage_experience_journey">

                                <?php echo get_field('experience_secondary_text', false, false); ?>

                                <!-- <div><div class="first">JOURNÉES PORTES OUVERTES</div>

                                <div class="second"><div>2, 3 <span>&</span> 10 JUIN <span>2018</span></div>

                                 8, 9, 15,<span>&</span> 16 SEPTEMBRE <span>2018</span></div><div class="third">De 10h à 18h</div></div>

                                                                 Nombreux participants aussi ouverts durant tout l’été et même à l’année! Consultez les

                                 moments d’ouverture de chacun. -->

                            </div>

                            <!--<div class="homepage-main-text" > <?php echo get_field('experience_main_text'); ?> </div>-->

                            <?php if (get_field('experience_button_url')): ?><a href="<?php echo get_field('experience_button_url') ?>"><div id="homepage_experience_savoir"><?php echo get_field('experience_button_text'); ?></div> </a> <?php endif; ?>

                        </div>

                    </div>

                    <div id="homepage_decouvrez" class="clear_both">

                        <ul class="clear_both">

                            <?php
                            if (have_rows('home_categories')):

                                while (have_rows('home_categories')): the_row();
                                    ?>



                                    <li class="line">

                                        <div class="homepage_decouvrez_image">

                                            <a href="<?php echo get_sub_field('home_categories_page_url'); ?>">

                                                <img src="<?php echo get_sub_field('home_categories_image'); ?>" />

                                                <div class="title"><?php echo get_sub_field('home_categories_title'); ?></div>

                                                <div class="overlay">

                                                    <div class="plus">

                                                        + 

                                                    </div>

                                                </div>

                                            </a>

                                        </div>

                                    </li>



                                    <?php
                                endwhile;

                            endif;
                            ?>



                        </ul>

                        <!--  <div id="homepage_decouvrez_title">

                             <img src="http://www.routeartssaveursrichelieu.com/wp-content/uploads/2017/04/words-animation-1-1.gif"/>

                         </div> -->

                    </div>





                </div>



                <!--    <div id="homepage_decouvrez_nos">

                        <div class="wrapper">

                            <div id="homepage_decouvrez_nos_image">

                                <img src="<?php echo get_field('ateliers_&_activites_image'); ?>" />

                            </div>

                            <a class="fixunderline" href="http://www.routeartssaveursrichelieu.com/ateliers-activites/">

                                <div id="homepage_decouvrez_nos_text" class="line">

                

                                    <span>Découvrez nos</span>

                                    ateliers & activités

                

                                </div>

                            </a>

                            <ul id="homepage_parcours_images" class="clear_both">

                                <a class="fixunderline" href="<?php echo get_field('du_richelieu_url_1'); ?>"><li><img src="<?php echo get_field('du_richelieu_image_1'); ?>"></li> </a>

                                <a class="fixunderline" href="<?php echo get_field('du_richelieu_url_2'); ?>"><li><img src="<?php echo get_field('du_richelieu_image_2'); ?>"></li> </a>

                            </ul>

                        </div>

                    </div>-->













            </div>

        </div>

    </div>





    <div class="clear-fix"></div>





</div>

<div class="clear_both"></div>



<div class="spacer"></div>

<div id="homepage_map">

    <div class="wrapper">

        <a href="<?php echo site_url(); ?>/carte"><img src="<?php echo get_field('map_image'); ?>" /></a>

        <a  class="fixunderline" href="<?php echo site_url(); ?>/carte">

            <div id="homepage_map_text">

<!--                <span class="votre mob-votre desk-hides">Sélectionnner la ville</span>
                <span class="visit-map mob-map desk-hides">à visiter dans la liste ou</span>-->


                <!--<span class="mob-show">Accéder à la carte</span>-->
                <span class="votre">Accéder à la carte</span>
                <span class="visit-map">pour la recherche</span>

                <!--<span class="visit-map desk-show">à visiter sur<br/>la carte ou</span>-->
        </a>

        <a href="/carte"><span class="btn-map">Carte interactive<i class="fa fa-angle-right fa-2x ic-1"></i></span></a>

        <a href="http://www.routeartssaveursrichelieu.com/wp-content/uploads/2018/05/carte-villes-RASR-2018.pdf"><span class="btn-map">Télécharger cartes<i class="fa fa-angle-right fa-2x ic-1"></i></span></a>

        <!--<span class="btn-map" id="desktop-show">Voir cartes en pdf<i class="fa fa-angle-right fa-2x ic-1"></i></span>-->

    </div>


</div>

</div>



<div class="main">

    <div id="homepage_expreience">

        <div class="wrapper">

            <div class="exp-text">

                <h1 class="exp-title"><?php echo get_field('exp-title'); ?></h1>

                <h2><?php echo get_field('exp-sub-title'); ?></h2>

                <p class="exp-pra"><?php echo get_field('exp-description', false, false); ?></p>
            </div>

            <div class="exp-btn">

                <div class="box">

                    <div class="exp-btn1">

                        <a href="<?php bloginfo('url'); ?>/ateliers-activites/">

                            <p class="btn-wid"><?php echo get_field('exp-btn'); ?></p>

                            <!--<p>activités et ateliers</p>-->

                            <p class="btn-angle"><i class="fa fa-angle-right fa-2x"></i><p>

                        </a>

                    </div>



                    <div class="exp-btn2"><a href="<?php bloginfo('url'); ?>/concours-et-reglements/"><?php echo get_field('exp-btn2'); ?> <span class="i-span"><i class="fa fa-angle-right fa-2x"></i></span></a></div>

                </div>



            </div>

        </div>

    </div>



    <div id="homepage_nouvelles">

        <div class="wrapper">

            <h4 id="homepage_nouvelles_title">nouvelles</h4>

            <ul id="homepage_nouvelles_images" class="clear_both">

                <div id="homepage_nouvelles_more"><a class="fixunderline" href ="http://www.routeartssaveursrichelieu.com/nouvelles/"> Voir tous les articles <span>+</span></a></div>

                <?php
                $posts = get_posts(array(
                    'post_type' => 'post',
                    'numberposts' => 3,
                    'orderby' => 'date',
                ));



                foreach ($posts as $post) {

                    setup_postdata($post);
                    ?>

                    <li>

                        <a class="fixunderline" href="<?php echo get_the_permalink(); ?>">

                            <div class="homepage_nouvelles_image">

                                <?php the_post_thumbnail(); ?>

                            </div>

                            <h2 class="homepage_nouvelles_text"><?php the_title(); ?></h2>

                        </a>

                    </li>



                    <?php
                    wp_reset_postdata();
                }
                ?>

            </ul>

        </div>

    </div>



</div>



<div class="clear_both"></div>

<div class="main">

    <?php get_footer(); ?>

</div>

