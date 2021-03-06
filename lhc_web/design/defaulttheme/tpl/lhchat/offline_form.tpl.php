<?php include(erLhcoreClassDesign::designtpl('lhchat/part/offline_form_pre.tpl.php'));?>

<?php if ($chat_part_offline_form_enabled == true) : ?>
<p><b>
<?php if (isset($theme) && $theme !== false && $theme->noonline_operators_offline) : ?>
    <?php echo htmlspecialchars($theme->noonline_operators_offline)?>
<?php else : ?>
    <?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('chat/startchat','There are no online operators at the moment, please leave a message')?>
<?php endif;?>
</b></p>

<?php if (isset($request_send)) : $msg = erTranslationClassLhTranslation::getInstance()->getTranslation('chat/startchat','Your request was sent!');?>
	<?php include(erLhcoreClassDesign::designtpl('lhkernel/alert_success.tpl.php'));?>
	<script>
	setTimeout(function(){
		lhinst.userclosedchatembed();
	},5000);
	</script>
<?php else : ?>
	<form enctype="multipart/form-data" method="post" id="form-start-chat" action="<?php echo erLhcoreClassDesign::baseurl('chat/chatwidget')?>/(offline)/true/(leaveamessage)/true<?php echo $append_mode?><?php $department !== false ? print '/(department)/'.$department : ''?><?php $input_data->chatprefill !== '' ? print '/(chatprefill)/'.htmlspecialchars($input_data->chatprefill) : ''?><?php echo $append_mode_theme?>" onsubmit="return lhinst.addCaptcha('<?php echo time()?>',$(this))">

	<div class="row">	
		<?php if (isset($start_data_fields['offline_name_visible_in_page_widget']) && $start_data_fields['offline_name_visible_in_page_widget'] == true) : ?>
			<?php if (isset($start_data_fields['offline_name_hidden']) && $start_data_fields['offline_name_hidden'] == true) : ?>
			<input type="hidden" name="Username" value="<?php echo htmlspecialchars($input_data->username);?>" />
			<?php else : ?>
		    <div class="col-xs-6 form-group">
		        <label><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('chat/startchat','Name');?><?php if (isset($start_data_fields['offline_name_require_option']) && $start_data_fields['offline_name_require_option'] == 'required') : ?>*<?php endif;?></label>
		        <input class="form-control"  type="text" name="Username" value="<?php echo htmlspecialchars($input_data->username);?>" />
		    </div>
		    <?php endif;?>	    
	    <?php endif;?>	
	    <?php if (isset($start_data_fields['offline_email_hidden']) && $start_data_fields['offline_email_hidden'] == true) : ?>
		<input type="hidden" name="Email" value="<?php echo htmlspecialchars($input_data->email);?>" />
		<?php else : ?>    
	    <div class="col-xs-6 form-group">
	        <label><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('chat/startchat','E-mail');?>*</label>
	        <input class="form-control" type="text" name="Email" value="<?php echo htmlspecialchars($input_data->email);?>" />
	    </div>
	    <?php endif;?>
	</div>

	<?php if (isset($start_data_fields['offline_phone_visible_in_page_widget']) && $start_data_fields['offline_phone_visible_in_page_widget'] == true) : ?>
	<?php if (isset($start_data_fields['offline_phone_hidden']) && $start_data_fields['offline_phone_hidden'] == true) : ?>
	<input type="hidden" name="Phone" value="<?php echo htmlspecialchars($input_data->phone);?>" />
	<?php else : ?>
	<div class="form-group">
	   <label><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('chat/startchat','Phone');?><?php if (isset($start_data_fields['offline_phone_require_option']) && $start_data_fields['offline_phone_require_option'] == 'required') : ?>*<?php endif;?></label>
	   <input class="form-control" type="text" name="Phone" value="<?php echo htmlspecialchars($input_data->phone);?>" />
	</div>
	<?php endif; ?>
	<?php endif; ?>
	
	<?php if (isset($start_data_fields['offline_file_visible_in_page_widget']) && $start_data_fields['offline_file_visible_in_page_widget'] == true) : ?>
	<div class="form-group">
	   <label><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('chat/startchat','File');?></label>
	   <input type="file" name="File" value="" />
	</div>
	<?php endif; ?>

	<?php if (isset($start_data_fields['offline_message_visible_in_page_widget']) && $start_data_fields['offline_message_visible_in_page_widget'] == true) : ?>
	<?php if (isset($start_data_fields['offline_message_hidden']) && $start_data_fields['offline_message_hidden'] == true) : ?>
	<textarea class="hide" placeholder="<?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('chat/startchat','Enter your message');?>" name="Question"><?php echo htmlspecialchars($input_data->question);?></textarea>
	<?php else : ?>
	<div class="form-group">
	   <label><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('chat/startchat','Your question');?><?php if (isset($start_data_fields['offline_message_require_option']) && $start_data_fields['offline_message_require_option'] == 'required') : ?>*<?php endif;?></label>
	   <textarea class="form-control" placeholder="<?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('chat/startchat','Enter your message');?>" name="Question"><?php echo htmlspecialchars($input_data->question);?></textarea>
	</div>
	<?php endif; ?>
	<?php endif; ?>
	
	<?php $adminCustomFieldsMode = 'off';?>
    <?php include(erLhcoreClassDesign::designtpl('lhchat/part/admin_form_variables.tpl.php'));?>

	<?php $modeUserVariables = 'off'; ?>
	<?php include_once(erLhcoreClassDesign::designtpl('lhchat/part/user_variables.tpl.php'));?>

	<?php if ($department === false) : ?>
		<?php include_once(erLhcoreClassDesign::designtpl('lhchat/part/department.tpl.php'));?>
	<?php endif;?>
		
	<?php $tosVariable = 'offline_tos_visible_in_page_widget';$tosCheckedVariable = 'tos_checked_offline';?>
	<?php include_once(erLhcoreClassDesign::designtpl('lhchat/part/accept_tos.tpl.php'));?>

	<div class="btn-group" role="group" aria-label="...">
  		<?php include(erLhcoreClassDesign::designtpl('lhchat/part/buttons/leave_a_message_button_widget.tpl.php'));?>
  		<?php include(erLhcoreClassDesign::designtpl('lhchat/part/offline_button_multiinclude.tpl.php'));?>
		<?php if ( erLhcoreClassModelChatConfig::fetch('reopen_chat_enabled')->current_value == 1 && ($reopenData = erLhcoreClassChat::canReopenDirectly(array('reopen_closed' => erLhcoreClassModelChatConfig::fetch('allow_reopen_closed')->current_value))) !== false ) : ?>
		    <?php include(erLhcoreClassDesign::designtpl('lhchat/part/buttons/reopen_offline_button_widget.tpl.php'));?>
	  	<?php endif; ?>
	</div>
	
	<input type="hidden" value="<?php echo htmlspecialchars($referer);?>" name="URLRefer"/>
	<input type="hidden" value="1" name="StartChat"/>

	</form>
<?php endif;?>

<?php else : ?>
<?php include(erLhcoreClassDesign::designtpl('lhchat/part/offline_form_disabled.tpl.php'));?>
<?php endif;?>

