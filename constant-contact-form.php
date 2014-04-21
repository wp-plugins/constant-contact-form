<?php
/*
Plugin Name: constant contact form
Plugin URI: http://www.gopiplus.com/work/2010/07/18/constant-contact/
Description: This constant contact form plugin add the entered email address into site admin constantcontact.com account with mentioned group. and this will send thank you mail to the entered email address.
Author: Gopi Ramasamy
Version: 6.2
Author URI: http://www.gopiplus.com/work/2010/07/18/constant-contact/
Donate link: http://www.gopiplus.com/work/2010/07/18/constant-contact/
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/

global $wpdb, $wp_version;

function ccf_show()
{
	include_once("class/ccf_widget.php");
}

function ccf_activation()
{
	global $wpdb;
	add_option('ccf_username', "enter username");
	add_option('ccf_password', "enter password");
	add_option('ccf_group', "General Interest");
	add_option('ccf_title', "Newsletter");
	add_option('ccf_caption', "Sign up for Hints & Tips e-Newsletter");
	add_option('ccf_adminemail', "admin@youremail.com");
	add_option('ccf_fromemail', "noreply@youremail.com");
	add_option('ccf_with_in_textbox', "Email:");
	add_option('ccf_button', "Submit");
	add_option('ccf_adminmail', "YES");
	add_option('ccf_adminmail_subject', "New email subscription");
	add_option('ccf_adminmail_content', "Hi Admin, We have received a request to subscribe new email address to receive emails from our website. Thank you.");
	add_option('ccf_usermail', "YES");
	add_option('ccf_usermail_subject', "Confirm subscription");
	add_option('ccf_usermail_content', "Hi User, We have received a request to subscribe this email address to receive newsletter from our website. Thank you.");
}

function ccf_widget($args) 
{
	  extract($args);
	  echo $before_widget;
	  echo $before_title;
	  echo get_option('ccf_title');
	  echo $after_title;
	  ccf_show();
	  echo $after_widget;
}

function ccf_control() 
{
	echo '<p><b>';
	_e('Constant contact form', 'constant-contact');
	echo '.</b> ';
	_e('Check official website for more information', 'constant-contact');
	?> <a target="_blank" href="http://www.gopiplus.com/work/2010/07/18/constant-contact/"><?php _e('click here', 'constant-contact'); ?></a></p><?php
}

function ccf_admin_options()
{
	include_once("setting.php");
}

function ccf_plugins_loaded()
{
	if(function_exists('wp_register_sidebar_widget')) 
	{
		wp_register_sidebar_widget( __('Constant contact form', 'constant-contact'), 
					__('Constant contact form', 'constant-contact'), 'ccf_widget');
	}
	
	if(function_exists('wp_register_widget_control')) 
	{
		wp_register_widget_control( __('Constant contact form', 'constant-contact'), 
					array( __('Constant contact form', 'constant-contact'), 'widgets'), 'ccf_control');
	} 
}

function ccf_deactivate() 
{
	// No action required.
}

add_shortcode( 'constant-contact-form', 'ccf_constant_contact_form_shortcode' );

function ccf_constant_contact_form_shortcode( $atts ) 
{
	$ccf = "";
	//[constant-contact-form load="1"]
	if ( ! is_array( $atts ) )
	{
		return '';
	}
	$load = $atts['load'];
	
	$links = "'".get_option('siteurl').'/wp-content/plugins/constant-contact-form/class/'."'";
	//echo $links;
	$ccf_with_in_textbox = "'".get_option('ccf_with_in_textbox')."'";
	$ccf_button = get_option('ccf_button');
	$ccf_space = "''";
	
	$ccf = $ccf . '<div>';
	$ccf = $ccf . '<div class="ccf_caption">';
	$ccf = $ccf . get_option('ccf_caption');
	$ccf = $ccf . '</div>';
	$ccf = $ccf . '<div class="ccf_msg">';
	$ccf = $ccf . '<span id="ccf_msg"></span>';
	$ccf = $ccf . '</div>';
	$ccf = $ccf . '<div class="ccf_textbox">';
	$ccf = $ccf . '<input class="ccf_textbox_class" name="ccf_txt_email" id="ccf_txt_email" ';
	$ccf = $ccf . 'onkeypress="if(event.keyCode==13) ccf_submit_ajax('.$links.')" ';
	$ccf = $ccf . 'onblur="if(this.value=='.$ccf_space.') this.value='.$ccf_with_in_textbox.';" ';
	$ccf = $ccf . 'onfocus="if(this.value=='.$ccf_with_in_textbox.') this.value='.$ccf_space.';" ';
	$ccf = $ccf . 'value='.$ccf_with_in_textbox.' maxlength="150" type="text">';
	$ccf = $ccf . '</div>';
	$ccf = $ccf . '<div class="ccf_button">';
	$ccf = $ccf . '<input class="ccf_textbox_button" type="button" name="ccf_txt_Button" onClick="return ccf_submit_ajax('.$links.')" id="ccf_txt_Button" value="'.$ccf_button.'">';
	$ccf = $ccf . '</div>';
	$ccf = $ccf . '</div>';
	return $ccf;
}

function ccf_add_to_menu() 
{
	add_options_page( __('Constant contact form', 'constant-contact'), 
			__('Constant contact form', 'constant-contact'), 'manage_options', 'constant-contact-form', 'ccf_admin_options' );
}

if (is_admin()) 
{
	add_action('admin_menu', 'ccf_add_to_menu');
}

function ccf_add_javascript_files() 
{
	if (!is_admin())
	{
		wp_enqueue_script( 'ccf_ajax', get_option('siteurl').'/wp-content/plugins/constant-contact-form/class/ccf_ajax.js');
		wp_enqueue_style( 'ccf_custom', get_option('siteurl').'/wp-content/plugins/constant-contact-form/class/ccf_custom.css','','','screen');
	}
}    

function ccf_textdomain() 
{
	  load_plugin_textdomain( 'constant-contact', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
}

add_action('plugins_loaded', 'ccf_textdomain');
add_action('init', 'ccf_add_javascript_files');
register_activation_hook(__FILE__, 'ccf_activation');
add_action("plugins_loaded", "ccf_plugins_loaded");
register_deactivation_hook( __FILE__, 'ccf_deactivate' );
?>