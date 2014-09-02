<h2><? __('Send message')?></h2>
<form id="postForm" name="postForm" action="" method="post">
<br/>
Here you can send us a message.<br/>
Fields marked with <span class="required">*</span> are required.<br/>
<div class="box">
<div class="error"><?=$errMsg?></div>
<table class="pad5" border="0" cellpadding="0" cellspacing="0">
<?=$this->element('std_input', array('plugin' => 'core', 'caption' => __('Your name', true), 'required' => true, 'field' => 'Contact.username', 'data' => $this->data))?>
<?=$this->element('std_input', array('plugin' => 'core', 'caption' => __('Your e-mail for reply', true), 'required' => true, 'field' => 'Contact.email', 'data' => $this->data))?>
<tr>
	<td colspan="2">
		<span class="required">*</span> Message text:<br/>
		<textarea cols="46" rows="5" name="data[Contact][body]"><?=$this->PHA->read($data, 'Contact.body')?></textarea>
	</td>
</tr>
<tr>
	<td colspan="2">
		<?=$this->element('captcha_img', array('plugin' => 'captcha', 'field'=> 'Contact.captcha', 'captcha_key' => $captchaKey, 'aErrFields' => $aErrFields))?>
	</td>
</tr>
<tr>
	<td colspan="2">
		<?=$this->element('button', array('caption' => 'Send', 'onclick' => 'document.postForm.submit();'))?>
	</td>
</tr>
</table>
</div>

<input type="hidden" name="data[send]" value="1" />
</form>

