<?php // Do not delete these lines
	if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');
		
	if (function_exists('post_password_required')) {
		if ( post_password_required() ) {
			echo '<p class="nocomments">This post is password protected. Enter the password to view comments.</p>';
			return;
		}
	} else {
		if (!empty($post->post_password)) { 
			// if there's a password
			if ($_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) {
				// and it doesn't match the cookie  ?>
				<p class="nocomments">This post is password protected. Enter the password to view comments.</p>
				<?php return;
			}
		}
	}

if (function_exists('wp_list_comments')) :
	// WP 2.7 Comment Loop
	if ( have_comments() ) : ?>
    <div class="item entry">
        <h3 id="comments"><?php comments_number('No responses', 'One response', '% Responses' );?> to &#8220;<?php the_title(); ?>&#8221;</h3>
        <ol class="commentlist">
            <?php wp_list_comments('avatar_size=48&callback=custom_comment'); ?>
        </ol>
		<div class="navigation">
			<div class="alignleft"><?php previous_comments_link() ?></div>
			<div class="alignright"><?php next_comments_link() ?></div>
		</div>
	</div>
	<?php else : // this is displayed if there are no comments so far ?>
		<?php if ('open' == $post->comment_status) :
			// If comments are open, but there are no comments.
			else : ?><p class="nocomments">Comments are closed.</p>
		<?php endif;
	endif;?>
	<?php

else:
	//WP 2.6 and older Comment Loop
	/* This variable is for alternating comment background */

	$oddcomment = 'alt';
	
	if ($comments) : ?>
        <div class="item entry">
            <h3 id="comments"><?php comments_number('No responses', 'One response', '% Responses' );?> to &#8220;<?php the_title(); ?>&#8221;</h3>
            <ol class="commentlist">
            <?php foreach ($comments as $comment) : ?>
                <li class="<?php echo $oddcomment; ?>" id="comment-<?php comment_ID() ?>">
                    <?php if (function_exists('get_avatar')) {
                              echo get_avatar( $comment, $size = '48' );
                           } else {
                              //alternate gravatar code for < 2.5
                              $grav_url = "http://www.gravatar.com/avatar.php?gravatar_id=
                                 " . md5($email) . "&default=" . urlencode($default) . "&size=48";
                              echo "<img src='$grav_url'/>";
                           }
                    ?>
                    <cite><?php comment_author_link() ?></cite>
                    <?php if ($comment->comment_approved == '0') : ?>
                        <em> *** Your comment is awaiting moderation. *** </em>
                    <?php endif; ?>
                    <br />
                    <small class="commentmetadata"><a href="#comment-<?php comment_ID() ?>" title=""><?php comment_date('F jS, Y') ?> - <?php comment_time() ?></a> <?php edit_comment_link('Edit','',''); ?></small>
                    <?php comment_text() ?>
                </li>
				<?php /* Changes every other comment to a different class */
                    if ('alt' == $oddcomment) $oddcomment = '';
                    else $oddcomment = 'alt';
					?>
            <?php endforeach; /* end for each comment */ ?>
            </ol>
        </div>
 <?php 
 	else : // this is displayed if there are no comments so far ?>
		<?php if ('open' == $post->comment_status) : ?>
	 	<?php else : // comments are closed ?>
            <div class="item entry">
                    <p class="nocomments">Comments are closed.</p>
            </div>
		<?php endif;
	endif; // 2.6 and older Comment Loop end 
endif; 
	
	if ('open' == $post->comment_status) : ?>
    <div class="item entry">
        <h3 id="respond">Leave a Reply</h3>
        
		<?php if (function_exists('cancel_comment_reply_link')) /*2.7 comment loop code*/ { ?>
			<div id="cancel-comment-reply">
				<small><?php cancel_comment_reply_link();?></small>
			</div>
		<?php } ?>

        <?php if ( get_option('comment_registration') && !$user_ID ) : ?>
          <p>You must be <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php the_permalink(); ?>">logged in</a> to post a comment.</p>
          
        <?php else : ?>
        
          <form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
        
          <?php if ( $user_ID ) : ?>
        
            <p>Logged in as <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <!--<a href="<?php echo get_option('siteurl'); ?>/wp-login.php?action=logout" title="Log out of this account">Logout &raquo;</a>-->
            <a href="<?php echo wp_logout_url(); ?>" title="Log out of this account">Logout &raquo;</a>
            </p>
        
          <?php else : ?>
        
            <p><input type="text" name="author" id="author" value="<?php echo $comment_author; ?>" size="22" tabindex="1" />
            <label for="author"><small>Name <?php if ($req) echo "(required)"; ?></small></label></p>
        
            <p><input type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" size="22" tabindex="2" />
            <label for="email"><small>Mail (will not be published) <?php if ($req) echo "(required)"; ?></small></label></p>
        
            <p><input type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" size="22" tabindex="3" />
            <label for="url"><small>Website</small></label></p>
        
          <?php endif; ?>
        
          <p><small><strong>XHTML:</strong> You can use these tags: <?php echo allowed_tags(); ?></small></p>
        
          <p><textarea name="comment" id="comment" rows="10" cols="75" tabindex="4"></textarea>
          </p>
        
          <p><input name="submit" type="submit" id="submit" tabindex="5" value="Submit Comment" />
          <input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" />
          </p>
          <?php do_action('comment_form', $post->ID); ?>
        
          </form>
    </div>
        <?php endif; // If registration required and not logged in ?>
 
<?php endif; // if you delete this the sky will fall on your head ?>
