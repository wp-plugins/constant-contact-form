<?php
/*
Plugin Name: constant contact form
Plugin URI: http://www.gopiplus.com/work/2010/07/18/constant-contact/
Description: This constant contact form plugin add the entered email address into site admin constantcontact.com account with mentioned group. and this will send thank you mail to the entered email address.
Author: Gopi Ramasamy
Version: 6.5
Author URI: http://www.gopiplus.com/work/2010/07/18/constant-contact/
Donate link: http://www.gopiplus.com/work/2010/07/18/constant-contact/
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/

global $wpdb, $wp_version;

function ccf_show()
{
	if(get_option('ccf_username') <> "enter username") 
	{
		?>
		<div>
		  <div class="ccf_caption"><?php echo get_option('ccf_caption'); ?></div>
		  <div class="ccf_msg"><span id="ccf_msg"></span></div>
		  <div class="ccf_textbox"><input class="ccf_textbox_class" name="ccf_txt_email" onkeypress="if(event.keyCode==13) ccf_submit_form(this.parentNode,'<?php echo home_url(); ?>')" onblur="if(this.value=='') this.value='<?php echo get_option('ccf_with_in_textbox'); ?>';" onfocus="if(this.value=='<?php echo get_option('ccf_with_in_textbox'); ?>') this.value='';" id="ccf_txt_email" value="<?php echo get_option('ccf_with_in_textbox'); ?>" maxlength="150" type="text"></div>
		  <div class="ccf_button">
			<input class="ccf_textbox_button" type="button" name="ccf_txt_Button" onClick="javascript:ccf_submit_form(this.parentNode,'<?php echo home_url(); ?>');" id="ccf_txt_Button" value="<?php echo get_option('ccf_button'); ?>">
		  </div>
		</div>
		<?php 
	}
	else
	{
		?><div>Under Construction.</div><?php
	}
}

function ccf_activation()
{
	global $wpdb;
	$url = home_url();
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
	add_option('ccf_homeurl', $url);
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
	?>
	<div class="wrap">
		<div class="form-wrap">
			<div id="icon-edit" class="icon32 icon32-posts-post"><br></div>
			<h2><?php _e('Constant contact form', 'constant-contact'); ?></h2>
			<p class="description">
				<?php _e('Constant Contact is an online email marketing service that allows businesses to stay connected to their customers via email, surveys and event marketing.', 'constant-contact'); ?>
				<?php _e('This service can send thousands of emails at one time and maintain status reports. Learn more about Constant Contact : http://www.constantcontact.com/', 'constant-contact'); ?>
			</p>	
			<p class="description">
				<?php _e('Check official website for more information and live demo', 'constant-contact'); ?>
				<a target="_blank" href="http://www.gopiplus.com/work/2010/07/18/constant-contact/"><?php _e('click here', 'constant-contact'); ?></a>
			</p>
			<p class="description"></p>
			<?php
			$ccf_username = get_option('ccf_username');
			$ccf_password = get_option('ccf_password');
			$ccf_group = get_option('ccf_group');
			$ccf_title = get_option('ccf_title');
			$ccf_caption = get_option('ccf_caption');
			$ccf_adminemail = get_option('ccf_adminemail');
			$ccf_with_in_textbox = get_option('ccf_with_in_textbox');
			$ccf_button = get_option('ccf_button');
			$ccf_fromemail = get_option('ccf_fromemail');
			$ccf_adminmail = get_option('ccf_adminmail');
			$ccf_adminmail_subject = get_option('ccf_adminmail_subject');
			$ccf_adminmail_content = get_option('ccf_adminmail_content');
			$ccf_usermail = get_option('ccf_usermail');
			$ccf_usermail_subject = get_option('ccf_usermail_subject');
			$ccf_usermail_content = get_option('ccf_usermail_content');
			$ccf_homeurl = get_option('ccf_homeurl');
			
			if (isset($_POST['ccf_submit'])) 
			{	
				check_admin_referer('ccf_form_setting');
				$ccf_username = stripslashes(trim($_POST['ccf_username']));
				$ccf_password = stripslashes(trim($_POST['ccf_password']));
				$ccf_group = stripslashes(trim($_POST['ccf_group']));		
				$ccf_title = stripslashes(trim($_POST['ccf_title']));
				$ccf_caption = stripslashes(trim($_POST['ccf_caption']));
				$ccf_adminemail = stripslashes(trim($_POST['ccf_adminemail']));
				$ccf_with_in_textbox = stripslashes(trim($_POST['ccf_with_in_textbox']));
				$ccf_button = stripslashes(trim($_POST['ccf_button']));
				$ccf_fromemail = stripslashes(trim($_POST['ccf_fromemail']));
				$ccf_adminmail = stripslashes(trim($_POST['ccf_adminmail']));
				$ccf_adminmail_subject = stripslashes(trim($_POST['ccf_adminmail_subject']));
				$ccf_adminmail_content = stripslashes(trim($_POST['ccf_adminmail_content']));
				$ccf_usermail = stripslashes(trim($_POST['ccf_usermail']));
				$ccf_usermail_subject = stripslashes(trim($_POST['ccf_usermail_subject']));
				$ccf_usermail_content = stripslashes(trim($_POST['ccf_usermail_content']));
				$ccf_homeurl = stripslashes(trim($_POST['ccf_homeurl']));
				
				update_option('ccf_username', $ccf_username );
				update_option('ccf_password', $ccf_password );
				update_option('ccf_group', $ccf_group );
				update_option('ccf_title', $ccf_title );
				update_option('ccf_caption', $ccf_caption );
				update_option('ccf_adminemail', $ccf_adminemail );
				update_option('ccf_with_in_textbox', $ccf_with_in_textbox );
				update_option('ccf_fromemail', $ccf_fromemail );
				update_option('ccf_button', $ccf_button );
				update_option('ccf_adminmail', $ccf_adminmail );
				update_option('ccf_adminmail_subject', $ccf_adminmail_subject );
				update_option('ccf_adminmail_content', $ccf_adminmail_content );
				update_option('ccf_usermail', $ccf_usermail );
				update_option('ccf_usermail_subject', $ccf_usermail_subject );
				update_option('ccf_usermail_content', $ccf_usermail_content );
				update_option('ccf_homeurl', $ccf_homeurl );
				?>
				<div class="updated fade">
					<p><strong><?php _e('Details successfully updated.', 'constant-contact'); ?></strong></p>
				</div>
				<?php
			}
			
			?>
			<form name="ccf_form" method="post" action="">
					
				<h3><?php _e('Constant Contact Login', 'constant-contact'); ?></h3>
				
				<label for="tag-box"><?php _e('Constant contact username', 'constant-contact'); ?></label>
				<input name="ccf_username" type="text" value="<?php echo $ccf_username; ?>"  id="ccf_username" size="30" maxlength="100">
				<p><?php _e('Please enter your constant contact username', 'constant-contact'); ?></p>
				
				<label for="tag-box"><?php _e('Constant contact password', 'constant-contact'); ?></label>
				<input name="ccf_password" type="text" value="<?php echo $ccf_password; ?>"  id="ccf_password" size="30" maxlength="100">
				<p><?php _e('Please enter your constant contact password', 'constant-contact'); ?></p>
				
				<label for="tag-box"><?php _e('Constant contact group', 'constant-contact'); ?></label>
				<input name="ccf_group" type="text" value="<?php echo $ccf_group; ?>"  id="ccf_group" size="30" maxlength="100">
				<p><?php _e('Please enter your constant contact group', 'constant-contact'); ?></p>
						
				<h3><?php _e('Widget Setting', 'constant-contact'); ?></h3>
				
				<label for="tag-box"><?php _e('Widget title', 'constant-contact'); ?></label>
				<input name="ccf_title" type="text" value="<?php echo $ccf_title; ?>"  id="ccf_title" size="40" maxlength="100">
				<p><?php _e('Please enter your widget title', 'constant-contact'); ?></p>
				
				<label for="tag-box"><?php _e('Word within text box', 'constant-contact'); ?></label>
				<input name="ccf_with_in_textbox" type="text" value="<?php echo $ccf_with_in_textbox; ?>"  id="ccf_with_in_textbox" size="40" maxlength="100">
				<p><?php _e('Please enter text within text box', 'constant-contact'); ?></p>
				
				<label for="tag-box"><?php _e('Button caption', 'constant-contact'); ?></label>
				<input name="ccf_button" type="text" value="<?php echo $ccf_button; ?>"  id="ccf_button" size="40" maxlength="100">
				<p><?php _e('Please enter your button caption', 'constant-contact'); ?></p>
				
				<label for="tag-box"><?php _e('Short description', 'constant-contact'); ?></label>
				<input name="ccf_caption" type="text" value="<?php echo $ccf_caption; ?>"  id="ccf_caption" size="40" maxlength="500">
				<p><?php _e('Please enter your widget short description', 'constant-contact'); ?></p>
				
				<h3><?php _e('Email address Setting', 'constant-contact'); ?></h3>
						
				<label for="tag-box"><?php _e('From email address', 'constant-contact'); ?></label>
				<input name="ccf_fromemail" type="text" value="<?php echo $ccf_fromemail; ?>"  id="ccf_fromemail" size="40" maxlength="150">
				<p><?php _e('Please enter mail from email address', 'constant-contact'); ?></p>
				
				<label for="tag-box"><?php _e('Admin email address', 'constant-contact'); ?></label>
				<input name="ccf_adminemail" type="text" value="<?php echo $ccf_adminemail; ?>"  id="ccf_adminemail" size="40" maxlength="150">
				<p><?php _e('Please enter admin email address', 'constant-contact'); ?></p>
				
				
				<h3><?php _e('Admin email notification', 'constant-contact'); ?></h3>
				
				<label for="tag-box"><?php _e('Send mail to admin', 'constant-contact'); ?></label>
				<select name="ccf_adminmail" id="ccf_adminmail">
					<option value='YES' <?php if($ccf_usermail == 'YES') { echo "selected='selected'" ; } ?>>Yes</option>
					<option value='NO' <?php if($ccf_usermail == 'NO') { echo "selected='selected'" ; } ?>>No</option>
				</select>
				<p><?php _e('Select your option to receive admin mail', 'constant-contact'); ?></p>
				
				<label for="tag-box"><?php _e('Admin mail subject', 'constant-contact'); ?></label>
				<input name="ccf_adminmail_subject" type="text" value="<?php echo $ccf_adminmail_subject; ?>"  id="ccf_adminmail_subject" size="30" maxlength="100">
				<p><?php _e('Please enter admin mail subject', 'constant-contact'); ?></p>
				
				<label for="tag-box"><?php _e('Admin mail content', 'constant-contact'); ?></label>
				<textarea name="ccf_adminmail_content" rows="5" id="ccf_adminmail_content" style="width: 750px;"><?php echo $ccf_adminmail_content ?></textarea>
				<p><?php _e('Please enter admin mail content', 'constant-contact'); ?></p>
				
				<h3><?php _e('User email notification', 'constant-contact'); ?></h3>
				
				<label for="tag-box"><?php _e('Send mail to users', 'constant-contact'); ?></label>
				<select name="ccf_usermail" id="ccf_usermail">
					<option value='YES' <?php if($ccf_usermail == 'YES') { echo "selected='selected'" ; } ?>>Yes</option>
					<option value='NO' <?php if($ccf_usermail == 'NO') { echo "selected='selected'" ; } ?>>No</option>
				</select>
				<p><?php _e('Select your option to send user mail', 'constant-contact'); ?></p>
				
				<label for="tag-box"><?php _e('Users mail subject', 'constant-contact'); ?></label>
				<input name="ccf_usermail_subject" type="text" value="<?php echo $ccf_usermail_subject; ?>"  id="ccf_usermail_subject" size="30" maxlength="100">
				<p><?php _e('Please enter user mail subject', 'constant-contact'); ?></p>
				
				<label for="tag-box"><?php _e('Users mail content', 'constant-contact'); ?></label>
				<textarea name="ccf_usermail_content" rows="5" id="ccf_usermail_content" style="width: 750px;"><?php echo $ccf_usermail_content ?></textarea>
				<p><?php _e('Please enter users mail content', 'constant-contact'); ?></p>
				
				<h3><?php _e('Security Check (Spam Stopper)', 'constant-contact'); ?></h3>
				<label for="tag-width"><?php _e('Home URL', 'constant-contact'); ?></label>
				<input name="ccf_homeurl" type="text" value="<?php echo $ccf_homeurl; ?>"  id="ccf_homeurl" size="70" maxlength="500">
				<p><?php _e	('This home URL is for security check. We can submit the form only on this website. ', 'constant-contact'); ?></p>
		
				<p style="padding-top:8px;padding-bottom:8px;">
				<input id="ccf_submit" name="ccf_submit" lang="publish" class="button-primary" value="<?php _e('Update Setting', 'constant-contact'); ?>" type="Submit" />
				</p>
				 <?php wp_nonce_field('ccf_form_setting'); ?>
			</form>
		</div>
		<p class="description">
			<?php _e('Check official website for more information and live demo', 'constant-contact'); ?>
			<a target="_blank" href="http://www.gopiplus.com/work/2010/07/18/constant-contact/"><?php _e('click here', 'constant-contact'); ?></a>
		</p>
	</div>
	<?php
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
	$home_url = "'".home_url()."'";
	
	$ccf = $ccf . '<div>';
	$ccf = $ccf . '<div class="ccf_caption">';
	$ccf = $ccf . get_option('ccf_caption');
	$ccf = $ccf . '</div>';
	$ccf = $ccf . '<div class="ccf_msg">';
	$ccf = $ccf . '<span id="ccf_msg"></span>';
	$ccf = $ccf . '</div>';
	$ccf = $ccf . '<div class="ccf_textbox">';
	$ccf = $ccf . '<input class="ccf_textbox_class" name="ccf_txt_email" id="ccf_txt_email" ';
	$ccf = $ccf . 'onkeypress="if(event.keyCode==13) ccf_submit_form(this.parentNode, '.$home_url.')" ';
	$ccf = $ccf . 'onblur="if(this.value=='.$ccf_space.') this.value='.$ccf_with_in_textbox.';" ';
	$ccf = $ccf . 'onfocus="if(this.value=='.$ccf_with_in_textbox.') this.value='.$ccf_space.';" ';
	$ccf = $ccf . 'value='.$ccf_with_in_textbox.' maxlength="150" type="text">';
	$ccf = $ccf . '</div>';
	$ccf = $ccf . '<div class="ccf_button">';
	$ccf = $ccf . '<input class="ccf_textbox_button" type="button" name="ccf_txt_Button" onClick="return ccf_submit_form(this.parentNode, '.$home_url.')" id="ccf_txt_Button" value="'.$ccf_button.'">';
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


function ccf_plugin_query_vars($vars) 
{
	$vars[] = 'ccf';
	return $vars;
}

function ccf_plugin_parse_request($qstring)
{
	if (array_key_exists('ccf', $qstring->query_vars)) 
	{
		$page = $qstring->query_vars['ccf'];
		switch($page)
		{
			case 'constant-contact':
				$ToEmail = isset($_POST['ccf_email']) ? $_POST['ccf_email'] : '';
				if($ToEmail <> "")
				{
					if (!filter_var($ToEmail, FILTER_VALIDATE_EMAIL))
					{
						echo "invalid-email";
					}
					else
					{
						$homeurl = get_option('ccf_homeurl');
						if($homeurl == "")
						{
							$homeurl = home_url();
						}
						
						$samedomain = strpos($_SERVER['HTTP_REFERER'], $homeurl);
						if ( ($samedomain !== false) && ($samedomain < 5) ) 
						{
							$ConstantContact = new ConstantContact();
							$ConstantContact->setUsername(get_option('ccf_username')); 	/* set the constant contact username */
							$ConstantContact->setPassword(get_option('ccf_password')); 	/* set the constant contact password */
							$ConstantContact->setCategory(get_option('ccf_group')); 	/* set the constant contact interest category */
							if($ConstantContact->add($ToEmail))
							{
								$ccf_fromemail = get_option('ccf_fromemail');
								$ccf_adminmail = get_option('ccf_adminmail');
								$ccf_usermail = get_option('ccf_usermail');
	
								$headers = "MIME-Version: 1.0" . "\r\n";
								$headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
								$headers .= "From: \"$ccf_fromemail\" <$ccf_fromemail>\n";
								
								if(trim($ccf_adminmail) == "YES")
								{
									$to_from = get_option('ccf_adminemail');
									$to_subject = get_option('ccf_adminmail_subject');
									$to_message = get_option('ccf_adminmail_content');
									$to_message = str_replace("\r\n", "<br />", $to_message);
									@wp_mail($to_from, $to_subject, $to_message, $headers);
								}
								
								if(trim($ccf_usermail) == "YES")
								{
									$to_from = $ToEmail;
									$to_subject = get_option('ccf_usermail_subject');
									$to_message = get_option('ccf_usermail_content');
									$to_message = str_replace("\r\n", "<br />", $to_message);
									@wp_mail($to_from, $to_subject, $to_message, $headers);
								}
								echo "mail-sent-successfully";
							}
							else
							{
								echo "username-password-error";
							}
						}
						else
						{
							echo "there-was-problem";
						}
					}
				}
				else
				{
					echo "empty-email";
				}
				die();
				break;
		}
	}
}

