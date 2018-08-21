<?php
/**
 * GeneratePress functions and definitions
 *
 * @package GeneratePress
 */
// No direct access, please
if (!defined('ABSPATH'))
    exit;
define('GENERATE_VERSION', '1.3.46');
define('GENERATE_URI', get_template_directory_uri());
define('GENERATE_DIR', get_template_directory());
if (!function_exists('generate_setup')) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which runs
     * before the init hook. The init hook is too late for some features, such as indicating
     * support post thumbnails.
     */
    add_action('after_setup_theme', 'generate_setup');
    function generate_setup() {
        /**
         * Make theme available for translation
         */
        load_theme_textdomain('generatepress');
        /**
         * Add default posts and comments RSS feed links to head
         */
        add_theme_support('automatic-feed-links');
        /**
         * Enable support for Post Thumbnails on posts and pages
         *
         * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
         */
        add_theme_support('post-thumbnails');
        /**
         * Register primary menu
         */
        //register_nav_menus( array(
        // 'primary' => __( 'Primary Menu', 'generatepress' ),
        //) ); 
        /**
         * Enable support for Post Formats
         */
        add_theme_support('post-formats', array('aside', 'image', 'video', 'quote', 'link', 'status'));
        /**
         * Enable support for WooCommerce
         */
        // add_theme_support( 'woocommerce' );
        /**
         * Enable support for <title> tag
         */
        add_theme_support('title-tag');
        /*
         * Add HTML5 theme support
         */
        add_theme_support('html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption'));
        /*
         * Add Logo support
         */
        add_theme_support('custom-logo', array(
            'height' => 70,
            'width' => 350,
            'flex-height' => true,
            'flex-width' => true,
        ));
        /*
         * Indicate widget sidebars can use selective refresh in the Customizer.
         */
        add_theme_support('customize-selective-refresh-widgets');
        /**
         * Set the content width to something large
         * We set a more accurate width in generate_smart_content_width()
         */
        global $content_width;
        if (!isset($content_width))
            $content_width = 1200; /* pixels */
        /*
         * This theme styles the visual editor to resemble the theme style
         */
        add_editor_style('inc/css/editor-style.css');
    }
endif; // generate_setup
if (!function_exists('generate_get_defaults')) :
    /**
     * Set default options
     */
    function generate_get_defaults() {
        $generate_defaults = array(
            'hide_title' => '',
            'hide_tagline' => '',
            'logo' => '',
            'top_bar_width' => 'full',
            'top_bar_inner_width' => 'contained',
            'top_bar_alignment' => 'right',
            'container_width' => '1100',
            'header_layout_setting' => 'fluid-header',
            'header_inner_width' => 'contained',
            'nav_alignment_setting' => ( is_rtl() ) ? 'right' : 'left',
            'header_alignment_setting' => ( is_rtl() ) ? 'right' : 'left',
            'nav_layout_setting' => 'fluid-nav',
            'nav_inner_width' => 'contained',
            'nav_position_setting' => 'nav-below-header',
            'nav_dropdown_type' => 'hover',
            'nav_search' => 'disable',
            'content_layout_setting' => 'separate-containers',
            'layout_setting' => 'right-sidebar',
            'blog_layout_setting' => 'right-sidebar',
            'single_layout_setting' => 'right-sidebar',
            'post_content' => 'full',
            'footer_layout_setting' => 'fluid-footer',
            'footer_inner_width' => 'contained',
            'footer_widget_setting' => '3',
            'footer_bar_alignment' => 'right',
            'back_to_top' => '',
            'background_color' => '#efefef',
            'text_color' => '#3a3a3a',
            'link_color' => '#1e73be',
            'link_color_hover' => '#000000',
            'link_color_visited' => '',
        );
        return apply_filters('generate_option_defaults', $generate_defaults);
    }
endif;
if (!function_exists('generate_get_setting')) :
    /**
     * A wrapper function to get our settings
     * @since 1.3.40
     */
    function generate_get_setting($setting) {
        $generate_settings = wp_parse_args(
                get_option('generate_settings', array()), generate_get_defaults()
        );
        return $generate_settings[$setting];
    }
endif;
// if ( ! function_exists( 'generate_widgets_init' ) ) :
// /**
// * Register widgetized area and update sidebar with default widgets
// */
// add_action( 'widgets_init', 'generate_widgets_init' );
// function generate_widgets_init() 
// {
// // Set up our array of widgets	
// $widgets = array(
// 'sidebar-1' => __( 'Right Sidebar', 'generatepress' ),
// 'sidebar-2' => __( 'Left Sidebar', 'generatepress' ),
// 'header' => __( 'Header', 'generatepress' ),
// 'footer-1' => __( 'Footer Widget 1', 'generatepress' ),
// 'footer-2' => __( 'Footer Widget 2', 'generatepress' ),
// 'footer-3' => __( 'Footer Widget 3', 'generatepress' ),
// 'footer-4' => __( 'Footer Widget 4', 'generatepress' ),
// 'footer-5' => __( 'Footer Widget 5', 'generatepress' ),
// 'footer-bar' => __( 'Footer Bar','generatepress' ),
// 'top-bar' => __( 'Top Bar','generatepress' ),
// );
// // Loop through them to create our widget areas
// foreach ( $widgets as $id => $name ) {
// register_sidebar( array(
// 'name'          => $name,
// 'id'            => $id,
// 'before_widget' => '<aside id="%1$s" class="widget inner-padding %2$s">',
// 'after_widget'  => '</aside>',
// 'before_title'  => apply_filters( 'generate_start_widget_title', '<h4 class="widget-title">' ),
// 'after_title'   => apply_filters( 'generate_end_widget_title', '</h4>' ),
// ) );
// }
// }
// endif;
/**
 * Custom template tags for this theme.
 */
