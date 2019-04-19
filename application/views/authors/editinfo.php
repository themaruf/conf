<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view("partial/header");
$this->load->view("partial/header_admin");
?>
<div>
  <h1>Edit information<h2>
</div>

<form action="<?php echo base_url('authors/saveinfo');?>" id="form" method="post" class="form-horizontal" enctype="multipart/form-data">
<div class="table-responsive-md">
  <table class="table">
    <tbody>
      <tr>
        <th class="srink" scope="row">Address Line 1</th>
        <td><input name="address_line_1" class="form-control" value="<?php echo $author_info->address_line_1;?>" type="text"/></td>
      </tr>
      <tr>
        <th class="srink" scope="row">Address Line 2</th>
        <td><input name="address_line_2" class="form-control" value="<?php echo $author_info->address_line_2;?>" type="text"/></td>
      </tr>
      <tr>
        <th class="srink" scope="row">City</th>
        <td><input name="city" class="form-control" value="<?php echo $author_info->city;?>" type="text"/></td>
      </tr>
      <tr>
        <th class="srink" scope="row">Country</th>
        <td><input name="country" class="form-control" value="<?php echo $author_info->country;?>" type="text"/></td>
      </tr>
      <tr>
        <th class="srink" scope="row">About Me</th> <!-- description -->
        <td><textarea name="description" class="form-control" rows="5"><?php echo $author_info->description;?></textarea></td>
      </tr>
      <tr>
        <th class="srink" scope="row">Affiliation</th>
        <td><textarea name="affiliation" class="form-control" rows="5"><?php echo $author_info->affiliation;?></textarea></td>
      </tr>

      <tr>
        <th class="srink" scope="row">Website</th>
        <td><input name="website" class="form-control" value="<?php echo $author_info->website;?>" type="text"/></td>
      </tr>
      <tr>
        <th class="srink" scope="row"></th>
        <td><input class="btn btn-info" type="submit" name="save" value="Save"/></td>
      </tr>
      
    </tbody>
  </table>
</div>
</form>

<?php $this->load->view("partial/footer"); ?>