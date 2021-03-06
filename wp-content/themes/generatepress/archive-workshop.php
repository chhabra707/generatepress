<?php

/*template name: Workshop Category*/



 ?>

<?php get_header(); ?>

                <div id="workshop_category">

                    <div class="wrapper"> 

                        <div id="category_research" class="clear_both">

                            <form action="/ateliers-activites/" method="get" class="clear_both">

                                <div class="form_block select technic"> 

                                        <select name="category_select[]" data-placeholder="Quels types d'activités?" data-allSelected="Tous sélectionnés" multiple="multiple">

										<?php 

										$terms = get_terms( 'workshop_cat', array(

												'hide_empty' => false,

												'parent' => 0  

											) );

										

										if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){  foreach ( $terms as $term ) {		

												$term_children = get_term_children( $term->term_id, 'workshop_cat' ) ; 

												$taxonomy_name = 'workshop_cat';

												var_dump($term);

												if (empty($term_children)) {	

														echo '<option value="'.$term->term_id.'">' . $term->name .'</option>';

												} else {

													echo '<optgroup label="' .  $term->name . '">';

													foreach ( $term_children as $child ) {

														$child_term = get_term_by( 'id', $child, $taxonomy_name );

														

														echo '<option value="'.$child_term->term_id.'">' . $child_term->name .'</option>';



													};

													echo '</optgroup>';

												}

											} 

										} ?>

									</select>



                                </div>
                                

                                
                                <div class="form_block button">

                                    <button type="submit">RECHERCHER</button>

                                </div>

                            </form>

                        </div>

						<?php

							if(isset($_GET['category_select'])){

								$category_array = $_GET['category_select'];

								//var_dump($category_array);

								$posts = get_posts(array(

									'post_type' => 'workshop',

									'numberposts' => -1,

									'tax_query' => array(

									array(

									  'taxonomy' => 'workshop_cat',

									  'field' => 'id',

									  'terms' => $category_array,

									  'include_children' => false

										)

									)

								));

							} else {

								$posts = get_posts(array(

									'post_type' => 'workshop',

									'numberposts' => -1

								));

							}

						

						?>

                        <div id="search_count">Voici <strong><?php echo count($posts); ?> résultats</strong> pour votre recherche</div>

						<div id="category_list" class="workshop clear_both">

						<?php foreach( $posts as $post ) { 

						setup_postdata( $post );  ?>

                            <div class="items">

								<a class="fixunderline" href="<?php echo get_permalink(); ?>">

									<div class="item_title lazy">

									<?php echo get_field('technique'); ?>

									</div>

									<div class="item_image">

										<img class="lazy" src="<?php echo get_field('activity_image'); ?>">

									</div>

									<div class="item_ad lazy clear_both">

										<?php echo get_the_title(); ?>

									</div>

									<div class="item_desc">

										<span class="technique">Technique</span> : Vitrail

									</div>

								</a>

                            </div>

                          <?php };	wp_reset_postdata(); 							?>

                      



                        </div>

                        <div id="paging">

                            <div id="paging_count"><span class="first"></span> - <span class="second"></span> sur <span class="all"></span> ateliers/activités</div>

                        </div>

                       <!-- <ul id="bottom_buttons">

                        <div class="wrapper">

                            <li>

                                <a href="#">Tous les participants<img src="" /></a>

                            </li>

                        </div>

                    </ul> -->

                    </div>

                </div>

		<?php get_footer(); ?>