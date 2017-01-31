<?php
/** Themify Default Variables
 *  @var object */
global $themify; ?>

<?php themify_post_before(); // hook ?>
<article id="highlight-<?php the_id(); ?>" <?php post_class('post highlight-post ' . $themify->col_class); ?>>
	<?php themify_post_start(); // hook ?>

	<?php
	$link = themify_get_featured_image_link('no_permalink=true');
	$before = '';
	$after = '';
	if ($link != '') {
		$before = '<a href="' . $link . '" title="' . get_the_title() . '">';
		$zoom_icon = themify_zoom_icon(false);
		$after = $zoom_icon . '</a>' . $after;
		$zoom_icon = '';
	}

	// Save post id
	$post_id = get_the_id();

	$fa_icon = '';
	$fa_bg_style = '';
	$check = isset( $themify->is_shortcode ) ? 'no' : 'yes';

	if ( $check != $themify->hide_image ):

		// Check bar and icon colors
		$bar_color_key = 'styling-background-chart_bar_color-background_color-value-value';
		$bar_color = get_post_meta($post_id, 'bar_color', true);
		if( ! $bar_color ) {
			$bar_color = themify_check($bar_color_key) ? apply_filters('themify_chart_bar_color', themify_get($bar_color_key)) : '22d9e5';
		}
		$icon_color = get_post_meta($post_id, 'icon_color', true);
		if( ! $icon_color )
			$icon_color = $bar_color;

		// echo the same color same as highlight bar for the icon
		echo sprintf( '<style>.post-%s .fa {color:%s;}</style>', $post_id, '#' . $icon_color );

		$bar_percentage = get_post_meta($post_id, 'bar_percentage', true);
		if( $bar_percentage ):
			$chart_before = sprintf( '<div class="chart chart-%s" data-percent="%s" data-color="%s">',
				$post_id, $bar_percentage, $bar_color
			);
			$chart_after = '</div><!-- /.chart -->';
			$no_chart = '';
		else:
			$chart_before = '';
			$chart_after = '';
			$no_chart = 'no-chart';
		endif;

		?>
		<?php themify_before_post_image(); // hook ?>
		<figure class="post-image <?php echo $no_chart; ?>">
			<?php echo $before . $chart_before; ?>
			<?php
			if( 'image' != themify_get('highlight_type') ):
				$fa_icon = get_post_meta($post_id, 'icon', true);
				$fa_bg_color = get_post_meta($post_id, 'icon_background', true);
				if ( $fa_bg_color ) {
					$fa_bg_style = sprintf( 'background-color:%s;', '#' . $fa_bg_color );
				}
			endif;
			// If there's an icon set, show it instead of the featured image
			if ( $fa_icon ) :
				if ( $fa_bg_style ) : ?>
					<div class="fa-background" style="<?php echo $fa_bg_style; ?>"></div>
				<?php endif; ?>
				<i class="fa <?php echo $fa_icon; ?>"></i>
			<?php else:
				themify_image('ignore=true&w='.$themify->width.'&h='.$themify->height );
			endif;
			?>
			<?php echo $after . $chart_after; ?>
		</figure>
		<?php themify_after_post_image(); // hook ?>
	<?php endif; // hide image ?>

	<div class="post-content">
		<?php if ( $check != $themify->hide_title ): ?>
			<?php themify_before_post_title(); // hook ?>
			<h4 class="post-title entry-title"><?php echo $before; ?><?php the_title(); ?><?php echo $after; ?></h4>
			<?php themify_after_post_title(); // hook ?>
		<?php endif; // hide title ?>
		<div class="entry-content">

		<?php if ( 'excerpt' == $themify->display_content && ! is_attachment() ) : ?>
			<?php the_excerpt(); ?>
		<?php elseif($themify->display_content == 'content'): ?>
			<?php the_content(themify_check('setting-default_more_text')? themify_get('setting-default_more_text') : __('More &rarr;', 'themify')); ?>
		<?php endif; //display content ?>

		</div><!-- /.entry-content -->
		<?php edit_post_link(__('Edit', 'themify'), '<span class="edit-button">[', ']</span>'); ?>
	</div>

	<?php themify_post_end(); // hook ?>
</article>
<!-- / .post -->
<?php themify_post_after(); // hook ?>
