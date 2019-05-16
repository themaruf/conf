<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view("partial/header");
$this->load->view("partial/header_admin");
?>

<fieldset class="scheduler-border">
    <legend class="scheduler-border">Download All Papers</legend>
    <a href="<?php echo base_url('admins/download_all_papers');?>" class="btn btn-success"><i class="fa fa-download"></i> Download Submitted Papers</a>
</fieldset>




<fieldset class="scheduler-border">
    <legend class="scheduler-border">Invite a Reviewer</legend>
	<form id="invitation_form" action="<?php echo base_url('admins/send_invitation');?>" id="form" method="post" class="form-horizontal" enctype="multipart/form-data">
		<div class="table-responsive-md">
		  <table class="table table-bordered">
		    <tbody>
		      <tr>
		        <th class="srink" scope="row">Invitation ID (auto generated)</th>
		        <td><input name="invitation_id" class="form-control" value="<?php echo $invitation_id;?>" type="text" readonly></td>
		      </tr>
		      <tr>
		        <th class="srink" scope="row">Email<span class="error">*</span></th>
		        <td><input name="email" placeholder="Email" class="form-control required" type="email"></td>
		      </tr>
		      <tr>
		        <th class="srink" scope="row"></th>
		        <td><input class="btn btn-info" type="submit" name="save" value="Send Invitation"></td>
		      </tr>
		    </tbody>
		  </table>
		</div>
	</form>
</fieldset>


<?php $this->load->view("partial/footer"); ?>



<script type="text/javascript">
  $(document).ready(function(){
    $("#invitation_form").validate();
  });
</script>

<style type="text/css">
	.srink{
		max-width: 40px;
	}
	fieldset.scheduler-border {
	    border: 1px groove #ddd !important;
	    padding: 0 1.4em 1.4em 1.4em !important;
	    margin: 0 0 1.5em 0 !important;
	    -webkit-box-shadow:  0px 0px 0px 0px #000;
	            box-shadow:  0px 0px 0px 0px #000;
	}

    legend.scheduler-border {
        font-size: 1.8em !important;
        font-weight: bold !important;
        text-align: left !important;
        width:auto;
        padding:0 10px;
        border-bottom:none;
    }
</style>