// require get_template_directory() . '/inc/template-tags.php';
// /**
// * Custom functions that act independently of the theme templates.
// */
// require get_template_directory() . '/inc/extras.php';
// /**
// * Build the navigation
// */
// require get_template_directory() . '/inc/navigation.php';
// /**
// * Customizer additions.
// */
// require get_template_directory() . '/inc/customizer.php';
// /**
// * Load element classes
// */
// require get_template_directory() . '/inc/element-classes.php';
// /**
// * Load metaboxes
// */
// require get_template_directory() . '/inc/metaboxes.php';
// /**
// * Load options
// */
// require get_template_directory() . '/inc/options.php';
// /**
// * Load add-on options
// */
// require get_template_directory() . '/inc/add-ons.php';
// /**
// * Load our CSS builder
// */
// require get_template_directory() . '/inc/css.php';
// /**
// * Load plugin compatibility
// */
// require get_template_directory() . '/inc/plugin-compat.php';
// /**
// * Load our deprecated functions
// */
// require get_template_directory() . '/inc/deprecated.php';
if (!function_exists('generate_get_min_suffix')) :
    /**
     * Figure out if we should use minified scripts or not
     * @since 1.3.29
     */
    function generate_get_min_suffix() {
        return defined('SCRIPT_DEBUG') && SCRIPT_DEBUG ? '' : '.min';
    }
endif;
if (!function_exists('generate_scripts')) :
    /**
     * Enqueue scripts and styles
     */
    add_action('wp_enqueue_scripts', 'generate_scripts');
    function generate_scripts() {
        // Get our options.
        $generate_settings = wp_parse_args(
                get_option('generate_settings', array()), generate_get_defaults()
        );
        // Get the minified suffix.
        $suffix = generate_get_min_suffix();
        // Enqueue our CSS.
        wp_enqueue_style('generate-style-grid', get_template_directory_uri() . "/css/unsemantic-grid{$suffix}.css", false, GENERATE_VERSION, 'all');
        wp_enqueue_style('multiple-selectcss', get_template_directory_uri() . '/css/multiple-select.css', false, GENERATE_VERSION, 'all');
        wp_enqueue_style('multiselect-css', get_template_directory_uri() . '/css/multiselect.css', array('generate-style-grid'), GENERATE_VERSION, 'all');
        wp_enqueue_style('owlcarouselcss', get_template_directory_uri() . '/css/owl.carousel.css', array('generate-style-grid'), GENERATE_VERSION, 'all');
        wp_enqueue_style('cssmenucss', get_template_directory_uri() . '/css/cssmenu.css', array('generate-style-grid'), GENERATE_VERSION, 'all');
        if (is_front_page()) {
             wp_enqueue_style('home-style', get_template_directory_uri() . '/style-home.css', array('generate-style-grid'), GENERATE_VERSION, 'all');        
        } else {
            wp_enqueue_style('generate-style', get_template_directory_uri() . '/style.css', array('generate-style-grid'), GENERATE_VERSION, 'all');
        }
        wp_enqueue_style('generate-responsive-style', get_template_directory_uri() . '/css/responsive.css', array('generate-style-grid'), GENERATE_VERSION, 'all');
        wp_enqueue_style('generate-d-style', get_template_directory_uri() . '/css/dresponsived.css', array('generate-style-grid'), GENERATE_VERSION, 'all');
        
		     wp_enqueue_style('single-artist', get_template_directory_uri() . '/css/single-artist.css', array('generate-style-grid'), GENERATE_VERSION, 'all');
        
		/*if (is_archive('workshop')) {
            wp_enqueue_style('archive-workshop', get_template_directory_uri() . '/css/workhshop.css', array('generate-style-grid'), GENERATE_VERSION, 'all');
        }*/
      
        if (is_page_template('template-map-page.php')) {

            wp_enqueue_style('map-style', get_template_directory_uri() . '/css/map-style.css', array('generate-style-grid'), GENERATE_VERSION, 'all');
            wp_enqueue_style('map-footer', get_template_directory_uri() . '/css/footer-style.css', array('generate-style-grid'), GENERATE_VERSION, 'all');
        }

		
        //wp_enqueue_style( 'generate-mobile-style', get_template_directory_uri() . "/css/mobile{$suffix}.css", array( 'generate-style' ), GENERATE_VERSION, 'all' );
        /* // Add the child theme CSS if child theme is active.
          if ( is_child_theme() ) {
          wp_enqueue_style( 'generate-child', get_stylesheet_uri(), array( 'generate-style' ), filemtime( get_stylesheet_directory() . '/style.css' ), 'all' );
          }
          // Font Awesome
          $icon_essentials = apply_filters( 'generate_fontawesome_essentials', false );
          $icon_essentials = ( $icon_essentials ) ? '-essentials' : false;
          wp_enqueue_style( "fontawesome{$icon_essentials}", get_template_directory_uri() . "/css/font-awesome{$icon_essentials}{$suffix}.css", false, '4.7', 'all' );
          // IE 8
          wp_enqueue_style( 'generate-ie', get_template_directory_uri() . "/css/ie{$suffix}.css", array( 'generate-style-grid' ), GENERATE_VERSION, 'all' );
          wp_style_add_data( 'generate-ie', 'conditional', 'lt IE 9' );
          // Add jQuery
          wp_enqueue_script( 'jquery' );
          // Add our mobile navigation
          wp_enqueue_script( 'generate-navigation', get_template_directory_uri() . "/js/navigation{$suffix}.js", array( 'jquery' ), GENERATE_VERSION, true );
          // Add our hover or click dropdown menu scripts
          $click = ( 'click' == $generate_settings[ 'nav_dropdown_type' ] || 'click-arrow' == $generate_settings[ 'nav_dropdown_type' ] ) ? '-click' : '';
          wp_enqueue_script( 'generate-dropdown', get_template_directory_uri() . "/js/dropdown{$click}{$suffix}.js", array( 'jquery' ), GENERATE_VERSION, true );
          // Add our navigation search if it's enabled
          if ( 'enable' == $generate_settings['nav_search'] ) {
          wp_enqueue_script( 'generate-navigation-search', get_template_directory_uri() . "/js/navigation-search{$suffix}.js", array( 'jquery' ), GENERATE_VERSION, true );
          }
          // Add the back to top script if it's enabled
          if ( 'enable' == $generate_settings['back_to_top'] ) {
          wp_enqueue_script( 'generate-back-to-top', get_template_directory_uri() . "/js/back-to-top{$suffix}.js", array( 'jquery' ), GENERATE_VERSION, true );
          }
          // Move the navigation from below the content on mobile to below the header if it's in a sidebar
          if ( 'nav-left-sidebar' == generate_get_navigation_location() || 'nav-right-sidebar' == generate_get_navigation_location() ) {
          wp_enqueue_script( 'generate-move-navigation', get_template_directory_uri() . "/js/move-navigation{$suffix}.js", array( 'jquery' ), GENERATE_VERSION, true );
          }
          // IE 8
          if ( function_exists( 'wp_script_add_data' ) ) {
          wp_enqueue_script( 'generate-html5', get_template_directory_uri() . "/js/html5shiv{$suffix}.js", array( 'jquery' ), GENERATE_VERSION, true );
          wp_script_add_data( 'generate-html5', 'conditional', 'lt IE 9' );
          }
          // Add the threaded comments script
          if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
          wp_enqueue_script( 'comment-reply' );
          } */
        wp_enqueue_script( 'imjquery', get_template_directory_uri() . "/js/jquery.min.js", array(), GENERATE_VERSION, true );
        wp_enqueue_script('multiple-select', get_template_directory_uri() . "/js/multiple-select.js", array('imjquery'), GENERATE_VERSION, true);
        //wp_enqueue_script('multiselect', get_template_directory_uri() . "/js/multiselect.min.js", array('jquery'), GENERATE_VERSION, true);
        wp_enqueue_script('owlcarousel', get_template_directory_uri() . "/js/owl.carousel.js", array('jquery'), GENERATE_VERSION, true);
        wp_enqueue_script('cssmenujs', get_template_directory_uri() . "/js/cssmenu.js", array('jquery'), GENERATE_VERSION, true);
        wp_enqueue_script('googlemap', "http://maps.googleapis.com/maps/api/js?v=3.31&key=AIzaSyDSvMkddo6Y8IyMiicKglekpHDT51a-TZk", array(), GENERATE_VERSION, true);
        wp_enqueue_script('cluster', get_template_directory_uri() . "/js/markerclusterer.js", array(), '1.0', true);
		
        if ( is_page_template( 'template-map-page.php' ) ) {
			wp_enqueue_script('init_new', get_template_directory_uri() . "/js/init_new.js", array('jquery'), GENERATE_VERSION, true);
			wp_enqueue_script('map-filter',get_stylesheet_directory_uri().'/js/map-filter.js',array('jquery'),'0.9', true);
		}else{
			wp_enqueue_script('init', get_template_directory_uri() . "/js/init.js", array('jquery'), GENERATE_VERSION, true);
        }

		
		
    	
		//wp_localize_script( 'map-filter', 'do_filter',array( 'ajax_url' => admin_url( 'admin-ajax.php' )));	
		
		//wp_enqueue_script( 'slick', get_template_directory_uri() . "/js/slick.js", array( 'jquery' ), GENERATE_VERSION, true );
        //wp_enqueue_script( 'slick', get_template_directory_uri() . "/js/slick.js", array('jquery'), '',true );
    }
