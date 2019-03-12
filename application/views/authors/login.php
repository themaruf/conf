<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view("partial/header");
?>
<div class="login-page">
  <div class="form">
	<div id="logo" align="center">
		<a href="#" target="_blank">
			<img width="136px" height="67px" src="<?php echo base_url();?>images/icon.png">
		</a>
	</div>
	
<?php echo validation_errors();?>
      <div class="success">'
            <?php if ( $message != null ) echo $message;?>
      </div>
<?php echo form_open('authors/login', array('id' => 'login-form')) ?>
      <input type="text" name="email" value="<?php echo set_value('email'); ?>" placeholder="email"/>
      <input type="password" name="password" value="<?php echo set_value('password'); ?>" placeholder="password"/>
      <button>Login</button>
      <p class="message">Not registered? <a href="<?php echo base_url();?>authors/signup">Create an account</a></p>
<?php echo form_close(); ?>
  </div>
</div>


<script type="text/javascript">
	$(document).ready(function(){
		$("#datepicker").datepicker();
	});
</script>

<!-- SELECT * FROM `authors` JOIN users ON authors.user_id = users.user_id -->