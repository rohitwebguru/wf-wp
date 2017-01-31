<?php
// eric
//disable auto p
//remove_filter ('the_content', 'wpautop');

//disable wptexturize
//remove_filter('the_content', 'wptexturize');


function custom_comment($comment, $args, $depth) {
       $GLOBALS['comment'] = $comment; ?>
        <li <?php //comment_class(); ?> class="alt" id="comment-<?php comment_ID( ); ?>">
        
        	<div class="avatar_cont"><?php if ($args['avatar_size'] != 0) echo get_avatar( $comment, $args['avatar_size'] ); ?></div>
            <cite><?php comment_author_link() ?></cite>
            <?php if ($comment->comment_approved == '0') : ?>
            <em> *** Your comment is awaiting moderation. *** </em>
            <?php endif; ?>
            <br />
        	<small class="commentmetadata"><a href="#comment-<?php comment_ID() ?>" title=""><?php comment_date('F jS, Y') ?> - <?php comment_time() ?></a> <?php edit_comment_link('Edit','',''); ?></small>
            <?php comment_text() ?>
                    

                <div style="clear:both;"></div>
			<?php echo comment_reply_link(array('before' => '<div class="reply">', 'after' => '</div>', 'reply_text' => 'Reply to this comment', 'depth' => $depth, 'max_depth' => $args['max_depth'] ));  ?>
                <div style="clear:both;"></div>
                
		<?php 
 		// Do not close LI.  WP will do it for you.
} 

if ( function_exists('register_sidebar') ){
    register_sidebar(array(
        'name' => 'leftsidebar',
        'before_widget' => '<div class="widget">',
        'after_widget' => '</div>',
        'before_title' => '<h4>',
        'after_title' => '</h4>',
    ));
}

function widget_mytheme_search() {
	/* Search is in the header.  No need to have it in the sidebar too. */
} 

function widget_mytheme_tags() {
?> 

        <div class="widget">
            <h4>Popular Tags</h4>
            <div class="taggage">
            <?php wp_tag_cloud('smallest=8&largest=22'); ?>
            </div>
        </div>

<?php 
} 

function widget_mytheme_pages() {
	if ( function_exists('wp_list_comments') ) { // WP 2.7 check, use new pages function
		?><h4>Pages</h4><?php
       	wp_page_menu('show_home=1&menu_class=page-navi');
	} else { // use legacy pages function
       	?> 
        <div class="widget">
		<h4>Pages</h4>
        <ul><li><a href="<?php echo get_option('home'); ?>/">Home</a></li><?php wp_list_pages('title_li='); ?></ul>
        </div>
	<?php 
	}
}

if ( function_exists('register_sidebar_widget') ) 
	register_sidebar_widget(__('Search'), 'widget_mytheme_search');
	register_sidebar_widget(__('tag_cloud'), 'widget_mytheme_tags');
	register_sidebar_widget(__('Pages'), 'widget_mytheme_pages');

?>
