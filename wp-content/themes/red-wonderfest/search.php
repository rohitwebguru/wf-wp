<?php get_header(); ?>
<div id="content">
    <div id="main">

	<?php if (have_posts()) : ?>
								<div class="item entry">
									<h2 class="pagetitle">Search results for &#8216;<?php the_search_query(); ?>&#8217;</h2>
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
								<?php the_excerpt('Read more &raquo;'); ?>
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
 			<div class="item entry">
                <h2 class="pagetitle">No search results</h2>
                <p class="center">We did not find any posts containing the string &#8216;<?php the_search_query(); ?>&#8217;.</p>
			</div>
 
	<?php endif; ?>

	</div>
	<div id="sidebar">
		<?php get_sidebar(); ?>
	</div>
	    
  </div>
<?php get_footer(); ?>
