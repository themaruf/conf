<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view("partial/header");
$this->load->view("partial/header_admin");
?>
<div>
  <h1>Invite a Reviewer<h2>
</div>

<form action="<?php echo base_url('admins/send_invitation');?>" id="form" method="post" class="form-horizontal" enctype="multipart/form-data">
	<div class="table-responsive-md">
	  <table class="table table-bordered">
	    <tbody>
	      <tr>
	        <th class="srink" scope="row">Invitation ID (auto generated)</th>
	        <td><input name="invitation_id" class="form-control" value="<?php echo $invitation_id;?>" type="text" readonly></td>
	      </tr>
	      <tr>
	        <th class="srink" scope="row">Email</th>
	        <td><input name="email" placeholder="Email" class="form-control" type="text"></td>
	      </tr>
	      <tr>
	        <th class="srink" scope="row"></th>
	        <td><input class="btn btn-info" type="submit" name="save" value="Send"></td>
	      </tr>
	    </tbody>
	  </table>
	</div>
</form>


<?php $this->load->view("partial/footer"); ?>



<script type="text/javascript">
  $(document).ready(function(){
    
  });
</script>

<style type="text/css">
	.srink{
		max-width: 40px;
	}
</style>