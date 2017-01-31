<?php
/**
* Plugin Name: WF Custom Plugin
* Plugin URI: http://wonderfest.org
* Description: Custom wonderfest tools
* Version: 1.0
* Author: EY
* Author URI: http://wonderfest.org
*
* Dependancies: Magic Fields http://magicfields.org/
**/

/*
display event list per category
displays both legacy events and new event types (containing magic fields)
*/
function wf_events(){
	echo "<div>Hello WF</div>";
}
/*
display event details on page/post (magic fields)
*/
function wf_display_event(){
	$postid = get_the_ID();
	$var = get_post_meta($postid);
	
	$ev_title 			= wf_getvar($var["event_info_title"]);
	$ev_description 	= wf_getvar($var["event_info_description"]);
	$ev_speaker_name	= wf_getvar($var["event_info_speaker_name"]);
	$ev_speaker_title	= wf_getvar($var["event_info_speaker_title"]);
	$ev_speaker_link	= wf_getvar($var["event_info_speaker_link"]);
	$ev_speaker_photoid	= wf_getvar($var["event_info_speaker_photo"]);
	$ev_location_name		= wf_getvar($var["event_info_location_name"]);
	$ev_location_address	= wf_getvar($var["event_info_location_address"]);
	$ev_location_map_link	= wf_getvar($var["event_info_location_maplink"]);
	$ev_location_website	= wf_getvar($var["event_info_location_link"]);
	$ev_howtext				= wf_getvar($var["event_info_how_text"]);
	$ev_collaborator_name	= wf_getvar($var["event_info_collab_name"]);
	$ev_collaborator_link	= wf_getvar($var["event_info_collab_link"]);
	$ev_start_date			= wf_getvar($var["event_info_start_date"]);
	$ev_start_time			= wf_getvar($var["event_info_start_time"]);
	$ev_duration			= wf_getvar($var["event_info_duration"]);
	$ev_reg_language		= wf_getvar($var["event_info_reg_language"]);
	$ev_reg_link			= wf_getvar($var["event_info_reg_link"]);
	$ev_reg_info			= wf_getvar($var["event_info_reg_info"]);
	$ev_eventbrite_id		= wf_getvar($var["event_info_eventbrite_id"]);
	$ev_whytext				= wf_getvar($var["event_info_whytext"]);
	$out = "";
	
	
	$out .= "<div class='wfev-description'>";
	if ($ev_description) {
		$out .= $ev_description;
	}
	// display speaker photo
	if ($ev_speaker_photoid) {
		$photo = wp_get_attachment_image_src ( $ev_speaker_photoid,'thumbnail');
		/*
		ob_start();
		var_dump($photo);
		$result = ob_get_clean();
		$out .= $result;
		*/
		if ($photo) {
			$out .= "<div style='clear:both'></div>";
			$out .= "<img src='".$photo[0]."' style='margin-top:25px'/>";
			if ($ev_speaker_name) {
				$out .= "<br/>" . $ev_speaker_name . "<br/><br/>";
			}
		}
	}
	$out .= "</div>";
	
	$out .= "<div class='wfev-block'>";
	
	if ($ev_title) {
		$out .= "<div class='wfev-item'><strong>WHAT: </strong>".$ev_title."</div>";
	}
	if ($ev_speaker_name) {
		$out .= "<div class='wfev-item'>";
		$out .= "<strong>WHO: </strong>".$ev_speaker_name;
		
		if ($ev_speaker_title) 
			$out .= ", ".$ev_speaker_title;

		if ($ev_speaker_link) 
			$out .= " [<a href='".$ev_speaker_link."'>".$ev_speaker_link."</a>]";
		
		$out .= "</div>";
	}
	/*
	location info
	*/
	if ($ev_location_name) {
		$out .= "<div class='wfev-item'>";
		$out .= "<strong>WHERE: </strong>".$ev_location_name;

		if ($ev_location_address) 
			$out .= ", ".$ev_location_address;

		if ($ev_location_website) 
			$out .= " [<a target='_blank' href='".$ev_location_website."'>".$ev_location_website."</a>]";
		if ($ev_location_map_link) 
			$out .= "<br/>Map: [<a target='_blank' href='".$ev_location_map_link."'>".$ev_location_map_link."</a>]";
		$out .= "</div>";
	}
	if ($ev_start_date) {
		$out .= "<div class='wfev-item'>";
		$out .= "<strong>WHEN: </strong>".$ev_start_date;

		if ($ev_start_time) 
			$out .= " ".$ev_start_time;

		if ($ev_duration) 
			$out .= " (".$ev_duration.")";
		$out .= "</div>";
	}	
	// how
	if ($ev_collaborator_name || $ev_howtext) {
		$out .= "<div class='wfev-item'>";
		if (count($var["event_info_collab_name"])) {
			$out .= "<strong>HOW: </strong>";
			
			if ($ev_howtext) {
				$out .= $ev_howtext;
			}
			if ($ev_collaborator_name) {
				$out .= "<br/><strong>Collaborators:</strong>";
			}
			for($i=0 ; $i < count($var["event_info_collab_name"]); $i++){
				$out .= "<br/>    ".$var["event_info_collab_name"][$i];
				
				if (isset($var["event_info_collab_link"][$i]) && $var["event_info_collab_link"][$i] != "") {
					$out .= " [<a target='_blank' href='".$var["event_info_collab_link"][$i]."'>".$var["event_info_collab_link"][$i]."</a>]";
				}
				//$out .= "<br/>";
			}
			$out .= "</div>"; 
		}
		else {	// only one collaborator
			$out .= "<strong>HOW: </strong>".$ev_collaborator_name;

			if ($ev_collaborator_link) 
				$out .= " [<a target='_blank' href='".$ev_collaborator_link."'>".$ev_collaborator_link."</a>]";
			$out .= "</div>"; 
		}
	}
	/* Tickets or Register info */
	if ($ev_reg_language) {
		
		$language = unserialize($ev_reg_language);
		$language = $language[0];
		
		//var_dump($language);
		
		$out .= "<div class='wfev-item'>";
		if ($ev_reg_link) {
			if ($language=="register")
				$out .= "<strong>REGISTER: </strong>";
			if ($language=="ticket")
				$out .= "<strong>TICKETS: </strong>";
			if ($ev_reg_info)
				$out .= $ev_reg_info;
			$out .= "<br/><a target='_blank' href='".$ev_reg_link."'>".$ev_reg_link."</a>";
		}
		$out .= "</div>";
	}
	if ($ev_whytext) {
		$out .= "<div class='wfev-item'>";
		$out .= "<strong>WHY: </strong>".$ev_whytext;
		$out .= "</div>"; 
	}
	
	$out .= "</div>";	// wfev-block
	
	// display map
	/*
	if ($ev_location_map_link) {
		$out .= '<iframe src="'.$ev_location_map_link.'" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>';
	}
	*/
	if ($ev_eventbrite_id) {
		$out .= '<div class="wfev-eventbrite" style="width:100%; text-align:left;" ><iframe  src="//eventbrite.com/tickets-external?eid='.$ev_eventbrite_id.'&ref=etckt" frameborder="0" height="360" width="100%" vspace="0" hspace="0" marginheight="5" marginwidth="5" scrolling="auto" allowtransparency="true"></iframe></div>';	
	}
	
	
	//$out .= "<br/><br/>".print_r($var,true);
	/* // debug display $var at end of post
	ob_start();
	var_dump($var);
	$result = ob_get_clean();
	$out .= $result;
	*/

	return $out;
}

add_shortcode('wf_events', 'wf_events');
add_shortcode('wf_display_event_info', 'wf_display_event');
/*
returns the first variable [0] or null if does not exist
*/
function wf_getvar($var) {
	if (isset($var)) {
		if ($var[0]=="") return null;
		return $var[0];
	}
	return null;
}

?>