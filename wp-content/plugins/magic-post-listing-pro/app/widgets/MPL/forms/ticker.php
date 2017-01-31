<?php
/** no direct access **/
defined('_WBMPLEXEC_') or die();
?>
<p>
    <label for="<?php echo $this->get_field_id('item_pause'); ?>"><?php echo __('Pause', WBMPL_TEXTDOMAIN); ?></label>
    <input class="widefat" id="<?php echo $this->get_field_id('item_pause'); ?>" name="<?php echo $this->get_field_name('item_pause'); ?>" value="<?php echo (isset($instance['item_pause']) ? $instance['item_pause'] : 3000); ?>" type="text" title="<?php echo __('The pause (ms) on each ticker item before being replaced', WBMPL_TEXTDOMAIN); ?>" />
</p>
<p>
    <label for="<?php echo $this->get_field_id('layout_cursor_one'); ?>"><?php echo __('First Cursor', WBMPL_TEXTDOMAIN); ?></label>
    <input class="widefat" id="<?php echo $this->get_field_id('layout_cursor_one'); ?>" name="<?php echo $this->get_field_name('layout_cursor_one'); ?>" value="<?php echo (isset($instance['layout_cursor_one']) ? $instance['layout_cursor_one'] : '_'); ?>" type="text" title="<?php echo __('The symbol for the first part of the cursor', WBMPL_TEXTDOMAIN); ?>" />
</p>
<p>
    <label for="<?php echo $this->get_field_id('layout_cursor_two'); ?>"><?php echo __('Second Cursor', WBMPL_TEXTDOMAIN); ?></label>
    <input class="widefat" id="<?php echo $this->get_field_id('layout_cursor_two'); ?>" name="<?php echo $this->get_field_name('layout_cursor_two'); ?>" value="<?php echo (isset($instance['layout_cursor_two']) ? $instance['layout_cursor_two'] : '_'); ?>" type="text" title="<?php echo __('The symbol for the second part of the cursor', WBMPL_TEXTDOMAIN); ?>" />
</p>
<p>
    <label for="<?php echo $this->get_field_id('layout_random'); ?>"><?php echo __('Shuffle Posts/Pages', WBMPL_TEXTDOMAIN); ?></label>
    <select id="<?php echo $this->get_field_id('layout_random'); ?>" name="<?php echo $this->get_field_name('layout_random'); ?>" class="widefat" title="<?php echo __('Whether to display ticker items in a random order', WBMPL_TEXTDOMAIN); ?>">
        <option value="0" <?php echo ((isset($instance['layout_random']) and $instance['layout_random'] == '0') ? 'selected="selected"' : ''); ?>><?php echo __('No', WBMPL_TEXTDOMAIN); ?></option>
        <option value="1" <?php echo ((isset($instance['layout_random']) and $instance['layout_random'] == '1') ? 'selected="selected"' : ''); ?>><?php echo __('Yes', WBMPL_TEXTDOMAIN); ?></option>
    </select>
</p>
<p>
    <label for="<?php echo $this->get_field_id('layout_pause_on_hover'); ?>"><?php echo __('Pause on Hover', WBMPL_TEXTDOMAIN); ?></label>
    <select id="<?php echo $this->get_field_id('layout_pause_on_hover'); ?>" name="<?php echo $this->get_field_name('layout_pause_on_hover'); ?>" class="widefat" title="<?php echo __('Whether to pause when the mouse hovers over the ticker', WBMPL_TEXTDOMAIN); ?>">
        <option value="1" <?php echo ((isset($instance['layout_pause_on_hover']) and $instance['layout_pause_on_hover'] == '1') ? 'selected="selected"' : ''); ?>><?php echo __('Yes', WBMPL_TEXTDOMAIN); ?></option>
        <option value="0" <?php echo ((isset($instance['layout_pause_on_hover']) and $instance['layout_pause_on_hover'] == '0') ? 'selected="selected"' : ''); ?>><?php echo __('No', WBMPL_TEXTDOMAIN); ?></option>
    </select>
</p>
<p>
    <label for="<?php echo $this->get_field_id('layout_finish_on_hover'); ?>"><?php echo __('Finish on Hover', WBMPL_TEXTDOMAIN); ?></label>
    <select id="<?php echo $this->get_field_id('layout_finish_on_hover'); ?>" name="<?php echo $this->get_field_name('layout_finish_on_hover'); ?>" class="widefat" title="<?php echo __('Whether or not to complete the ticker item instantly when moused over', WBMPL_TEXTDOMAIN); ?>">
        <option value="1" <?php echo ((isset($instance['layout_finish_on_hover']) and $instance['layout_finish_on_hover'] == '1') ? 'selected="selected"' : ''); ?>><?php echo __('Yes', WBMPL_TEXTDOMAIN); ?></option>
        <option value="0" <?php echo ((isset($instance['layout_finish_on_hover']) and $instance['layout_finish_on_hover'] == '0') ? 'selected="selected"' : ''); ?>><?php echo __('No', WBMPL_TEXTDOMAIN); ?></option>
    </select>
</p>
<p>
    <label for="<?php echo $this->get_field_id('layout_fade'); ?>"><?php echo __('Fade', WBMPL_TEXTDOMAIN); ?></label>
    <select id="<?php echo $this->get_field_id('layout_fade'); ?>" name="<?php echo $this->get_field_name('layout_fade'); ?>" class="widefat" title="<?php echo __('Whether to fade between ticker items or not', WBMPL_TEXTDOMAIN); ?>">
        <option value="1" <?php echo ((isset($instance['layout_fade']) and $instance['layout_fade'] == '1') ? 'selected="selected"' : ''); ?>><?php echo __('Yes', WBMPL_TEXTDOMAIN); ?></option>
        <option value="0" <?php echo ((isset($instance['layout_fade']) and $instance['layout_fade'] == '0') ? 'selected="selected"' : ''); ?>><?php echo __('No', WBMPL_TEXTDOMAIN); ?></option>
    </select>
</p>