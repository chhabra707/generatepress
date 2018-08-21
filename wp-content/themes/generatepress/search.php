<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package GeneratePress
 */
 
// No direct access, please
if ( ! defined( 'ABSPATH' ) ) exit;

get_header(); ?>
	    <div id = "search">
	    <?php $number = 0; ?>
		<?php if ( have_posts() ) : ?>
			<?php while ( have_posts() ) : the_post(); $number = $number+1; ?>	
			        <a style="" href ="<?php echo get_the_permalink(); ?>" <h3><span style="color: #706f6f;"> <?php echo $number; ?>. </span> <?php the_title(); ?> </h3> </a>
			<?php endwhile; ?>
		    <?php else : ?> 
		        <a style="display:block;font-family:'Poppins';text-align:center;font-size:21px;margin-top:5px;color: #3c3c3b; cursor:pointer;" onclick="history.go(-1)"> 
Désolé, aucun résultat n'a été trouvé. Veuillez recommencer. </a>
		<?php endif; ?>
	    </div>

<?php get_footer(); ?>