endif;
/*===========================================================================================================================*/
	//add_action('wp_ajax_map_filter', 'map_filter');
	//add_action('wp_ajax_nopriv_map_filter', 'map_filter');
	
/*==site wide usable functions start == */
	function custom_posttype_query($args){
		print "<pre>";
		print_r($args);
		print "</pre>";
		exit;		
	/* 	
		$args = array(
					'post_types' = array(),
					'by_ids' = array(),
					'by_tax' = array(),
					'by_city' = array(),
				);
	 
		$sub_query = array();
		$sub_query[] = $args['post_types'];
		$sub_query[] = $args['by_ids'];
		$sub_query[] = $args['by_tax'];
		$sub_query[] = $args['by_city'];
*/	
/* 		$querystr = "
				SELECT * FROM $wpdb->posts
				LEFT JOIN $wpdb->postmeta ON($wpdb->posts.ID = $wpdb->postmeta.post_id)
				LEFT JOIN $wpdb->term_relationships ON($wpdb->posts.ID = $wpdb->term_relationships.object_id)
				LEFT JOIN $wpdb->term_taxonomy ON($wpdb->term_relationships.term_taxonomy_id = $wpdb->term_taxonomy.term_taxonomy_id)
				WHERE 1=1 
				AND	
				(
				$wpdb->term_taxonomy.term_id IN (1,2,3)
				AND $wpdb->term_taxonomy.taxonomy = 'category'
				AND $wpdb->posts.post_status = 'publish'
				AND $wpdb->posts.post_status = 'publish'
				AND $wpdb->postmeta.meta_key = 'paragraf')
				ORDER BY $wpdb->postmeta.meta_value ASC
		 ";		
 */		
	}
	
