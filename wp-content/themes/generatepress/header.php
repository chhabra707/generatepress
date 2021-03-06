<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <main id="main">
 *
 * @package GeneratePress
 */
// No direct access, please

if (!defined('ABSPATH')) {

    exit;
}
?><!DOCTYPE html>

<html <?php language_attributes(); ?> xmlns="http://www.w3.org/1999/xhtml" xmlns:fb="http://ogp.me/ns/fb#">

    <head>

        <meta charset="<?php bloginfo('charset'); ?>">

        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no"  />

        <title> <?php
            $art_selected = false;

            $metiers_selected = false;

            if (isset($_GET['artist_select']) && $_GET['artist_select'] == 'all' && isset($_GET['category_select'])) {



                $category_array1 = $_GET['category_select'];



                foreach ($category_array1 as $category_item) {

                    // echo $category_item;

                    $category_item = get_term($category_item);



                    if ($category_item->parent == 7) {
                        $art_selected = true;
                    }
                    if ($category_item->parent == 8) {

                        $metiers_selected = true;
                    }
                }
            }



            /* if(is_singular( 'artist' )) {

              echo the_title(); 	echo '/' ;

              } elseif (is_singular( 'saveur' )) {

              echo the_title();  echo '/' ;

              } elseif (is_singular( 'workshop' )) {

              echo 'ATELIERS/ACTIVITÉS/';

              } elseif (is_page_template('template-home.php')) {

              echo 'Home';

              }  elseif (is_post_type_archive('saveur')) {

              echo 'SAVEURS/';

              }

              elseif (is_post_type_archive('workshop')) {

              echo 'ATELIERS/ACTIVITÉS/';

              }

              elseif (is_page_template('template-blog-category.php')) {

              echo 'Nouvelles/';

              }

              elseif (is_page_template('template-home.php')) {

              echo is_page_template('template-home.php');

              }

              elseif (is_page_template('template-workshop-category.php')) {

              echo 'ATELIERS/ACTIVITÉS';

              } elseif (is_post_type_archive('artist')) {

              echo 'ARTS/';

              } elseif (is_page(81)) {

              echo the_title();

              }

              elseif (is_page(178)) {

              echo 'FORFAITS/';

              }

              elseif (is_page(568)) {

              echo '';

              }

              else  { echo the_title(); echo '/' ; } */



            if (is_post_type_archive('artist')) {

                if ($art_selected && $metiers_selected) {

                    echo 'ARTS/';
                } elseif ($art_selected && !$metiers_selected) {

                    echo 'Arts visuels/';
                } elseif (!$art_selected && $metiers_selected) {

                    echo 'Métiers d’art/';
                } else {

                    echo 'ARTS/';
                }

                ;
            } else {

                wp_title('');
            }
            ?> </title>

        <link rel="profile" href="http://gmpg.org/xfn/11">

<script src="https://use.fontawesome.com/1edfd4b563.js"></script>

        <script type="text/javascript">

            var ajaxurl = "<?php echo admin_url('admin-ajax.php'); ?>";

        </script>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

        <script src="<?php echo get_stylesheet_directory_uri(); ?>/js/slick.js"></script>

        <script type="text/javascript" src="//s3.amazonaws.com/downloads.mailchimp.com/js/signup-forms/popup/embed.js" data-dojo-config="usePlainJson: true, isDebug: false"></script><script type="text/javascript">require(["mojo/signup-forms/Loader"], function (L) {

                L.start({"baseUrl": "mc.us15.list-manage.com", "uuid": "a9dd2fe0805fe2ba4bc98a8f4", "lid": "67c1cb963d"})

            })</script>

        <?php echo get_field('script', 'option'); ?>

        <?php wp_head(); ?>

    </head>



    <body class="<?php echo is_post_type_archive('saveur') || is_post_type_archive('workshop') || is_post_type_archive('artist') ? 'category' : ''; ?>">
<?php 
	//use current url on multiple pages 
	global $wp;
	
	//$current_url = home_url( add_query_arg( array(), $wp->request ) );
	//var_dump($current_url);
?>
        <div id="page_wrapper">

            <?php if (is_page(568)) { ?>

                <div id="contact_map">



                </div>

            <?php } ?>

            <header>

                <div id="header" class="clear_both <?php echo is_page_template('template-map-main.php') || is_page_template('template-map-page.php') ? 'map' : ''; ?>">

                    <div id="logo-header">

                        <a href="<?php echo get_home_url(); ?>">

                            <?php
                            if (!is_page_template('template-map-main.php') && !is_page_template('template-map-page.php')) { ?>                                
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/rasr-logo_03.svg" />
                            <?php } ?>    
                        </a>

                    </div>

