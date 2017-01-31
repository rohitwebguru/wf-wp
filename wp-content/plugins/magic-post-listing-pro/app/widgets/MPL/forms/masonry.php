<?php
/** no direct access **/
defined('_WBMPLEXEC_') or die();
?>
<p>
    <label for="<?php echo $this->get_field_id('layout_pagination'); ?>"><?php echo __('Pagination', WBMPL_TEXTDOMAIN); ?></label>
    <select id="<?php echo $this->get_field_id('layout_pagination'); ?>" name="<?php echo $this->get_field_name('layout_pagination'); ?>" class="widefat">
        <option value="0" <?php echo ((isset($instance['layout_pagination']) and $instance['layout_pagination'] == 0) ? 'selected="selected"' : ''); ?>><?php echo __('No Pagination', WBMPL_TEXTDOMAIN); ?></option>
        <option value="1" <?php echo ((isset($instance['layout_pagination']) and $instance['layout_pagination'] == 1) ? 'selected="selected"' : ''); ?>><?php echo __('Load More', WBMPL_TEXTDOMAIN); ?></option>
    </select>
</p>
<p>
    <label for="<?php echo $this->get_field_id('layout_column_width'); ?>"><?php echo __('Column Width', WBMPL_TEXTDOMAIN); ?></label>
    <input class="widefat" id="<?php echo $this->get_field_id('layout_column_width'); ?>" name="<?php echo $this->get_field_name('layout_column_width'); ?>" value="<?php echo (isset($instance['layout_column_width']) ? $instance['layout_column_width'] : 100); ?>" type="text" />
</p>
<p>
    <label for="<?php echo $this->get_field_id('layout_gutter'); ?>"><?php echo __('Horizontal Space', WBMPL_TEXTDOMAIN); ?></label>
    <input class="widefat" id="<?php echo $this->get_field_id('layout_gutter'); ?>" name="<?php echo $this->get_field_name('layout_gutter'); ?>" value="<?php echo (isset($instance['layout_gutter']) ? $instance['layout_gutter'] : 10); ?>" type="text" />
</p>
<p>
    <label for="<?php echo $this->get_field_id('layout_margin'); ?>"><?php echo __('Vertical Space', WBMPL_TEXTDOMAIN); ?></label>
    <input class="widefat" id="<?php echo $this->get_field_id('layout_margin'); ?>" name="<?php echo $this->get_field_name('layout_margin'); ?>" value="<?php echo (isset($instance['layout_margin']) ? $instance['layout_margin'] : 10); ?>" type="text" />
</p>