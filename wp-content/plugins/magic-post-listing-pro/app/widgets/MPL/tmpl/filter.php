<?php
/** no direct access **/
defined('_WBMPLEXEC_') or die();

$terms = get_terms($instance['layout_categorize_method']);
?>
<div <?php echo $this->posts->generate_container_classes($this->widget_id, $instance); ?>>
    <?php if(trim($widget_title) != '') echo '<div class="wbmpl_main_title">'.$before_title.$widget_title.$after_title.'</div>'; ?>
    <?php if(count($rendered)): ?>
    <ul class="wbmpl_mix_controls">
        <li class="wbmpl_filter" data-filter="all"><?php echo __('All', WBMPL_TEXTDOMAIN); ?></li>
        <?php foreach($terms as $term): ?>
        <li class="wbmpl_filter" data-filter=".wbmpl_term_<?php echo $term->slug; ?>"><?php echo __($term->name, WBMPL_TEXTDOMAIN); ?></li>
        <?php endforeach; ?>
    </ul>
    <ul id="wbmpl_mixit_<?php echo $this->widget_id; ?>">
        <?php foreach($rendered as $post): ?>
        <?php
            $post_terms = wp_get_post_terms($post['ID'], $instance['layout_categorize_method']);
            
            $classes = '';
            foreach($post_terms as $post_term) $classes .= 'wbmpl_term_'.$post_term->slug.' ';
            $classes = trim($classes, ' ');
        ?>
        <li id="wbmpl_list_container<?php echo $this->widget_id; ?>_<?php echo $post['ID']; ?>" class="wbmpl_list_container wbmpl_mixit <?php echo $classes; ?>">
            <?php if($instance['thumb_show']): ?>
            <div class="wbmpl_list_thumbnail" id="wbmpl_list_thumbnail<?php echo $this->widget_id; ?>_<?php echo $post['ID']; ?>">
                <?php echo $this->posts->render_thumbnail($post['rendered']['thumbnail'], $instance, $post); ?>
            </div>
            <?php endif; ?>
            <div class="wbmpl_list_details_wp" id="wbmpl_list_details_wp<?php echo $this->widget_id; ?>_<?php echo $post['ID']; ?>">
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
                
                <div class="wbmpl_list_details" id="wbmpl_list_details<?php echo $this->widget_id; ?>_<?php echo $post['ID']; ?>">
                    <?php if($instance['display_show_author']): ?>
                    <div class="wbmpl_list_author" id="wbmpl_list_author<?php echo $this->widget_id; ?>_<?php echo $post['ID']; ?>"><?php echo $this->posts->render_author($post['post_author'], $instance); ?></div>
                    <?php endif; ?>

                    <?php if($instance['display_show_date']): ?>
                    <div class="wbmpl_list_date" id="wbmpl_list_date<?php echo $this->widget_id; ?>_<?php echo $post['ID']; ?>"><?php echo $this->posts->render_date($post['ID'], $instance); ?></div>
                    <?php endif; ?>
                </div>
            </div>    	
        </li>
        <?php endforeach; ?>
    </ul>
    <?php else: ?>
    <div class="wbmpl_no_posts"><?php echo $instance['no_post_default_text']; ?></div>
    <?php endif; ?>
</div>