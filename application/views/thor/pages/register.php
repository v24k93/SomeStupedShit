<div class="main-box">
	<div class="main-box-header">
		<div class="main-box-title">
			{title}
		</div>
	</div>
	<div class="main-box-bg">
		{status}
    <form action="{base_url}index.php/register/validation_register" method="post" accept-charset="utf-8">
	<span style="float: left;margin: 12px 0px 0px 0px;">
		<label for="register_username" style="cursor: pointer;">{lang_username}</label>
	</span>
	<span style="float: right;">
		<span id="username_availability"></span> 
		<input type="text" name="register_username" value="" style="width: 175px;" id="register_username" onkeyup='javascript:showContent("{base_url}index.php/ajax/username_availability/" + register_username.value, "username_availability");'/>
	</span>
	<span style="clear: both; display: block;"></span><br />
	<span style="float: left;margin: 12px 0px 0px 0px;">
		<label for="register_password" style="cursor: pointer;">{lang_password}</label>
	</span>
	<span style="float: right;">
		<span id="password_availability"></span> 
		<input type="password" name="register_password" value="" style="width: 175px;" id="register_password" onkeyup='javascript:showContent("{base_url}index.php/ajax/password_availability/" + register_password.value, "password_availability") ;' />
	</span>
	<span style="clear: both; display: block;"></span><br />
	<span style="float: left;margin: 12px 0px 0px 0px;">
		<label for="register_re_password" style="cursor: pointer;">{lang_password_confirm}</label>
	</span>
	<span style="float: right;">
		<span id="password_re_availability"></span> 
		<input type="password" name="register_re_password" value="" style="width: 175px;" id="register_re_password" onkeyup='javascript:showContent("{base_url}index.php/ajax/password_re_availability/" + register_password.value + "/" + register_re_password.value, "password_re_availability") ;' />
	</span>
	<span style="clear: both; display: block;"></span><br />
	<span style="float: left;margin: 12px 0px 0px 0px;">
		<label for="register_email" style="cursor: pointer;">{lang_email}</label>
	</span>
	<span style="float: right;">
	<span id="email_availability"></span> 
		<input type="text" name="register_email" value="" id="register_email" style="width: 175px;" onkeyup='javascript:showContent("{base_url}index.php/ajax/username_email/" + register_email.value, "email_availability") ;' />
	</span>
	<span style="clear: both; display: block;"></span><br />
	<span style="float: left;margin: 12px 0px 0px 0px;">{lang_security_question}</span>
	<span style="float: right;text-align: right;" id="register_security_question">
		Your middle name? <input type="radio" name="register_security_question" value="1"  /><br />
		Your birth town? <input type="radio" name="register_security_question" value="2" checked="checked"  /><br />
		Your pet's name? <input type="radio" name="register_security_question" value="3"  /><br />
		Your mother maiden name? <input type="radio" name="register_security_question" value="4"  /><br />
	</span>
	<span style="clear: both; display: block;"></span><br />
	<span style="float: left;margin: 12px 0px 0px 0px;">
		<label for="register_security_answer" style="cursor: pointer;">{lang_security_answer}</label>
	</span>
	<span style="float: right;">
		<input type="text" name="register_security_answer" value="" style="width: 175px;" id="register_security_answer" />
	</span><span style="clear: both; display: block;"></span><br />
	<span style="float: left;">
		<?php
			$vals = array(
				'word' => rand(100000, 999999),
				'img_path'	 => './captcha/',
				'img_url'	 => base_url().'captcha/',
				'img_width'	 => '150',
				'img_height' => 30,
				'expiration' => 0
			);
			
			$cap = create_captcha($vals);
			
			$data = array
			(
				'captcha_time'	=> $cap['time'],
				'ip_address'	=> $this->input->ip_address(),
				'word'	 => $cap['word']
			);
			$this->cms = $this->load->database('default', TRUE);  
			$query = $this->cms->insert_string('captcha', $data);
			$this->cms->query($query);
			
			echo $cap['image'];
		?>
	</span>
	<span style="float: right;">
		<input type="text" name="register_captcha" value="" style="width: 175px;" placeholder="Code from the image..." id="register_captcha" />
	</span><span style="clear: both; display: block;"></span><br />
	
	<span style="float: left;margin: 12px 0px 0px 0px;font-weight: bold;"></span><span style="float: right;"><input type="submit" name="register_submit" value="{lang_register_account}" id="register_submit" /></span><span style="clear: both; display: block;"></span></form>

	</div>
</div>