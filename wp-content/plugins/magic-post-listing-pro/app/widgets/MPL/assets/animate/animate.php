<?php
/** no direct access **/
defined('_WBMPLEXEC_') or die();

// Include owl CSS file
wp_enqueue_style('mpl-owl-carousel-css', $this->main->URL('WBMPL').'assets/packages/owl-carousel/assets/owl.carousel.min.css');

// Include animate CSS file
wp_enqueue_style('mpl-animate-css', $this->main->URL('WBMPL').'assets/css/animate.min.css');

// Include owl JavaScript file
wp_enqueue_script('mpl-owl-carousel-js', $this->main->URL('WBMPL').'assets/packages/owl-carousel/owl.carousel.min.js');

// Animation of the widget
$animation = (isset($instance['layout_animation']) and trim($instance['layout_animation'])) ? $instance['layout_animation'] : 'fadeOut';

// Loop the posts
$loop = (isset($instance['layout_loop']) and trim($instance['layout_loop'])) ? 'true' : 'false';

// Show navigation bar
$nav = (isset($instance['layout_nav']) and trim($instance['layout_nav'])) ? 'true' : 'false';

// Automatically play the slider on page load
$autoplay = (isset($instance['layout_auto']) and trim($instance['layout_auto'])) ? 'true' : 'false';

// RTL support for slider
$rtl = (isset($instance['layout_rtl']) and trim($instance['layout_rtl'])) ? 'true' : 'false';

// Generating javascript code of the widget
$javascript = '<script type="text/javascript">
jQuery(document).ready(function()
{
    jQuery("#'.$this->posts->get_container_id($this->widget_id).' .owl-carousel").owlCarousel(
    {
        items: 1,
        animateOut: "'.$animation.'",
        loop: '.$loop.',
        nav: '.$nav.',
        autoplay: '.$autoplay.',
        autoplayHoverPause: true,
        rtl: '.$rtl.',
        autoHeight: true,
        navText: ["<i class=\"fa fa-chevron-left\"></i>","<i class=\"fa fa-chevron-right\"></i>"]
    });
});
</script>';

// Include javascript code into the footer
$this->factory->params('footer', $javascript);