add_action('parse_request', 'ccf_plugin_parse_request');
add_filter('query_vars', 'ccf_plugin_query_vars');

add_action('plugins_loaded', 'ccf_textdomain');
add_action('init', 'ccf_add_javascript_files');
register_activation_hook(__FILE__, 'ccf_activation');
add_action("plugins_loaded", "ccf_plugins_loaded");
register_deactivation_hook( __FILE__, 'ccf_deactivate' );

class ConstantContact 
{
    var $add_subscriber_url = "http://ccprod.roving.com/roving/wdk/API_AddSiteVisitor.jsp";
    var $remove_subscriber_url = 'http://ccprod.roving.com/roving/wdk/API_UnsubscribeSiteVisitor.jsp';
    var $_username = '';
    var $_password = '';
    var $_category = '';
	
    function setUsername($username)
    {
        $this->username = $username;
    }
	
    function setPassword($password)
    {
        $this->password = $password;
    }
	
    function setCategory($category)
    {
        $this->category = $category;
    }
	
    function getUsername()
    {
        return urlencode($this->username);
    }
	
    function getPassword()
    {
        return urlencode($this->password);
    }
	
    function getCategory()
    {
        return urlencode($this->category);
    }
	
    function add($email, $extra_fields = array())
    {
        $email = urlencode(strip_tags($email));
        
        $data = 'loginName=' . $this->getUsername();
        $data .= '&loginPassword=' . $this->getPassword();
        $data .= '&ea=' . $email;
        $data .= '&ic=' . $this->getCategory();
		
		if(is_array($extra_fields)):
		    foreach($extra_fields as $k => $v):
                $data .= "&" . urlencode(strip_tags($k)) . "=" . urlencode(strip_tags($v));
		    endforeach;
        endif;
		
        return $this->_send($data, $this->add_subscriber_url);
    }
	
    function remove($email)
    {
        $email = urlencode(strip_tags($email));
        
        $data = 'loginName=' . $this->getUsername();
        $data .= '&loginPassword=' . $this->getPassword();
        $data .= '&ea=' . $email;
        
        return $this->_send($data, $this->remove_subscriber_url);
    }
	
    function _send($data, $url)
    {
        $handle = fopen("$url?$data", "rb");
        $contents = '';
		
        while (!feof($handle)) {
            $contents .= fread($handle, 192);
        }
		
        fclose($handle);
		
		if(trim($contents) == 0):
			return true;
		endif;
		
		return false;
    }
}
?>