<?php if (is_page_template('template-home.php')) {
    ?>

                        <div id="homepage_bigimage">
                            <ul class="owl-carousel">

    <?php
    if (have_rows('home_page_slider', 'option')):

        while (have_rows('home_page_slider', 'option')): the_row();
            ?>

                                        <!--<a href="" -->
                                        <li>

                                            <a class="fixunderline">

                                                <div class="homepage_bigimage_image"><img src="<?php echo get_sub_field('slide_image', 'option'); ?>" /></div>

                                                <div class="homepage_bigimage_desc">

                                                    <div class="title"><?php echo get_sub_field('slide_title', 'option'); ?></div>

                                                    <div class="desc"><?php echo get_sub_field('slide_description', 'option'); ?></div>

                                                    <a href="<?php echo get_sub_field('slide_url', 'option'); ?>" class="red-btn">VOIR LA CARTE</a>

                                                </div>

                                            </a>

                                        </li>

                                        <div class="homepage_bigimage_image"><img src="<?php echo get_sub_field('slide_image', 'option'); ?>" /></div>

                                        <div class="homepage_bigimage_desc">

                                            <div class="title"><?php echo get_sub_field('slide_title', 'option'); ?></div>

                                            <div class="desc"><?php echo get_sub_field('slide_description', 'option'); ?></div>

                                            <a href="<?php echo get_sub_field('slide_url', 'option'); ?>" class="red-btn">VOIR LA CARTE</a>

                                        </div>

                                        <!--</a> -->

        <?php endwhile; ?>

                                <?php endif; ?>

                            </ul>

                        </div>

<?php } ?>



                </div>

                <div id="page_title">

<?php
if (is_singular('post')) {

    echo '';
} elseif (is_singular('workshop')) {

    echo '<h1>ATELIERS/ACTIVITÉS/</h1>';
} elseif (is_page_template('template-home.php')) {

    echo '';
} elseif (is_post_type_archive('saveur')) {

    echo '<h1>SAVEURS/</h1>';
} elseif (is_page_template('template-blog-category.php')) {

    echo '<h1>Nouvelles/</h1>';
} elseif (is_page_template('template-map-main.php')) {

    echo '';
} elseif (is_page_template('template-map-page.php')) {
    echo '';
} elseif (is_post_type_archive('workshop')) {

    echo '<h1>ATELIERS/ACTIVITÉS/</h1>';
} elseif (is_page_template('template-workshop-category.php')) {

    echo '<h1>ATELIERS/ACTIVITÉS<h1>';
} elseif (is_singular('artist')) {

    global $post;

    $post_id = $post->ID;

    $category = get_the_terms($post_id, 'artist_cat');

    echo '<h2>' . $category[0]->name . '</h2>';

    //var_dump($category );
} elseif (is_singular('saveur')) {

    global $post;

    //echo $post_id = $post->ID;

    global $post;

    $post_id = $post->ID;

    $category = get_the_terms($post_id, 'saveur_cat');

    echo '<h2>' . $category[0]->name . '</h2>';
} elseif (is_post_type_archive('artist')) {

    if ($art_selected && $metiers_selected) {

        echo '<h1>ARTS/ </h1>';
    } elseif ($art_selected && !$metiers_selected) {

        echo '<h1>Arts visuels/ </h1>';
    } elseif (!$art_selected && $metiers_selected) {

        echo '<h1>Métiers d’art/ </h1>';
    } else {

        echo '<h1>ARTS/ </h1>';
    }
} elseif (is_page(81)) {

    echo '<h1>' . get_the_title() . '</h1>';
} elseif (is_page(178)) {

    echo '<h1>FORFAITS/</h1>';
} elseif (is_page(568)) {

    echo '';
} elseif (is_search()) {

    echo '';
} elseif (is_404()) {

    echo '<h1>Page 404</h1>';
} else {

    echo '<h1>' . get_the_title() . '/ </h1>';
}
?>

                    <?php
                    if (is_singular('post')) {

                        echo '<h2>NOUVELLES/</h2>';
                    }
                    ?>

                    <?php
                    if (is_search()) {

                        echo "<span class='search-text'>VOICI LES RÉSULTATS DE VOTRE RECHERCHE :</span>";
                    }
                    ?>



                </div>

            </header>

            <div id="content" class="<?php echo is_page(568) ? 'contact' : ''; ?> <?php echo is_page(178) ? 'partners' : ''; ?> <?php echo is_page_template('template-map-main.php') ? 'map-wrapper-main' : ''; ?>">