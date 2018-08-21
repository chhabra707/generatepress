<?php /*template name: map main*/ ?>                            
<?php get_header(); ?>

<?php
/* ARTISTS */

$artists = array();

$terms = get_terms('artist_cat', array(
    'hide_empty' => false,
    'parent' => 0
        ));
		
foreach ($terms as $term) {
    $subCategories = array();
    $term_children = get_term_children($term->term_id, 'artist_cat');

    foreach ($term_children as $child) {
        $child_term = get_term_by('id', $child, 'artist_cat');
        $postsArray = array();
        $posts = get_posts(array(
            'post_type' => 'artist',
            'numberposts' => -1,
            'meta_key' => 'number',
            'orderby' => 'meta_value',
            'order' => 'ASC',
            'tax_query' => array(
                array(
                    'taxonomy' => 'artist_cat',
                    'field' => 'id',
                    'terms' => $child_term->term_id, // Where term_id of Term 1 is "1".
                    'include_children' => false
                )
            ),
	'post_status' =>'publish'
        ));

        foreach ($posts as $post) {
            //var_dump($post);
            $post_ = array();
            setup_postdata($post);
            $post_['name'] = stripslashes(get_the_title());
            $post_['number'] = get_field('number');
            $post_['address'] = stripslashes(get_field('address'));
            $post_['featuredImage'] = get_field('artist_featured_work');
            if (get_field('artist_town')) {
                $post_['map_town'] = get_field('artist_town');
            } else {
                $post_['map_town'] = '';
            }
            $post_['email'] = get_field('artist_email');
            $post_['email_second'] = get_field('artist_email_second');
            $post_['phone'] = get_field('phone_first');
            $post_['phone_second'] = get_field('phone_second');
            $post_['town'] = get_field('town');
            $post_['page'] = get_the_permalink();
			//echo get_stylesheet_directory_uri().'/pin/generating-markers.php?text='.$post->ID;
			//http://godate.org/demo/wp-content/themes/generatepress
            //$post_['mapPin'] = get_stylesheet_directory_uri() . '/pins/pin_' . $post->ID . '.png';
            $post_['mapPin'] = get_stylesheet_directory_uri() . '/pin/generating-markers.php?type=artist&text='.get_field('number');
            $location = get_field('location');
            $post_['lat'] = $location['lat'];
            $post_['lng'] = $location['lng'];
            wp_reset_postdata();
            array_push($postsArray, $post_);	
        };
		
        array_push($subCategories, array('subcategory' => $child_term->name, 'posts' => $postsArray));
    };
    array_push($artists, array('maincategory' => $term->name, 'subcategories' => $subCategories));
}
/* echo count($artists)."</br>";
print "<pre>";
print_r($artists);
print "</pre>";
exit; */

//array_unique()
/* Saveurs */
$saveurs = array();
$terms = get_terms('saveur_cat', array(
    'hide_empty' => false,
    'parent' => 0
        ));
foreach ($terms as $term) {
    $subCategories = array();
    $term_children = get_term_children($term->term_id, 'saveur_cat');
    foreach ($term_children as $child) {
        $child_term = get_term_by('id', $child, 'saveur_cat');
        $postsArray = array();
        $posts = get_posts(array(
            'post_type' => 'saveur',
            'numberposts' => -1,
            'meta_key' => 'number',
            'orderby' => 'meta_value',
            'order' => 'ASC',
            'tax_query' => array(
                array(
                    'taxonomy' => 'saveur_cat',
                    'field' => 'id',
                    'terms' => $child_term->term_id, // Where term_id of Term 1 is "1".
                    'include_children' => false
                )
            ),
	'post_status' =>'publish'
        ));
        foreach ($posts as $post) {
            $post_ = array();
            setup_postdata($post);
            $post_['name'] = stripslashes(get_the_title());
            $post_['number'] = get_field('number');
            $post_['address'] = stripslashes(get_field('address'));
            $post_['featuredImage'] = get_field('artist_featured_work');
            $post_['email'] = get_field('artist_email');
            if (get_field('artist_town')) {
                $post_['map_town'] = get_field('artist_town');
            } else {
                $post_['map_town'] = '';
            }
            $post_['email_second'] = get_field('artist_email_second');
            $post_['phone'] = get_field('phone_first');
            $post_['phone_second'] = get_field('phone_second');
            $post_['town'] = get_field('town');
            $post_['page'] = get_the_permalink();
            $post_['mapPin'] = get_stylesheet_directory_uri() . '/pin/generating-markers.php?type=artist&text='.get_field('number');
            $location = get_field('location');
            $post_['lat'] = $location["lat"];
            $post_['lng'] = $location["lng"];
            wp_reset_postdata();
            array_push($postsArray, $post_);
        };
        array_push($subCategories, array('subcategory' => $child_term->name, 'posts' => $postsArray));
    };
    array_push($saveurs, array('maincategory' => $term->name, 'subcategories' => $subCategories));
}

/* Sponsors */
$sponsors = array();
$index = 0;
$posts = get_posts(array(
    'post_type' => 'sponsor',
    'numberposts' => -1,
    'order' => 'ASC',
    'orderby' => 'title',
	'post_status' =>'publish'
        ));
		
