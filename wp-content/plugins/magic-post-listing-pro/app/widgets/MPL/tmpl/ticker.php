<?php
/** no direct access **/
defined('_WBMPLEXEC_') or die();
?>
<div <?php echo $this->posts->generate_container_classes($this->widget_id, $instance); ?>>
    <?php if(trim($widget_title) != '') echo '<strong class="wbmpl_main_title">'.$widget_title.'</strong><span class="wbmpl_main_title_right"></span>'; ?>
    <?php if(count($rendered)): ?>
    <ul>
        <?php foreach($rendered as $post): ?>
        <li id="wbmpl_list_container<?php echo $this->widget_id; ?>_<?php echo $post['ID']; ?>" class="wbmpl_list_container" data-post-id="<?php echo $post['ID']; ?>">
            <?php echo $this->posts->render_title($post['post_title'], $instance, $post); ?>
            <?php if($instance['display_show_date']) echo ' - '.$this->posts->render_date($post['ID'], $instance, false); ?>
        </li>
        <?php endforeach; ?>
    </ul>
    <?php else: ?>
    <div class="wbmpl_no_posts"><?php echo $instance['no_post_default_text']; ?></div>
    <?php endif; ?>
</div>