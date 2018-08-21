 <?php get_header(); ?>
<div id="blog-detailed-page">
	<div id="blog_desc">
		<div class="wrapper">
			<div id="each_blog" class="clear_both">
				<div id="blog_image">
					<img src="<?php echo get_field('featured_image'); ?>" />
					<div id="category_desc">
						<div id="category_desc_article"><?php echo get_the_date();  ?></div>
						<div id="category_desc_title"><h1><?php the_title(); ?></h1></div>
					</div>
				</div>
				<div id="blog_item_description">
					<?php the_content(); ?>
				</div>
				<div id="blog_share">Partager
					<span class="share_soc clear_both">
						<a class="fb" href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;"></a>
						<a class="twitter" href="https://twitter.com/share?text=<?php the_title(); ?>&url=<?php the_permalink(); ?>" target="_blank"></a>
						<a class="pinterest" href="//pinterest.com/pin/create/button/?url=<?php echo get_permalink(); ?>&media=<?php echo wp_get_attachment_url( get_post_thumbnail_id() ); ?>&description=<?php the_title(); ?>"></a>
					</span>
				</div>
			</div>
		</div>
	</div>
</div>		
 <?php get_footer(); ?>