foreach ($posts as $post) {
    $index++;
    setup_postdata($post);
    $sponsors[$index]['name'] = get_the_title($post);
    $sponsors[$index]['logo'] = get_field('sp_logo');
    $sponsors[$index]['address'] = get_field('sp_address');
    $sponsors[$index]['second_address'] = get_field('sp_second_address');
    $sponsors[$index]['phone'] = get_field('sp_phone');
    $sponsors[$index]['second_phone'] = get_field('sp_second_telephone');
    $sponsors[$index]['website'] = get_field('sp_website');
    $sponsors[$index]['email'] = get_field('sp_email');
    $sponsors[$index]['email'] = get_field('sp_email');
    $sponsors[$index]['pin'] = get_stylesheet_directory_uri() . '/pin/generating-markers.php?type=sponsor&text='. get_field('sp_letter');
    if (get_field('sp_location')) {
        $location = get_field('sp_location');
        $sponsors[$index]['lat'] = $location['lat'];
        $sponsors[$index]['lng'] = $location['lng'];
        $sponsors[$index]['direction'] = 'http://www.google.com/maps/place/' . $location['lat'] . ',' . $location['lng'];
    } else {
        $sponsors[$index]['lat'] = '';
        $location = '';
        $sponsors[$index]['lng'] = '';
        $sponsors[$index]['direction'] = '';
    }
    wp_reset_postdata();
}

/* Collectives */
$collectives = array();
$index = 0;
$posts = get_posts(array(
    'post_type' => 'collective',
    'numberposts' => -1,
    'order' => 'ASC',
    'orderby' => 'title'
        ));

foreach ($posts as $post) {
    $index++;
    setup_postdata($post);
    $collectives[$index]['name'] = ''; //get_the_title($post);
    $collectives[$index]['col_external_link'] = get_field('col_external_website_link');
    $collectives[$index]['logo'] = get_field('col_image');
    $collectives[$index]['place'] = get_field('col_place');
    $collectives[$index]['dates'] = get_field('col_dates');
    $collectives[$index]['dayhours'] = get_field('col_dayshours');
    $collectives[$index]['address'] = get_field('col_address');
    $collectives[$index]['pin'] = get_field('col_pin');

    if (get_field('col_location')) {
        $location = get_field('col_location');
        $collectives[$index]['lat'] = $location["lat"];
        $collectives[$index]['lng'] = $location["lng"];
        $collectives[$index]['direction'] = 'http://www.google.com/maps/place/' . $location['lat'] . ',' . $location['lng'];
    } else {
        $collectives[$index]['lat'] = '';
        $location = '';
        $collectives[$index]['lng'] = '';
        $collectives[$index]['direction'] = '';
    }
    wp_reset_postdata();
}
?>
<script>
    var artists = <?php echo json_encode($artists); ?>;
    var saveurs = <?php echo json_encode($saveurs); ?>;
	var sponsors = <?php echo json_encode($sponsors); ?>;
    var collectives = <?php echo json_encode($collectives); ?>;
</script>
 
<div id="interactive_map">

	<div id="interactive_map_map">

	</div>
	<div id="interactive_map_search">
	<div class="intractive-map-main-info"><span>Sélectionnez la ou les </br> catégories désirées </br> et cliquez sur </br> « RECHERCHER »</span></div>
		<div id="interactive_map_before_search">
			<div id="interactive_map_cat">
				<div class="select_items arts">
					<div class="select_items_title">Arts</div>
					<ul>

					</ul>
				</div>
				<div class="select_items saveurs">
					<div class="select_items_title">Saveurs</div>
					<ul>

					</ul>
				</div>
			
				<div class="select_items collectives">
					<div class="only_select_items_title">NOS EXPOSITIONS COLLECTIVES</div>
					<ul class="item">

					</ul>
				</div> 
				<div class="select_items sponsors">
					<div class="only_select_items_title">COMMANDITAIRES</div>
					<ul class="item">

					</ul>
				</div>
			</div>
			<div id="interactive_map_button">RECHERCHER</div>
		</div>
		<div id="interactive_map_result">
		    
			<div id="interactive_map_back">Revenir à la carte</div>
			<ul id="interactive_map_searched_arts" class="clear_both">

			</ul>
		</div>
	</div>
	<div class="map-legend" >
		<div class="col-3 float-left" style="width:180px;"><img class="legend-icon" src="<?php echo get_stylesheet_directory_uri(); ?>/images/clusterer-legend_03.svg" /><div>Regroupement de participants</div></div>
		<div class="col-3 float-left" style="width:150px;"><img class="legend-icon" src="<?php echo get_stylesheet_directory_uri(); ?>/images/expositions-collectives-legende_03.svg" /><div>Expositions collectives</div></div>
		<div class="col-3 float-left" style="width:140px;line-height:28px;"><img class="legend-icon" src="<?php echo get_stylesheet_directory_uri(); ?>/images/participant-legend_03.svg" /><div style="">Participants</br></div></div>
		<div class="col-3 float-left" style="width:140px;line-height:28px;"><img class="legend-icon" src="<?php echo get_stylesheet_directory_uri(); ?>/images/partners-legend_03.svg" /><div style="">Partenaires</br></div></div>
	</div>
</div>
<style type="text/css">
.float-left{float:left;}
.legend-icon{
	display:inline-block;
	vertical-align: middle;
	float:left;
	margin:0 10px 0 0;
}
.map-legend {
	font-family:poppins;
	position: relative;
     left: 25px;
    bottom: 70px;
    width: 655px;
    height: 35px;
    overflow: hidden;
    padding: 5px 10px;
    background-color: rgba(255,255,255,0.80);
    z-index: 10;
} 
.map-legend .col-3 { 
   /* width: 180px; */
   line-height: 19px;
   padding-left: 10px;
}

</style>
<?php get_footer(); ?>