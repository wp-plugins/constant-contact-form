<?php if(get_option('ccf_username')<>"enter username") { ?>
<div>
  <div class="ccf_caption">
    <?php echo get_option('ccf_caption'); ?>
  </div>
  <div class="ccf_msg">
    <span id="ccf_msg"></span>
  </div>
  <div class="ccf_textbox">
    <input class="ccf_textbox_class" name="ccf_txt_email" id="ccf_txt_email" onkeypress="if(event.keyCode==13) ccf_submit_ajax('<?php echo get_option('siteurl'); ?>/wp-content/plugins/constant-contact-form/class/')" onblur="if(this.value=='') this.value='<?php echo get_option('ccf_with_in_textbox'); ?>';" onfocus="if(this.value=='<?php echo get_option('ccf_with_in_textbox'); ?>') this.value='';" value="<?php echo get_option('ccf_with_in_textbox'); ?>" maxlength="150" type="text">
  </div>
  <div class="ccf_button">
    <input class="ccf_textbox_button" type="button" name="ccf_txt_Button" onClick="return ccf_submit_ajax('<?php echo get_option('siteurl'); ?>/wp-content/plugins/constant-contact-form/class/')" id="ccf_txt_Button" value="<?php echo get_option('ccf_button'); ?>">
  </div>
</div>
<div></div>
<?php } else  { ?>
<div>Under Construction.</div>
<?php } ?>
