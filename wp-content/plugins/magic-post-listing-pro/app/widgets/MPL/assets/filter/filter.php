<?php
/** no direct access **/
defined('_WBMPLEXEC_') or die();

// Include mixitup JavaScript file
wp_enqueue_script('mpl-mixitup', $this->main->URL('WBMPL').'app/widgets/MPL/assets/filter/js/jquery.mixitup.min.js');

// Animation status, enabled or disabled
$animation = (isset($instance['layout_animation']) and $instance['layout_animation']) ? 'true' : 'false';

// Duration of animation
$duration = (isset($instance['layout_duration']) and trim($instance['layout_duration']) != '') ? $instance['layout_duration'] : 600;

// Easing type of animation
$easing = (isset($instance['layout_easing']) and trim($instance['layout_easing']) != '') ? $instance['layout_easing'] : 'ease';

// Generating javascript code of the widget
$javascript = '<script type="text/javascript">
jQuery(document).ready(function()
{
    jQuery("#wbmpl_mixit_'.$this->widget_id.'").mixItUp(
    {
        animation:
        {
            enable: '.$animation.',
            duration: '.$duration.',
            easing: "'.$easing.'",
        },
        selectors: {target: ".wbmpl_mixit", filter: "#'.$this->posts->get_container_id($this->widget_id).' .wbmpl_filter", sort: "#'.$this->posts->get_container_id($this->widget_id).' .wbmpl_sort"}
    });
});
</script>';

// Include javascript code into the footer
$this->factory->params('footer', $javascript);