/*==site wide usable functions end	== */
function search_by_keyword($keyword = ""){
	global $wpdb;
	if($keyword == "")
		return '';
	
		$args = "
		SELECT  DISTINCT $wpdb->posts.ID 
			FROM $wpdb->posts  
			LEFT JOIN $wpdb->term_relationships ON ($wpdb->posts.ID = $wpdb->term_relationships.object_id)
			INNER JOIN $wpdb->postmeta ON ( $wpdb->posts.ID = $wpdb->postmeta.post_id ) 
			WHERE 1=1
			AND $wpdb->posts.post_type IN ('artist', 'saveur')
			AND $wpdb->posts.post_status = 'publish'
			AND ($wpdb->posts.post_title regexp '(^|[[:space:]]){$keyword}([[:space:]]|$)')
			
			GROUP BY $wpdb->posts.ID
		";				
        $args1 = array (
            'post_type' => array('artist', 'saveur'),
            'posts_per_page' => -1,
			'post_status' => 'publish',
            'nopaging' => true,
			'fields' => 'ids',
            'meta_query' => array(
			'relation' => 'OR',
                 array(
                    'key' => 'about_artist',
                    'value' => $keyword,
                    'compare' => 'LIKE'
                 ),
                 array(
                    'key' => 'about_second',
                    'value' => $keyword,
                    'compare' => 'LIKE'
                 ),
                 array(
                    'key' => 'number',
                    'value' => $keyword,
                    'compare' => 'LIKE'
                 )				 
              )
        );	

		$part1 = $wpdb->get_col($args);
		$part2 = get_posts($args1);
		
		$post_ids = array_unique(array_merge($part1, $part2));
		return $post_ids;
}	
function map_filter(){
	
	global $wpdb;
	$filter = "";
	$categories = "";
	$artists = "";
	$cities = "";
	$filters = array();
	
	if(isset($_POST) && !empty($_POST)) :
	
		if(isset($_POST['f_category']) && is_array($_POST['f_category']) && !empty($_POST['f_category'])){
			$categories = $_POST['f_category'];
			$categories = "'" . implode ( "', '", $categories ) . "'";
			$filters[] =	" ( $wpdb->term_relationships.term_taxonomy_id IN ($categories) )";
		}
		if(isset($_POST['f_name']) && is_array($_POST['f_name']) && !empty($_POST['f_name'])){
			$artists = $_POST['f_name'];
			$artists = "'" . implode ( "', '", $artists ) . "'";
			$filters[] =	" ( $wpdb->postmeta.meta_key = 'famille_nom' AND $wpdb->postmeta.meta_value IN ($artists) )";
		}
		if(isset($_POST['f_city']) && is_array($_POST['f_city']) && !empty($_POST['f_city'])){
			$cities = $_POST['f_city'];
			$cities = "'" . implode ( "', '", $cities ) . "'";
			$filters[] =	" ( $wpdb->postmeta.meta_key = 'artist_town' AND $wpdb->postmeta.meta_value IN ($cities) )";
		}

		if(is_array($filters) AND !empty($filters)){
			$filter = " AND (". implode(" OR ",$filters) . ")";
		}
		
	endif;

	
	$args = "
	SELECT  DISTINCT $wpdb->posts.ID 
		FROM $wpdb->posts  
		LEFT JOIN $wpdb->term_relationships ON ($wpdb->posts.ID = $wpdb->term_relationships.object_id)
		INNER JOIN $wpdb->postmeta ON ( $wpdb->posts.ID = $wpdb->postmeta.post_id ) 
		WHERE 1=1
		AND $wpdb->posts.post_type IN ('artist', 'saveur')
		AND $wpdb->posts.post_status = 'publish'
				$filter
		GROUP BY $wpdb->posts.ID
	";
	return $wpdb->get_col($args);

}
/***********Start****************/
function before_search_form_submit ($postType = array(),$taxonomy = array(),$meta_keys = array(), $level = false){
	//var_dump($level);
	$data = array();
	$parent_id = 0;
	$term_id = "";
	$taxonomy = "";
 	if($level == true){
		
 		$term_slug  = get_query_var('term');
		$taxonomy 	= get_query_var('taxonomy');
 
		$_term      = get_term_by('slug', $term_slug, $taxonomy);
		$parent_id  = $_term->term_id;
		$term_id = $_term->term_id;
		//$term_ids   = get_term_children($parent_id, $taxonomy);

	} 
	
	foreach($meta_keys as $key => $value):
		$data[$key] = get_meta_values_by_key($value, $postType,$term_id,$taxonomy);
	endforeach;
	$data['terms'] = get_terms($taxonomy, array('hide_empty' => false,'parent' => $parent_id ));
	
	return $data;	
}
function process_form ($postType = array(),$taxonomy = array(), $termArr = array(),$postArr = array() ){
	global $wpdb;
	$filter = "";
	$filters = array();
	
			$postType = "'" . implode ( "', '", $postType ) . "'";
			$taxonomy = "'" . implode ( "', '", $taxonomy ) . "'";	
			

			//$args['p'] = $_postArr; 
			if(!empty($termArr) && is_array($termArr)){
				$termStr = "'" . implode ( "', '", $termArr ) . "'";
				$filters[] =	" ( wt.term_id IN ($termStr) )";				
			}
			
			if(!empty($postArr) && is_array($postArr)){
				$postStr = "'" . implode ( "', '", $postArr ) . "'";
				$filters[] =	" ( wp.ID IN ($postStr))";				
			}			
			
			if(is_array($filters) AND !empty($filters)){
				$filter = " AND (". implode(" OR ",$filters) . ")";
			}
	

		$query = "SELECT DISTINCT wp.ID FROM $wpdb->posts wp
					INNER JOIN $wpdb->postmeta wm ON (wm.post_id = wp.ID AND wm.meta_key='number')
					INNER JOIN $wpdb->term_relationships wtr ON (wp.ID = wtr.object_id)
					INNER JOIN $wpdb->term_taxonomy wtt ON (wtr.term_taxonomy_id = wtt.term_taxonomy_id)
					INNER JOIN $wpdb->terms wt ON (wt.term_id = wtt.term_id)
					AND wtt.taxonomy IN ($taxonomy)
					AND wp.post_type IN ($postType)
					$filter 
					AND wp.post_status = 'publish' 
					ORDER BY wm.meta_value ASC";
		//echo $query;			
					
		return $wpdb->get_col($query);
	
}  
 
