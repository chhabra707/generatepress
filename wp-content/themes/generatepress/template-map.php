<?php /*template name: map*/ ?>                            
<?php get_header(); ?>

<?php   
	/*ARTISTS*/
        $artists = array();
        
        $terms = get_terms( 'artist_cat', array(
    					'hide_empty' => false,
    					'parent' => 0  
    				) );	
    				
        foreach ( $terms as $term ) {
			
		    $subCategories = array();
		    $term_children = get_term_children( $term->term_id, 'artist_cat' ) ; 
    		foreach ( $term_children as $child ) {
    		    
        		$child_term = get_term_by( 'id', $child,'artist_cat');
        		
				$postsArray = array();
				
        		$posts = get_posts(array(
                  'post_type' => 'artist',
                  'numberposts' => -1,
                  'tax_query' => array(
                    array(
                      'taxonomy' => 'artist_cat',
                      'field' => 'id',
                      'terms' => $child_term->term_id, // Where term_id of Term 1 is "1".
                      'include_children' => false
                        )
                    )
                ));
                
            	foreach ($posts as $post) {
					var_dump($post);
                	$post_ = array();
                    setup_postdata( $post );
                    
                    $post_['name'] =  stripslashes(get_the_title());
                    $post_['number'] = get_field('number');
                    $post_['address'] =  stripslashes(get_field('address'));
                    $post_['featuredImage'] = get_field('artist_featured_work');
                    $post_['email'] = get_field('artist_email');
                    $post_['phone'] = get_field('phone_first');
                    $post_['page'] =  get_the_permalink();
                    $post_['mapPin'] = __DIR__.'/pins/pin_'.$post->ID.'.png';
                    $post_['location'] = get_field('location');
                    
                    
                	wp_reset_postdata();
                	
                	array_push($postsArray,$post_);
                };

				array_push($subCategories,array('subcategory'=>$child_term->name,'posts'=>$postsArray));
        	};		
			
		    array_push($artists,array('maincategory'=>$term->name,'subcategories'=>$subCategories));
        }
		

        

/*Saveurs*/
        $saveurs = array();
        
        $terms = get_terms( 'saveur_cat', array(
    					'hide_empty' => false,
    					'parent' => 0  
    				) );	
    				
        foreach ( $terms as $term ) {
			
		    $subCategories = array();
		    $term_children = get_term_children( $term->term_id, 'saveur_cat' ) ; 
    		foreach ( $term_children as $child ) {
    		    
        		$child_term = get_term_by( 'id', $child,'saveur_cat');
        		
				$postsArray = array();
				
        		$posts = get_posts(array(
                  'post_type' => 'saveur',
                  'numberposts' => -1,
                  'tax_query' => array(
                    array(
                      'taxonomy' => 'saveur_cat',
                      'field' => 'id',
                      'terms' => $child_term->term_id, // Where term_id of Term 1 is "1".
                      'include_children' => false
                        )
                    )
                ));
                
            	foreach ($posts as $post) {
                	$post_ = array();
                    setup_postdata( $post );
                    
                    $post_['name'] =  stripslashes(get_the_title());
                    $post_['number'] = get_field('number');
                    $post_['address'] =  stripslashes(get_field('address'));
                    $post_['featuredImage'] = get_field('artist_featured_work');
                    $post_['email'] = get_field('artist_email');
                    $post_['phone'] = get_field('phone_first');
                    $post_['page'] =  get_the_permalink();
                    $post_['mapPin'] = __DIR__.'/pins/pin_'.$post->ID.'.png';
                    $post_['location'] = get_field('location');
                    
                    
                	wp_reset_postdata();
                	
                	array_push($postsArray,$post_);
                };

				array_push($subCategories,array('subcategory'=>$child_term->name,'posts'=>$postsArray));
        	};		
			
		    array_push($saveurs,array('maincategory'=>$term->name,'subcategories'=>$subCategories));
        }
		

        


