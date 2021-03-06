<?php
/**
 * This is an auxiliary class to help display the info
 * on your CatList instance.
 * @author fernando@picandocodigo.net
 */
require_once 'lcp-catlist.php';
class CatListDisplayer {
  private $catlist;
  private $params = array();
  private $lcp_output;
  public static function getTemplatePaths(){
    $template_path = TEMPLATEPATH . "/list-category-posts/";
    $stylesheet_path = STYLESHEETPATH . "/list-category-posts/";
    return array($template_path, $stylesheet_path);
  }
  public function __construct($atts) {
    $this->params = $atts;
    $this->catlist = new CatList($atts);
    global $post;
    $this->parent = $post;
  }
  public function display(){
    $this->catlist->save_wp_query();
    $this->catlist->get_posts();
    $this->select_template();
    $this->catlist->restore_wp_query();
    wp_reset_query();
    return $this->lcp_output;
  }
  private function select_template(){
    // Check if we got a template param:
    if (isset($this->params['template']) &&
      !empty($this->params['template'])){
      // The default values for ul, ol and div:
      if (preg_match('/^ul$|^div$|^ol$/i', $this->params['template'], $matches)){
        $this->build_output($matches[0]);
      } else {
        // Else try an actual template from the params
        $this->template();
      }
    } else {
      // Default:
      $this->build_output('ul');
    }
  }
  /**
   * Template code
   */
  private function template(){
    $tplFileName = null;
    $template_param = $this->params['template'];
    $templates = array();
    // Get templates paths and add the incoming parameter to search
    // for the php file:
    if($template_param){
      $paths = self::getTemplatePaths();
      foreach($paths as $path){
        $templates[] = $path . $template_param . '.php';
      }
    }
    // Check if we can read the template file:
    foreach ($templates as $file) :
      if ( is_file($file) && is_readable($file) ) :
        $tplFileName = $file;
      endif;
    endforeach;

    if($tplFileName){
      require($tplFileName);
    } else {
      $this->build_output('ul');
    }
  }
  public static function get_templates($param = null){
    $templates = array();
    $paths = self::getTemplatePaths();
    foreach ($paths as $templatePath){
      if (is_dir($templatePath) && scandir($templatePath)){
        foreach (scandir($templatePath) as $file){
          // Check that the files found are well formed
          if ( ($file[0] != '.') && (substr($file, -4) == '.php') &&
          is_file($templatePath.$file) && is_readable($templatePath.$file) ){
            $templateName = substr($file, 0, strlen($file)-4);
            // Add the template only if necessary
            if (!in_array($templateName, $templates)){
              $templates[] = $templateName;
            }
          }
        }
      }
    }
    return $templates;
  }
  private function build_output($tag){
    $this->category_title();
    $this->get_category_description();
    $this->lcp_output .= '<' . $tag;
    // Follow the numner of posts in an ordered list with pagination
    if( $tag == 'ol' && $this->catlist->get_page() > 1 ){
      $start = $this->catlist->get_number_posts() * ($this->catlist->get_page() - 1) + 1;
      $this->lcp_output .= ' start="' .  $start . '" ';
    }
    //Give a class to wrapper tag
    if (isset($this->params['class'])):
      $this->lcp_output .= ' class="' . $this->params['class'] . ' dummy"';
    endif;
    //Give id to wrapper tag
    if (isset($this->params['instance'])){
      $this->lcp_output .= ' id="lcp_instance_' . $this->params['instance'] . '"';
    }
    $this->lcp_output .= '>';
    $inner_tag = ( ($tag == 'ul') || ($tag == 'ol') ) ? 'li' : 'p';
    $this->lcp_output .= $this->get_conditional_title();
    //Posts loop
    global $post;
	$arr	=	array();
   while ( have_posts() ) : the_post();
      if ( !post_password_required($post) 
	  		||( post_password_required($post)
			&& ( isset($this->params['show_protected'])
			&& $this->params['show_protected'] == 'yes'))):
			array_push($arr,$post->ID);			
   #Default	# $this->lcp_output .= $this->lcp_build_post($post, $inner_tag);			
      endif;
    endwhile;	
	
	$nposts	=	$this->short_post_by_event_date($arr);
	for($i = 0; $i <count($nposts); $i++){
		$id =$nposts[$i];
		$npost = get_post($id);		
		$this->lcp_output .= $this->lcp_build_post($npost, $inner_tag);
	}
	
    if ( ($this->catlist->get_posts_count() == 0)&&($this->params["no_posts_text"] != '') ) {
      $this->lcp_output .= $this->params["no_posts_text"];
    }    
    $this->lcp_output .= '</' . $tag . '>';    
    $this->lcp_output .= $this->get_morelink();
    $this->lcp_output .= $this->get_pagination();
  }  
  	public function short_post_by_event_date($arr){
	  $arr1	=	array();
	  $arr2	=	array();
		for($i = 0; $i <count($arr); $i++){
			$id	=	$arr[$i];
			$date	=	get_post_meta($id,'event_info_start_date',true);
			if($date){
				$narr	=	array('id'=>$id,'datetime'=>$date);
			}
			else{
				$narr	=	array('id'=>$id,'datetime'=>'2030-02-28');
			}
			array_push($arr1,$narr);
		}
	 	usort($arr1, array($this,'date_compare'));
		for($j=0;$j<count($arr1);$j++){
			$nid	=	$arr1[$j]['id'];
			array_push($arr2,$nid);
		}
		return array_reverse($arr2);
  	}
  	function date_compare($a, $b){
		$t1 = strtotime($a['datetime']);
		$t2 = strtotime($b['datetime']);
		return $t1-$t2;
	}
  public function get_pagination(){
    $pag_output = '';
    $lcp_pag_param_present = !empty($this->params['pagination']);
    if ($lcp_pag_param_present && $this->params['pagination'] == "yes" ||
        (get_option('lcp_pagination') === 'true' && ($lcp_pag_param_present && $this->params['pagination'] !== 'false'))):
      $lcp_paginator = '';
      $number_posts = $this->catlist->get_number_posts();
      $pages_count = ceil (
        $this->catlist->get_posts_count() /
        # Avoid dividing by 0 (pointed out by @rhj4)
        max( array( 1, $number_posts ) )
      );
      if ($pages_count > 1){
        for($i = 1; $i <= $pages_count; $i++){
          $lcp_paginator .=  $this->lcp_page_link($i);
        }
        $pag_output .= "<ul class='lcp_paginator'>";
        // Add "Previous" link
        if ($this->catlist->get_page() > 1){
          $pag_output .= $this->lcp_page_link( intval($this->catlist->get_page()) - 1, $this->params['pagination_prev'] );
        }
        $pag_output .= $lcp_paginator;
        // Add "Next" link
        if ($this->catlist->get_page() < $pages_count){
          $pag_output .= $this->lcp_page_link( intval($this->catlist->get_page()) + 1, $this->params['pagination_next']);
        }
        $pag_output .= "</ul>";
      }
    endif;
    return $pag_output;
  }
  private function lcp_page_link($page, $char = null){
    $current_page = $this->catlist->get_page();
    $link = '';
    if ($page == $current_page){
      $link = "<li class='lcp_currentpage'>$current_page</li>";
    } else {
      $request_uri = $_SERVER['REQUEST_URI'];
      $query = $_SERVER['QUERY_STRING'];
      $amp = ( strpos( $request_uri, "?") ) ? "&" : "";
      $pattern = "/[&|?]?lcp_page" . preg_quote($this->catlist->get_instance()) . "=([0-9]+)/";
      $query = preg_replace($pattern, '', $query);
      $url = strtok($request_uri,'?');
      $protocol = "http";
      $port = $_SERVER['SERVER_PORT'];
      if ( (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') || $port == 443){
        $protocol = "https";
      }
      $http_host = $_SERVER['HTTP_HOST'];
      $page_link = "$protocol://$http_host$url?$query" .
        $amp . "lcp_page" . $this->catlist->get_instance() . "=". $page .
        "#lcp_instance_" . $this->catlist->get_instance();
      $link .=  "<li><a href='$page_link' title='$page'>";
      ($char != null) ? ($link .= $char) : ($link .= $page);
      $link .= "</a></li>";
    }
    // WA: Replace '?&' by '?' to avoid potential redirection problems later on
    $link = str_replace('?&', '?', $link );
    return $link;
  }
  private function lcp_build_post($single, $tag){
    $class ='';
    $tag_css = '';
    if ( is_object($this->parent) && is_object($single) && $this->parent->ID == $single->ID ){
      $class = 'current';
    }
    if ( $this->params['tags_as_class'] == 'yes' ) {
      $post_tags = wp_get_post_Tags($single->ID);
      if ( !empty($post_tags) ){
        foreach ($post_tags as $post_tag) {
          $class .= " $post_tag->slug ";
        }
      }
    }
    if ( !empty($class) ){
      $tag_css = 'class="' . $class . '"';
    }
	$postid = $single->ID;	## Current Post id
	$has_event_date	=	get_post_meta($postid,'event_info_start_date',true);
	$event_date	=	strtotime($has_event_date);
	$crnt_date			=	strtotime(date('y-m-d'));	
	if($event_date>$crnt_date){		
			$hide_upcoming	=	$this->params['hide_upcoming'];
			if($hide_upcoming== 'yes')	{				
				$custom_class	=	'post-hide';
			}
			else{
				
				$custom_class	=	'post-show';
			}
			$lcp_display_output = '<'. $tag . ' ' . $tag_css .' id="pid'.$postid .'" class='.$custom_class.'>';
	}
	else{
    $lcp_display_output = '<'. $tag . ' ' . $tag_css . ' id="pid'.$postid .'">';
	}
	
	$video_meta	=	get_post_meta($postid,'event_info_video',true);
	if($video_meta){
		$lcp_display_output .= '<a href="'.get_permalink($postid).'">';
	$lcp_display_output .= '<img class="mf_icon" src="'.plugins_url().'/cf-list-category-posts/img/youtube-512.png">';
		$lcp_display_output .= '</a>';
	}
	
	$lcp_display_output .=	'<div class="lcpDisplay">';
    // Comments count
    $lcp_display_output .= $this->get_stuff_with_tags_and_classes('comments', $single);
    // Date
    if (!empty($this->params['date_tag']) || !empty($this->params['date_class'])):
      $lcp_display_output .= $this->get_date($single,
                                             $this->params['date_tag'],
                                             $this->params['date_class']);
    else:
      $lcp_display_output .= $this->get_date($single);
    endif;
    // Date Modified
    if (!empty($this->params['date_modified_tag']) || !empty($this->params['date_modified_class'])):
      $lcp_display_output .= $this->get_modified_date($single,
                                             $this->params['date_modified_tag'],
                                             $this->params['date_modified_class']);
    else:
      $lcp_display_output .= $this->get_modified_date($single);
    endif;
    // Author
    $lcp_display_output .= $this->get_stuff_with_tags_and_classes('author', $single);
    // Display ID
    if (!empty($this->params['display_id']) && $this->params['display_id'] == 'yes'){
        $lcp_display_output .= $single->ID;
    }
    // Custom field display
    $lcp_display_output .= $this->get_custom_fields($single);
    #$lcp_display_output .= $this->get_thumbnail($single);
	$lcp_display_output .= get_the_post_thumbnail($single->ID,'full');
    $lcp_display_output .= $this->get_stuff_with_tags_and_classes('content', $single);	
	$lcp_display_output	.=	'</div>';
	$lcp_display_output	.= '<div class="lcpContent">';
	#############
	if ( empty($this->params['no_post_titles']) || !empty($this->params['no_post_titles']) && $this->params['no_post_titles'] !== 'yes' ) {
      $lcp_display_output .= $this->get_post_title($single);
    }
	$eisname	=	get_post_meta($single->ID, 'event_info_speaker_name', true);
	$eistitle	=	get_post_meta($single->ID,'event_info_speaker_title',true);
	if($eisname){
		$lcp_display_output	.=	'<span class="spNm">'.$eisname.'</span>';
	}
	if($eistitle){
		$lcp_display_output .=	', <span class="spTt">'.$eistitle.'</span>';
	}
	$oDate = get_post_meta($single->ID, 'event_info_start_date', true);
	if($oDate){
		$lcp_display_output.='<br>';
		$post_date	=date('d F, Y',strtotime($oDate));
		$current_date	=	date('d F, Y');
		
		$pdate	=	strtotime($post_date);
		$cdate	=	strtotime($current_date);
		if($pdate>=$cdate){
			$lcp_display_output	.= date('d F, Y',strtotime($oDate));
		}
			//if(date('d F, Y',strtotime($oDate)) >= $current_date){
				//$lcp_display_output	.= date('d F, Y',strtotime($oDate));
			//}
			//else{
				//$lcp_display_output	.='';
			//}
	}
	$lcp_display_output .=	'<p>';
    if (!empty($this->params['excerpt_tag'])):
      if (!empty($this->params['excerpt_class'])):
        $lcp_display_output .= $this->get_excerpt($single,
                                     $this->params['excerpt_tag'],
                                     $this->params['excerpt_class']);
      else:
        $lcp_display_output .= $this->get_excerpt($single, $this->params['excerpt_tag']);
      endif;
    else:
      $lcp_display_output .= $this->get_excerpt($single);
    endif;
	$lcp_display_output	.=	'</p>';
	$lcp_display_output .='</div>';
   	$lcp_display_output .= $this->get_posts_morelink($single);
    $lcp_display_output .= '</' . $tag . '>';
    return $lcp_display_output;
	
  }
  
  private function get_stuff_with_tags_and_classes($entity, $single){
    $result = '';
    $stuffFunction = 'get_' . $entity;
    if (!empty($this->params[$entity . '_tag'])):
      if (!empty($this->params[$entity . '_class'])):
        $result = $this->$stuffFunction($single, $this->params[$entity . '_tag'], $this->params[$entity . '_class']);
      else:
        $result = $this->$stuffFunction($single, $this->params[$entity . '_tag']);
      endif;
    else:
      $result = $this->$stuffFunction($single);
    endif;
    return $result;
  }
  
  private function category_title(){
    // More link
    if (!empty($this->params['catlink_tag'])):
      if (!empty($this->params['catlink_class'])):
        $this->lcp_output .= $this->get_category_link(
          $this->params['catlink_tag'],
          $this->params['catlink_class']
        );
      else:
        $this->lcp_output .= $this->get_category_link($this->params['catlink_tag']);
      endif;
    else:
      $this->lcp_output .= $this->get_category_link("strong");
    endif;
  }
  public function get_category_description(){
    if(!empty($this->params['category_description']) && $this->params['category_description'] == 'yes'){
      $this->lcp_output .= $this->catlist->get_category_description();
    }
  }
  /**
   * Auxiliary functions for templates
   */
  private function get_comments($single, $tag = null, $css_class = null){
    return $this->content_getter('comments', $single, $tag, $css_class);
  }
  private function get_author($single, $tag = null, $css_class = null){
    return $this->content_getter('author', $single, $tag, $css_class);
  }
  private function get_content($single, $tag = null, $css_class = null){
    return $this->content_getter('content', $single, $tag, $css_class);
  }
  private function get_excerpt($single, $tag = null, $css_class = null){
    return $this->content_getter('excerpt', $single, $tag, $css_class);
  }
/*
 * These used to be separate functions, now starting to get the code
 * in the same function for less repetition.
 */
  private function content_getter($type, $post, $tag = null, $css_class = null) {
    $info = '';
    switch( $type ){
    case 'comments':
      $info = $this->catlist->get_comments_count($post);
      break;
    case 'author':
      $info = $this->catlist->get_author_to_show($post);
      break;
    case 'content':
      $info = $this->catlist->get_content($post);
      break;
    case 'excerpt':
      $info = $this->catlist->get_excerpt($post);
      $info = preg_replace('/\[.*\]/', '', $info);
    }
    return $this->assign_style($info, $tag, $css_class);
  }
  private function get_conditional_title(){
    if(!empty($this->params['conditional_title_tag']))
      $tag = $this->params['conditional_title_tag'];
    else
      $tag = 'h3';
    if(!empty($this->params['conditional_title_class']))
      $class = $this->params['conditional_title_class'];
    else
      $class = '';
    return $this->assign_style($this->catlist->get_conditional_title(), $tag, $class);
  }
  private function get_custom_fields($single){
    if(!empty($this->params['customfield_display'])){
      $info = $this->catlist->get_custom_fields($this->params['customfield_display'], $single->ID);
      if(empty($this->params['customfield_tag']) || $this->params['customfield_tag'] == null){
        $tag = 'div';
      } else {
        $tag = $this->params['customfield_tag'];
      }
      if(empty($this->params['customfield_class']) || $this->params['customfield_class'] == null){
        $css_class = 'lcp_customfield';
      } else {
        $css_class = $this->params['customfield_class'];
      }
      $final_info = '';
      if(!is_array($info)){
        $final_info = $this->assign_style($info, $tag, $css_class);
      }else{
        if($this->params['customfield_display_separately'] != 'no'){
          foreach($info as $i)
            $final_info .= $this->assign_style($i, $tag, $css_class);
        }else{
          $one_info = implode($this->params['customfield_display_glue'], $info);
          $final_info = $this->assign_style($one_info, $tag, $css_class);
        }
      }
      return $final_info;
    }
  }
  private function get_date($single, $tag = null, $css_class = null){
    $info = $this->catlist->get_date_to_show($single);
    if ( !empty($this->params['link_dates']) && ( 'yes' === $this->params['link_dates'] || 'true' === $this->params['link_dates'] ) ):
      $info = $this->get_post_link($single, $info);
    endif;
    $info = ' ' . $info;
    return $this->assign_style($info, $tag, $css_class);
  }
  private function get_modified_date($single, $tag = null, $css_class = null){
    $info = " " . $this->catlist->get_modified_date_to_show($single);
    return $this->assign_style($info, $tag, $css_class);
  }
  private function get_thumbnail($single, $tag = null){
    if ( !empty($this->params['thumbnail_class']) ) :
      $lcp_thumb_class = $this->params['thumbnail_class'];
      $info = $this->catlist->get_thumbnail($single, $lcp_thumb_class);
    else:
      $info = $this->catlist->get_thumbnail($single);
    endif;
    return $this->assign_style($info, $tag);
  }
  private function get_post_link($single, $text, $class = null){
    $info = '<a href="' . get_permalink($single->ID) . '" title="' . wptexturize($single->post_title) . '"';
    if ( !empty($this->params['link_target']) ):
      $info .= ' target="' . $this->params['link_target'] . '"';
    endif;
    if ( !empty($class ) ):
      $info .= ' class="' . $class . '"';
    endif;
    $info .= '>' . $text . '</a>';
    return $info;
  }
  // Link is a parameter here in case you want to use it on a template
  // and not show the links for all the shortcodes using this template:
  private function get_post_title($single, $tag = null, $css_class = null, $link = true){
    $lcp_post_title = apply_filters('the_title', $single->post_title, $single->ID);
    if ( !empty($this->params['title_limit']) && $this->params['title_limit'] !== "0" ):
      $title_limit = intval($this->params['title_limit']);
      if( function_exists('mb_strlen') && function_exists('mb_substr') ):
        if( mb_strlen($lcp_post_title) > $title_limit ):
          $lcp_post_title = mb_substr($lcp_post_title, 0, $title_limit) . "&hellip;";
        endif;
      else:
        if( strlen($lcp_post_title) > $title_limit ):
          $lcp_post_title = substr($lcp_post_title, 0, $title_limit) . "&hellip;";
        endif;
      endif;
    endif;
    if (!empty($this->params['title_tag'])){
      $pre = "<" . $this->params['title_tag'];
      if (!empty($this->params['title_class'])){
        $pre .= ' class="' . $this->params['title_class'] . '"';
      }
      $pre .= '>';
      $post = "</" . $this->params['title_tag'] . ">";
    }else{
      $pre = $post = '';
    }
    if ( !$link ||
         (!empty($this->params['link_titles']) &&
          ( $this->params['link_titles'] === "false" || $this->params['link_titles'] === "no" ) ) ) {
      return $pre . $lcp_post_title . $post;
    }
    $info = $this->get_post_link($single, $lcp_post_title, (!empty($this->params['title_class']) && empty($this->params['title_tag'])) ? $this->params['title_class'] : null);
    if( !empty($this->params['post_suffix']) ):
      $info .= " " . $this->params['post_suffix'];
    endif;
    $info = $pre . $info . $post;
    if( $tag !== null || $css_class !== null){
      $info = $this->assign_style($info, $tag, $css_class);
    }
    return $info;
  }
  private function get_posts_morelink($single){
    if(!empty($this->params['posts_morelink'])){
      $href = 'href="' . get_permalink($single->ID) . '"';
      $class = "";
      if ( !empty($this->params['posts_morelink_class']) ):
        $class = 'class="' . $this->params['posts_morelink_class'] . '" ';
      endif;
      $readmore = $this->params['posts_morelink'];
      return ' <a ' . $href . ' ' . $class . ' >' . $readmore . '</a>';
    }
  }
  private function get_category_link($tag = null, $css_class = null){
    $info = $this->catlist->get_category_link();
    return $this->assign_style($info, $tag, $css_class);
  }
  private function get_morelink(){
    $info = $this->catlist->get_morelink();
    if ( !empty($this->params['morelink_tag'])){
      if( !empty($this->params['morelink_class']) ){
        return "<" . $this->params['morelink_tag'] . " class='" .
          $this->params['morelink_class'] . "'>" . $info .
          "</" . $this->params["morelink_tag"] . ">";
      } else {
        return "<" . $this->params['morelink_tag'] . ">" .
          $info . "</" . $this->params["morelink_tag"] . ">";
      }
    } else{
      if ( !empty($this->params['morelink_class']) ){
        return str_replace("<a", "<a class='" . $this->params['morelink_class'] . "' ", $info);
      }
    }
    return $info;
  }
  public function get_category_count(){
    return $this->catlist->get_category_count();
  }
  private function assign_style($info, $tag = null, $css_class = null){
     if (!empty($info)):
      if (empty($tag) && !empty($css_class)):
        $tag = "span";
      elseif (empty($tag)):
        return $info;
      elseif (!empty($tag) && empty($css_class)) :
        return '<' . $tag . '>' . $info . '</' . $tag . '>';
      endif;
      $css_class = sanitize_html_class($css_class);
      return '<' . $tag . ' class="' . $css_class . '">' . $info . '</' . $tag . '>';
    endif;
  }
}