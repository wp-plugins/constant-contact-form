<div class="wrap">
  <h2>Constant contact form setting</h2>
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
	
	if (@$_POST['ccf_submit']) 
	{	
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
	}
	
	?>
  <form name="ccf_form" method="post" action="">
    <table width="950px" border="0" cellspacing="10" cellpadding="0">
      <tr>
        <td>Constant contact username:</td>
        <td>Constant contact password:</td>
        <td>Constant contact group:</td>
      </tr>
      <tr>
        <td><input  style="width: 200px;" type="text" value="<?php	echo $ccf_username; ?>" name="ccf_username" id="ccf_username" /></td>
        <td><input  style="width: 200px;" type="password" value="<?php	echo $ccf_password; ?>" name="ccf_password" id="ccf_password" /></td>
        <td><input  style="width: 200px;" type="text" value="<?php	echo $ccf_group; ?>" name="ccf_group" id="ccf_group" /></td>
      </tr>
      <tr>
        <td>Widget title:</td>
        <td>Word within text box:</td>
        <td>Button caption:</td>
      </tr>
      <tr>
        <td><input  style="width: 200px;" type="text" value="<?php	echo $ccf_title; ?>" name="ccf_title" id="ccf_title" /></td>
        <td><input  style="width: 200px;" type="text" value="<?php	echo $ccf_with_in_textbox; ?>" name="ccf_with_in_textbox" id="ccf_with_in_textbox" /></td>
        <td><input  style="width: 200px;" type="text" value="<?php	echo $ccf_button; ?>" name="ccf_button" id="ccf_button" /></td>
      </tr>
    </table>
    <table width="950px" border="0" cellspacing="10" cellpadding="0">
      <tr>
        <td>From email address</td>
      </tr>
      <tr>
        <td><input  style="width: 450px;" type="text" value="<?php	echo $ccf_fromemail; ?>" name="ccf_fromemail" id="ccf_fromemail" /></td>
      </tr>
       <tr>
        <td>Admin email address</td>
      </tr>
      <tr>
        <td><input  style="width: 450px;" type="text" value="<?php	echo $ccf_adminemail; ?>" name="ccf_adminemail" id="ccf_adminemail" /></td>
      </tr>
      <tr>
        <td>Short description:</td>
      </tr>
      <tr>
        <td><input  style="width: 450px;" type="text" value="<?php	echo $ccf_caption; ?>" name="ccf_caption" id="ccf_caption" /></td>
      </tr>
    </table>
    <table width="950px" border="0" cellspacing="10" cellpadding="0">
      <tr>
        <td>Admin mail notification:</td>
        <td>User mail notification:</td>
      </tr>
      <tr>
        <td><input  style="width: 100px;" type="text" maxlength="3" value="<?php	echo $ccf_adminmail; ?>" name="ccf_adminmail" id="ccf_adminmail" />
          (YES/NO)</td>
        <td><input  style="width: 100px;" type="text" maxlength="3" value="<?php	echo $ccf_usermail; ?>" name="ccf_usermail" id="ccf_usermail" />
          (YES/NO)</td>
      </tr>
      <tr>
        <td>Admin mail subject:</td>
        <td>User mail subject:</td>
      </tr>
      <tr>
        <td><input  style="width: 300px;" type="text" value="<?php	echo $ccf_adminmail_subject; ?>" name="ccf_adminmail_subject" id="ccf_adminmail_subject" /></td>
        <td><input  style="width: 300px;" type="text" value="<?php	echo $ccf_usermail_subject; ?>" name="ccf_usermail_subject" id="ccf_usermail_subject" /></td>
      </tr>
      <tr>
        <td>Admin mail content:</td>
        <td>User mail content:</td>
      </tr>
      <tr>
        <td><textarea name="ccf_adminmail_content" rows="10" id="ccf_adminmail_content" style="width: 450px;"><?php echo $ccf_adminmail_content ?></textarea></td>
        <td><textarea name="ccf_usermail_content" rows="10" id="ccf_usermail_content" style="width: 450px;"><?php echo $ccf_usermail_content ?></textarea></td>
      </tr>
    </table>
    <table width="950px" border="0" cellspacing="10" cellpadding="0">
      <tr>
        <td>
        <input id="ccf_submit" name="ccf_submit" lang="publish" class="button-primary" value="Update Setting" type="Submit" />
            <div style="float:right;">
    <input name="text_management" lang="text_management" class="button-primary" onClick="location.href='options-general.php?page=constant-contact-form/constant-contact-form.php'" value="Go to - Main page" type="button" />
    <input name="setting_management" lang="setting_management" class="button-primary" onClick="location.href='options-general.php?page=constant-contact-form/setting.php'" value="Go to - Setting Page" type="button" />
	<input name="Help" lang="publish" class="button-primary" onclick="window.open('http://www.gopiplus.com/work/2010/07/18/constant-contact/');" value="Help" type="button" />
  </div>
        </td>
      </tr>
    </table>
  </form>
Note: Check official website for more information <a href="http://www.gopiplus.com/work/2010/07/18/constant-contact/" target="_blank">click here</a>
</div>
