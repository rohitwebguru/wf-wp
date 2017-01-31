<?php
/** no direct access **/
defined('_WBMPLEXEC_') or die();

/**
 * Webilia MPL PRO class.
 * @author Webilia <info@webilia.com>
 */
class WBMPL_pro extends WBMPL_base
{
    /**
     * Constructor method
     * @author Webilia <info@webilia.com>
     */
    public function __construct()
    {
        // MPL Posts library
        $this->posts = $this->getPosts();
        
        // MPL Main library
        $this->main = $this->getMain();
        
        // MPL DB library
        $this->db = $this->getDB();
        
        // MPL File library
        $this->file = $this->getFile();
        
        // MPL Folder library
        $this->folder = $this->getFolder();
        
        // MPL Factory library
        $this->factory = $this->getFactory();
        
        // MPL Request library
        $this->request = $this->getRequest();
    }
	
    /**
     * 
     * @author Webilia <info@webilia.com>
     * @param array $instance
     * @return string
     */
	public function mpl($instance = array())
	{
        // Force to array the instance
		if(!is_array($instance)) $instance = array();
        
        // Randomly generates a
        if(isset($instance['widget_id'])) $this->widget_id = $instance['widget_id'];
        else $this->widget_id = mt_rand(1000, 2000);
        
		// Set up some default widget settings
		$defaults = $this->posts->get_default_args();
		$instance = wp_parse_args((array) $instance, $defaults);
        
        $before_widget = '';
        $after_widget = '';
        $before_title = '';
        $after_title = '';
        
        // Get layout name
        $layout_name = str_replace('.php', '', $instance['display_layout']);
        
        // Apply instance filter, You can use this filter for changing the instance before rendering the widget.
        $instance = apply_filters('WBMPL_MPL_instance_'.$layout_name, $instance);
        
		// Render widget title based on widget settings
        $widget_title = $this->posts->render_widget_title(apply_filters('widget_title', $instance['widget_title']), $instance);
		$widget_title_url = $instance['widget_title_url'];
        
        // Get the post type from Widget settings
		$post_type = $instance['post_type'];
        
        // Pagination
        $mplpage = $this->request->getVar('mplpage', (isset($instance['mplpage']) ? $instance['mplpage'] : 1));
        $offset = ($mplpage-1)*$instance['listing_size'];
        $instance['listing_offset'] = $offset;
        
        // Generate query based on the widget settings
		$query = $this->posts->get_query($instance);
        
        // Get total posts for finding total pages
        $total = $this->posts->get_total_posts($query);
        $total_pages = ceil($total / $instance['listing_size']);
        
        // Get the posts from database
		$posts = $this->db->select($query);
        
        // Render the posts based on widget settings
		$rendered = $this->posts->render($posts, $instance);
		
        // Get Assets path of widget layout
        $assets_path = $this->main->import('app.widgets.MPL.assets.'.$layout_name.'.'.$layout_name, true, true);
        
        // Include asset file
        if($this->file->exists($assets_path)) include $assets_path;
        
        // Get layout path
        $layout_path = $this->posts->import('app.widgets.MPL.tmpl.'.$layout_name, true, true);
        
		ob_start();
        
        // Generate dynamic styles
        $this->posts->generate_dynamic_styles($instance, $this->widget_id);
        
        // Include the widget layout
		include $layout_path;
        
		return $output = ob_get_clean();
	}
    
    /**
     * Initialize MPL PRO update server for checking new versions of MPL PRO
     * @author Webilia <info@webilia.com>
     */
    public function update()
    {
        // Register a new filter for getting MPL PRO information from Webilia server
        $this->factory->filter('plugins_api', array($this, 'get_plugin_information'), 10, 3);
        
        // Register a new filter for getting MPL PRO information from Webilia server
        $this->factory->filter('pre_set_site_transient_update_plugins', array($this, 'check_latest_version'));
    }
    
    /**
     * Get Webilia MPL PRO information from Webilia server
     * @author Webilia <info@webilia.com>
     * @param boolean $false
     * @param string $action
     * @param array $args
     * @return object
     */
    public function get_plugin_information($false, $action, $args)
    {
        if($args->slug != _WBMPL_BASENAME_.'/MPL.php') return $false;
        
        // Webilia MPL plugin slug
        $slug = _WBMPL_BASENAME_.'/MPL.php';
        
        // Get MPL PRO information from Webilia server
        $args = array('command'=>'info', 'format'=>'serialize', 'plugin'=>'mpl', 'slug'=>$slug, 'action'=>'get-plugin-information');
        return $this->update_api_request($args);
    }
    
    /**
     * Check Latest version of Webilia MPL PRO
     * @author Webilia <info@webilia.com>
     * @param object $transient
     * @return object
     */
    public function check_latest_version($transient)
    {
        if(empty($transient->checked)) return $transient;
        
        // Webilia MPL Plugin Slug
        $slug = _WBMPL_BASENAME_.'/MPL.php';
        
        $args = array('command'=>'update', 'format'=>'serialize', 'plugin'=>'mpl', 'slug'=>$slug, 'action'=>'check-latest-version');
        $response = $this->update_api_request($args);
        
        // There is a new update for MPL PRO or not
        if(version_compare($response->new_version, $transient->checked[$slug], '>')) $transient->response[$slug] = $response;
        
        return $transient;
    }
    
    /**
     * Requests to MPL PRO update server for getting the update
     * @author Webilia <info@webilia.com>
     * @param array $args
     * @return boolean
     */
    public function update_api_request($args)
    {
        // Send request to webilia update server
        $request = wp_remote_post('http://webilia.com/io/io.php', array('body'=>$args));
        if(is_wp_error($request) or 200 != wp_remote_retrieve_response_code($request)) return false;
        
        // Unserialize the update response
        $response = unserialize(wp_remote_retrieve_body($request));
        
        if(is_object($response)) return $response;
        else return false;
    }
    
    /**
     * Check if MPL rans as a widget
     * @author Webilia <info@webilia.com>
     * @return boolean
     */
    public function isWidget()
    {
        return false;
    }
}