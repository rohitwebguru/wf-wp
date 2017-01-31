<?php
/** no direct access **/
defined('_WBMPLEXEC_') or die();
?>
<p>
    <label for="<?php echo $this->get_field_id('layout_caption_style'); ?>"><?php echo __('Caption Style', WBMPL_TEXTDOMAIN); ?></label>
    <select id="<?php echo $this->get_field_id('layout_caption_style'); ?>" name="<?php echo $this->get_field_name('layout_caption_style'); ?>" class="widefat" title="<?php echo __('Caption Style', WBMPL_TEXTDOMAIN); ?>">
        <option value="1" <?php echo ((isset($instance['layout_caption_style']) and $instance['layout_caption_style'] == '1') ? 'selected="selected"' : ''); ?>><?php echo __('Simple', WBMPL_TEXTDOMAIN); ?></option>
        <option value="2" <?php echo ((isset($instance['layout_caption_style']) and $instance['layout_caption_style'] == '2') ? 'selected="selected"' : ''); ?>><?php echo __('Full', WBMPL_TEXTDOMAIN); ?></option>
        <option value="3" <?php echo ((isset($instance['layout_caption_style']) and $instance['layout_caption_style'] == '3') ? 'selected="selected"' : ''); ?>><?php echo __('Fade', WBMPL_TEXTDOMAIN); ?></option>
        <option value="4" <?php echo ((isset($instance['layout_caption_style']) and $instance['layout_caption_style'] == '4') ? 'selected="selected"' : ''); ?>><?php echo __('Slide', WBMPL_TEXTDOMAIN); ?></option>
        <option value="5" <?php echo ((isset($instance['layout_caption_style']) and $instance['layout_caption_style'] == '5') ? 'selected="selected"' : ''); ?>><?php echo __('Rotate', WBMPL_TEXTDOMAIN); ?></option>
        <option value="6" <?php echo ((isset($instance['layout_caption_style']) and $instance['layout_caption_style'] == '6') ? 'selected="selected"' : ''); ?>><?php echo __('Scale', WBMPL_TEXTDOMAIN); ?></option>
    </select>
</p>
<p>
    <label for="<?php echo $this->get_field_id('layout_pagination'); ?>"><?php echo __('Pagination', WBMPL_TEXTDOMAIN); ?></label>
    <?php if(!$this->main->getPRO()): echo $this->main->pro_messages('upgrade'); ?>
    <?php else: ?>
    <select id="<?php echo $this->get_field_id('layout_pagination'); ?>" name="<?php echo $this->get_field_name('layout_pagination'); ?>" class="widefat">
        <option value="0" <?php echo ((isset($instance['layout_pagination']) and $instance['layout_pagination'] == 0) ? 'selected="selected"' : ''); ?>><?php echo __('No Pagination', WBMPL_TEXTDOMAIN); ?></option>
        <option value="1" <?php echo ((isset($instance['layout_pagination']) and $instance['layout_pagination'] == 1) ? 'selected="selected"' : ''); ?>><?php echo __('Load More', WBMPL_TEXTDOMAIN); ?></option>
    </select>
    <?php endif; ?>
</p>