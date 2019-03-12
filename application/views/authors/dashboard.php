<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view("partial/header");
?>
    <div class="col-md-8">
    	<div class="input-group">
		  <div class="input-group-prepend">
		    <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
		  </div>
		  <div class="custom-file">
		    <input type="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
		    <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
		  </div>
</div>
      <table class="table table-bordered table-striped">
        <tr>
          <th colspan="1"><h4 class="text-center">User Info</h3></th>
          <th>
          	<a href="<?php echo base_url('authors/logout');?>" >  <button type="button" class="btn-primary">Logout</button></a>

 		  </th>

        </tr>
            <tr>
            <td>Author ID</td>
            <td><?php echo $author_info->author_id; ?></td>
          </tr>
          <tr>
            <td>Name</td>
            <td><?php echo $author_info->first_name." ". $author_info->last_name; ?></td>
          </tr>
          <tr>
            <td>Phone Number</td>
            <td><?php echo $author_info->phone_number;  ?></td>
          </tr>
          <tr>
            <td>Email</td>
            <td><?php echo $author_info->email;  ?></td>
          </tr>
      </table>
    </div>




