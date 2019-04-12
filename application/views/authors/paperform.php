<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view("partial/header");
$this->load->view("partial/header_author");
var_dump($paper_data);
?>

<form action="<?php echo base_url('authors/paper_add');?>" id="form" method="post" class="form-horizontal" enctype="multipart/form-data">
  <div class="form-body">
      <div class="form-group">
          <h3 class="control-label col-md-3">Paper Form</h3>
      </div>
      <div class="form-group">
      <label class="control-label col-md-3">Paper Title</label>
      <div class="col-md-9">
        <input name="paper_title" placeholder="Paper Title" class="form-control" value="<?php echo $paper_data->paper_name;?>" type="text">
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
  <label class="control-label col-md-3">Co Author</label>
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
  var rowNum = 0;
  function addRow(frm) {
    //if(jQuery("input[name=add_co_author_name]").val() != "" && jQuery("input[name=add_co_author_email]").val() != "" && isEmail(jQuery("input[name=add_co_author_email]").val())){
        rowNum ++;
        var row = '<div class="form-group"><label class="control-label col-md-3"></label><div class="col-md-9" id="rowNum'+rowNum+'"> <input placeholder="Full Name" class="form-control" type="text" name="name[]" value="'+frm.add_co_author_name.value+'"> <input placeholder="Email" class="form-control"  type="text" name="email[]" value="'+frm.add_co_author_email.value+'"> <input class="btn btn-danger" type="button" value="Remove" onclick="removeRow('+rowNum+');"></div></div>';
        jQuery('#itemRows').append(row);
        frm.add_co_author_name.value = '';
        frm.add_co_author_email.value = '';
    // }
    // else{
    //   alert("Enter Name And Email");
    // }

  }

  function removeRow(rnum) {
    jQuery('#rowNum'+rnum).remove();
  }

  function isEmail(email) {
    var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    return regex.test(email);
  }

</script>