<?php /*template name: All Participants */ ?> 
<?php
get_header(); 
	$actionUrl = home_url( $wp->request );
	$postType  = array('artist','saveur');
	$taxonomy  = array('artist_cat','saveur_cat');
	$meta_keys = $meta_keys = array('artists' => 'famille_nom', 'cities' => 'artist_town');

	$data = before_search_form_submit ($postType,$taxonomy,$meta_keys);
	/*
	$artists = get_posts(array('post_type' => array('artist','saveur'),'numberposts' => - 1,'order' => 'ASC','orderby' => 'title'));
	$terms = get_terms(array('artist_cat','saveur_cat'), array('hide_empty' => false,'parent' => 0 ));
	$cities = get_meta_values_by_key('artist_town',array('artist','saveur'),"","");
	//var_dump($url);
/* 	echo count($artists)."<br/>";
	echo count($terms)."<br/>";
	echo count($cities)."<br/>"; */
?>                
<div id="arts_saveurs_category">                    
  <div class="wrapper">
    <div id="category_research" class="clear_both"> 
      <form id="searchForm" action="<?php echo $actionUrl; ?>" method="post" class="clear_both"> 
		<?php foreach($taxonomy as $tax) : ?>
	    <input type="hidden" name="c_taxonomy[]" value="<?php echo $tax;?>">
		<?php endforeach; ?>	  
		<?php foreach($postType as $type) : ?>
	    <input type="hidden" name="c_post_type[]" value="<?php echo $type;?>">
		<?php endforeach; ?>
		<?php wp_nonce_field( 'all_participant_filter', 'allparticipants' ); ?>
		
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
						//$_term = get_term($term);
						//$taxonomy = $_term->taxonomy;
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
          <button type="submit">RECHERCHER
          </button>                                
        </div>                            
      </form>         
    </div>					
    <?php
	global $wpdb;
	$filter = "";
	$filters = array();
	//$postType = "'" . implode ( "', '", $postType ) . "'";
		
		if (isset( $_POST['allparticipants'] ) &&  wp_verify_nonce( $_POST['allparticipants'], 'all_participant_filter' ) ):
			
			$_artists = (!empty($_POST['c_artists']))?explode(",",$_POST['c_artists']):array();
			//$_category = (!empty($_POST['c_category']))?$_POST['c_category']:array();
			$_city = (!empty($_POST['c_city']))?explode(",",$_POST['c_city']):array();
			
			$_postType = (!empty($_POST['c_post_type']))?$_POST['c_post_type']:array();
			$_taxonomy = (!empty($_POST['c_taxonomy']))?$_POST['c_taxonomy']:array();
			$_category = (!empty($_POST['c_category']))?$_POST['c_category']:array();
			$_postArr = array_unique(array_merge($_artists,$_city), SORT_REGULAR);
			
			$posts = process_form ($_postType, $_taxonomy, $_category, $_postArr);
		else : 
			$posts = process_form ($postType, $taxonomy, array(), array());
		endif;
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