<?php
/** no direct access **/
defined('_WBMPLEXEC_') or die();

// Caption Style
$caption_style = (isset($instance['layout_caption_style']) and trim($instance['layout_caption_style'])) ? $instance['layout_caption_style'] : 6;

// Pagination Type
$pagination = (isset($instance['layout_pagination']) and trim($instance['layout_pagination'])) ? $instance['layout_pagination'] : WBMPL_PG_NO;

if($pagination == WBMPL_PG_LOAD_MORE and $this->main->getPRO())
{
    // Generating javascript code of the widget
    $javascript = '<script type="text/javascript">
    var wbmpl_page'.$this->widget_id.' = '.$mplpage.';
    jQuery(document).ready(function()
    {
        jQuery("#'.$this->posts->get_container_id($this->widget_id).' .wbmpl_pagination button").on("click", function()
        {
            wbmpl_paginate'.$this->widget_id.'()
        });
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
            data: "action=wbmpl_load_items_caption&'.http_build_query(array('instance'=>$instance)).'&mplpage="+wbmpl_page'.$this->widget_id.'+"&widget_id='.$this->widget_id.'",
            dataType: "json",
            type: "post",
            success: function(response)
            {
                // Append Items
                jQuery("#'.$this->posts->get_container_id($this->widget_id).' ul").append(response.html);
                
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
}