/*Sponsors*/
        $sponsors = array();
        $index = 0;
        /*$terms = get_terms( 'sponsor_cat', array(
    					'hide_empty' => false,
    					'parent' => 0  
    				) );				
		//var_dump($terms);
        foreach ( $terms as $term ) {	
            //echo '</br>' . $term->name . '</br>';
		    $term_children = get_term_children( $term->term_id, 'sponsor_cat' ) ; 
    		foreach ( $term_children as $child ) {
            		$child_term = get_term_by( 'id', $child,'sponsor_cat');
            		//var_dump($child_term);
            	    //echo '</br>' . $child_term->name . '</br>';
            		$posts = get_posts(array(
                      'post_type' => 'sponsor',
                      'numberposts' => -1,
                      'tax_query' => array(
                        array(
                          'taxonomy' => 'sponsor_cat',
                          'field' => 'id',
                          'terms' => $child_term->term_id, // Where term_id of Term 1 is "1".
                          'include_children' => false
                            )
                        )
                    )); */
					
			$posts = get_posts(array(
                      'post_type' => 'sponsor',
                      'numberposts' => -1,
                    ));		
		foreach ($posts as $post) {
        	$index++;
            setup_postdata( $post );
			
            if(get_field('sp_logo')) { $sponsors[$index]['logo'] = get_field('sp_logo');}
            if(get_field('sp_address')) {$sponsors[$index]['address'] = get_field('sp_address');}
            if(get_field('sp_phone')) {$sponsors[$index]['phone'] = get_field('sp_phone');}
            if(get_field('sp_website')) {$sponsors[$index]['website'] = get_field('sp_website');}
            if(get_field('sp_email')) {$sponsors[$index]['email'] = get_field('sp_email');}
            if(get_field('sp_pin')) {$sponsors[$index]['pin'] = get_field('sp_pin');}
            if(get_field('sp_pin')) {$sponsors[$index]['location'] = get_field('sp_location');}
            //var_dump($post);
            //echo get_field('artist_town') . ' ';
            //echo $child_term->name . ' ';
            //echo $artist->post_title;
            //echo $term->name;
        	wp_reset_postdata();
        }
		//var_dump($sponsors);
	//}
//}

/*Collectives*/
        $collectives = array();
        $index = 0;
        /*$terms = get_terms( 'sponsor_cat', array(
    					'hide_empty' => false,
    					'parent' => 0  
    				) );				
		//var_dump($terms);
        foreach ( $terms as $term ) {	
            //echo '</br>' . $term->name . '</br>';
		    $term_children = get_term_children( $term->term_id, 'sponsor_cat' ) ; 
    		foreach ( $term_children as $child ) {
            		$child_term = get_term_by( 'id', $child,'sponsor_cat');
            		//var_dump($child_term);
            	    //echo '</br>' . $child_term->name . '</br>';
            		$posts = get_posts(array(
                      'post_type' => 'sponsor',
                      'numberposts' => -1,
                      'tax_query' => array(
                        array(
                          'taxonomy' => 'sponsor_cat',
                          'field' => 'id',
                          'terms' => $child_term->term_id, // Where term_id of Term 1 is "1".
                          'include_children' => false
                            )
                        )
                    )); */
					
			$posts = get_posts(array(
                      'post_type' => 'collective',
                      'numberposts' => -1,
                    ));		
		foreach ($posts as $post) {
        	$index++;
            setup_postdata( $post );
            if(get_field('col_image')) { $collectives[$index]['image'] = get_field('col_image');}
            if(get_field('col_place')) {$collectives[$index]['place'] = get_field('col_place');}
            if(get_field('col_dates')) {$collectives[$index]['dates'] = get_field('col_dates');}
            if(get_field('col_address')) {$collectives[$index]['address'] = get_field('col_address');}
            if(get_field('col_pin')) {$collectives[$index]['pin'] = get_field('col_pin');}
            $collectives[$index]['location'] = get_field('col_location');
            //var_dump($post); 
            //echo get_field('artist_town') . ' ';
            //echo $child_term->name . ' ';
            //echo $artist->post_title;
            //echo $term->name;
        	wp_reset_postdata();
        }
		//var_dump($collectives); 
	//}
//}
?>

<script>
var artists = <?php echo json_encode($artists);  ?>;
console.log(artists);
</script>
<script>
var saveurs = <?php echo json_encode($saveurs); ?>;
console.log(saveurs);
</script>
<script>
var sponsors = <?php echo json_encode($sponsors); ?> ;
console.log(sponsors);  
</script>
<script>
var collectives = <?php echo json_encode($collectives); ?> ;
console.log(collectives);  
</script>  
 

<?php get_footer(); ?>