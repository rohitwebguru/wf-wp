<?php

/*
 * Plugin Name: CB Default Content
 * Description: Easy to Change or sat Default Title and Content in post editor
 * Version: 1.0
 * Author: Md Abul Bashar
 * Author URI: http://www.codingbank.com
 */


// Register Functions
function cb_default_content_settings() {
	
	add_settings_section('cb_default_content_section', 'CB Default Content Area', 'cb_default_content_set', 'cb_default_content');
	
	add_settings_field('cb_default_title_id', 'CB Default Title', 'cb_default_title_input', 'cb_default_content', 'cb_default_content_section');

	register_setting('cb_default_content_section', 'cb_default_title_id');

	add_settings_field('cb_default_content_id', 'CB Default Content', 'cb_default_content_input', 'cb_default_content',  'cb_default_content_section');

	register_setting('cb_default_content_section', 'cb_default_content_id');


}
add_action('admin_init', 'cb_default_content_settings');



//register input title field
function cb_default_title_input(){
	echo '<input type="text" class="widefat" name="cb_default_title_id" value="'.get_option('cb_default_title_id').'"/>';


}


//register input Content field
function cb_default_content_input(){
	echo '<textarea class="large-text code" cols="50" rows="10" name="cb_default_content_id">'.get_option('cb_default_content_id').'</textarea>';

}

//Section Register Funtion
function cb_default_content_set(){
	echo '<p>You May Change your default title and content in post/page or other options</p>';

}


// CB Default Content Menu Register
function cb_default_content_menu_register() {
	add_options_page('CB Default Content Options', 'CB Default Content', 'manage_options', 'cb_default_content', 'cb_default_content_menu');

}
add_action('admin_menu', 'cb_default_content_menu_register');



//CB Default Content Menu content
function cb_default_content_menu() {
?>
	<form action="options.php" method="POST">
		<?php do_settings_sections('cb_default_content');?>
		<?php settings_fields('cb_default_content_section');?>
		<?php submit_button();?>
	</form>

<?php }

// Set Default Content
function cb_default_title( $title ) {

	$title = get_option('cb_default_title_id');
	return $title;

}
add_filter( 'default_title', 'cb_default_title' );

function cb_editor_content( $content ) {

	$content = get_option('cb_default_content_id');
	return $content;

}
add_filter( 'default_content', 'cb_editor_content' );





?>