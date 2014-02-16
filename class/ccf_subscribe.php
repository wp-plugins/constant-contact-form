<?php
/**
 *     constant contact form
 *     Copyright (C) 2011 - 2014 www.gopiplus.com
 *     http://www.gopiplus.com/work/2010/07/18/constant-contact/
 * 
 *     This program is free software: you can redistribute it and/or modify
 *     it under the terms of the GNU General Public License as published by
 *     the Free Software Foundation, either version 3 of the License, or
 *     (at your option) any later version.
 * 
 *     This program is distributed in the hope that it will be useful,
 *     but WITHOUT ANY WARRANTY; without even the implied warranty of
 *     MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *     GNU General Public License for more details.
 * 
 *     You should have received a copy of the GNU General Public License
 *     along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */
	
$ccf_abspath = dirname(__FILE__);
$ccf_abspath_1 = str_replace('wp-content/plugins/constant-contact-form/class', '', $ccf_abspath);
$ccf_abspath_1 = str_replace('wp-content\plugins\constant-contact-form\class', '', $ccf_abspath_1);
require_once($ccf_abspath_1 .'wp-config.php');
$Email=@$_GET["txt_email_newsletter"];
require_once 'ccf_class.php';
$ConstantContact = new ConstantContact();
$ConstantContact->setUsername(get_option('ccf_username')); /* set the constant contact username */
$ConstantContact->setPassword(get_option('ccf_password')); /* set the constant contact password */
$ConstantContact->setCategory(get_option('ccf_group')); /* set the constant contact interest category */
if($ConstantContact->add($Email))
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
		$to_from = $Email;
		$to_subject = get_option('ccf_usermail_subject');
		$to_message = get_option('ccf_usermail_content');
		$to_message = str_replace("\r\n", "<br />", $to_message);
		@wp_mail($to_from, $to_subject, $to_message, $headers);
	}
	echo "succ";
}
else
{
	echo "err";
}
?>
