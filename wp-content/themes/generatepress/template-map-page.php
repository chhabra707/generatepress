<?php /* template name: map page */ ?>                            

<?php get_header(); ?>
<?php
/* ARTISTS */

	global $wp;
	$current_url = home_url( add_query_arg( array(), $wp->request ) );


	if(isset($_POST['f_category']) || isset($_POST['f_name']) || isset($_POST['f_city']) || isset($_POST['f_keyword']) ){
		$sponsors = array();
		$collectives = array();
	}else{
		$sponsors = get_sponsors();
		$collectives = get_collectives();
	}
	
	$post_ids = map_filter();
	if(isset($_POST['f_keyword']) && !empty($_POST['f_keyword'])){
		$keyword = $_POST['f_keyword'];
		$post_ids = array();
		$post_ids = search_by_keyword($keyword);
	}
	if(empty($post_ids)){
		$postsArray = array();
		$msg = "Désolé, aucun résultat n’a été trouvé. Veuillez recommencer.";
	}else{
		$postsArray = get_artists($post_ids);
		$msg = "";
	}
	
	
	$terms = get_terms('artist_cat', array(
		'hide_empty' => false,
		'parent' => 0
	));
	/*New code block*/		
	$parentterms = get_terms(array('artist_cat','saveur_cat'),array( 'parent' => 0 ,'hide_empty' => false) );
	$terms = array();

	foreach($parentterms as $parent){
		$parent->custom = 	get_terms(array('artist_cat','saveur_cat'),array( 'hide_empty' => false, 'parent'=>$parent->term_id) );
		$terms[] = $parent;
	}

	$names = get_meta_values_by_key('famille_nom',array('artist','saveur'),"","");
	$cities = get_meta_values_by_key('artist_town',array('artist','saveur'),"","");

	$term_ids = array();
	foreach ($terms as $term) {
		$term_ids[] = $term->term_id;
		foreach($term->custom as $t){
			$term_ids[] = $t->term_id;
		}
	}		
?>

<div class="map-main">
    <div class="map-dropdown">
        <div class="first-menus">
			<form action="<?php echo $current_url; ?>" name="filter" method="post">
			<select class="multipleSelect vs-select fl category" name="f_category[]" multiple="multiple" style="width:260px;height:53px;">
			<?php foreach($terms as $term){
				echo '<optgroup label="'.$term->name.'">';
				if(is_array($term->custom)){			
					foreach($term->custom as $subterm){
						echo '<option value="'.$subterm->term_id.'">'.$subterm->name.'</option>';
					}
				}	
				echo '</optgroup>';
			} ?>
			</select>			
			<select class="multipleSelect vs-select fl name" name="f_name[]" multiple="multiple" style="width:260px;height:53px;">
			<?php
				foreach($names as $name){
						echo '<option value="'.$name.'">'.$name.'</option>';
				}	
			?>
			</select>
			<select class="multipleSelect vs-select fl city" name="f_city[]" multiple="multiple" style="width:260px;height:53px;">
			<?php 
				foreach($cities as $city){
						echo '<option value="'.$city.'">'.$city.'</option>';
				}	
			?>
			</select>
            <input type="submit" class="filters-submit" value="Rechercher" />
			</form>
        </div>


        <div class="first-menus">
            <div style="visibility: hidden" id="vmcselect4 collectives" class="vs-select map-style fl mob-hide" title="sponsors" tabindex="-1" data-name="site"  data-size="14" data-width="200">
                <div class="vs-title">
                    <div class="vs-text"></div>
                    <!--<div class="vs-icon"></div>-->
                </div>
            </div>
			<form action="<?php echo $current_url; ?>" name="byKeyword" method="post">
				<input type="text" class="map-style1 fl mob-style" name="f_keyword" placeholder="Que recherchez-vous?" />
				<input type="submit" class="filters-submit" value="Rechercher" />
			</form>
        </div>
		<div class="first-menus" style="clear:both;">
			<div style="padding: 15px;color: white;font-family: poppings;font-size: 18px;">
			 <?php echo $msg;?>
			</div>
		</div>
    </div>
</div>
<script>
	var artists = <?php echo json_encode($postsArray); ?>;
	/* console.log(artists); */
	var sponsors = <?php echo json_encode($sponsors); ?>;
	/* console.log(sponsors); */
	var collectives = <?php echo json_encode($collectives); ?>;
	/* console.log(collectives); */
</script>
<div id="interactive_map">
    <div id="interactive_map_map"></div>
</div>

<?php
get_footer();