/***********End****************/

	function get_meta_values_by_key( $key = '',$postTypes = array(),$term_id = "",$taxonomy = "") {

		global $wpdb;

		if( empty( $key ) )
			return;
		$subPart = "";
		if($term_id !=""){
			$categories = get_term_children($term_id, $taxonomy);
			$categories = "'" . implode ( "', '", $categories ) . "'";
			$subPart = "  AND tt.term_id IN ($categories) ";
		}
		$postTypes = "'" . implode ( "', '", $postTypes ) . "'";
		
		$query = "SELECT DISTINCT pm.meta_value,pm.post_id FROM {$wpdb->postmeta} pm
							LEFT JOIN {$wpdb->posts} p ON p.ID = pm.post_id
							LEFT JOIN {$wpdb->term_relationships} tr ON p.ID = tr.object_id
							LEFT JOIN {$wpdb->term_taxonomy} tt ON tr.term_taxonomy_id = tt.term_taxonomy_id
							WHERE 1=1
							{$subPart}
							AND pm.meta_key = '{$key}' 
							AND p.post_status = 'publish' 
							AND p.post_type IN ({$postTypes})
							ORDER BY pm.meta_value ASC
				";
		//echo $query;		
				$results = $wpdb->get_results($query);
				$new = array();
				foreach($results as $result){
					$post_id = $result->post_id;
					$meta_value = $result->meta_value;
					$new[$meta_value][] = $post_id; 
				}

		return $new;
	}
	/*
	** Artist details for map
	** return by "post_ids" Or All artists 
	*/	
	function get_artists($post_ids){
		
		
		$postsArray = array();
		global $post;
		
		$args = array(
			'post_type'        => array('artist','saveur'),
			'post_status'      => 'publish',
			'posts_per_page'   => -1,
			'meta_key'		   => 'number',
			'orderby'		   => 'meta_value',
			'order'		   	   => 'ASC',
			'post__in'         => $post_ids
		);
		//var_dump($post_ids);
/* 		if(is_array($post_ids) && !empty($post_ids))
			$args['post__in'] = $post_ids;
 */		
		$query = get_posts( $args );
		//return $args;

	if ( is_array($query) ) :
		foreach($query as $post):
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
		endforeach; // end while
	endif; // endif	
	
		return $postsArray;
	}
	/*
	** Sponsor details for map
	** return all Sponsors
	*/
	function get_sponsors(){
		$sponsors = array();
		$index = 0;
		$posts = get_posts(array(
			'post_type' => 'sponsor',
			'numberposts' => -1,
			'order' => 'ASC',
			'meta_key' => 'sp_letter',
			'orderby' => 'meta_value',
			'post_status' =>'publish'
        ));
		
				
		foreach ($posts as $post) {
			$index++;
			setup_postdata($post);
			$sponsors[$index]['name'] = get_the_title($post,$post->ID);
			$sponsors[$index]['logo'] = get_field('sp_logo',$post->ID);
			$sponsors[$index]['address'] = get_field('sp_address',$post->ID);
			$sponsors[$index]['second_address'] = get_field('sp_second_address',$post->ID);
			$sponsors[$index]['phone'] = get_field('sp_phone',$post->ID);
			$sponsors[$index]['second_phone'] = get_field('sp_second_telephone',$post->ID);
			$sponsors[$index]['website'] = get_field('sp_website',$post->ID);
			$sponsors[$index]['email'] = get_field('sp_email',$post->ID);
			$sponsors[$index]['pin'] = get_stylesheet_directory_uri() . '/pin/generating-markers.php?type=sponsor&text='. get_field('sp_letter',$post->ID);
			if (get_field('sp_location',$post->ID)) {
				$location = get_field('sp_location',$post->ID);
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
		return $sponsors;
	}
	/*
	** Collectives details for map
	** return all collectives
	*/	
	function get_collectives(){	
		$collectives = array();
		$index = 0;
		$posts = get_posts(array('post_type' => 'collective','numberposts' => -1,'order' => 'ASC','orderby' => 'title'));

		foreach ($posts as $post) {
			$index++;
			setup_postdata($post);
			$collectives[$index]['name'] = ''; //get_the_title($post);
			$collectives[$index]['col_external_link'] = get_field('col_external_website_link',$post->ID);
			$collectives[$index]['logo'] = get_field('col_image',$post->ID);
			$collectives[$index]['place'] = get_field('col_place',$post->ID);
			$collectives[$index]['dates'] = get_field('col_dates',$post->ID);
			$collectives[$index]['dayhours'] = get_field('col_dayshours',$post->ID);
			$collectives[$index]['address'] = get_field('col_address',$post->ID);
			$collectives[$index]['pin'] = get_field('col_pin',$post->ID);

			if (get_field('col_location',$post->ID)) {
				$location = get_field('col_location',$post->ID);
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
		return $collectives;
	}
	
if (!function_exists('combine_famille_nom')) :
function combine_famille_nom( $post_id ) {
	global $post;
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
        return;
	
		// If this is a 'artist' or 'saveur' post, update it.
		if ( $post->post_type == "artist" || $post->post_type == "saveur" ) {
			$famille = get_post_meta( $post_id, 'nom_de_famille', true );
			$nom = get_post_meta( $post_id, 'nom', true );
			$fullName = $famille." ".$nom;
			if( empty($fullName) || $fullName == " "){
				$fullName = $post->title;
			}
			
			if ( ! add_post_meta( $post_id, 'famille_nom', $fullName, true ) ) { 
			   update_post_meta( $post_id, 'famille_nom', $fullName );
			}
		}			
	}
endif;	
	add_action( 'save_post', 'combine_famille_nom' );
//End Functions
/*===========================================================================================================================*/

if (!function_exists('generate_get_layout')) :
    /**
     * Get the layout for the current page
     */
    function generate_get_layout() {
        // Get current post
        global $post;
        // Get Customizer options
        $generate_settings = wp_parse_args(
                get_option('generate_settings', array()), generate_get_defaults()
        );
        // Set up the layout variable for pages
        $layout = $generate_settings['layout_setting'];
        // Get the individual page/post sidebar metabox value
        $layout_meta = ( isset($post) ) ? get_post_meta($post->ID, '_generate-sidebar-layout-meta', true) : '';
        // Set up BuddyPress variable
        $buddypress = false;
        if (function_exists('is_buddypress')) {
            $buddypress = ( is_buddypress() ) ? true : false;
        }
        // If we're on the single post page
        // And if we're not on a BuddyPress page - fixes a bug where BP thinks is_single() is true
        if (is_single() && !$buddypress) {
            $layout = null;
            $layout = $generate_settings['single_layout_setting'];
        }
        // If the metabox is set, use it instead of the global settings
        if ('' !== $layout_meta && false !== $layout_meta) {
            $layout = $layout_meta;
        }
        // If we're on the blog, archive, attachment etc..
        if (is_home() || is_archive() || is_search() || is_tax()) {
            $layout = null;
            $layout = $generate_settings['blog_layout_setting'];
        }
        // Finally, return the layout
        return apply_filters('generate_sidebar_layout', $layout);
    }
endif;
// if ( ! function_exists( 'generate_get_footer_widgets' ) ) :
// /**
// * Get the footer widgets for the current page
// */
// function generate_get_footer_widgets()
// {
// // Get current post
// global $post;
// // Get Customizer options
// $generate_settings = wp_parse_args( 
// get_option( 'generate_settings', array() ), 
// generate_get_defaults() 
// );
// // Set up the footer widget variable
// $widgets = $generate_settings['footer_widget_setting'];
// // Get the individual footer widget metabox value
// $widgets_meta = ( isset( $post ) ) ? get_post_meta( $post->ID, '_generate-footer-widget-meta', true ) : '';
// // If we're not on a single page or post, the metabox hasn't been set
// if ( ! is_singular() ) {
// $widgets_meta = '';
// }
// // If we have a metabox option set, use it
// if ( '' !== $widgets_meta && false !== $widgets_meta ) {
// $widgets = $widgets_meta;
// }
// // Finally, return the layout
// return apply_filters( 'generate_footer_widgets', $widgets );
// }
// endif;
if (!function_exists('generate_construct_sidebars')) :
    /**
     * Construct the sidebars
     * @since 0.1
     */
    add_action('generate_sidebars', 'generate_construct_sidebars');
    function generate_construct_sidebars() {
        // Get the layout
        $layout = generate_get_layout();
        // When to show the right sidebar
        $rs = array('right-sidebar', 'both-sidebars', 'both-right', 'both-left');
        // When to show the left sidebar
        $ls = array('left-sidebar', 'both-sidebars', 'both-right', 'both-left');
        // If left sidebar, show it
        if (in_array($layout, $ls)) {
            get_sidebar('left');
        }
        // If right sidebar, show it
        if (in_array($layout, $rs)) {
            get_sidebar();
        }
    }
endif;
if (!function_exists('generate_add_footer_info')) :
    add_action('generate_credits', 'generate_add_footer_info');
    function generate_add_footer_info() {
        $copyright = sprintf('<span class="copyright">&copy; %1$s</span> &bull; <a href="%2$s" target="_blank" itemprop="url">%3$s</a>', date('Y'), esc_url('https://generatepress.com'), __('GeneratePress', 'generatepress')
        );
        echo apply_filters('generate_copyright', $copyright);
    }
endif;

if (!function_exists('generate_body_schema')) :
    /**
     * Figure out which schema tags to apply to the <body> element
     * @since 1.3.15
     */
    function generate_body_schema() {
        // Set up blog variable
        $blog = ( is_home() || is_archive() || is_attachment() || is_tax() || is_single() ) ? true : false;
        // Set up default itemtype
        $itemtype = 'WebPage';
        // Get itemtype for the blog
        $itemtype = ( $blog ) ? 'Blog' : $itemtype;
        // Get itemtype for search results
        $itemtype = ( is_search() ) ? 'SearchResultsPage' : $itemtype;
        // Get the result
        $result = apply_filters('generate_body_itemtype', $itemtype);
        // Return our HTML
        echo "itemtype='http://schema.org/$result' itemscope='itemscope'";
    }
endif;
if (!function_exists('generate_article_schema')) :
    /**
     * Figure out which schema tags to apply to the <article> element
     * The function determines the itemtype: generate_article_schema( 'BlogPosting' )
     * @since 1.3.15
     */
    function generate_article_schema($type = 'CreativeWork') {
        // Get the itemtype
        $itemtype = apply_filters('generate_article_itemtype', $type);
        // Print the results
        echo "itemtype='http://schema.org/$itemtype' itemscope='itemscope'";
    }
endif;
if (!function_exists('generate_show_excerpt')) :
    /**
     * Figure out if we should show the blog excerpts or full posts
     * @since 1.3.15
     */
    function generate_show_excerpt() {
        // Get current post
        global $post;
        // Get Customizer settings
        $generate_settings = wp_parse_args(
                get_option('generate_settings', array()), generate_get_defaults()
        );
        // Check to see if the more tag is being used
        $more_tag = apply_filters('generate_more_tag', strpos($post->post_content, '<!--more-->'));
        // Check the post format
        $format = ( false !== get_post_format() ) ? get_post_format() : 'standard';
        // Get the excerpt setting from the Customizer
        $show_excerpt = ( 'excerpt' == $generate_settings['post_content'] ) ? true : false;
        // If our post format isn't standard, show the full content
        $show_excerpt = ( 'standard' !== $format ) ? false : $show_excerpt;
        // If the more tag is found, show the full content
        $show_excerpt = ( $more_tag ) ? false : $show_excerpt;
        // If we're on a search results page, show the excerpt
        $show_excerpt = ( is_search() ) ? true : $show_excerpt;
        // Return our value
        return apply_filters('generate_show_excerpt', $show_excerpt);
    }
endif;
if (!function_exists('generate_show_title')) :
    /**
     * Check to see if we should show our page/post title or not
     * @since 1.3.18
     */
    function generate_show_title() {
        return apply_filters('generate_show_title', true);
    }
endif;
if (!function_exists('generate_update_logo_setting')) :
    /**
     * Migrate the old logo database entry to the new custom_logo theme mod (WordPress 4.5)
     *
     * @since 1.3.29
     */
    add_action('admin_init', 'generate_update_logo_setting');
    function generate_update_logo_setting() {
        // If we're not running WordPress 4.5, bail.
        if (!function_exists('the_custom_logo'))
            return;
        // If we already have a custom logo, bail.
        if (get_theme_mod('custom_logo'))
            return;
        // Get our settings.
        $generate_settings = wp_parse_args(
                get_option('generate_settings', array()), generate_get_defaults()
        );
        // Get the old logo value.
        $old_value = $generate_settings['logo'];
        // If there's no old value, bail.
        if (empty($old_value))
            return;
        // We made it this far, that means we have an old logo, and no new logo.
        // Let's get the ID from our old value.
        $logo = attachment_url_to_postid($old_value);
        // Now let's update the new logo setting with our ID.
        if (is_int($logo)) {
            set_theme_mod('custom_logo', $logo);
        }
        // Got our custom logo? Time to delete the old value
        if (get_theme_mod('custom_logo')) {
            $new_settings['logo'] = '';
            $update_settings = wp_parse_args($new_settings, $generate_settings);
            update_option('generate_settings', $update_settings);
        }
    }
endif;
/* Code */
function artists_custom_post_type() {
    register_post_type('artist', [
        'labels' => [
            'name' => __('Artists'),
            'singular_name' => __('Artists'),
        ],
        'description' => 'For Adding Artists',
        'menu_position' => 3,
        'public' => true,
        'has_archive' => true,
        'supports' => array('title', 'custom-fields'),
        'rewrite' => ['slug' => 'arts'], // my custom slug
            ]
    );
}
$args = array(
    'hierarchical' => true,
    'show_ui' => true,
    'show_admin_column' => true,
    'query_var' => true,
);
register_taxonomy('artist_cat', 'artist', $args);
add_action('init', 'artists_custom_post_type');
function saveurs_custom_post_type() {
    register_post_type('saveur', [
        'labels' => [
            'name' => __('Saveurs'),
            'singular_name' => __('Saveurs'),
        ],
        'description' => 'For Adding Saveurs',
        'menu_position' => 4,
        'public' => true,
        'has_archive' => true,
        'supports' => array('title', 'custom-fields'),
        'rewrite' => ['slug' => 'saveurs'], // my custom slug
            ]
    );
}
$args = array(
    'hierarchical' => true,
    'show_ui' => true,
    'show_admin_column' => true,
    'query_var' => true,
);
register_taxonomy('saveur_cat', 'saveur', $args);
add_action('init', 'saveurs_custom_post_type');
function workshops_custom_post_type() {
    register_post_type('workshop', [
        'labels' => [
            'name' => __('Activités'),
            'singular_name' => __('Activités'),
        ],
        'description' => 'For Adding Workshops',
        'menu_position' => 4,
        'public' => true,
        'has_archive' => true,
        'supports' => array('title', 'custom-fields'),
        'rewrite' => ['slug' => 'ateliers-activites'], // my custom slug
            ]
    );
}
$args = array(
    'hierarchical' => true,
    'show_ui' => true,
    'show_admin_column' => true,
    'query_var' => true,
);
register_taxonomy('workshop_cat', 'workshop', $args);
add_action('init', 'workshops_custom_post_type');
function collectives_custom_post_type() {
    register_post_type('Collective', [
        'labels' => [
            'name' => __('Expositions collectives'),
            'singular_name' => __('Expositions collectives'),
        ],
        'description' => 'For Adding Collectives',
        'menu_position' => 6,
        'public' => true,
        'has_archive' => true,
        'supports' => array('title', 'custom-fields'),
        'rewrite' => ['slug' => 'collectives'], // my custom slug
            ]
    );
    flush_rewrite_rules();
}
$args = array(
    'hierarchical' => true,
    'show_ui' => true,
    'show_admin_column' => true,
    'query_var' => true,
);
register_taxonomy('collective_cat', 'collective', $args);
add_action('init', 'collectives_custom_post_type');
function sponsors_custom_post_type() {
    register_post_type('Sponsor', [
        'labels' => [
            'name' => __('Commanditaires'),
            'singular_name' => __('Commanditaires'),
        ],
        'description' => 'For Adding Sponsors',
        'menu_position' => 6,
        'public' => true,
        'has_archive' => true,
        'supports' => array('title', 'custom-fields'),
        'rewrite' => ['slug' => 'sponsors'], // my custom slug
            ]
    );
}
$args = array(
    'hierarchical' => true,
    'show_ui' => true,
    'show_admin_column' => true,
    'query_var' => true,
);
register_taxonomy('sponsor_cat', 'sponsor', $args);
add_action('init', 'sponsors_custom_post_type');
if (function_exists('acf_add_options_page')) {
    acf_add_options_page(array(
        'menu_title' => 'RouteArt',
        'menu_slug' => 'theme-general-settings'
    ));
    acf_add_options_sub_page(array(
        'page_title' => 'Theme Header Settings',
        'menu_title' => 'Header',
        'parent_slug' => 'theme-general-settings',
    ));
    acf_add_options_sub_page(array(
        'page_title' => 'Theme Footer Settings',
        'menu_title' => 'Footer',
        'parent_slug' => 'theme-general-settings',
    ));
    acf_add_options_sub_page(array(
        'page_title' => 'Scripts',
        'menu_title' => 'Scripts',
        'parent_slug' => 'theme-general-settings',
    ));
}
add_action('init', 'theme_menu');
function theme_menu() {
    register_nav_menus(
            array(
                'main-menu' => __('Main Menu'),
            )
    );
}
function divider_func($atts) {
    $a = shortcode_atts(array(
        'height' => '100',
            ), $atts);
    $height = esc_attr($a['height']);
    $br = "<span class='sdivider' style='height:" . $height . "px'> </span>";
    return $br;
}
add_shortcode('divider', 'divider_func');
//[divider height="100"]
function my_acf_init() {
    acf_update_setting('google_api_key', 'AIzaSyDytF9C8Bl_xZU1mKCA-VsY1bqniXj8e4Q');
}
add_action('acf/init', 'my_acf_init');
function cc_mime_types($mimes) {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');
add_theme_support('title-tag');
function create_pin($post_id) {
    $post = get_post($post_id);
    setup_postdata($post);
    $posttype = get_post_type($post);

    if ($posttype == 'sponsor') {
        $pin = __DIR__ . '/pins/commanditaires-pin.png';
        $num = get_field('sp_letter');
    } else {
        $pin = __DIR__ . '/pins/pin_main.png';
        $num = get_field('number');
    }
    $file = __DIR__ . '/pins/pin_' . $post_id . '.png';
    $im = imagecreatefrompng($pin);
    #allocate color for the text
    $white = imagecolorallocate($im, 119, 118, 118);
    #attempt to centralise the text  
    //$num = 52;
    $fontSize = 15;
    $lpx = imagesx($im) / 2 - (strlen($num) * $fontSize * 3 / 4) / 2 + 2;
    $font = __DIR__ . '/fonts/bebasneue/bebasneue.ttf';
    // Add some shadow to the text
    imagettftext($im, $fontSize, 0, $lpx, 27, $white, $font, $num);
    imagealphablending($im, false);
    imagesavealpha($im, true);
    // imagestring($im, 5, $lpx, $tpx, $num, $white);
    wp_reset_postdata();
    #save to cache
    imagepng($im, $file, 9);
    imagedestroy($im);
}
add_action('save_post', 'create_pin');
function shapeSpace_filter_search($query) {
    if (!$query->is_admin && $query->is_search) {
        $query->set('post_type', array('post', 'artist', 'saveur', 'workshop'));
    }
    return $query;
}
add_filter('pre_get_posts', 'shapeSpace_filter_search');
remove_filter('acf_the_content', 'wpautop');
remove_filter('the_content', 'wpautop');
remove_filter('the_excerpt', 'wpautop');


 function acf_some_field( $field ) {
    //Change this to whatever data you are using.
    //$data_from_database = array('key1' => 'value1', 'key2' => 'value2');


	$args = array( 'posts_per_page' => -1, 'post_type'=> 'workshop','post_status'    => 'publish' );
	$myposts = get_posts( $args );

    $field['choices'] = array();

    //Loop through whatever data you are using, and assign a key/value
    foreach( $myposts as $p) { 
        $field['choices'][$p->ID] = $p->post_title;
    }
    return $field;
}
add_filter('acf/load_field/name=ateliersactivites', 'acf_some_field');
function getNWordsFromString($text,$numberOfWords = 6)
{
    if($text != null)
    {
        $textArray = explode(" ", $text);
        if(count($textArray) > $numberOfWords)
        {
            return implode(" ",array_slice($textArray, 0, $numberOfWords))."...";
        }
        return $text;
    }
    return "";
}

function get_taxonomy_hierarchy( $taxonomy, $parent = 0 ) {
	// only 1 taxonomy
	$taxonomy = is_array( $taxonomy ) ? array_shift( $taxonomy ) : $taxonomy;
	// get all direct decendants of the $parent
	$terms = get_terms( $taxonomy, array( 'parent' => $parent ) );
	// prepare a new array.  these are the children of $parent
	// we'll ultimately copy all the $terms into this new array, but only after they
	// find their own children
	$children = array();
	// go through all the direct decendants of $parent, and gather their children
	foreach ( $terms as $term ){
		// recurse to get the direct decendants of "this" term
		$term->children = get_taxonomy_hierarchy( $taxonomy, $term->term_id );
		// add the term to our new array
		$children[ $term->term_id ] = $term;
	}
	// send the results back to the caller
	return $children;
}
/**
 * Recursively get all taxonomies as complete hierarchies
 *
 * @param $taxonomies array of taxonomy slugs
 * @param $parent int - Starting parent term id
 *
 * @return array
 */
function get_taxonomy_hierarchy_multiple( $taxonomies, $parent = 0 ) {
	if ( ! is_array( $taxonomies )  ) {
		$taxonomies = array( $taxonomies );
	}
	$results = array();
	foreach( $taxonomies as $taxonomy ){
		$terms = get_taxonomy_hierarchy( $taxonomy, $parent );
		if ( $terms ) {
			$results[ $taxonomy ] = $terms;
		}
	}
	return $results;
}

/*================================Helper functions start========================================*/
	if (!function_exists('generate_add_footer_info')) :
		
	endif;
/*================================Helper functions end  ========================================*/