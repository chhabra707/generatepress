<?php /*template name: Artistes Category*/ ?> 
<?php
	get_header();
	$postType  = array('artist');
	$taxonomy  = array(get_query_var('taxonomy'));
	//var_dump($taxonomy);
	$meta_keys = array('artists' => 'famille_nom', 'cities' => 'artist_town');
	
	$data = before_search_form_submit ($postType, $taxonomy, $meta_keys, true);	
/* 	print "<pre>";
	print_r($data);
	print "</pre>"; */
/* 	$term_slug     = get_query_var('term');
	$taxonomy = get_query_var('taxonomy');
	
	$current_term  = get_term_by('slug', $term_slug, $taxonomy);
	
	$parent_id = $current_term->term_id;
	$term_ids = get_term_children($parent_id, $taxonomy); */
/*	
	$args['post_type'] = 'artist';
	$args['numberposts'] = -1;			
	$args['meta_key'] = 'famille_nom';			
	$args['order'] = 'ASC';			
	$args['orderby'] = 'meta_value';			
	$args['tax_query'][] = array('taxonomy' => $taxonomy,'field' => 'slug','terms' => $term_slug);			
	$artists = get_posts($args);
	$terms = get_terms($taxonomy, array('hide_empty' => false,'parent' => $parent_id ));
	//$term_ids = get_term_children($parent_id->term_id, $taxonomy);
	$cities = get_meta_values_by_key('artist_town',array('artist'),$parent_id, $taxonomy);*/
?>                
<div id="arts_saveurs_category">                    
  <div class="wrapper">
    <div id="category_research" class="clear_both"> 
      <form id="searchForm1" action="<?php echo $current_url; ?>" method="post" class="clear_both"> 
		<?php foreach($taxonomy as $tax) : ?>
	    <input type="hidden" name="c_taxonomy[]" value="<?php echo $tax;?>">
		<?php endforeach; ?>	  
		<?php foreach($postType as $type) : ?>
	    <input type="hidden" name="c_post_type[]" value="<?php echo $type;?>">
		<?php endforeach; ?>
	    <input type="hidden" name="c_term" value="<?php echo $parent_id;?>">
		<?php wp_nonce_field( 'artists_filter', 'search_artists' ); ?>
        <div class="form_block select artist">                                    
          <select name = "c_artists" >									
            <option value="">Nom des participants</option>										
            <?php
					foreach($data['artists'] as $key => $value):
						if(is_array($value)){
							$value = implode(",", $value);
						}
						echo "<option value='{$value}'>{$key}</option>";
					endforeach;
			?>										
          </select>                                
        </div>
        <div class="form_block select technic">									
          <select name="c_category[]" data-placeholder="Catégories" data-allSelected="Tous sélectionnés" multiple="multiple">
            <?php
				if (!empty($data['terms']) && !is_wp_error($data['terms'])):
		
					foreach($data['terms'] as $term):
						$term_children = get_term_children($term->term_id, $term->taxonomy);
						echo "<optgroup label='{$term->name }'>";
							foreach($term_children as $child):
								$child_term = get_term_by('id', $child, $term->taxonomy);
								echo "<option value='{$child_term->term_id}'>{$child_term->name}</option>";
							endforeach;
						echo '</optgroup>';
					endforeach;
				endif;
