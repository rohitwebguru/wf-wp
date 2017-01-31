<?php // Hook for adding admin menus
if ( is_admin() ){ // admin actions
  add_action('admin_menu', 'placid_slider_settings');
  add_action( 'admin_init', 'register_placid_settings' ); 
} 

// function for adding settings page to wp-admin
function placid_slider_settings() {
    // Add a new submenu under Options:
	add_menu_page( 'Placid Slider', 'Placid Slider', 'manage_options','placid-slider-admin', 'placid_slider_create_multiple_sliders', placid_slider_plugin_url( 'images/placid_slider_icon.gif' ) );
	add_submenu_page('placid-slider-admin', 'Placid Sliders', 'Sliders', 'manage_options', 'placid-slider-admin', 'placid_slider_create_multiple_sliders');
	add_submenu_page('placid-slider-admin', 'Placid Slider Settings', 'Settings', 'manage_options', 'placid-slider-settings', 'placid_slider_settings_page');
}
include('sliders.php');
// This function displays the page content for the Placid Slider Options submenu
function placid_slider_settings_page() {
global $placid_slider,$default_placid_slider_settings;
$scounter=get_option('placid_slider_scounter');
$cntr = $_GET['scounter'];
if ($_POST['create_set'] and $_POST['create_set']=='Create New Settings Set') {
  $scounter++;
  update_option('placid_slider_scounter',$scounter);
  $options='placid_slider_options'.$scounter;
  update_option($options,$default_placid_slider_settings);
}
$group='placid-slider-group'.$cntr;
$placid_slider_options='placid_slider_options'.$cntr;
$placid_slider_curr=get_option($placid_slider_options);
if(!isset($cntr) or empty($cntr)){$curr = 'Default';}
else{$curr = $cntr;}
?>

<div class="wrap" style="clear:both;">

<h2 style="float:left;"><?php _e('Placid Slider Settings ','placid-slider'); echo $curr; ?> </h2>
<form style="float:left;margin:10px 20px" action="" method="post">
<input type="submit" class="button-primary" value="Create New Settings Set" name="create_set"  onclick="return confirmSettingsCreate()" />
</form>

<?php $url = placid_sslider_admin_url( array( 'page' => 'placid-slider-admin' ) );?>
<a href="<?php echo $url; ?>" title="<?php _e('Go to Sliders page where you can re-order the slide posts, delete the slides from the slider etc.','placid-slider'); ?>"><?php _e('Go to Sliders Admin','placid-slider'); ?></a>

<form method="post" action="options.php">
<h2 style="clear:left;"><?php _e('Preview','placid-slider'); ?></h2> 
<?php settings_fields($group); ?>
<div><?php 
if ($placid_slider_curr['preview'] == "0")
	get_placid_slider($placid_slider_curr['slider_id'],$cntr);
elseif($placid_slider_curr['preview'] == "1")
	get_placid_slider_category($placid_slider_curr['catg_slug'],$cntr);
else
	get_placid_slider_recent($cntr);
?></div>

<div id="poststuff" class="metabox-holder has-right-sidebar" style="float:right;width:28%;"> 
<div class="postbox"> 
			  <h3 class="hndle"><span></span><?php _e('Settings Panels','placid-slider'); ?></h3> 
			  <div class="inside">
<?php 
for($i=1;$i<=$scounter;$i++){
   if ($i==1){
      echo '<h4><a href="'.placid_sslider_admin_url( array( 'page' => 'placid-slider-settings' ) ).'">Default Settings</a></h4>';
   }
   else {
      echo '<h4><a href="'.placid_sslider_admin_url( array( 'page' => 'placid-slider-settings' ) ).'&scounter='.$i.'">=&gt; Settings Set '.$i.'</a></h4>';
   }
}
?>
</div></div>

<div class="postbox"> 
<div style="background:#eee;line-height:200%"><a style="text-decoration:none;font-weight:bold;font-size:100%;color:#990000" href="<?php echo placid_slider_plugin_url('usage-guide/default.html');?>" title="Click here to read how to use the plugin and frequently asked questions about the plugin" target="_blank">Usage Guide and General FAQs</a></div>
</div>

<?php if ($placid_slider['support'] == "1"){ ?>
    
     		<div class="postbox"> 
			  <h3 class="hndle"><span></span><?php _e('Recommended Themes','placid-slider'); ?></h3> 
			  <div class="inside">
                     <div style="margin:10px 5px">
                        <a href="http://slidervilla.com/go/elegantthemes/" title="Recommended WordPress Themes" target="_blank"><img src="<?php echo placid_slider_plugin_url('images/elegantthemes.gif');?>" alt="Recommended WordPress Themes" /></a>
                        <p><a href="http://slidervilla.com/go/elegantthemes/" title="Recommended WordPress Themes" target="_blank">Elegant Themes</a> are attractive, compatible, affordable, SEO optimized WordPress Themes and have best support in community.</p>
                        <p><strong>Beautiful themes, Great support!</strong></p>
                        <p><a href="http://slidervilla.com/go/elegantthemes/" title="Recommended WordPress Themes" target="_blank">For more info visit ElegantThemes</a></p>
                     </div>
               </div></div>
	<?php } ?>
          
			<div class="postbox"> 
			  <h3 class="hndle"><span><?php _e('About this Plugin:','placid-slider'); ?></span></h3> 
			  <div class="inside">
                <ul>
                <li><a href="http://slidervilla.com/placid/" title="<?php _e('Placid Slider Homepage','placid-slider'); ?>
" ><?php _e('Plugin Homepage','placid-slider'); ?></a></li>
                </ul> 
              </div> 
			</div> 
      
			<div class="postbox"> 
			  <h3 class="hndle"><span></span><?php _e('Our Facebook Fan Page','placid-slider'); ?></h3> 
			  <div class="inside">
                <script type="text/javascript" src="http://static.ak.connect.facebook.com/js/api_lib/v0.4/FeatureLoader.js.php/en_GB"></script><script type="text/javascript">FB.init("2aeebe9fb014836a6810ec4426d26f7e");</script><fb:fan profile_id="175617229162618" stream="" connections="4" width="270" height="170"></fb:fan>
              </div> 
			</div> 
                 
 </div> <!--end of poststuff --> 

<div style="float:left;width:70%;">

<div id="slider_tabs">
        <ul class="ui-tabs">
            <li style="font-weight:bold;font-size:12px;"><a href="#basic">Basic Settings</a></li>
            <li style="font-weight:bold;font-size:12px;"><a href="#slider_content">Slider Content</a></li>
             <li style="font-weight:bold;font-size:12px;"><a href="#slider_nav">Navigation Settings</a></li>
        </ul>

<div id="basic">
<div style="border:1px solid #ccc;padding:10px;background:#fff;margin:10px 0">
<h2><?php _e('Basic Settings','placid-slider'); ?></h2> 
<p><?php _e('Customize the looks of the Slider box wrapping the content slides from here','placid-slider'); ?></p> 

<table class="form-table">

<tr valign="top">
<th scope="row"><?php _e('Scrolling Speed','placid-slider'); ?></th>
<td><input type="text" name="<?php echo $placid_slider_options;?>[speed]" id="placid_slider_speed" class="small-text" value="<?php echo $placid_slider_curr['speed']; ?>" /><?php _e(' Speed of the slide animation, Higher value indicates faster','placid-slider'); ?><br /><small style="color:#FF0000"><?php _e(' (IMP!! Enter Numberic value > 0, like 2 or 3, Caution: Do not enter decimal values)','placid-slider'); ?></small></td>
</tr>

<tr valign="top">
<th scope="row"><?php _e('Max. Number of Posts in the Placid Slider','placid-slider'); ?></th>
<td><input type="text" name="<?php echo $placid_slider_options;?>[no_posts]" id="placid_slider_no_posts" class="small-text" value="<?php echo $placid_slider_curr['no_posts']; ?>" /></td>
</tr>

<tr valign="top">
<th scope="row"><?php _e('Complete Slider Width','placid-slider'); ?></th>
<td><input type="text" name="<?php echo $placid_slider_options;?>[width]" id="placid_slider_width" class="small-text" value="<?php echo $placid_slider_curr['width']; ?>" />&nbsp;<?php _e('px','placid-slider'); ?><small><?php _e('(If set to 0, will take the container\'s width)','placid-slider'); ?></small></td>
</tr>

<tr valign="top">
<th scope="row"><?php _e('Scrolling Area Height (Excluding Slider Title)','placid-slider'); ?></th>
<td><input type="text" name="<?php echo $placid_slider_options;?>[height]" id="placid_slider_height" class="small-text" value="<?php echo $placid_slider_curr['height']; ?>" />&nbsp;<?php _e('px','placid-slider'); ?><small style="color:#FF0000"><?php _e(' (IMP!! Enter numeric value > 0)','placid-slider'); ?></small></td>
</tr>

<tr valign="top">
<th scope="row"><?php _e('Slide (Item) Width','placid-slider'); ?></th>
<td><input type="text" name="<?php echo $placid_slider_options;?>[iwidth]" id="placid_slider_iwidth" class="small-text" value="<?php echo $placid_slider_curr['iwidth']; ?>" />&nbsp;<?php _e('px','placid-slider'); ?><small style="color:#FF0000"><?php _e(' (IMP!! Enter numeric value > 0)','placid-slider'); ?></small></td>
</tr>

<tr valign="top">
<th scope="row"><?php _e('Estimated maximum width of the Slide Item','placid-slider'); ?></th>
<td><input type="text" name="<?php echo $placid_slider_options;?>[estimatedwidth]" id="placid_slider_estimatedwidth" class="small-text" value="<?php echo $placid_slider_curr['estimatedwidth']; ?>" />&nbsp;<?php _e('px','placid-slider'); ?><small style="color:#FF0000"><?php _e(' (Only required and considered if you do not enter any value in Slide (Item) Width) i.e. variable width slides','placid-slider'); ?></small></td>
</tr>

<tr valign="top">
<th scope="row"><?php _e('Slide Background Color','placid-slider'); ?></th>
<td><input type="text" name="<?php echo $placid_slider_options;?>[bg_color]" id="color_value_1" value="<?php echo $placid_slider_curr['bg_color']; ?>" />&nbsp; <img id="color_picker_1" src="<?php echo placid_slider_plugin_url( 'images/color_picker.png' ); ?>" alt="<?php _e('Pick the color of your choice','placid-slider'); ?>" /><div class="color-picker-wrap" id="colorbox_1"></div> &nbsp; &nbsp; &nbsp; 
<label for="placid_slider_bg"><input name="<?php echo $placid_slider_options;?>[bg]" type="checkbox" id="placid_slider_bg" value="1" <?php checked('1', $placid_slider_curr['bg']); ?>  /><?php _e(' Use Transparent Background','placid-slider'); ?></label> </td>
</tr>
 
<tr valign="top">
<th scope="row"><?php _e('Slide Border Thickness','placid-slider'); ?></th>
<td><input type="text" name="<?php echo $placid_slider_options;?>[border]" id="placid_slider_border" class="small-text" value="<?php echo $placid_slider_curr['border']; ?>" />&nbsp;<?php _e('px (put 0 if no border is required)','placid-slider'); ?></td>
</tr>

<tr valign="top">
<th scope="row"><?php _e('Slide Border Color','placid-slider'); ?></th>
<td><input type="text" name="<?php echo $placid_slider_options;?>[brcolor]" id="color_value_6" value="<?php echo $placid_slider_curr['brcolor']; ?>" />&nbsp; <img id="color_picker_6" src="<?php echo placid_slider_plugin_url( 'images/color_picker.png' ); ?>" alt="<?php _e('Pick the color of your choice','placid-slider'); ?>" /><div class="color-picker-wrap" id="colorbox_6"></div></td>
</tr>

</table>
<p class="submit">
<input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
</p>
</div>

<div style="border:1px solid #ccc;padding:10px;background:#fff;margin:10px 0">
<h2><?php _e('Miscellaneous','placid-slider'); ?></h2> 

<table class="form-table">

<tr valign="top">
<th scope="row"><?php _e('Retain these html tags','placid-slider'); ?></th>
<td><input type="text" name="<?php echo $placid_slider_options;?>[allowable_tags]" class="regular-text code" value="<?php echo $placid_slider_curr['allowable_tags']; ?>" /></td>
</tr>
<tr valign="top">
<th scope="row"><?php _e('Continue Reading Text','placid-slider'); ?></th>
<td><input type="text" name="<?php echo $placid_slider_options;?>[more]" class="regular-text code" value="<?php echo $placid_slider_curr['more']; ?>" /></td>
</tr>

<tr valign="top">
<th scope="row"><?php _e('Randomize Slides in Slider','placid-slider'); ?></th>
<td><input name="<?php echo $placid_slider_options;?>[rand]" type="checkbox" value="1" <?php checked('1', $placid_slider_curr['rand']); ?>  />&nbsp;<?php _e('check this if you want the slides added to appear in random order','placid-slider'); ?></td>
</tr>

<?php if(!isset($cntr) or empty($cntr)){?>

<tr valign="top">
<th scope="row"><?php _e('Minimum User Level to add Post to the Slider','placid-slider'); ?></th>
<td><select name="<?php echo $placid_slider_options;?>[user_level]" >
<option value="manage_options" <?php if ($placid_slider_curr['user_level'] == "manage_options"){ echo "selected";}?> ><?php _e('Administrator','placid-slider'); ?></option>
<option value="edit_others_posts" <?php if ($placid_slider_curr['user_level'] == "edit_others_posts"){ echo "selected";}?> ><?php _e('Editor and Admininstrator','placid-slider'); ?></option>
<option value="publish_posts" <?php if ($placid_slider_curr['user_level'] == "publish_posts"){ echo "selected";}?> ><?php _e('Author, Editor and Admininstrator','placid-slider'); ?></option>
<option value="edit_posts" <?php if ($placid_slider_curr['user_level'] == "edit_posts"){ echo "selected";}?> ><?php _e('Contributor, Author, Editor and Admininstrator','placid-slider'); ?></option>
</select>
</td>
</tr>

<tr valign="top">
<th scope="row"><?php _e('Text to display in the JavaScript disabled browser','placid-slider'); ?></th>
<td><input type="text" name="<?php echo $placid_slider_options;?>[noscript]" class="regular-text code" value="<?php echo $placid_slider_curr['noscript']; ?>" /></td>
</tr>

<tr valign="top">
<th scope="row"><?php _e('Add Shortcode Support','placid-slider'); ?></th>
<td><input name="<?php echo $placid_slider_options;?>[shortcode]" type="checkbox" value="1" <?php checked('1', $placid_slider_curr['shortcode']); ?>  />&nbsp;<?php _e('check this if you want to use Placid Slider Shortcode i.e [placidslider]','placid-slider'); ?></td>
</tr>

<tr valign="top">
<th scope="row"><?php _e('Placid Slider Styles to Use on Other than Post/Pages','placid-slider'); ?> <small><?php _e('(i.e. for index.php,category.php,archive.php etc)','placid-slider'); ?></small></th>
<td><select name="<?php echo $placid_slider_options;?>[stylesheet]" >
<?php 
$directory = PLACID_SLIDER_CSS_DIR;
if ($handle = opendir($directory)) {
    while (false !== ($file = readdir($handle))) { 
     if($file != '.' and $file != '..') { ?>
      <option value="<?php echo $file;?>" <?php if ($placid_slider_curr['stylesheet'] == $file){ echo "selected";}?> ><?php echo $file;?></option>
 <?php  } }
    closedir($handle);
}
?>
</select>
</td>
</tr>
<?php } ?>

<?php if(!isset($cntr) or empty($cntr)){?>
<tr valign="top">
<th scope="row"><?php _e('Multiple Slider Feature','placid-slider'); ?></th>
<td><label for="placid_slider_multiple"> 
<input name="<?php echo $placid_slider_options;?>[multiple_sliders]" type="checkbox" id="placid_slider_multiple" value="1" <?php checked("1", $placid_slider_curr['multiple_sliders']); ?> /> 
 <?php _e('Enable Multiple Slider Function on Edit Post/Page','placid-slider'); ?></label></td>
</tr>
<?php } ?>

<tr valign="top">
<th scope="row"><?php _e('Enable FOUC','placid-slider'); ?></th>
<td><input name="<?php echo $placid_slider_options;?>[fouc]" type="checkbox" value="1" <?php checked('1', $placid_slider_curr['fouc']); ?>  /><small><?php _e('(check this if you would not want to disable Flash of Unstyled Content in the slider when the page is loaded)','placid-slider'); ?></small></td>
</tr>

<tr valign="top">
<th scope="row"><?php _e('Placid Template Tag for Preview','placid-slider'); ?></th>
<td><select name="<?php echo $placid_slider_options;?>[preview]" >
<option value="2" <?php if ($placid_slider_curr['preview'] == "2"){ echo "selected";}?> ><?php _e('Recent Posts Slider','placid-slider'); ?></option>
<option value="1" <?php if ($placid_slider_curr['preview'] == "1"){ echo "selected";}?> ><?php _e('Category Slider','placid-slider'); ?></option>
<option value="0" <?php if ($placid_slider_curr['preview'] == "0"){ echo "selected";}?> ><?php _e('Custom Slider with Slider ID','placid-slider'); ?></option>
</select>
</td>
</tr>

<tr valign="top"> 
<th scope="row"><?php _e('Preview Slider Params','placid-slider'); ?></th> 
<td><fieldset><legend class="screen-reader-text"><span><?php _e('Preview Slider Params','placid-slider'); ?></span></legend> 
<label for="<?php echo $placid_slider_options;?>[slider_id]"><?php _e('Slider ID in case of Custom Slider','placid-slider'); ?></label>
<input type="text" name="<?php echo $placid_slider_options;?>[slider_id]" class="small-text" value="<?php echo $placid_slider_curr['slider_id']; ?>" /> 
<br />  <br />
<label for="<?php echo $placid_slider_options;?>[catg_slug]"><?php _e('Category Slug in case of Category Slider','placid-slider'); ?></label>
<input type="text" name="<?php echo $placid_slider_options;?>[catg_slug]" class="regular-text code" style="width:100px;" value="<?php echo $placid_slider_curr['catg_slug']; ?>" /> 
</fieldset></td> 
</tr> 

<?php if(!isset($cntr) or empty($cntr)){?>

<tr valign="top">
<th scope="row"><?php _e('Custom Styles','placid-slider'); ?></th>
<td><textarea name="<?php echo $placid_slider_options;?>[css]"  rows="5" cols="40" class="regular-text code"><?php echo $placid_slider_curr['css']; ?></textarea></td><small><?php _e('(custom css styles that you would want to be applied to the slider elements)','placid-slider'); ?></small>
</tr>

<tr valign="top">
<th scope="row"><?php _e('Show Promotionals on Admin Page','placid-slider'); ?></th>
<td><select name="<?php echo $placid_slider_options;?>[support]" >
<option value="1" <?php if ($placid_slider_curr['support'] == "1"){ echo "selected";}?> ><?php _e('Yes','placid-slider'); ?></option>
<option value="0" <?php if ($placid_slider_curr['support'] == "0"){ echo "selected";}?> ><?php _e('No','placid-slider'); ?></option>
</select>
</td>
</tr>
<?php } ?>

</table>
</div>
</div> <!--Basic Tab Ends-->

<div id="slider_content">
<div style="border:1px solid #ccc;padding:10px;background:#fff;margin:10px 0">
<h2><?php _e('Slider Title','placid-slider'); ?></h2> 
<p><?php _e('Customize the looks of the main title of the Slideshow from here','placid-slider'); ?></p> 
<table class="form-table">

<tr valign="top">
<th scope="row"><?php _e('Default Title Text','placid-slider'); ?></th>
<td><input type="text" name="<?php echo $placid_slider_options;?>[title_text]" id="placid_slider_title_text" value="<?php echo $placid_slider_curr['title_text']; ?>" /></td>
</tr>

<tr valign="top">
<th scope="row"><?php _e('Pick Slider Title From','placid-slider'); ?></th>
<td><select name="<?php echo $placid_slider_options;?>[title_from]" >
<option value="0" <?php if ($placid_slider_curr['title_from'] == "0"){ echo "selected";}?> ><?php _e('Default Title Text','placid-slider'); ?></option>
<option value="1" <?php if ($placid_slider_curr['title_from'] == "1"){ echo "selected";}?> ><?php _e('Slider Name','placid-slider'); ?></option>
</select>
</td>
</tr>

<tr valign="top">
<th scope="row"><?php _e('Font','placid-slider'); ?></th>
<td><select name="<?php echo $placid_slider_options;?>[title_font]" id="placid_slider_title_font" >
<option value="Arial" <?php if ($placid_slider_curr['title_font'] == "Arial"){ echo "selected";}?> >Arial</option>
<option value="Book Antiqua" <?php if ($placid_slider_curr['title_font'] == "Book Antiqua"){ echo "selected";}?> >Book Antiqua</option>
<option value="Bookman Old Style" <?php if ($placid_slider_curr['title_font'] == "Bookman Old Style"){ echo "selected";}?> >Bookman Old Style</option>
<option value="Calibri" <?php if ($placid_slider_curr['title_font'] == "Calibri"){ echo "selected";}?> >Calibri</option>
<option value="Century Schoolbook" <?php if ($placid_slider_curr['title_font'] == "Century Schoolbook"){ echo "selected";}?> >Century Schoolbook</option>
<option value="Courier New" <?php if ($placid_slider_curr['title_font'] == "Courier New"){ echo "selected";}?> >Courier New</option>
<option value="Geneva" <?php if ($placid_slider_curr['title_font'] == "Geneva"){ echo "selected";}?> >Geneva</option>
<option value="Georgia" <?php if ($placid_slider_curr['title_font'] == "Georgia"){ echo "selected";} ?> >Georgia</option>
<option value="Helvetica" <?php if ($placid_slider_curr['title_font'] == "Helvetica"){ echo "selected";}?> >Helvetica</option>
<option value="Monotype Corsiva" <?php if ($placid_slider_curr['title_font'] == "Monotype Corsiva"){ echo "selected";}?> >Monotype Corsiva</option>
<option value="Times New Roman" <?php if ($placid_slider_curr['title_font'] == "Times New Roman"){ echo "selected";}?> >Times New Roman</option>
<option value="Trebuchet MS" <?php if ($placid_slider_curr['title_font'] == "Trebuchet MS"){ echo "selected";}?> >Trebuchet MS</option>
<option value="Verdana" <?php if ($placid_slider_curr['title_font'] == "Verdana"){ echo "selected";}?> >Verdana</option>
</select>
</td>
</tr>

<tr valign="top">
<th scope="row"><?php _e('Font Color','placid-slider'); ?></th>
<td><input type="text" name="<?php echo $placid_slider_options;?>[title_fcolor]" id="color_value_2" value="<?php echo $placid_slider_curr['title_fcolor']; ?>" />&nbsp; <img id="color_picker_2" src="<?php echo placid_slider_plugin_url( 'images/color_picker.png' ); ?>" alt="<?php _e('Pick the color of your choice','placid-slider'); ?>" /><div class="color-picker-wrap" id="colorbox_2"></div></td>
</tr>

<tr valign="top">
<th scope="row"><?php _e('Font Size','placid-slider'); ?></th>
<td><input type="text" name="<?php echo $placid_slider_options;?>[title_fsize]" id="placid_slider_title_fsize" class="small-text" value="<?php echo $placid_slider_curr['title_fsize']; ?>" />&nbsp;<?php _e('px','placid-slider'); ?></td>
</tr>

<tr valign="top">
<th scope="row"><?php _e('Font Style','placid-slider'); ?></th>
<td><select name="<?php echo $placid_slider_options;?>[title_fstyle]" id="placid_slider_title_fstyle" >
<option value="bold" <?php if ($placid_slider_curr['title_fstyle'] == "bold"){ echo "selected";}?> ><?php _e('Bold','placid-slider'); ?></option>
<option value="bold italic" <?php if ($placid_slider_curr['title_fstyle'] == "bold italic"){ echo "selected";}?> ><?php _e('Bold Italic','placid-slider'); ?></option>
<option value="italic" <?php if ($placid_slider_curr['title_fstyle'] == "italic"){ echo "selected";}?> ><?php _e('Italic','placid-slider'); ?></option>
<option value="normal" <?php if ($placid_slider_curr['title_fstyle'] == "normal"){ echo "selected";}?> ><?php _e('Normal','placid-slider'); ?></option>
</select>
</td>
</tr>
</table>
<p class="submit">
<input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
</p>
</div>

<div style="border:1px solid #ccc;padding:10px;background:#fff;margin:10px 0">
<h2><?php _e('Post Title','placid-slider'); ?></h2> 
<p><?php _e('Customize the looks of the title of each of the sliding post here','placid-slider'); ?></p> 
<table class="form-table">

<tr valign="top">
<th scope="row"><?php _e('Font','placid-slider'); ?></th>
<td><select name="<?php echo $placid_slider_options;?>[ptitle_font]" id="placid_slider_ptitle_font" >
<option value="Arial" <?php if ($placid_slider_curr['ptitle_font'] == "Arial"){ echo "selected";}?> >Arial</option>
<option value="Book Antiqua" <?php if ($placid_slider_curr['ptitle_font'] == "Book Antiqua"){ echo "selected";}?> >Book Antiqua</option>
<option value="Bookman Old Style" <?php if ($placid_slider_curr['ptitle_font'] == "Bookman Old Style"){ echo "selected";}?> >Bookman Old Style</option>
<option value="Calibri" <?php if ($placid_slider_curr['ptitle_font'] == "Calibri"){ echo "selected";}?> >Calibri</option>
<option value="Century Schoolbook" <?php if ($placid_slider_curr['ptitle_font'] == "Century Schoolbook"){ echo "selected";}?> >Century Schoolbook</option>
<option value="Courier New" <?php if ($placid_slider_curr['ptitle_font'] == "Courier New"){ echo "selected";}?> >Courier New</option>
<option value="Geneva" <?php if ($placid_slider_curr['ptitle_font'] == "Geneva"){ echo "selected";}?> >Geneva</option>
<option value="Georgia" <?php if ($placid_slider_curr['ptitle_font'] == "Georgia"){ echo "selected";} ?> >Georgia</option>
<option value="Helvetica" <?php if ($placid_slider_curr['ptitle_font'] == "Helvetica"){ echo "selected";}?> >Helvetica</option>
<option value="Monotype Corsiva" <?php if ($placid_slider_curr['ptitle_font'] == "Monotype Corsiva"){ echo "selected";}?> >Monotype Corsiva</option>
<option value="Times New Roman" <?php if ($placid_slider_curr['ptitle_font'] == "Times New Roman"){ echo "selected";}?> >Times New Roman</option>
<option value="Trebuchet MS" <?php if ($placid_slider_curr['ptitle_font'] == "Trebuchet MS"){ echo "selected";}?> >Trebuchet MS</option>
<option value="Verdana" <?php if ($placid_slider_curr['ptitle_font'] == "Verdana"){ echo "selected";}?> >Verdana</option>
</select>
</td>
</tr>

<tr valign="top">
<th scope="row"><?php _e('Font Color','placid-slider'); ?></th>
<td><input type="text" name="<?php echo $placid_slider_options;?>[ptitle_fcolor]" id="color_value_3" value="<?php echo $placid_slider_curr['ptitle_fcolor']; ?>" />&nbsp; <img id="color_picker_3" src="<?php echo placid_slider_plugin_url( 'images/color_picker.png' ); ?>" alt="<?php _e('Pick the color of your choice','placid-slider'); ?>" /><div class="color-picker-wrap" id="colorbox_3"></div></td>
</tr>

<tr valign="top">
<th scope="row"><?php _e('Font Size','placid-slider'); ?></th>
<td><input type="text" name="<?php echo $placid_slider_options;?>[ptitle_fsize]" id="placid_slider_ptitle_fsize" class="small-text" value="<?php echo $placid_slider_curr['ptitle_fsize']; ?>" />&nbsp;<?php _e('px','placid-slider'); ?></td>
</tr>

<tr valign="top">
<th scope="row"><?php _e('Font Style','placid-slider'); ?></th>
<td><select name="<?php echo $placid_slider_options;?>[ptitle_fstyle]" id="placid_slider_ptitle_fstyle" >
<option value="bold" <?php if ($placid_slider_curr['ptitle_fstyle'] == "bold"){ echo "selected";}?> ><?php _e('Bold','placid-slider'); ?></option>
<option value="bold italic" <?php if ($placid_slider_curr['ptitle_fstyle'] == "bold italic"){ echo "selected";}?> ><?php _e('Bold Italic','placid-slider'); ?></option>
<option value="italic" <?php if ($placid_slider_curr['ptitle_fstyle'] == "italic"){ echo "selected";}?> ><?php _e('Italic','placid-slider'); ?></option>
<option value="normal" <?php if ($placid_slider_curr['ptitle_fstyle'] == "normal"){ echo "selected";}?> ><?php _e('Normal','placid-slider'); ?></option>
</select>
</td>
</tr>
</table>
<p class="submit">
<input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
</p>
</div>

<div style="border:1px solid #ccc;padding:10px;background:#fff;margin:10px 0">
<h2><?php _e('Thumbnail Image','placid-slider'); ?></h2> 
<p><?php _e('Customize the looks of the thumbnail image for each of the sliding post here','placid-slider'); ?></p> 
<table class="form-table">

<tr valign="top"> 
<th scope="row"><?php _e('Image Pick Preferences','placid-slider'); ?> <small><?php _e('(The first one is having priority over second, the second having priority on third and so on)','placid-slider'); ?></small></th> 
<td><fieldset><legend class="screen-reader-text"><span><?php _e('Image Pick Sequence','placid-slider'); ?> <small><?php _e('(The first one is having priority over second, the second having priority on third and so on)','placid-slider'); ?></small> </span></legend> 
<input name="<?php echo $placid_slider_options;?>[img_pick][0]" type="checkbox" value="1" <?php checked('1', $placid_slider_curr['img_pick'][0]); ?>  /> <?php _e('Use Custom Field/Key','placid-slider'); ?> &nbsp; &nbsp; 
<input type="text" name="<?php echo $placid_slider_options;?>[img_pick][1]" class="text" value="<?php echo $placid_slider_curr['img_pick'][1]; ?>" /> <?php _e('Name of the Custom Field/Key','placid-slider'); ?>
<br />
<input name="<?php echo $placid_slider_options;?>[img_pick][2]" type="checkbox" value="1" <?php checked('1', $placid_slider_curr['img_pick'][2]); ?>  /> <?php _e('Use Featured Post/Thumbnail (Wordpress 3.0 +  feature)','placid-slider'); ?>&nbsp; <br />
<input name="<?php echo $placid_slider_options;?>[img_pick][3]" type="checkbox" value="1" <?php checked('1', $placid_slider_curr['img_pick'][3]); ?>  /> <?php _e('Consider Images attached to the post','placid-slider'); ?> &nbsp; &nbsp; 
<input type="text" name="<?php echo $placid_slider_options;?>[img_pick][4]" class="small-text" value="<?php echo $placid_slider_curr['img_pick'][4]; ?>" /> <?php _e('Order of the Image attachment to pick','placid-slider'); ?> &nbsp; <br />
<input name="<?php echo $placid_slider_options;?>[img_pick][5]" type="checkbox" value="1" <?php checked('1', $placid_slider_curr['img_pick'][5]); ?>  /> <?php _e('Scan images from the post, in case there is no attached image to the post','placid-slider'); ?>&nbsp; 
</fieldset></td> 
</tr> 

<tr valign="top">
<th scope="row"><?php _e('Align to','placid-slider'); ?></th>
<td><select name="<?php echo $placid_slider_options;?>[img_align]" id="placid_slider_img_align" >
<option value="left" <?php if ($placid_slider_curr['img_align'] == "left"){ echo "selected";}?> ><?php _e('Left','placid-slider'); ?></option>
<option value="right" <?php if ($placid_slider_curr['img_align'] == "right"){ echo "selected";}?> ><?php _e('Right','placid-slider'); ?></option>
<option value="none" <?php if ($placid_slider_curr['img_align'] == "none"){ echo "selected";}?> ><?php _e('Center','placid-slider'); ?></option>
</select>
</td>
</tr>

<tr valign="top">
<th scope="row"><?php _e('Wordpress Image Extract Size','placid-slider'); ?>
</th>
<td><select name="<?php echo $placid_slider_options;?>[crop]" id="placid_slider_img_crop" >
<option value="0" <?php if ($placid_slider_curr['crop'] == "0"){ echo "selected";}?> ><?php _e('Full','placid-slider'); ?></option>
<option value="1" <?php if ($placid_slider_curr['crop'] == "1"){ echo "selected";}?> ><?php _e('Large','placid-slider'); ?></option>
<option value="2" <?php if ($placid_slider_curr['crop'] == "2"){ echo "selected";}?> ><?php _e('Medium','placid-slider'); ?></option>
<option value="3" <?php if ($placid_slider_curr['crop'] == "3"){ echo "selected";}?> ><?php _e('Thumbnail','placid-slider'); ?></option>
</select>
<small><?php _e('This is for fast page load, in case you choose \'Custom Size\' setting from below, you would not like to extract \'full\' size image from the media library. In this case you can use, \'medium\' or \'thumbnail\' image. This is because, for every image upload to the media gallery WordPress creates four sizes of the same image. So you can choose which to load in the slider and then specify the actual size.','placid-slider'); ?></small>
</td>
</tr>

<tr valign="top"> 
<th scope="row"><?php _e('Image Size','placid-slider'); ?></th> 
<td><fieldset><legend class="screen-reader-text"><span><?php _e('Image Size','placid-slider'); ?></span></legend> 
<label for="<?php echo $placid_slider_options;?>[img_width]"><?php _e('Width','placid-slider'); ?></label>
<input type="text" name="<?php echo $placid_slider_options;?>[img_width]" class="small-text" value="<?php echo $placid_slider_curr['img_width']; ?>" />&nbsp;<?php _e('px','placid-slider'); ?> &nbsp;&nbsp; 
<label for="<?php echo $placid_slider_options;?>[img_height]"><?php _e('Height','placid-slider'); ?></label>
<input type="text" name="<?php echo $placid_slider_options;?>[img_height]" class="small-text" value="<?php echo $placid_slider_curr['img_height']; ?>" />&nbsp;<?php _e('px','placid-slider'); ?> &nbsp;&nbsp; 
</fieldset></td> 
</tr>

<tr valign="top">
<th scope="row"><?php _e('Border Thickness','placid-slider'); ?></th>
<td><input type="text" name="<?php echo $placid_slider_options;?>[img_border]" id="placid_slider_img_border" class="small-text" value="<?php echo $placid_slider_curr['img_border']; ?>" />&nbsp;<?php _e('px  (put 0 if no border is required)','placid-slider'); ?></td>
</tr>

<tr valign="top">
<th scope="row"><?php _e('Border Color','placid-slider'); ?></th>
<td><input type="text" name="<?php echo $placid_slider_options;?>[img_brcolor]" id="color_value_4" value="<?php echo $placid_slider_curr['img_brcolor']; ?>" />&nbsp; <img id="color_picker_4" src="<?php echo placid_slider_plugin_url( 'images/color_picker.png' ); ?>" alt="<?php _e('Pick the color of your choice','placid-slider'); ?>" /><div class="color-picker-wrap" id="colorbox_4"></div></td>
</tr>

<tr valign="top">
<th scope="row"><?php _e('Disable Image Cropping (using timthumb)','placid-slider'); ?></th>
<td><select name="<?php echo $placid_slider_options;?>[timthumb]" >
<option value="0" <?php if ($placid_slider_curr['timthumb'] == "0"){ echo "selected";}?> ><?php _e('No','placid-slider'); ?></option>
<option value="1" <?php if ($placid_slider_curr['timthumb'] == "1"){ echo "selected";}?> ><?php _e('Yes','placid-slider'); ?></option>
</select>
</td>
</tr>

<tr valign="top">
<th scope="row"><?php _e('Make pure Image Slider','placid-slider'); ?></th>
<td><input name="<?php echo $placid_slider_options;?>[image_only]" type="checkbox" value="1" <?php checked('1', $placid_slider_curr['image_only']); ?>  />&nbsp;<?php _e('(check this to convert Placid Slider to Image Slider with no content)','placid-slider'); ?></td>
</tr>
</table>
<p class="submit">
<input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
</p>
</div>

<div style="border:1px solid #ccc;padding:10px;background:#fff;margin:10px 0">
<h2><?php _e('Slide Content','placid-slider'); ?></h2> 
<p><?php _e('Customize the looks of the content of each of the sliding post here','placid-slider'); ?></p> 
<table class="form-table">
<tr valign="top">
<th scope="row"><?php _e('Show content in slides below title','placid-slider'); ?></th>
<td><input name="<?php echo $placid_slider_options;?>[show_content]" type="checkbox" value="1" <?php checked('1', $placid_slider_curr['show_content']); ?>  /></td>
</tr>
<tr valign="top">
<th scope="row"><?php _e('Font','placid-slider'); ?></th>
<td><select name="<?php echo $placid_slider_options;?>[content_font]" id="placid_slider_content_font" >
<option value="Arial" <?php if ($placid_slider_curr['content_font'] == "Arial"){ echo "selected";}?> >Arial</option>
<option value="Book Antiqua" <?php if ($placid_slider_curr['content_font'] == "Book Antiqua"){ echo "selected";}?> >Book Antiqua</option>
<option value="Bookman Old Style" <?php if ($placid_slider_curr['content_font'] == "Bookman Old Style"){ echo "selected";}?> >Bookman Old Style</option>
<option value="Calibri" <?php if ($placid_slider_curr['content_font'] == "Calibri"){ echo "selected";}?> >Calibri</option>
<option value="Century Schoolbook" <?php if ($placid_slider_curr['content_font'] == "Century Schoolbook"){ echo "selected";}?> >Century Schoolbook</option>
<option value="Courier New" <?php if ($placid_slider_curr['content_font'] == "Courier New"){ echo "selected";}?> >Courier New</option>
<option value="Geneva" <?php if ($placid_slider_curr['content_font'] == "Geneva"){ echo "selected";}?> >Geneva</option>
<option value="Georgia" <?php if ($placid_slider_curr['content_font'] == "Georgia"){ echo "selected";} ?> >Georgia</option>
<option value="Helvetica" <?php if ($placid_slider_curr['content_font'] == "Helvetica"){ echo "selected";}?> >Helvetica</option>
<option value="Monotype Corsiva" <?php if ($placid_slider_curr['content_font'] == "Monotype Corsiva"){ echo "selected";}?> >Monotype Corsiva</option>
<option value="Times New Roman" <?php if ($placid_slider_curr['content_font'] == "Times New Roman"){ echo "selected";}?> >Times New Roman</option>
<option value="Trebuchet MS" <?php if ($placid_slider_curr['content_font'] == "Trebuchet MS"){ echo "selected";}?> >Trebuchet MS</option>
<option value="Verdana" <?php if ($placid_slider_curr['content_font'] == "Verdana"){ echo "selected";}?> >Verdana</option>
</select>
</td>
</tr>

<tr valign="top">
<th scope="row"><?php _e('Font Color','placid-slider'); ?></th>
<td><input type="text" name="<?php echo $placid_slider_options;?>[content_fcolor]" id="color_value_5" value="<?php echo $placid_slider_curr['content_fcolor']; ?>" />&nbsp; <img id="color_picker_5" src="<?php echo placid_slider_plugin_url( 'images/color_picker.png' ); ?>" alt="Pick the color of your choice','placid-slider'); ?>" /><div class="color-picker-wrap" id="colorbox_5"></div></td>
</tr>

<tr valign="top">
<th scope="row"><?php _e('Font Size','placid-slider'); ?></th>
<td><input type="text" name="<?php echo $placid_slider_options;?>[content_fsize]" id="placid_slider_content_fsize" class="small-text" value="<?php echo $placid_slider_curr['content_fsize']; ?>" />&nbsp;<?php _e('px','placid-slider'); ?></td>
</tr>

<tr valign="top">
<th scope="row"><?php _e('Font Style','placid-slider'); ?></th>
<td><select name="<?php echo $placid_slider_options;?>[content_fstyle]" id="placid_slider_content_fstyle" >
<option value="bold" <?php if ($placid_slider_curr['content_fstyle'] == "bold"){ echo "selected";}?> ><?php _e('Bold','placid-slider'); ?></option>
<option value="bold italic" <?php if ($placid_slider_curr['content_fstyle'] == "bold italic"){ echo "selected";}?> ><?php _e('Bold Italic','placid-slider'); ?></option>
<option value="italic" <?php if ($placid_slider_curr['content_fstyle'] == "italic"){ echo "selected";}?> ><?php _e('Italic','placid-slider'); ?></option>
<option value="normal" <?php if ($placid_slider_curr['content_fstyle'] == "normal"){ echo "selected";}?> ><?php _e('Normal','placid-slider'); ?></option>
</select>
</td>
</tr>

<tr valign="top">
<th scope="row"><?php _e('Pick content From','placid-slider'); ?></th>
<td><select name="<?php echo $placid_slider_options;?>[content_from]" id="placid_slider_content_from" >
<option value="slider_content" <?php if ($placid_slider_curr['content_from'] == "slider_content"){ echo "selected";}?> ><?php _e('Slider Content Custom field','placid-slider'); ?></option>
<option value="excerpt" <?php if ($placid_slider_curr['content_from'] == "excerpt"){ echo "selected";}?> ><?php _e('Post Excerpt','placid-slider'); ?></option>
<option value="content" <?php if ($placid_slider_curr['content_from'] == "content"){ echo "selected";}?> ><?php _e('From Content','placid-slider'); ?></option>
</select>
</td>
</tr>

<tr valign="top">
<th scope="row"><?php _e('Maximum content size (in characters)','placid-slider'); ?></th>
<td><input type="text" name="<?php echo $placid_slider_options;?>[content_chars]" id="placid_slider_content_chars" class="small-text" value="<?php echo $placid_slider_curr['content_chars']; ?>" />&nbsp;<?php _e('characters','placid-slider'); ?> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</td>
</tr>
<tr valign="top">
<th scope="row"><?php _e('Maximum content size (in words)','placid-slider'); ?></th>
<td><input type="text" name="<?php echo $placid_slider_options;?>[content_limit]" id="placid_slider_content_limit" class="small-text" value="<?php echo $placid_slider_curr['content_limit']; ?>" />&nbsp;<?php _e('words (if specified will override the \'Maximum Content Size in Chracters\' setting above)','placid-slider'); ?></td>
</tr>

</table>

</div>
</div> <!-- slider_content tab ends-->

<div id="slider_nav">
<div style="border:1px solid #ccc;padding:10px;background:#fff;margin:10px 0">
<h2><?php _e('Navigational Arrows','placid-slider'); ?></h2> 

<table class="form-table">
<tr valign="top"> 
<th scope="row"><?php _e('Enable Prev/Next navigation arrows','placid-slider'); ?></th> 
<td><label for="placid_slider_prev_next"> 
<input name="<?php echo $placid_slider_options;?>[prev_next]" type="checkbox" id="placid_slider_prev_next" value="1" <?php checked("1", $placid_slider_curr['prev_next']); ?> /> &nbsp;<?php _e('If enabled, will disable auto scrolling / sliding','placid-slider'); ?>
</td>
</tr>
</table>
</div>
</div><!-- slider_nav tab ends-->

</div> <!--end of tabs -->

<p class="submit">
<input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
</p>
</div> <!--end of float left -->
</form>

</div> <!--end of float wrap -->


<?php	
}
function register_placid_settings() { // whitelist options
  $scounter=get_option('placid_slider_scounter');
  for($i=1;$i<=$scounter;$i++){
	   if ($i==1){
		  register_setting( 'placid-slider-group', 'placid_slider_options' );
	   }
	   else {
	      $group='placid-slider-group'.$i;
		  $options='placid_slider_options'.$i;
		  register_setting( $group, $options );
	   }
  }
}
?>