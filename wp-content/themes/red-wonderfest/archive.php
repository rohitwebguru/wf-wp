<?php get_header(); ?>
<div id="content">
    <div id="main">
 
        <?php if (have_posts()) : ?>
		<div class="item entry">
	  <?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
 	  <?php /* If this is a category archive */ if (is_category()) { ?>
		<h2 class="pagetitle">Archive for the &#8216;<?php single_cat_title(); ?>&#8217; category</h2>
 	  <?php /* If this is a tag archive */ } elseif( function_exists('is_tag') ) { if(is_tag()){ ?>
		<h2 class="pagetitle">Posts tagged &#8216;<?php single_tag_title(); ?>&#8217;</h2>
 	  <?php /* If this is a daily archive */} } elseif (is_day()) { ?>
		<h2 class="pagetitle">Archive for <?php the_time('F jS, Y'); ?></h2>
 	  <?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
		<h2 class="pagetitle">Archive for <?php the_time('F, Y'); ?></h2>
 	  <?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
		<h2 class="pagetitle">Archive for <?php the_time('Y'); ?></h2>
	  <?php /* If this is an author archive */ } elseif (is_author()) { ?>
		<h2 class="pagetitle">Author archive</h2>
 	  <?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
		<h2 class="pagetitle">Blog archives</h2>
 	  <?php } ?>
		</div>
 
                <?php while (have_posts()) : the_post(); ?>
				<?php /*?>item<?php */?> 
				<div class="item entry" id="post-<?php the_ID(); ?>">
				          <div class="itemhead">
                            <div class="post-date">
                            	<div class="month"><?php the_time('M') ?></div>
	                            <div class="day"><?php the_time('d') ?></div>
                            </div>
				            <h1><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h1>
				          </div>
						  <div class="storycontent">
								<?php the_content('Read more &raquo;'); ?>
						  </div>
						 <? if (is_single()) { ?> 
				          <div class="metadata">
                                <p class="category">This entry was posted
                                    on <?php the_time('l, F jS, Y') ?> at <?php the_time() ?> by <?php the_author() ?>. 
                                    
                                    Filed under: <?php the_category(', ') ?>.  
                                    
                                    <?php if ( function_exists('wp_tag_cloud') ) : ?>
                                        Tagged as: <?php the_tags('') ?>.
                                    <?php endif; ?>
             
                                    You can follow any responses to this entry through the <?php comments_rss_link('RSS 2.0'); ?> feed. 
                                    
                                    <?php if (('open' == $post-> comment_status) && ('open' == $post->ping_status)) {
                                        // Both Comments and Pings are open ?>
                                        You can <a href="#respond">leave a response</a>, or <a href="<?php trackback_url(true); ?>" rel="trackback">trackback</a> from your own site.
                                    
                                    <?php } elseif (!('open' == $post-> comment_status) && ('open' == $post->ping_status)) {
                                        // Only Pings are Open ?>
                                        Responses are currently closed, but you can <a href="<?php trackback_url(true); ?> " rel="trackback">trackback</a> from your own site.
                                    
                                    <?php } elseif (('open' == $post-> comment_status) && !('open' == $post->ping_status)) {
                                        // Comments are open, Pings are not ?>
                                        You can skip to the end and leave a response. Pinging is currently not allowed.
                        
                                    <?php } elseif (!('open' == $post-> comment_status) && !('open' == $post->ping_status)) {
                                        // Neither Comments, nor Pings are open ?>
                                        Both comments and pings are currently closed.			
                                    
                                    <?php } edit_post_link('Edit this entry.','',''); ?></p>
                            <!--
                            <?php trackback_rdf(); ?>
                            -->
						  </div>
                         <?php } ?>
				 </div>
				 <?php /*?>end item<?php */?> 
 
<?php comments_template(); // Get wp-comments.php template ?>
 
                <?php endwhile; ?>
 
                <div class="navigation">
                        <div class="alignleft"><?php next_posts_link('&laquo; Previous Entries') ?></div>
                        <div class="alignright"><?php previous_posts_link('Next Entries &raquo;') ?></div>
                </div>
 
        <?php else : ?>
 
                <h2 class="center">Not Found</h2>
                <p class="center">Sorry, but you are looking for something that has no entries.</p>
 
	<?php endif; ?>

	</div>
	<div id="sidebar">
		<?php get_sidebar(); ?>
	</div>
	    
  </div>
<?php get_footer(); ?>
