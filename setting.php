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