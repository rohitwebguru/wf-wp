<?php
/*
Template Name: Full Width
*/
?>
<?php get_header(); ?>

<!-- begin colLeft -->
	<div id="colLeftWide">
		<h1><?php the_title(); ?></h1>	
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		
		<?php the_content(); ?>
		
		<?php endwhile; else: ?>
		<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
		<?php endif; ?>
	</div>
	<!-- end colleft -->

<?php get_footer(); ?>