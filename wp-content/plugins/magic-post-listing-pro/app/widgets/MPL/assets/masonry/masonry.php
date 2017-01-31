<?php
/** no direct access **/
defined('_WBMPLEXEC_') or die();

// Include masonry JavaScript file
wp_enqueue_script('mpl-masonry-js', $this->main->URL('WBMPL').'assets/packages/masonry/masonry.pkgd.min.js');

// Column Width
$column_width = (isset($instance['layout_column_width']) and trim($instance['layout_column_width'])) ? $instance['layout_column_width'] : 100;

// CSS Width
$CSS_width = $column_width.'px';

// Horizontal Space
$gutter = (isset($instance['layout_gutter']) and trim($instance['layout_gutter'])) ? $instance['layout_gutter'] : 10;

// Vertical Space
$margin = (isset($instance['layout_margin']) and trim($instance['layout_margin'])) ? $instance['layout_margin'] : 10;

// Pagination Type
$pagination = (isset($instance['layout_pagination']) and trim($instance['layout_pagination'])) ? $instance['layout_pagination'] : WBMPL_PG_NO;

// Generating javascript code of the widget
$javascript = '<script type="text/javascript">
var wbmpl_masonry'.$this->widget_id.';
var wbmpl_page'.$this->widget_id.' = '.$mplpage.';
jQuery(document).ready(function()
{
    wbmpl_masonry'.$this->widget_id.' = jQuery("#'.$this->posts->get_container_id($this->widget_id).' #wbmpl_masonry_'.$this->widget_id.'").masonry(
    {
        itemSelector: ".wbmpl_masonry_item",
        columnWidth: '.$column_width.',
        gutter: '.$gutter.'
    });'
    .($pagination == WBMPL_PG_LOAD_MORE ? '
    jQuery("#'.$this->posts->get_container_id($this->widget_id).' .wbmpl_pagination button").on("click", function()
    {
        wbmpl_paginate'.$this->widget_id.'()
    });' : '').'
});

function wbmpl_paginate'.$this->widget_id.'()
{
    wbmpl_page'.$this->widget_id.'++;
    if(wbmpl_page'.$this->widget_id.' > '.$total_pages.') return false;
    
    // Add loading Class
    jQuery("#'.$this->posts->get_container_id($this->widget_id).' .wbmpl_pagination").addClass("wbmpl-pagination-loading");
        
    jQuery.ajax(
    {
        url: "'.admin_url('admin-ajax.php').'",
        data: "action=wbmpl_load_items_masonry&'.http_build_query(array('instance'=>$instance)).'&mplpage="+wbmpl_page'.$this->widget_id.'+"&widget_id='.$this->widget_id.'",
        dataType: "json",
        type: "post",
        success: function(response)
        {
            var wbmpl_items = jQuery(response.html);
            wbmpl_masonry'.$this->widget_id.'.append(wbmpl_items).masonry("appended", wbmpl_items);
            
            // Remove loading Class
            jQuery("#'.$this->posts->get_container_id($this->widget_id).' .wbmpl_pagination").removeClass("wbmpl-pagination-loading");
            
            if(wbmpl_page'.$this->widget_id.' == '.$total_pages.')
            {
                jQuery("#'.$this->posts->get_container_id($this->widget_id).' .wbmpl_pagination").hide();
            }
        },
        error: function()
        {
        }
    });
}
</script>';

// Include javascript code into the footer
$this->factory->params('footer', $javascript);

// Generating CSS code of the widget
$CSS = '<style type="text/css">
#'.$this->posts->get_container_id($this->widget_id).' .wbmpl_masonry_item{margin-bottom: '.$margin.'px; width: '.$CSS_width.';}
</style>';

// Include CSS code into the footer
$this->factory->params('footer', $CSS);