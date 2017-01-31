<?php
/** no direct access **/
defined('_WBMPLEXEC_') or die();

// Define the animate layout class if not defined before
if(!class_exists('WBMPL_MPL_ticker_layout'))
{
    // Filter MPL widget Instance
    $this->filter('WBMPL_MPL_instance_ticker', array('WBMPL_MPL_ticker_layout','filter_instance'));
    
    /**
     * Webilia MPL ticker layout class
     * @author Webilia <info@webilia.com>
     */
    class WBMPL_MPL_ticker_layout
    {
        /**
         * Filter widget instance
         * @author Webilia <info@webilia.com>
         * @static
         * @param array $instance
         * @return array
         */
        public static function filter_instance($instance = array())
        {
            // Show post title by force
            $instance['display_show_title'] = '1';
            
            // Don't show post thumbnails
            $instance['thumb_show'] = '0';
            
            // Don't show post content
            $instance['display_show_content'] = '0';
            
            // Don't show post author
            $instance['display_show_author'] = '0';
            
            // Don't show post category
            $instance['display_show_category'] = '0';
            
            // Don't show post tags
            $instance['display_show_tags'] = '0';
            
            // Don't enclose the title in any HTML tag
            $instance['display_title_html_tag'] = '';
            
            return $instance;
        }
    }
}