<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package GeneratePress
 */
 
// No direct access, please
if ( ! defined( 'ABSPATH' ) ) exit;
get_header(); ?>

<div class="content-404 wrapper">
    <p>Nous avons cherché partout. Mais il semble que la page que vous cherchez n'existe plus. Vous pouvez     <a href="<?php echo get_home_url(); ?>">retourner vers l'accueil.</a></p>
    


</div>

<?php get_footer(); ?>