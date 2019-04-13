<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view("partial/header");
$this->load->view("partial/header_author");
var_dump($paper_data);
?>
<div>
  <h1>Submission information<h2>
</div>

<div class="table-responsive-md">
  <table class="table table-bordered">
    <tbody>
      <tr>
        <th class="srink" scope="row">Paper Title</th>
        <td><?php echo $paper_data->paper_name;?></td>
      </tr>
      <tr>
        <th class="srink" scope="row">Keywords</th>
        <td><?php echo $paper_data->paper_keywords;?></td>
      </tr>
      <tr>
        <th class="srink" scope="row">Abstract</th>
        <td><?php echo $paper_data->abstract;?></td>
      </tr>
      <tr>
        <th class="srink" scope="row">Co Authors</th>
        <td>
          <?php foreach ($co_author_data as $key => $value) {
              echo $value;
              echo "<br/>";
          }?>
        </td>
      </tr>
      <tr>
        <th class="srink" scope="row">Choose Reviewers</th>
        <td>
            <select class="form-control" name="reviewers" id="reviewers">
              <?php foreach ($reviewers as $reviewer){
                  $data = $reviewer->first_name. " ". $reviewer->last_name." (". $reviewer->email. ") - ".$reviewer->keywords; 
                  echo "<option value='$reviewer->reviewer_id'> $data </option>";
              }?> 
            </select>
            <input class="btn btn-success" id="addReviewer" type="button" value="Add row" />

            <option value="volvo">Volvo</option>
            <div id="reviewer_list">
              
            </div>

            <input placeholder="Full Name" class="form-control" type="text" name="add_co_author_name"/> 
            <input placeholder="Email" class="form-control" type="mail" name="add_co_author_email" /> 
            
        </td>
      </tr>
    </tbody>
  </table>
</div>

<form action="<?php echo base_url('authors/paper_add');?>" id="form" method="post" class="form-horizontal" enctype="multipart/form-data">
  <div class="form-body">
      <div class="form-group">
          <h3 class="control-label col-md-3">Paper Form</h3>
      </div>
      <div class="form-group">
      <label class="control-label col-md-3">Paper Title</label>
      <div class="col-md-9">
        <input name="paper_title" placeholder="Paper Title" class="form-control" value="<?php echo $paper_data->paper_name;?>" type="text" readonly>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-md-3">Keywords</label>
      <div class="col-md-9">
        <input name="keywords" placeholder="Keywords" data-role="tagsinput" class="form-control" value="<?php echo $paper_data->paper_keywords;?>" type="text">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-md-3">Abstract</label>
      <div class="col-md-9">
      <textarea name="abstract" id="editor" class="form-control">
        <?php echo $paper_data->abstract;?>
      </textarea>
      </div>
    </div>

<!-- https://www.codexworld.com/add-remove-input-fields-group-dynamically-jquery/ -->
<div class="form-group" id="itemRows">
  <label class="control-label col-md-3">Co Authors</label>
  <div class="col-md-9">
    <input placeholder="Full Name" class="form-control" type="text" name="add_co_author_name"/> 
    <input placeholder="Email" class="form-control" type="mail" name="add_co_author_email" /> 
    <input class="btn btn-success" onclick="addRow(this.form);" type="button" value="Add row" />
  </div>
</div>


    <div class="form-group">
      <label class="control-label col-md-3">File</label>
      <div class="col-md-9">
        <input type="file" name="paper_file" id="paper_file">
<!--         <a href="<?php echo site_url('authors/showPaper/'); echo $paper_data->file_url; ?>" id="file_link" target="_blank"><?php echo $paper_data->file_url;?></a> -->
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-md-3"></label>
      <div class="col-md-9">
        <input class="btn btn-info" type="submit" name="save" value="Save">
      </div>
    </div>

    
    <!-- <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button> -->

  </div>
</form>



<?php $this->load->view("partial/footer"); ?>

<script>
        CKEDITOR.replace('editor');
</script>


<script type="text/javascript">
  $(document).ready(function(){
    
    $('#addReviewer').on('click', function(){
      $('#reviewer_list').append($('#reviewers :selected').html());
      $('#reviewer_list').append('<br/>');

      
    });

  });
</script>