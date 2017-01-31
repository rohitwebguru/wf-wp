<?php
/** no direct access **/
defined('_WBMPLEXEC_') or die();
?>
<p>
    <label for="<?php echo $this->get_field_id('layout_animation'); ?>"><?php echo __('Animation', WBMPL_TEXTDOMAIN); ?></label>
    <select id="<?php echo $this->get_field_id('layout_animation'); ?>" name="<?php echo $this->get_field_name('layout_animation'); ?>" class="widefat">
        <option value="fadeOut" <?php echo ((isset($instance['layout_animation']) and $instance['layout_animation'] == 'fadeOut') ? 'selected="selected"' : ''); ?>><?php echo __('fadeOut', WBMPL_TEXTDOMAIN); ?></option>
        <option value="flipOutX" <?php echo ((isset($instance['layout_animation']) and $instance['layout_animation'] == 'flipOutX') ? 'selected="selected"' : ''); ?>><?php echo __('flipOutX', WBMPL_TEXTDOMAIN); ?></option>
        <option value="flipOutY" <?php echo ((isset($instance['layout_animation']) and $instance['layout_animation'] == 'flipOutY') ? 'selected="selected"' : ''); ?>><?php echo __('flipOutY', WBMPL_TEXTDOMAIN); ?></option>
        <option value="bounceOut" <?php echo ((isset($instance['layout_animation']) and $instance['layout_animation'] == 'bounceOut') ? 'selected="selected"' : ''); ?>><?php echo __('bounceOut', WBMPL_TEXTDOMAIN); ?></option>
        <option value="zoomOut" <?php echo ((isset($instance['layout_animation']) and $instance['layout_animation'] == 'zoomOut') ? 'selected="selected"' : ''); ?>><?php echo __('zoomOut', WBMPL_TEXTDOMAIN); ?></option>
        <option value="rotateOut" <?php echo ((isset($instance['layout_animation']) and $instance['layout_animation'] == 'rotateOut') ? 'selected="selected"' : ''); ?>><?php echo __('rotateOut', WBMPL_TEXTDOMAIN); ?></option>
        <option value="slideOutDown" <?php echo ((isset($instance['layout_animation']) and $instance['layout_animation'] == 'slideOutDown') ? 'selected="selected"' : ''); ?>><?php echo __('slideOutDown', WBMPL_TEXTDOMAIN); ?></option>
    </select>
</p>
<p>
    <label for="<?php echo $this->get_field_id('layout_loop'); ?>"><?php echo __('Loop', WBMPL_TEXTDOMAIN); ?></label>
    <select id="<?php echo $this->get_field_id('layout_loop'); ?>" name="<?php echo $this->get_field_name('layout_loop'); ?>" class="widefat">
        <option value="1" <?php echo ((isset($instance['layout_loop']) and $instance['layout_loop'] == '1') ? 'selected="selected"' : ''); ?>><?php echo __('Yes', WBMPL_TEXTDOMAIN); ?></option>
        <option value="0" <?php echo ((isset($instance['layout_loop']) and $instance['layout_loop'] == '0') ? 'selected="selected"' : ''); ?>><?php echo __('No', WBMPL_TEXTDOMAIN); ?></option>
    </select>
</p>
<p>
    <label for="<?php echo $this->get_field_id('layout_nav'); ?>"><?php echo __('Navigation', WBMPL_TEXTDOMAIN); ?></label>
    <select id="<?php echo $this->get_field_id('layout_nav'); ?>" name="<?php echo $this->get_field_name('layout_nav'); ?>" class="widefat" title="<?php echo __('Next/Previous buttons', WBMPL_TEXTDOMAIN); ?>">
        <option value="1" <?php echo ((isset($instance['layout_nav']) and $instance['layout_nav'] == '1') ? 'selected="selected"' : ''); ?>><?php echo __('Yes', WBMPL_TEXTDOMAIN); ?></option>
        <option value="0" <?php echo ((isset($instance['layout_nav']) and $instance['layout_nav'] == '0') ? 'selected="selected"' : ''); ?>><?php echo __('No', WBMPL_TEXTDOMAIN); ?></option>
    </select>
</p>
<p>
    <label for="<?php echo $this->get_field_id('layout_auto'); ?>"><?php echo __('Auto Play', WBMPL_TEXTDOMAIN); ?></label>
    <select id="<?php echo $this->get_field_id('layout_auto'); ?>" name="<?php echo $this->get_field_name('layout_auto'); ?>" class="widefat">
        <option value="1" <?php echo ((isset($instance['layout_auto']) and $instance['layout_auto'] == '1') ? 'selected="selected"' : ''); ?>><?php echo __('Yes', WBMPL_TEXTDOMAIN); ?></option>
        <option value="0" <?php echo ((isset($instance['layout_auto']) and $instance['layout_auto'] == '0') ? 'selected="selected"' : ''); ?>><?php echo __('No', WBMPL_TEXTDOMAIN); ?></option>
    </select>
</p>
<p>
    <label for="<?php echo $this->get_field_id('layout_rtl'); ?>"><?php echo __('RTL', WBMPL_TEXTDOMAIN); ?></label>
    <select id="<?php echo $this->get_field_id('layout_rtl'); ?>" name="<?php echo $this->get_field_name('layout_rtl'); ?>" class="widefat" title="<?php echo __('Right To Left', WBMPL_TEXTDOMAIN); ?>">
        <option value="0" <?php echo ((isset($instance['layout_rtl']) and $instance['layout_rtl'] == '0') ? 'selected="selected"' : ''); ?>><?php echo __('No', WBMPL_TEXTDOMAIN); ?></option>
        <option value="1" <?php echo ((isset($instance['layout_rtl']) and $instance['layout_rtl'] == '1') ? 'selected="selected"' : ''); ?>><?php echo __('Yes', WBMPL_TEXTDOMAIN); ?></option>
    </select>
</p>