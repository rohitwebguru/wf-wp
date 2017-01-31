<?php
/** no direct access **/
defined('_WBMPLEXEC_') or die();
?>
<p>
    <label for="<?php echo $this->get_field_id('layout_categorize_method'); ?>"><?php echo __('Categorize Based On', WBMPL_TEXTDOMAIN); ?></label>
    <select id="<?php echo $this->get_field_id('layout_categorize_method'); ?>" name="<?php echo $this->get_field_name('layout_categorize_method'); ?>" class="widefat">
        <?php $taxonomies = get_taxonomies(array('public'=>true)); foreach($taxonomies as $taxonomy): $taxonomy_data = get_taxonomy($taxonomy); ?>
        <option value="<?php echo $taxonomy; ?>" <?php echo ((isset($instance['layout_categorize_method']) and $instance['layout_categorize_method'] == $taxonomy) ? 'selected="selected"' : ''); ?>><?php echo __($taxonomy_data->label, WBMPL_TEXTDOMAIN); ?></option>
        <?php endforeach; ?>
    </select>
</p>
<p>
    <label for="<?php echo $this->get_field_id('layout_animation'); ?>"><?php echo __('Animation', WBMPL_TEXTDOMAIN); ?></label>
    <select id="<?php echo $this->get_field_id('layout_animation'); ?>" name="<?php echo $this->get_field_name('layout_animation'); ?>" class="widefat">
        <option value="1" <?php echo ((isset($instance['layout_animation']) and $instance['layout_animation'] == 1) ? 'selected="selected"' : ''); ?>><?php echo __('Enabled', WBMPL_TEXTDOMAIN); ?></option>
        <option value="0" <?php echo ((isset($instance['layout_animation']) and $instance['layout_animation'] == 0) ? 'selected="selected"' : ''); ?>><?php echo __('Disabled', WBMPL_TEXTDOMAIN); ?></option>
    </select>
</p>
<p>
    <label for="<?php echo $this->get_field_id('layout_duration'); ?>"><?php echo __('Duration', WBMPL_TEXTDOMAIN); ?></label>
    <input class="widefat" id="<?php echo $this->get_field_id('layout_duration'); ?>" name="<?php echo $this->get_field_name('layout_duration'); ?>" value="<?php echo (isset($instance['layout_duration']) ? $instance['layout_duration'] : 600); ?>" type="text" />
</p>
<p>
    <label for="<?php echo $this->get_field_id('layout_easing'); ?>"><?php echo __('Easing', WBMPL_TEXTDOMAIN); ?></label>
    <select id="<?php echo $this->get_field_id('layout_easing'); ?>" name="<?php echo $this->get_field_name('layout_easing'); ?>" class="widefat">
        <option value="ease" <?php echo ((isset($instance['layout_easing']) and $instance['layout_easing'] == 'ease') ? 'selected="selected"' : ''); ?>><?php echo __('Ease', WBMPL_TEXTDOMAIN); ?></option>
        <option value="cubic-bezier(0.47, 0, 0.745, 0.715)" <?php echo ((isset($instance['layout_easing']) and $instance['layout_easing'] == 'cubic-bezier(0.47, 0, 0.745, 0.715)') ? 'selected="selected"' : ''); ?>><?php echo __('easeInSine', WBMPL_TEXTDOMAIN); ?></option>
        <option value="cubic-bezier(0.39, 0.575, 0.565, 1)" <?php echo ((isset($instance['layout_easing']) and $instance['layout_easing'] == 'cubic-bezier(0.39, 0.575, 0.565, 1)') ? 'selected="selected"' : ''); ?>><?php echo __('easeOutSine', WBMPL_TEXTDOMAIN); ?></option>
        <option value="cubic-bezier(0.445, 0.05, 0.55, 0.95)" <?php echo ((isset($instance['layout_easing']) and $instance['layout_easing'] == 'cubic-bezier(0.445, 0.05, 0.55, 0.95)') ? 'selected="selected"' : ''); ?>><?php echo __('easeInOutSine', WBMPL_TEXTDOMAIN); ?></option>
        <option value="cubic-bezier(0.55, 0.085, 0.68, 0.53)" <?php echo ((isset($instance['layout_easing']) and $instance['layout_easing'] == 'cubic-bezier(0.55, 0.085, 0.68, 0.53)') ? 'selected="selected"' : ''); ?>><?php echo __('easeInQuad', WBMPL_TEXTDOMAIN); ?></option>
        <option value="cubic-bezier(0.25, 0.46, 0.45, 0.94)" <?php echo ((isset($instance['layout_easing']) and $instance['layout_easing'] == 'cubic-bezier(0.25, 0.46, 0.45, 0.94)') ? 'selected="selected"' : ''); ?>><?php echo __('easeOutQuad', WBMPL_TEXTDOMAIN); ?></option>
        <option value="cubic-bezier(0.455, 0.03, 0.515, 0.955)" <?php echo ((isset($instance['layout_easing']) and $instance['layout_easing'] == 'cubic-bezier(0.455, 0.03, 0.515, 0.955)') ? 'selected="selected"' : ''); ?>><?php echo __('easeInOutQuad', WBMPL_TEXTDOMAIN); ?></option>
        <option value="cubic-bezier(0.55, 0.055, 0.675, 0.19)" <?php echo ((isset($instance['layout_easing']) and $instance['layout_easing'] == 'cubic-bezier(0.55, 0.055, 0.675, 0.19)') ? 'selected="selected"' : ''); ?>><?php echo __('easeInCubic', WBMPL_TEXTDOMAIN); ?></option>
        <option value="cubic-bezier(0.215, 0.61, 0.355, 1)" <?php echo ((isset($instance['layout_easing']) and $instance['layout_easing'] == 'cubic-bezier(0.215, 0.61, 0.355, 1)') ? 'selected="selected"' : ''); ?>><?php echo __('easeOutCubic', WBMPL_TEXTDOMAIN); ?></option>
        <option value="cubic-bezier(0.645, 0.045, 0.355, 1)" <?php echo ((isset($instance['layout_easing']) and $instance['layout_easing'] == 'cubic-bezier(0.645, 0.045, 0.355, 1)') ? 'selected="selected"' : ''); ?>><?php echo __('easeInOutCubic', WBMPL_TEXTDOMAIN); ?></option>
        <option value="cubic-bezier(0.6, -0.28, 0.735, 0.045)" <?php echo ((isset($instance['layout_easing']) and $instance['layout_easing'] == 'cubic-bezier(0.6, -0.28, 0.735, 0.045)') ? 'selected="selected"' : ''); ?>><?php echo __('easeInBack', WBMPL_TEXTDOMAIN); ?></option>
        <option value="cubic-bezier(0.175, 0.885, 0.32, 1.275)" <?php echo ((isset($instance['layout_easing']) and $instance['layout_easing'] == 'cubic-bezier(0.175, 0.885, 0.32, 1.275)') ? 'selected="selected"' : ''); ?>><?php echo __('easeOutBack', WBMPL_TEXTDOMAIN); ?></option>
        <option value="cubic-bezier(0.68, -0.55, 0.265, 1.55)" <?php echo ((isset($instance['layout_easing']) and $instance['layout_easing'] == 'cubic-bezier(0.68, -0.55, 0.265, 1.55)') ? 'selected="selected"' : ''); ?>><?php echo __('easeInOutBack', WBMPL_TEXTDOMAIN); ?></option>
    </select>
</p>