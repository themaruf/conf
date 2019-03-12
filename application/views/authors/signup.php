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
      <div class="error">'
            <?php if ( $message!= null ) echo $message;?>
      </div>
<?php echo form_open('authors/validate', array('id' => 'signup-form')) ?>
      <input type="text" name="first_name" value="<?php echo set_value('first_name'); ?>" placeholder="First Name"/>
      <input type="text" name="last_name" value="<?php echo set_value('last_name'); ?>" placeholder="Last Name"/>
      <input type="text" name="phone_number" value="<?php echo set_value('phone_number'); ?>" placeholder="Phone Number"/>
      <input type="text" id="datepicker" name="dob" value="<?php echo set_value('dob'); ?>" placeholder="Date of Birth">
      <input type="text" name="email" value="<?php echo set_value('email'); ?>" placeholder="Email Address"/>
      <input type="password" name="password" placeholder="Password"/>
      <input type="password" name="passconf" placeholder="Confirm Password"/>      
      <button>Create Account</button>
      <p class="message">Already registered? <a href="<?php echo base_url();?>authors">Sign In</a></p>
<?php echo form_close(); ?>


<script type="text/javascript">
      $(document).ready(function(){
            $("#datepicker").datepicker();
      });
</script>