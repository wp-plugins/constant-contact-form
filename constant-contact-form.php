<?php

/*
Plugin Name: constant contact form
Plugin URI: http://www.gopiplus.com/work/2010/07/18/constant-contact/
Description: This constant contact form plugin add the entered email address into site admin constantcontact.com account with mentioned group. and this will send thank you mail to the entered email address.
Author: Gopi.R
Version: 1.0
Author URI: http://www.gopiplus.com/work/2010/07/18/constant-contact/
Donate link: http://www.gopiplus.com/work/2010/07/18/constant-contact/
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
	add_option('ccf_adminemail', "gopiplus@gmail.com");
	add_option('ccf_fromemail', "noreply@websitename.com");
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
	echo '<p>Constant contact form.<br> To change the setting goto Constant contact form link under setting tab.';
	echo ' <a href="options-general.php?page=constant-contact-form/constant-contact-form.php">';
	echo 'click here</a></p>';
}

function ccf_admin_options()
{
	include_once("help.php");
}

function ccf_plugins_loaded()
{
  	register_sidebar_widget(__('constant contact form'), 'ccf_widget');   
	
	if(function_exists('register_sidebar_widget')) 
	{
		register_sidebar_widget('constant contact form', 'ccf_widget');
	}
	
	if(function_exists('register_widget_control')) 
	{
		register_widget_control(array('constant contact form', 'widgets'), 'ccf_control');
	} 
}


function ccf_deactivate() 
{

}

function ccf_add_to_menu() 
{
	add_options_page('constant contact form', 'constant contact form', 'manage_options', __FILE__, 'ccf_admin_options' );
	add_options_page('constant contact form', '', 'manage_options', "constant-contact-form/setting.php",'' );
}

if (is_admin()) 
{
	add_action('admin_menu', 'ccf_add_to_menu');
}

register_activation_hook(__FILE__, 'ccf_activation');
add_action("plugins_loaded", "ccf_plugins_loaded");
register_deactivation_hook( __FILE__, 'ccf_deactivate' );
add_action('admin_menu', 'ccf_add_to_menu');
?>