?>									
          </select>                                
        </div>
		<div class="form_block select artist">                                    
          <select name="c_city">									
            <option value="">Municipalités</option>										
    <?php   
			foreach($data['cities'] as $key => $value):
				if(is_array($value)){
					$value = implode(",", $value);
				}
				echo "<option value='{$value}'>{$key}</option>";
			endforeach;
    ?>             
          </select>                                
        </div>     

        <div class="form_block button">                                    
          <button type="submit">RECHERCHER</button>                                
        </div>                            
      </form>                        
    </div>						
    <?php
	/*
if (isset($_GET['artist_select']))
{
$artist_id = $_GET['artist_select'];
if ($artist_id != 'all')
{
$posts = get_post($artist_id);
$posts = array(
$posts
);
}
else
{
if (isset($_GET['category_select']))
{
$category_array = $_GET['category_select'];
$posts = get_posts(array(
'post_type' => 'artist',
'numberposts' => - 1,
'meta_key' => 'number',
'orderby' => 'meta_value',
'order' => 'ASC',
'tax_query' => array(
array(
'taxonomy' => 'artist_cat',
'field' => 'id',
'terms' => $category_array,
'include_children' => false
)
)
));
}
else
{
$posts = get_posts(array(
'post_type' => 'artist',
'numberposts' => - 1,
'meta_key' => 'number',
'orderby' => 'meta_value',
'order' => 'ASC',
				'tax_query' => array(
					array(
						'taxonomy' => $taxonomy,
						'field' => 'slug',
						'terms' => $term
					)
				)
));
}
}
}
else
{
$posts = get_posts(array(
'post_type' => array('artist'),
'numberposts' => - 1,
'meta_key' => 'number',
'orderby' => 'meta_value',
'order' => 'ASC',
				'tax_query' => array(
					array(
						'taxonomy' => $taxonomy,
						'field' => 'slug',
						'terms' => $term
					)
				)
));
}
*/
if (isset( $_POST['artists_filter'] ) && ! wp_verify_nonce( $_POST['artists_filter'], 'artists_search' ) ){
	$c_artists = (isset($_POST['c_artists']) && $_POST['c_artists'] !="")?$_POST['c_artists']:""; 
	$c_category = (isset($_POST['c_category']) && $_POST['c_category'] !="")?$_POST['c_category']:""; 
	$c_city = (isset($_POST['c_city']) && $_POST['c_city'] !="")?$_POST['c_city']:""; 
	
	print "<pre>";
	print_r($_POST);
	print "<pre>";

} 
	$param = array(
					'post_type' => array('artist'),
					'numberposts' => - 1,
					'meta_key' => 'number',
					'orderby' => 'meta_value',
					'order' => 'ASC',
					'tax_query' => array(
						array(
							'taxonomy' => $taxonomy,
							'field' => 'slug',
							'terms' => $term_slug
						)
					)
				);
	$posts = get_posts($param);
 ?>                        
    <div id="search_count">Voici 
      <strong>
        <?php
echo count($posts); ?> résultats
      </strong> pour votre recherche
    </div>                        
    <div id="category_list" class="clear_both">			
      <?php
foreach($posts as $post)
{
setup_postdata($post); ?>				
      <div class="items">					
        <a class="fixunderline" href="<?php
                                      echo get_the_permalink(); ?>">  						
          <div class="item_title">
            <p>
              <?php
echo get_field('artist_town'); ?> 
            </p>
          </div>						
          <div class="item_image">							
            <img src="<?php
                      echo get_field('artist_featured_work'); ?>">						
          </div>						
          <div class="item_ad clear_both">							
            <div class="num">
              <?php
echo get_field('number'); ?>/
            </div>							
            <div class="name">
              <?php
the_title(); ?>
            </div>						
          </div>						
          <div class="item_desc">							
            <?php
the_field('about_artist'); ?>						
          </div>					
        </a>				
      </div> 			
      <?php
};
wp_reset_postdata(); ?>                        
    </div>                        
    <div id="paging">                            
      <div id="paging_count">
        <span class="first">12
        </span> – 
        <span class="second">22
        </span> sur 
        <span class="all">22
        </span> participants
      </div>                        
    </div>                    
  </div>                    
  <ul id="bottom_buttons">                        
    <div class="wrapper">                            
      <li class="saveurs-button">                                
        <a class="fixunderline" href="http://www.routeartssaveursrichelieu.com/arts/?artist_select=all&category_select%5B%5D=9&category_select%5B%5D=11&category_select%5B%5D=12&category_select%5B%5D=13&category_select%5B%5D=14&category_select%5B%5D=20&category_select%5B%5D=21&category_select%5B%5D=22&category_select%5B%5D=23">Arts visuels
        </a>                            
      </li> 
		      <li class="saveurs-button">                                
        <a class="fixunderline" href="http://www.routeartssaveursrichelieu.com/arts/?artist_select=all&category_select%5B%5D=6&category_select%5B%5D=15&category_select%5B%5D=16&category_select%5B%5D=17&category_select%5B%5D=18&category_select%5B%5D=19&category_select%5B%5D=24">Métiers d'art
        </a>                            
      </li> 
		<li class="saveurs-button">                                
        <a class="fixunderline" href="http://www.routeartssaveursrichelieu.com/saveurs/">Saveurs
        </a>                            
      </li> 
      <li class="map-button">                                
        <a class="fixunderline" href="http://www.routeartssaveursrichelieu.com/carte/">Tous les participants</a>                            
      </li>                        
    </div>                    
  </ul>                
</div>
<?php
get_footer(); ?>