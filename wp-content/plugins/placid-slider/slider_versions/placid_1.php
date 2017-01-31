<?php 
function placid_carousel_posts_on_slider($max_posts, $offset=0, $slider_id = '1',$out_echo = '1',$set='') {
    global $placid_slider;
	$placid_slider_options='placid_slider_options'.$set;
    $placid_slider_curr=get_option($placid_slider_options);
	if(!isset($placid_slider_curr) or !is_array($placid_slider_curr) or empty($placid_slider_curr)){$placid_slider_curr=$placid_slider;$set='';}
		
	global $wpdb, $table_prefix;
	$table_name = $table_prefix.PLACID_SLIDER_TABLE;
	$post_table = $table_prefix."posts";
	$rand = $placid_slider_curr['rand'];
	if(isset($rand) and $rand=='1'){
	  $orderby = 'RAND()';
	}
	else {
	  $orderby = 'a.slide_order ASC, a.date DESC';
	}
	
	$posts = $wpdb->get_results("SELECT a.post_id, a.date FROM 
	                             $table_name a LEFT OUTER JOIN $post_table b 
								 ON a.post_id = b.ID 
								 WHERE (b.post_status = 'publish' OR (b.post_type='attachment' AND b.post_status = 'inherit')) AND a.slider_id = '$slider_id' 
	                             ORDER BY ".$orderby." LIMIT $offset, $max_posts", OBJECT);
	
	$placid_slider_css = placid_get_inline_css($set);
	$html = '';
	$placid_sldr_j = 0;
	
	//Timthummb
		$timthumb='1';
		if($placid_slider_curr['timthumb']=='1'){
			$timthumb='0';
		}
	
	foreach($posts as $post) {
		$id = $post->post_id;
		$posts_table = $table_prefix.'posts'; 
		$sql_post = "SELECT * FROM $posts_table WHERE ID = $id";
		$rs_post = $wpdb->get_results("SELECT * FROM $posts_table WHERE ID = $id", OBJECT);
		$data = $rs_post[0];
		
		$post_title = stripslashes($data->post_title);
		$post_title = str_replace('"', '', $post_title);
		$slider_content = $data->post_content;

		$post_id = $data->ID;
		
            $placid_slide_redirect_url = get_post_meta($post_id, 'placid_slide_redirect_url', true);
			$placid_sslider_nolink = get_post_meta($post_id,'placid_sslider_nolink',true);
			trim($placid_slide_redirect_url);
			if(!empty($placid_slide_redirect_url) and isset($placid_slide_redirect_url)) {
			   $permalink = $placid_slide_redirect_url;
			}
			else{
			   $permalink = get_permalink($post_id);
			}
			if($placid_sslider_nolink=='1'){
			  $permalink='';
			}
			
			$placid_sldr_j++;
		
		$html .= '<div class="placid_slideri" '.$placid_slider_css['placid_slideri'].'>
			<!-- placid_slideri -->';
			
		if($placid_slider_curr['show_content']=='1'){
			if ($placid_slider_curr['content_from'] == "slider_content") {
				$slider_content = get_post_meta($post_id, 'slider_content', true);
			}
			if ($placid_slider_curr['content_from'] == "excerpt") {
				$slider_content = $data->post_excerpt;
			}

			$slider_content = strip_shortcodes( $slider_content );

			$slider_content = stripslashes($slider_content);
			$slider_content = str_replace(']]>', ']]&gt;', $slider_content);
	
			$slider_content = str_replace("\n","<br />",$slider_content);
			$slider_content = strip_tags($slider_content, $placid_slider_curr['allowable_tags']);
			
			if(!$placid_slider_curr['content_limit'] or $placid_slider_curr['content_limit'] == '' or $placid_slider_curr['content_limit'] == ' ') 
			  $slider_excerpt = substr($slider_content,0,$placid_slider_curr['content_chars']);
			else 
			  $slider_excerpt = placid_slider_word_limiter( $slider_content, $limit = $placid_slider_curr['content_limit'] );
			$slider_excerpt='<span '.$placid_slider_css['placid_slider_span'].'> '.$slider_excerpt.'</span>';
		}
		else{
		    $slider_excerpt='';
		}
		
		if($placid_slider_curr['img_pick'][0] == '1'){
		 $custom_key = array($placid_slider_curr['img_pick'][1]);
		}
		else {
		 $custom_key = '';
		}
		
		if($placid_slider_curr['img_pick'][2] == '1'){
		 $the_post_thumbnail = true;
		}
		else {
		 $the_post_thumbnail = false;
		}
		
		if($placid_slider_curr['img_pick'][3] == '1'){
		 $attachment = true;
		 $order_of_image = $placid_slider_curr['img_pick'][4];
		}
		else{
		 $attachment = false;
		 $order_of_image = '1';
		}
		
		if($placid_slider_curr['img_pick'][5] == '1'){
			 $image_scan = true;
		}
		else {
			 $image_scan = false;
		}
		
		$gti_width = $placid_slider_curr['img_width'];
	    $gti_height = $placid_slider_curr['img_height'];
		
		if($placid_slider_curr['crop'] == '0'){
		 $extract_size = 'full';
		}
		elseif($placid_slider_curr['crop'] == '1'){
		 $extract_size = 'large';
		}
		elseif($placid_slider_curr['crop'] == '2'){
		 $extract_size = 'medium';
		}
		else{
		 $extract_size = 'thumbnail';
		}
		
		$img_args = array(
			'custom_key' => $custom_key,
			'post_id' => $post_id,
			'attachment' => $attachment,
			'size' => $extract_size,
			'the_post_thumbnail' => $the_post_thumbnail,
			'default_image' => false,
			'order_of_image' => $order_of_image,
			'link_to_post' => false,
			'image_class' => 'placid_slider_thumbnail',
			'image_scan' => $image_scan,
			'width' => $gti_width,
			'height' => $gti_height,
			'echo' => false,
			'permalink' => $permalink,
			'timthumb'=>$timthumb,
			'style'=> $placid_slider_css['placid_slider_thumbnail']
		);
			
		$html .=  placid_sslider_get_the_image($img_args);
		
		  		
		if ($placid_slider_curr['image_only'] == '1') { 
			$html .= '<!-- /placid_slideri -->
			</div>';
		}
		else {
		   if($permalink!='') {
			$html .= '<div class="placid_text" '.$placid_slider_css['placid_text'].'><h2 '.$placid_slider_css['placid_slider_h2'].'><a href="'.$permalink.'" '.$placid_slider_css['placid_slider_h2_a'].'>'.$post_title.'</a></h2>
			    '.$slider_excerpt;
			if($placid_slider_curr['show_content']=='1'){
			  $placid_more=$placid_slider_curr['more'];
			  if($placid_more and !empty($placid_more) ){
			      $html .= '<p class="more"><a href="'.$permalink.'" '.$placid_slider_css['placid_slider_p_more'].'>'.$placid_slider_curr['more'].'</a></p>';
			  }
			}
			 $html .= '	<!-- /placid_slideri -->
			</div></div>'; }
		   else{
		   $html .= '<div class="placid_text" '.$placid_slider_css['placid_text'].'><h2 '.$placid_slider_css['placid_slider_h2'].'>'.$post_title.'</h2>
		            '.$slider_excerpt.'
				<!-- /placid_slideri -->
			</div></div>';    }
		}
	}
	if($out_echo == '1') {
	   echo $html;
	}
	$r_array = array( $placid_sldr_j, $html);
	return $r_array;
}

function get_placid_slider($slider_id='',$set='') {
    global $placid_slider; 
 	$placid_slider_options='placid_slider_options'.$set;
    $placid_slider_curr=get_option($placid_slider_options);
	if(!isset($placid_slider_curr) or !is_array($placid_slider_curr) or empty($placid_slider_curr)){$placid_slider_curr=$placid_slider;$set='';}
	 
 if($placid_slider['multiple_sliders'] == '1' and is_singular() and (empty($slider_id) or !isset($slider_id))){
    global $post;
	$post_id = $post->ID;
    $slider_id = get_placid_slider_for_the_post($post_id);
 }
if(empty($slider_id) or !isset($slider_id)){
  $slider_id = '1';
}
if(!empty($slider_id)){
$r_array = placid_carousel_posts_on_slider($placid_slider_curr['no_posts'], $offset=0, $slider_id, '0', $set); $placid_sldr_j = $r_array[0];
$slider_handle='placid_slider_'.$slider_id;
if($placid_slider_curr['estimatedwidth']>0) $estimatedwidth='estimatedwidth:'.$placid_slider_curr['estimatedwidth'].',';
else $estimatedwidth='';
$iwidth=$placid_slider_curr['iwidth'];
if(empty($iwidth) or $iwidth='' ) $variable='variable:true,';
else $variable='';
?>
    <script type="text/javascript"> 
<?php if(!isset($placid_slider_curr['fouc']) or $placid_slider_curr['fouc']=='0' ){?>
	jQuery('html').addClass('placid_slider_fouc');
	jQuery(document).ready(function() {
	   jQuery(".placid_slider_fouc .placid_slider").css({'display' : 'block'});
	});
<?php } ?>	
		jQuery(document).ready(function() {
			jQuery("#<?php echo $slider_handle;?>").simplyScroll({
				className: 'placid_slider_instance',
				<?php if ($placid_slider_curr['prev_next'] == 1){ ?>
				   autoMode: 'off',
				<?php } else {?>
				   autoMode: 'loop',
			    <?php } ?>
				<?php echo $variable; ?>
				<?php echo $estimatedwidth; ?>
				speed:<?php echo $placid_slider_curr['speed']; ?>
		    });
		});
	</script> 

<noscript><p><strong><?php echo $placid_slider['noscript'];?></strong></p></noscript>

<?php $placid_slider_css = placid_get_inline_css($set); ?>

<div class="placid_slider" <?php echo $placid_slider_css['placid_slider'];?>>
  <?php 
	if($placid_slider_curr['title_from']=='1') $sldr_title = get_placid_slider_name($slider_id);
	else $sldr_title = $placid_slider_curr['title_text']; 
	if(!empty($sldr_title)) { ?><div class="sldr_title" <?php echo $placid_slider_css['sldr_title']; ?>><?php echo $sldr_title; ?></div> <?php } ?>  
<div class="placid_slider_handle" <?php echo $placid_slider_css['placid_slider_handle'];?>>
    <div id="<?php echo $slider_handle; ?>" >
            <?php echo $r_array[1];?>
    </div>
</div>

</div>

<?php	
  } //end of not empty slider_id condition
}

//For displaying category specific posts in chronologically reverse order
function placid_carousel_posts_on_slider_category($max_posts='5', $catg_slug='', $offset=0, $out_echo = '1', $set='') {
    global $placid_slider;
	$placid_slider_options='placid_slider_options'.$set;
    $placid_slider_curr=get_option($placid_slider_options);
	if(!isset($placid_slider_curr) or !is_array($placid_slider_curr) or empty($placid_slider_curr)){$placid_slider_curr=$placid_slider;$set='';}

	global $wpdb, $table_prefix;
	
	if (!empty($catg_slug)) {
		$category = get_category_by_slug($catg_slug); 
		$slider_cat = $category->term_id;
	}
	else {
		$category = get_the_category();
		$slider_cat = $category[0]->cat_ID;
	}
	
	$rand = $placid_slider_curr['rand'];
	if(isset($rand) and $rand=='1'){
	  $orderby = '&orderby=rand';
	}
	else {
	  $orderby = '';
	}
	
	$posts = get_posts('numberposts='.$max_posts.'&offset='.$offset.'&category='.$slider_cat.$orderby);
	
	$placid_slider_css = placid_get_inline_css($set);
	$html = '';
	$placid_sldr_a = 0;
	
	//Timthummb
		$timthumb='1';
		if($placid_slider_curr['timthumb']=='1'){
			$timthumb='0';
		}
	
	foreach($posts as $post) {
		$id = $post->ID;
		
		$post_title = stripslashes($post->post_title);
		$post_title = str_replace('"', '', $post_title);
		$slider_content = $post->post_content;
	
		$post_id = $post->ID;
		
            $placid_slide_redirect_url = get_post_meta($post_id, 'placid_slide_redirect_url', true);
			$placid_sslider_nolink = get_post_meta($post_id,'placid_sslider_nolink',true);
			trim($placid_slide_redirect_url);
			if(!empty($placid_slide_redirect_url) and isset($placid_slide_redirect_url)) {
			   $permalink = $placid_slide_redirect_url;
			}
			else{
			   $permalink = get_permalink($post_id);
			}
			if($placid_sslider_nolink=='1'){
			  $permalink='';
			}
	   	
		$placid_sldr_a++;
		
		$html .= '<div class="placid_slideri" '.$placid_slider_css['placid_slideri'].'>
			<!-- placid_slideri -->';
								
		if($placid_slider_curr['show_content']=='1'){
			if ($placid_slider_curr['content_from'] == "slider_content") {
				$slider_content = get_post_meta($post_id, 'slider_content', true);
			}
			if ($placid_slider_curr['content_from'] == "excerpt") {
				$slider_content = $post->post_excerpt;
			}
			$slider_content = strip_shortcodes( $slider_content );
			
			$slider_content = stripslashes($slider_content);
			$slider_content = str_replace(']]>', ']]&gt;', $slider_content);
	
			$slider_content = str_replace("\n","<br />",$slider_content);
			$slider_content = strip_tags($slider_content, $placid_slider_curr['allowable_tags']);
			
			if(!$placid_slider_curr['content_limit'] or $placid_slider_curr['content_limit'] == '' or $placid_slider_curr['content_limit'] == ' ') 
			  $slider_excerpt = substr($slider_content,0,$placid_slider_curr['content_chars']);
			else 
			  $slider_excerpt = placid_slider_word_limiter( $slider_content, $limit = $placid_slider_curr['content_limit'] );
			$slider_excerpt='<span '.$placid_slider_css['placid_slider_span'].'> '.$slider_excerpt.'</span>';
		}
		else{
		    $slider_excerpt='';
		}
		
		if($placid_slider_curr['img_pick'][0] == '1'){
		 $custom_key = array($placid_slider_curr['img_pick'][1]);
		}
		else {
		 $custom_key = '';
		}
		
		if($placid_slider_curr['img_pick'][2] == '1'){
		 $the_post_thumbnail = true;
		}
		else {
		 $the_post_thumbnail = false;
		}
		
		if($placid_slider_curr['img_pick'][3] == '1'){
		 $attachment = true;
		 $order_of_image = $placid_slider_curr['img_pick'][4];
		}
		else{
		 $attachment = false;
		 $order_of_image = '1';
		}
		
		if($placid_slider_curr['img_pick'][5] == '1'){
			 $image_scan = true;
		}
		else {
			 $image_scan = false;
		}
		
		$gti_width = $placid_slider_curr['img_width'];
	    $gti_height = $placid_slider_curr['img_height'];
		
		if($placid_slider_curr['crop'] == '0'){
		 $extract_size = 'full';
		}
		elseif($placid_slider_curr['crop'] == '1'){
		 $extract_size = 'large';
		}
		elseif($placid_slider_curr['crop'] == '2'){
		 $extract_size = 'medium';
		}
		else{
		 $extract_size = 'thumbnail';
		}
		
		$img_args = array(
			'custom_key' => $custom_key,
			'post_id' => $post_id,
			'attachment' => $attachment,
			'size' => $extract_size,
			'the_post_thumbnail' => $the_post_thumbnail,
			'default_image' => false,
			'order_of_image' => $order_of_image,
			'link_to_post' => false,
			'image_class' => 'placid_slider_thumbnail',
			'image_scan' => $image_scan,
			'width' => $gti_width,
			'height' => $gti_height,
			'echo' => false,
			'permalink' => $permalink,
			'timthumb'=>$timthumb,
			'style'=> $placid_slider_css['placid_slider_thumbnail']
		);
					
		$html .=  placid_sslider_get_the_image($img_args);
		  				  		
		if ($placid_slider_curr['image_only'] == '1') { 
			$html .= '<!-- /placid_slideri -->
			</div>';
		}
		else {
		   if($permalink!='') {
			$html .= '<div class="placid_text" '.$placid_slider_css['placid_text'].'><h2 '.$placid_slider_css['placid_slider_h2'].'><a href="'.$permalink.'" '.$placid_slider_css['placid_slider_h2_a'].'>'.$post_title.'</a></h2>
			    '.$slider_excerpt;
			if($placid_slider_curr['show_content']=='1'){
			  $placid_more=$placid_slider_curr['more'];
			  if($placid_more and !empty($placid_more) ){
			      $html .= '<p class="more"><a href="'.$permalink.'" '.$placid_slider_css['placid_slider_p_more'].'>'.$placid_slider_curr['more'].'</a></p>';
			  }
			}
			 $html .= '	<!-- /placid_slideri -->
			</div></div>'; }
		   else{
		   $html .= '<div class="placid_text" '.$placid_slider_css['placid_text'].'><h2 '.$placid_slider_css['placid_slider_h2'].'>'.$post_title.'</h2>
		            '.$slider_excerpt.'
				<!-- /placid_slideri -->
			</div></div>';    }
		}
	}
	
	if($out_echo == '1') {
	   echo $html;
	}
	$r_array = array( $placid_sldr_a, $html);
	return $r_array;
}

function get_placid_slider_category($catg_slug='', $set='') {
 global $placid_slider; 
 	$placid_slider_options='placid_slider_options'.$set;
    $placid_slider_curr=get_option($placid_slider_options);
	if(!isset($placid_slider_curr) or !is_array($placid_slider_curr) or empty($placid_slider_curr)){$placid_slider_curr=$placid_slider;$set='';}

 $r_array = placid_carousel_posts_on_slider_category($placid_slider_curr['no_posts'], $catg_slug, '0', '0', $set); $placid_sldr_a = $r_array[0];
 $slider_handle='placid_slider_'.$catg_slug;
 $category_obj = get_category_by_slug( $catg_slug ) ;
 if($category_obj){ $catID = $category_obj->term_id;}else{$catID=0;}

	if($placid_slider_curr['estimatedwidth']>0) $estimatedwidth='estimatedwidth:'.$placid_slider_curr['estimatedwidth'].',';
	else $estimatedwidth='';
	
	$iwidth=$placid_slider_curr['iwidth'];
	if(empty($iwidth) or $iwidth='' ) $variable='variable:true,';
	else $variable='';
 ?>
    <script type="text/javascript"> 
<?php if(!isset($placid_slider_curr['fouc']) or $placid_slider_curr['fouc']=='0' ){?>
	jQuery('html').addClass('placid_slider_fouc');
	jQuery(document).ready(function() {
	   jQuery(".placid_slider_fouc .placid_slider").css({'display' : 'block'});
	});
<?php } ?>	
		jQuery(document).ready(function() {
			jQuery("#<?php echo $slider_handle;?>").simplyScroll({
				className: 'placid_slider_instance',
				<?php if ($placid_slider_curr['prev_next'] == 1){ ?>
				   autoMode: 'off',
				<?php } else {?>
				   autoMode: 'loop',
			    <?php } ?>
				<?php echo $variable; ?>
				<?php echo $estimatedwidth; ?>
				speed:<?php echo $placid_slider_curr['speed']; ?>
		    });
		});
	</script> 

<noscript><p><strong><?php echo $placid_slider['noscript'];?></strong></p></noscript>

<?php $placid_slider_css = placid_get_inline_css($set); ?>

<div class="placid_slider" <?php echo $placid_slider_css['placid_slider'];?>>
  <?php 
	$sldr_title = $placid_slider_curr['title_text']; 
	if(!empty($sldr_title)) { ?><div class="sldr_title" <?php echo $placid_slider_css['sldr_title']; ?>><?php echo $sldr_title; ?></div> <?php } ?>  

    <div class="placid_slider_handle" <?php echo $placid_slider_css['placid_slider_handle'];?>>
        <div id="<?php echo $slider_handle; ?>" >
                <?php echo $r_array[1];?>
        </div>
    </div>

</div>
<?php	
} 

//For displaying recent posts in chronologically reverse order
function placid_carousel_posts_on_slider_recent($max_posts='5', $offset=0, $out_echo = '1', $set='') {
    global $placid_slider;
	$placid_slider_options='placid_slider_options'.$set;
    $placid_slider_curr=get_option($placid_slider_options);
	if(!isset($placid_slider_curr) or !is_array($placid_slider_curr) or empty($placid_slider_curr)){$placid_slider_curr=$placid_slider;$set='';}

	global $wpdb, $table_prefix;
	
	$posts = get_posts('numberposts='.$max_posts.'&offset='.$offset);
	
	$rand = $placid_slider_curr['rand'];
	if(isset($rand) and $rand=='1'){
	  shuffle($posts);
	}
	
	$placid_slider_css = placid_get_inline_css($set);
	$html = '';
	$placid_sldr_b = 0;
	//Timthummb
		$timthumb='1';
		if($placid_slider_curr['timthumb']=='1'){
			$timthumb='0';
		}
	
	foreach($posts as $post) {
		$id = $post->ID;
		
		$post_title = stripslashes($post->post_title);
		$post_title = str_replace('"', '', $post_title);
		$slider_content = $post->post_content;
	
		$post_id = $post->ID;
		
            $placid_slide_redirect_url = get_post_meta($post_id, 'placid_slide_redirect_url', true);
			$placid_sslider_nolink = get_post_meta($post_id,'placid_sslider_nolink',true);
			trim($placid_slide_redirect_url);
			if(!empty($placid_slide_redirect_url) and isset($placid_slide_redirect_url)) {
			   $permalink = $placid_slide_redirect_url;
			}
			else{
			   $permalink = get_permalink($post_id);
			}
			if($placid_sslider_nolink=='1'){
			  $permalink='';
			}
			
		$placid_sldr_b++;
		
		$html .= '<div class="placid_slideri" '.$placid_slider_css['placid_slideri'].'>
			<!-- placid_slideri -->';
								
		if($placid_slider_curr['show_content']=='1'){
			if ($placid_slider_curr['content_from'] == "slider_content") {
				$slider_content = get_post_meta($post_id, 'slider_content', true);
			}
			if ($placid_slider_curr['content_from'] == "excerpt") {
				$slider_content = $post->post_excerpt;
			}
			$slider_content = strip_shortcodes( $slider_content );
			
			$slider_content = stripslashes($slider_content);
			$slider_content = str_replace(']]>', ']]&gt;', $slider_content);
	
			$slider_content = str_replace("\n","<br />",$slider_content);
			$slider_content = strip_tags($slider_content, $placid_slider_curr['allowable_tags']);
			
			if(!$placid_slider_curr['content_limit'] or $placid_slider_curr['content_limit'] == '' or $placid_slider_curr['content_limit'] == ' ') 
			  $slider_excerpt = substr($slider_content,0,$placid_slider_curr['content_chars']);
			else 
			  $slider_excerpt = placid_slider_word_limiter( $slider_content, $limit = $placid_slider_curr['content_limit'] );
			$slider_excerpt='<span '.$placid_slider_css['placid_slider_span'].'> '.$slider_excerpt.'</span>';
		}
		else{
		    $slider_excerpt='';
		}
		
		if($placid_slider_curr['img_pick'][0] == '1'){
		 $custom_key = array($placid_slider_curr['img_pick'][1]);
		}
		else {
		 $custom_key = '';
		}
		
		if($placid_slider_curr['img_pick'][2] == '1'){
		 $the_post_thumbnail = true;
		}
		else {
		 $the_post_thumbnail = false;
		}
		
		if($placid_slider_curr['img_pick'][3] == '1'){
		 $attachment = true;
		 $order_of_image = $placid_slider_curr['img_pick'][4];
		}
		else{
		 $attachment = false;
		 $order_of_image = '1';
		}
		
		if($placid_slider_curr['img_pick'][5] == '1'){
			 $image_scan = true;
		}
		else {
			 $image_scan = false;
		}
		
		$gti_width = $placid_slider_curr['img_width'];
	    $gti_height = $placid_slider_curr['img_height'];
		
		if($placid_slider_curr['crop'] == '0'){
		 $extract_size = 'full';
		}
		elseif($placid_slider_curr['crop'] == '1'){
		 $extract_size = 'large';
		}
		elseif($placid_slider_curr['crop'] == '2'){
		 $extract_size = 'medium';
		}
		else{
		 $extract_size = 'thumbnail';
		}
		
		$img_args = array(
			'custom_key' => $custom_key,
			'post_id' => $post_id,
			'attachment' => $attachment,
			'size' => $extract_size,
			'the_post_thumbnail' => $the_post_thumbnail,
			'default_image' => false,
			'order_of_image' => $order_of_image,
			'link_to_post' => false,
			'image_class' => 'placid_slider_thumbnail',
			'image_scan' => $image_scan,
			'width' => $gti_width,
			'height' => $gti_height,
			'echo' => false,
			'permalink' => $permalink,
			'timthumb'=>$timthumb,
			'style'=> $placid_slider_css['placid_slider_thumbnail']
		);
			
		$html .=  placid_sslider_get_the_image($img_args);
		  				  		
		if ($placid_slider_curr['image_only'] == '1') { 
			$html .= '<!-- /placid_slideri -->
			</div>';
		}
		else {
		   if($permalink!='') {
			$html .= '<div class="placid_text" '.$placid_slider_css['placid_text'].'><h2 '.$placid_slider_css['placid_slider_h2'].'><a href="'.$permalink.'" '.$placid_slider_css['placid_slider_h2_a'].'>'.$post_title.'</a></h2>
			    '.$slider_excerpt;
			if($placid_slider_curr['show_content']=='1'){
			  $placid_more=$placid_slider_curr['more'];
			  if($placid_more and !empty($placid_more) ){
			      $html .= '<p class="more"><a href="'.$permalink.'" '.$placid_slider_css['placid_slider_p_more'].'>'.$placid_slider_curr['more'].'</a></p>';
			  }
			}
			 $html .= '	<!-- /placid_slideri -->
			</div></div>'; }
		   else{
		   $html .= '<div class="placid_text" '.$placid_slider_css['placid_text'].'><h2 '.$placid_slider_css['placid_slider_h2'].'>'.$post_title.'</h2>
		            '.$slider_excerpt.'
				<!-- /placid_slideri -->
			</div></div>';    }
		}
	}
	if($out_echo == '1') {
	   echo $html;
	}
	$r_array = array( $placid_sldr_j, $html);
	return $r_array;
}

function get_placid_slider_recent($set='') {
 global $placid_slider; 
 	$placid_slider_options='placid_slider_options'.$set;
    $placid_slider_curr=get_option($placid_slider_options);
	if(!isset($placid_slider_curr) or !is_array($placid_slider_curr) or empty($placid_slider_curr)){$placid_slider_curr=$placid_slider;$set='';}

 $r_array = placid_carousel_posts_on_slider_recent($placid_slider_curr['no_posts'], '0', '0', $set); $placid_sldr_b = $r_array[0];
 $slider_handle='placid_slider_recent';
 
	if($placid_slider_curr['estimatedwidth']>0) $estimatedwidth='estimatedwidth:'.$placid_slider_curr['estimatedwidth'].',';
	else $estimatedwidth='';
	$iwidth=$placid_slider_curr['iwidth'];
	if(empty($iwidth) or $iwidth='' ) $variable='variable:true,';
	else $variable='';
 ?>
    <script type="text/javascript"> 
<?php if(!isset($placid_slider_curr['fouc']) or $placid_slider_curr['fouc']=='0' ){?>
	jQuery('html').addClass('placid_slider_fouc');
	jQuery(document).ready(function() {
	   jQuery(".placid_slider_fouc .placid_slider").css({'display' : 'block'});
	});
<?php } ?>	
		jQuery(document).ready(function() {
			jQuery("#<?php echo $slider_handle;?>").simplyScroll({
				className: 'placid_slider_instance',
				<?php if ($placid_slider_curr['prev_next'] == 1){ ?>
				   autoMode: 'off',
				<?php } else {?>
				   autoMode: 'loop',
			    <?php } ?>
				<?php echo $variable; ?>
				<?php echo $estimatedwidth; ?>
				speed:<?php echo $placid_slider_curr['speed']; ?>
		    });
		});
	</script> 

<noscript><p><strong><?php echo $placid_slider['noscript'];?></strong></p></noscript>

<?php $placid_slider_css = placid_get_inline_css($set); ?>

<div class="placid_slider" <?php echo $placid_slider_css['placid_slider'];?>>
  <?php 
	$sldr_title = $placid_slider_curr['title_text']; 
	if(!empty($sldr_title)) { ?><div class="sldr_title" <?php echo $placid_slider_css['sldr_title']; ?>><?php echo $sldr_title; ?></div> <?php } ?>  

<div class="placid_slider_handle" <?php echo $placid_slider_css['placid_slider_handle'];?>>
    <div id="<?php echo $slider_handle; ?>" >
            <?php echo $r_array[1];?>
    </div>
</div>

</div>
<?php	
} 

function return_placid_slider($slider_id='',$set='') {
 global $placid_slider; 
 	$placid_slider_options='placid_slider_options'.$set;
    $placid_slider_curr=get_option($placid_slider_options);
	if(!isset($placid_slider_curr) or !is_array($placid_slider_curr) or empty($placid_slider_curr)){$placid_slider_curr=$placid_slider;$set='';}
 
 if($placid_slider['multiple_sliders'] == '1' and is_singular() and (empty($slider_id) or !isset($slider_id))){
    global $post;
	$post_id = $post->ID;
    $slider_id = get_placid_slider_for_the_post($post_id);
 }
if(empty($slider_id) or !isset($slider_id)){
  $slider_id = '1';
}
$slider_html='';
if(!empty($slider_id)){
		$r_array = placid_carousel_posts_on_slider($placid_slider_curr['no_posts'], $offset=0, $slider_id, $echo = '0', $set); 
		$placid_sldr_j = $r_array[0];
		$slider_handle='placid_slider_'.$slider_id;
		$placid_slider_css = placid_get_inline_css($set);
	
	if(!isset($placid_slider_curr['fouc']) or $placid_slider_curr['fouc']=='0' ){
		$fouc='jQuery("html").addClass("placid_slider_fouc");
		jQuery(document).ready(function() {
		   jQuery(".placid_slider_fouc .placid_slider").css({"display" : "block"});
		});';
    }	
	else{
	    $fouc='';
	}		
	if ($placid_slider_curr['prev_next'] == 1){  $automode='autoMode: "off",';	}
	else{$automode='autoMode: "loop",';}

	if($placid_slider_curr['title_from']=='1') $sldr_title = get_placid_slider_name($slider_id);
	else $sldr_title = $placid_slider_curr['title_text'];
	
	if(!empty($sldr_title)) { 
	  $sldr_title = '<div class="sldr_title" '.$placid_slider_css['sldr_title'].'>'. $sldr_title .'</div>';
	}
	
	if($placid_slider_curr['estimatedwidth']>0) $estimatedwidth='estimatedwidth:'.$placid_slider_curr['estimatedwidth'].',';
	else $estimatedwidth='';
	$iwidth=$placid_slider_curr['iwidth'];
	if(empty($iwidth) or $iwidth='' ) $variable='variable:true,';
	else $variable='';
	
	$slider_html=$slider_html.'<script type="text/javascript"> '.$fouc.'
		jQuery(document).ready(function() {
			jQuery("#'.$slider_handle.'").simplyScroll({
				className: "placid_slider_instance",
				'.$automode.'
				'.$variable.'
				'.$estimatedwidth.'
				speed:'. $placid_slider_curr['speed'] .'
			});
		});
	</script> 
	<noscript><p><strong>'. $placid_slider['noscript'] .'</strong></p></noscript>
<div class="placid_slider" '.$placid_slider_css['placid_slider'].'>
    '.$sldr_title.'
	<div class="placid_slider_handle" '.$placid_slider_css['placid_slider_handle'].'>
		<div id="'.$slider_handle.'">
			'. $r_array[1] .'
		</div>
	</div>
</div>';
 } //end of not empty slider_id condition
  return $slider_html;
}

function placid_slider_simple_shortcode($atts) {
	extract(shortcode_atts(array(
		'id' => '',
		'set' => '',
	), $atts));

	return return_placid_slider($id,$set);
}
add_shortcode('placidslider', 'placid_slider_simple_shortcode');

function placid_slider_enqueue_scripts() {
	wp_enqueue_script( 'jquery.simplyScroll', placid_slider_plugin_url( 'js/placid.js' ),
		array('jquery'), PLACID_SLIDER_VER, false);
}

add_action( 'init', 'placid_slider_enqueue_scripts' );

function placid_slider_enqueue_styles() {	
  global $post, $placid_slider, $wp_registered_widgets,$wp_widget_factory;
  if(is_singular()) {
	 $placid_slider_style = get_post_meta($post->ID,'placid_slider_style',true);
	 if((is_active_widget(false, false, 'placid_sslider_wid', true) or isset($placid_slider['shortcode']) ) and (!isset($placid_slider_style) or empty($placid_slider_style))){
	   $placid_slider_style='default';
	 }
	 if (!isset($placid_slider_style) or empty($placid_slider_style) ) {
	     wp_enqueue_style( 'placid_slider_headcss', placid_slider_plugin_url( 'css/skins/'.$placid_slider['stylesheet'].'/style.css' ),
		false, PLACID_SLIDER_VER, 'all');
	 }
     else {
	     wp_enqueue_style( 'placid_slider_headcss', placid_slider_plugin_url( 'css/skins/'.$placid_slider_style.'/style.css' ),
		false, PLACID_SLIDER_VER, 'all');
	}
  }
  else {
     $placid_slider_style = $placid_slider['stylesheet'];
	wp_enqueue_style( 'placid_slider_headcss', placid_slider_plugin_url( 'css/skins/'.$placid_slider_style.'/style.css' ),
		false, PLACID_SLIDER_VER, 'all');
  }
}
add_action( 'wp', 'placid_slider_enqueue_styles' );

//admin settings
function placid_slider_admin_scripts() {
global $placid_slider;
  if ( is_admin() ){ // admin actions
  // Settings page only
	if ( isset($_GET['page']) && ('placid-slider-admin' == $_GET['page'] or 'placid-slider-settings' == $_GET['page'] )  ) {
	wp_register_script('jquery', false, false, false, false);
	wp_enqueue_script( 'jquery-ui-tabs' );
	wp_enqueue_script( 'jquery-ui-core' );
    wp_enqueue_script( 'jquery-ui-sortable' );
	wp_enqueue_script( 'jquery.cookie', placid_slider_plugin_url( 'js/jquery.cookie.js' ),
		array('jquery-ui-core','jquery-ui-tabs'), PLACID_SLIDER_VER, false);
	wp_enqueue_script( 'jquery.simplyScroll', placid_slider_plugin_url( 'js/placid.js' ),
		array('jquery'), PLACID_SLIDER_VER, false); 
	wp_enqueue_style( 'placid_slider_admin_head_css', placid_slider_plugin_url( 'css/skins/'.$placid_slider['stylesheet'].'/style.css' ),
		false, PLACID_SLIDER_VER, 'all');
	}
  }
}

add_action( 'admin_init', 'placid_slider_admin_scripts' );

function placid_slider_admin_head() {
global $placid_slider;
if ( is_admin() ){ // admin actions
   
  // Sliders & Settings page only
    if ( isset($_GET['page']) && ('placid-slider-admin' == $_GET['page'] or 'placid-slider-settings' == $_GET['page']) ) {
	  $sliders = placid_ss_get_sliders(); 
	?>
		<script type="text/javascript">
            // <![CDATA[
        jQuery(document).ready(function() {
                jQuery(function() {
                    jQuery("#slider_tabs").tabs({ cookie: { expires: 30 } }); 
					//getter
					var cookie = jQuery("#slider_tabs").tabs( "option", "cookie" );
					//setter
					jQuery("#slider_tabs").tabs( "option", "cookie", { expires: 30 } );
					
				<?php foreach($sliders as $slider){?>
                    jQuery("#sslider_sortable_<?php echo $slider['slider_id'];?>").sortable();
                    jQuery("#sslider_sortable_<?php echo $slider['slider_id'];?>").disableSelection();
			    <?php } ?>
                });
        });
		
        function confirmRemove()
        {
            var agree=confirm("This will remove selected Posts/Pages from Slider.");
            if (agree)
            return true ;
            else
            return false ;
        }
        function confirmRemoveAll()
        {
            var agree=confirm("Remove all Posts/Pages from Placid Slider??");
            if (agree)
            return true ;
            else
            return false ;
        }
        function confirmSliderDelete()
        {
            var agree=confirm("Delete this Slider??");
            if (agree)
            return true ;
            else
            return false ;
        }
        function slider_checkform ( form )
        {
          if (form.new_slider_name.value == "") {
            alert( "Please enter the New Slider name." );
            form.new_slider_name.focus();
            return false ;
          }
          return true ;
        }
        </script>
        <style type="text/css">
        /************************************************
        *	ui-tabs  									*
        ************************************************/
        .ui-tabs { padding: .2em; zoom: 1; }
        .ui-tabs .ui-tabs-nav { list-style: none; position: relative; padding: .2em .2em 0; }
        .ui-tabs .ui-tabs-nav li { position: relative; float: left; border-bottom-width: 0 !important; margin: 0 .2em -1px 0; padding: 0;  background-color:#B9B9B9;}
        .ui-tabs .ui-tabs-nav li a { float: left; text-decoration: none; padding: .5em 1em; color:#FFFFFF;}
        .ui-tabs .ui-tabs-nav li.ui-tabs-selected { border-bottom-width: 0; background-color:#ABD37E;}
        .ui-tabs .ui-tabs-nav li.ui-tabs-selected a, .ui-tabs .ui-tabs-nav li.ui-state-disabled a, .ui-tabs .ui-tabs-nav li.ui-state-processing a { cursor: text; color:#FFF;}
        .ui-tabs .ui-tabs-nav li a, .ui-tabs.ui-tabs-collapsible .ui-tabs-nav li.ui-tabs-selected a { cursor: pointer; } /* first selector in group seems obsolete, but required to overcome bug in Opera applying cursor: text overall if defined elsewhere... */
        .ui-tabs .ui-tabs-panel { padding: 1em 1.4em; display: block; border-width: 0; background: none; }
        .ui-tabs .ui-tabs-hide { display: none !important; }
        /*tabs complete*/
        #sldr_message {background-color:#FEF7DA;clear:both;width:72%;}
        #sldr_close {float:right;} 
        </style>
<?php
   } //Sliders page only
   
   // Settings page only
  if ( isset($_GET['page']) && 'placid-slider-settings' == $_GET['page']  ) {
		wp_print_scripts( 'farbtastic' );
		wp_print_styles( 'farbtastic' );
?>
<script type="text/javascript">
	// <![CDATA[
jQuery(document).ready(function() {
		jQuery('#colorbox_1').farbtastic('#color_value_1');
		jQuery('#color_picker_1').click(function () {
           if (jQuery('#colorbox_1').css('display') == "block") {
		      jQuery('#colorbox_1').fadeOut("slow"); }
		   else {
		      jQuery('#colorbox_1').fadeIn("slow"); }
        });
		var colorpick_1 = false;
		jQuery(document).mousedown(function(){
		    if (colorpick_1 == true) {
    			return; }
				jQuery('#colorbox_1').fadeOut("slow");
		});
		jQuery(document).mouseup(function(){
		    colorpick_1 = false;
		});
//for second color box
		jQuery('#colorbox_2').farbtastic('#color_value_2');
		jQuery('#color_picker_2').click(function () {
           if (jQuery('#colorbox_2').css('display') == "block") {
		      jQuery('#colorbox_2').fadeOut("slow"); }
		   else {
		      jQuery('#colorbox_2').fadeIn("slow"); }
        });
		var colorpick_2 = false;
		jQuery(document).mousedown(function(){
		    if (colorpick_2 == true) {
    			return; }
				jQuery('#colorbox_2').fadeOut("slow");
		});
		jQuery(document).mouseup(function(){
		    colorpick_2 = false;
		});
//for third color box
		jQuery('#colorbox_3').farbtastic('#color_value_3');
		jQuery('#color_picker_3').click(function () {
           if (jQuery('#colorbox_3').css('display') == "block") {
		      jQuery('#colorbox_3').fadeOut("slow"); }
		   else {
		      jQuery('#colorbox_3').fadeIn("slow"); }
        });
		var colorpick_3 = false;
		jQuery(document).mousedown(function(){
		    if (colorpick_3 == true) {
    			return; }
				jQuery('#colorbox_3').fadeOut("slow");
		});
		jQuery(document).mouseup(function(){
		    colorpick_3 = false;
		});
//for fourth color box
		jQuery('#colorbox_4').farbtastic('#color_value_4');
		jQuery('#color_picker_4').click(function () {
           if (jQuery('#colorbox_4').css('display') == "block") {
		      jQuery('#colorbox_4').fadeOut("slow"); }
		   else {
		      jQuery('#colorbox_4').fadeIn("slow"); }
        });
		var colorpick_4 = false;
		jQuery(document).mousedown(function(){
		    if (colorpick_4 == true) {
    			return; }
				jQuery('#colorbox_4').fadeOut("slow");
		});
		jQuery(document).mouseup(function(){
		    colorpick_4 = false;
		});
//for fifth color box
		jQuery('#colorbox_5').farbtastic('#color_value_5');
		jQuery('#color_picker_5').click(function () {
           if (jQuery('#colorbox_5').css('display') == "block") {
		      jQuery('#colorbox_5').fadeOut("slow"); }
		   else {
		      jQuery('#colorbox_5').fadeIn("slow"); }
        });
		var colorpick_5 = false;
		jQuery(document).mousedown(function(){
		    if (colorpick_5 == true) {
    			return; }
				jQuery('#colorbox_5').fadeOut("slow");
		});
		jQuery(document).mouseup(function(){
		    colorpick_5 = false;
		});
//for sixth color box
		jQuery('#colorbox_6').farbtastic('#color_value_6');
		jQuery('#color_picker_6').click(function () {
           if (jQuery('#colorbox_6').css('display') == "block") {
		      jQuery('#colorbox_6').fadeOut("slow"); }
		   else {
		      jQuery('#colorbox_6').fadeIn("slow"); }
        });
		var colorpick_6 = false;
		jQuery(document).mousedown(function(){
		    if (colorpick_6 == true) {
    			return; }
				jQuery('#colorbox_6').fadeOut("slow");
		});
		jQuery(document).mouseup(function(){
		    colorpick_6 = false;
		});
		jQuery('#sldr_close').click(function () {
			jQuery('#sldr_message').fadeOut("slow");
		});
});
function confirmSettingsCreate()
        {
            var agree=confirm("Create New Settings Set??");
            if (agree)
            return true ;
            else
            return false ;
}
</script>
<style type="text/css">
.color-picker-wrap {
		position: absolute;
 		display: none; 
		background: #fff;
		border: 3px solid #ccc;
		padding: 3px;
		z-index: 1000;
	}
</style>
<?php
   } //for placid slider option page
 }//only for admin
}
add_action('admin_head', 'placid_slider_admin_head');
function placid_get_inline_css($set=''){
    global $placid_slider;
	$placid_slider_options='placid_slider_options'.$set;
    $placid_slider_curr=get_option($placid_slider_options);
	if(!isset($placid_slider_curr) or !is_array($placid_slider_curr) or empty($placid_slider_curr)){$placid_slider_curr=$placid_slider;$set='';}
	
	global $post;
	if(is_singular()) {	$placid_slider_style = get_post_meta($post->ID,'placid_slider_style',true);}
	if((is_singular() and ($placid_slider_style == 'default' or empty($placid_slider_style) or !$placid_slider_style)) or (!is_singular() and $placid_slider['stylesheet'] == 'default')  )	{ $default=true;	}
	else{ $default=false;}
	
	$placid_slider_css=array();
	if($default){
	    //placid_slider
		if(isset($placid_slider_curr['width']) and $placid_slider_curr['width']!=0) {
			$placid_slider_css['placid_slider']='style="width:'. $placid_slider_curr['width'].'px;"';
		}
		//placid_slider_handle
		if(isset($placid_slider_curr['width']) and $placid_slider_curr['width']!=0) {
			$placid_slider_css['placid_slider_handle']='style="width:'. $placid_slider_curr['width'].'px;height:'. $placid_slider_curr['height'].'px;"';
		}
		else{
		    $placid_slider_css['placid_slider_handle']='style="width:100%;height:'. $placid_slider_curr['height'].'px;"';
		}
		
		if ($placid_slider_curr['title_fstyle'] == "bold" or $placid_slider_curr['title_fstyle'] == "bold italic" ){$slider_title_font = "bold";} else { $slider_title_font = "normal"; }
		if ($placid_slider_curr['title_fstyle'] == "italic" or $placid_slider_curr['title_fstyle'] == "bold italic" ){$slider_title_style = "italic";} else {$slider_title_style = "normal";}
		$sldr_title = $placid_slider_curr['title_text']; if(!empty($sldr_title)) { $slider_title_margin = "5px 0 10px 0"; } else {$slider_title_margin = "0";} 
	//sldr_title	
		$placid_slider_css['sldr_title']='style="font-family:'.$placid_slider_curr['title_font'].', Arial, Helvetica, sans-serif;font-size:'.$placid_slider_curr['title_fsize'].'px;font-weight:'.$slider_title_font.';font-style:'.$slider_title_style.';color:'.$placid_slider_curr['title_fcolor'].';margin:'.$slider_title_margin.'"';

		if ($placid_slider_curr['bg'] == '1') { $placid_slideri_bg = "transparent";} else { $placid_slideri_bg = $placid_slider_curr['bg_color']; }
	//placid_slideri
		$placid_slider_css['placid_slideri']='style="background-color:'.$placid_slideri_bg.';border:'.$placid_slider_curr['border'].'px solid '.$placid_slider_curr['brcolor'].';width:'. $placid_slider_curr['iwidth'].'px;height:'. $placid_slider_curr['height'].'px;"';
		
		if ($placid_slider_curr['ptitle_fstyle'] == "bold" or $placid_slider_curr['ptitle_fstyle'] == "bold italic" ){$ptitle_fweight = "bold";} else {$ptitle_fweight = "normal";}
		if ($placid_slider_curr['ptitle_fstyle'] == "italic" or $placid_slider_curr['ptitle_fstyle'] == "bold italic"){$ptitle_fstyle = "italic";} else {$ptitle_fstyle = "normal";}
	//placid_slider_h2
		$placid_slider_css['placid_slider_h2']='style="clear:none;line-height:'. ($placid_slider_curr['ptitle_fsize'] + 5) .'px;font-family:'. $placid_slider_curr['ptitle_font'].', Arial, Helvetica, sans-serif;font-size:'.$placid_slider_curr['ptitle_fsize'].'px;font-weight:'.$ptitle_fweight.';font-style:'.$ptitle_fstyle.';color:'.$placid_slider_curr['ptitle_fcolor'].';margin:0 0 5px 0;"';
		
	//placid_slider_h2 a
		$placid_slider_css['placid_slider_h2_a']='style="color:'.$placid_slider_curr['ptitle_fcolor'].';"';
	
		if ($placid_slider_curr['content_fstyle'] == "bold" or $placid_slider_curr['content_fstyle'] == "bold italic" ){$content_fweight= "bold";} else {$content_fweight= "normal";}
		if ($placid_slider_curr['content_fstyle']=="italic" or $placid_slider_curr['content_fstyle'] == "bold italic"){$content_fstyle= "italic";} else {$content_fstyle= "normal";}
	//placid_slider_span
		$placid_slider_css['placid_slider_span']='style="font-family:'.$placid_slider_curr['content_font'].', Arial, Helvetica, sans-serif;font-size:'.$placid_slider_curr['content_fsize'].'px;font-weight:'.$content_fweight.';font-style:'.$content_fstyle.';color:'. $placid_slider_curr['content_fcolor'].';"';
		
	//
		if($placid_slider_curr['img_align'] == "left") {$thumb_margin_right= "10";} else {$thumb_margin_right= "0";}
		if($placid_slider_curr['img_align'] == "right") {$thumb_margin_left = "10";} else {$thumb_margin_left = "0";}
		if($placid_slider_curr['img_size'] == '1'){ $thumb_width= 'width:'. $placid_slider_curr['img_width'].'px;';} else{$thumb_width='';}
	//placid_slider_thumbnail
		$placid_slider_css['placid_slider_thumbnail']='style="float:'.$placid_slider_curr['img_align'].';padding:0;margin:0 '.$thumb_margin_right.'px 0 '.$thumb_margin_left.'px;height:'.$placid_slider_curr['img_height'].'px;border:'.$placid_slider_curr['img_border'].'px solid '.$placid_slider_curr['img_brcolor'].';'.$thumb_width.'"';
	
	//placid_slider_p_more
		$placid_slider_css['placid_slider_p_more']='style="color:'.$placid_slider_curr['ptitle_fcolor'].';font-family:'.$placid_slider_curr['content_font'].', Arial, Helvetica, sans-serif;font-size:'.$placid_slider_curr['content_fsize'].'px;"';
	//placid_slider_p_more
	    $placid_slider_css['placid_text']='style="max-width:'. ( $placid_slider_curr['iwidth'] - 20 ).'px;"';
		
	}
	
	return $placid_slider_css;
}
function placid_slider_css() {
global $placid_slider;
$css=$placid_slider['css'];
if($css and !empty($css)){?>
 <style type="text/css"><?php echo $css;?></style>
<?php }
}
add_action('wp_head', 'placid_slider_css');
add_action('admin_head', 'placid_slider_css');
?>