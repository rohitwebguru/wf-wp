<?php
/** no direct access **/
defined('_WBMPLEXEC_') or die();
?>
<div <?php echo $this->posts->generate_container_classes($this->widget_id, $instance); ?>>
    <?php if(trim($widget_title) != '') echo '<div class="wbmpl_main_title">'.$before_title.$widget_title.$after_title.'</div>'; ?>
    <?php if(count($rendered)): ?>
    <div class="owl-carousel">
        <?php foreach($rendered as $post): ?>
        <div id="wbmpl_list_container<?php echo $this->widget_id; ?>_<?php echo $post['ID']; ?>" class="wbmpl_list_container">
            <?php if($instance['thumb_show']): ?>
            <div class="wbmpl_list_thumbnail" id="wbmpl_list_thumbnail<?php echo $this->widget_id; ?>_<?php echo $post['ID']; ?>">
                <?php echo $this->posts->render_thumbnail($post['rendered']['thumbnail'], $instance, $post); ?>
            </div>
            <?php endif; ?>
            <div class="wbmpl_list_right" id="wbmpl_list_right<?php echo $this->widget_id; ?>_<?php echo $post['ID']; ?>">
                <?php if($instance['display_show_title']): ?>
                <div class="wbmpl_list_title" id="wbmpl_list_title<?php echo $this->widget_id; ?>_<?php echo $post['ID']; ?>">
                    <?php echo $this->posts->render_title($post['post_title'], $instance, $post); ?>
                </div>
                <?php endif; ?>

                <?php if($instance['display_show_content']): ?>
                <div class="wbmpl_list_content" id="wbmpl_list_content<?php echo $this->widget_id; ?>_<?php echo $post['ID']; ?>">
                    <?php echo $this->posts->render_content($post['post_content'], $instance, $post); ?>
                </div>
                <?php endif; ?>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
    <?php else: ?>
    <div class="wbmpl_no_posts"><?php echo $instance['no_post_default_text']; ?></div>
    <?php endif; ?>
</div>