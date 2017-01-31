<?php
/** no direct access **/
defined('_WBMPLEXEC_') or die();

// Include ticker JavaScript file
wp_enqueue_script('mpl-ticker', $this->main->URL('WBMPL').'app/widgets/MPL/assets/ticker/js/jquery.ticker.min.js');

// Pause period
$item_pause = (isset($instance['item_pause']) and $instance['item_pause']) ? $instance['item_pause'] : 3000;

// The first writing cursor
$cursor_one = (isset($instance['layout_cursor_one']) and trim($instance['layout_cursor_one'])) ? $instance['layout_cursor_one'] : '_';

// The second writing cursor
$cursor_two = (isset($instance['layout_cursor_two']) and trim($instance['layout_cursor_two'])) ? $instance['layout_cursor_two'] : '-';

// shuffle the items or not
$random = (isset($instance['layout_random']) and $instance['layout_random']) ? 'true' : 'false';

// Pause the ticket on mouse hover
$pause_on_hover = (!isset($instance['layout_pause_on_hover']) or (isset($instance['layout_pause_on_hover']) and !$instance['layout_pause_on_hover'])) ? 'false' : 'true';

// finish the writing on mouse hover
$finish_on_hover = (!isset($instance['layout_finish_on_hover']) or (isset($instance['layout_finish_on_hover']) and !$instance['layout_finish_on_hover'])) ? 'false' : 'true';

// item Fade status
$fade = (!isset($instance['layout_fade']) or (isset($instance['layout_fade']) and !$instance['layout_fade'])) ? 'false' : 'true';

// Generating javascript code of the widget
$javascript = '<script type="text/javascript">
jQuery(document).ready(function()
{
    jQuery("#'.$this->posts->get_container_id($this->widget_id).'").ticker(
    {
        random:        '.$random.',
        itemSpeed:     '.$item_pause.',
        cursorSpeed:   50,
        pauseOnHover:  '.$pause_on_hover.',
        finishOnHover: '.$finish_on_hover.',
        cursorOne:     "'.$cursor_one.'",
        cursorTwo:     "'.$cursor_two.'",
        fade:          '.$fade.',
        fadeInSpeed:   600,
        fadeOutSpeed:  300
    });
});
</script>';

// Include javascript code into the footer
$this->factory->params('footer', $javascript);