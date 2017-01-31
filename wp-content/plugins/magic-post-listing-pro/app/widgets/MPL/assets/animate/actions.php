<?php
/** no direct access **/
defined('_WBMPLEXEC_') or die();

// Define the animate layout class if not defined before
if(!class_exists('WBMPL_MPL_animate_layout'))
{
    // Filter MPL widget Instance
    $this->filter('WBMPL_MPL_instance_animate', array('WBMPL_MPL_animate_layout','filter_instance'));
    
    /**
     * Webilia MPL animate layout class
     * @author Webilia <info@webilia.com>
     */
    class WBMPL_MPL_animate_layout
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
            // Don't show post author
            $instance['display_show_author'] = '0';
            
            // Don't show post date
            $instance['display_show_date'] = '0';
            
            // Don't show post category
            $instance['display_show_category'] = '0';
            
            // Don't show post tags
            $instance['display_show_tags'] = '0';
            
            return $instance;
        }
    }
}