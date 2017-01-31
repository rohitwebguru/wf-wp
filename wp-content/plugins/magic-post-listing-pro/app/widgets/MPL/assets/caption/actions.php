<?php
/** no direct access **/
defined('_WBMPLEXEC_') or die();

// Define the caption layout class if not defined before
if(!class_exists('WBMPL_MPL_caption_layout'))
{
    // Filter MPL widget Instance
    $this->filter('WBMPL_MPL_instance_caption', array('WBMPL_MPL_caption_layout','filter_instance'));

    /**
     * Webilia MPL caption layout class
     * @author Webilia <info@webilia.com>
     */
    class WBMPL_MPL_caption_layout
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
            
            // Don't link the post title
            $instance['display_link_title'] = '1';
            
            // Show the post images by force
            $instance['thumb_show'] = '1';
            
            // Skip posts without image
            $instance['thumb_skip'] = '1';
            
            // Link the widget by force
            $instance['thumb_link'] = '1';
            
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

// Define the caption AJAX class if not defined before
if(!class_exists('WBMPL_MPL_caption_actions'))
{
    /**
     * Webilia MPL caption actions class
     * @author Webilia <info@webilia.com>
     */
    class WBMPL_MPL_caption_actions extends WBMPL_base
    {
        /**
        * Constructor method
        * @author Webilia <info@webilia.com>
        */
       public function __construct()
       {
           // MPL Main library
           $this->main = $this->getMain();

           // MPL Request library
           $this->request = $this->getRequest();
       }
    
        /**
         * Load AJAX Items
         * @author Webilia <info@webilia.com>
         * @static
         * @param array $instance
         * @return array
         */
        public function load_items()
        {
            $instance = $this->request->getVar('instance', array());
            $instance['mpl_return_items'] = true;
            $instance['widget_id'] = $this->request->getVar('widget_id', mt_rand(1000, 2000));
            
            $output = '';
            
            // Check MPL PRO
            $pro = $this->getPRO();
            
            // If it is MPL PRO, then load the items
            if($pro)
            {
                $JSON = $pro->mpl($instance);
                $results = json_decode($JSON, true);
                
                $output = isset($results['html']) ? $results['html'] : '';
            }
            
            echo json_encode(array('success'=>1, 'html'=>$output));
            exit;
        }
    }
    
    $WBMPL_MPL_caption_actions = new WBMPL_MPL_caption_actions();
    
    // Add default AJAX actions
    $this->action('wp_ajax_wbmpl_load_items_caption', array($WBMPL_MPL_caption_actions, 'load_items'));
    $this->action('wp_ajax_nopriv_wbmpl_load_items_caption', array($WBMPL_MPL_caption_actions, 'load_items'));
}