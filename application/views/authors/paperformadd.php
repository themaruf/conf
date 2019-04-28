<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view("partial/header");
$this->load->view("partial/header_author");
//var_dump($paper_files_data);
?>
<div>
  <h1>Submit Paper<h2>
</div>
<?php echo validation_errors();?>
<form id="myform" action="<?php echo base_url('authors/paper_add');?>" id="form" method="post" class="form-horizontal" enctype="multipart/form-data">
<div class="table-responsive-md">
  <table class="table table-bordered">
    <tbody>
      <tr>
        <th class="srink" scope="row">Paper Title<span class="error">*</span></th>
        <td><input name="paper_title" id="paper_title" placeholder="Paper Title" class="form-control" value="<?php echo set_value('paper_title'); ?>" type="text"></td>
      </tr>
      <tr>
        <th class="srink" scope="row">Keywords<span class="error">*</span></th>
        <td><input name="keywords" id="keywords" placeholder="Keywords" data-role="tagsinput" class="form-control" value="<?php echo set_value('keywords'); ?>" type="text"></td>
      </tr>
      <tr>
        <th class="srink" scope="row">Abstract<span class="error">*</span></th>
        <td>
          <textarea name="abstract" id="abstract" class="form-control">
            <?php echo set_value('abstract'); ?>
          </textarea>
        </td>
      </tr>

      <tr>
        <th class="srink" scope="row">Co Authors</th>
        <td>
<div class="form-group" id="itemRows">
  <label class="control-label col-md-3"></label>
  <div class="col-md-9">
    <input placeholder="Full Name" class="form-control" type="text" name="add_co_author_name"/> 
    <input placeholder="Email" class="form-control" type="mail" name="add_co_author_email" /> 
    <input class="btn btn-success" onclick="addRow(this.form);" type="button" value="Add Co Authors" />
  </div>
</div>
        </td>
      </tr>

      <tr>
        <th class="srink" scope="row">File<span class="error">*</span></th>
        <td>
          <input type="file" name="paper_file" id="paper_file">
        </td>
      </tr>

      <tr>
        <th class="srink" scope="row"></th>
        <td><input class="btn btn-info" type="submit" id="save" name="save" value="Save"></td>
      </tr>
    </tbody>
  </table>
</div>
</form>

<?php $this->load->view("partial/footer"); ?>

<script>
    CKEDITOR.replace('abstract', {
      height: 250
    });
</script>


<script type="text/javascript">

$(document).ready(function() {
 
  $('#myform').submit(function(e) {

    var paper_title = $('#paper_title').val();
    var keywords = $('#keywords').val();
    var abstract = $('#abstract').val().trim();
    var paper_file = $('#paper_file').val();
 
    $(".error").remove();

    var formError = 0;
 
    if (paper_title.length < 1) {
      $('#paper_title').after('<span class="error">This field is required</span>');
      formError += 1;
    }
    if (keywords.length < 1) {
      $('#keywords').after('<span class="error">This field is required</span>');
      formError += 1;
    }
    if (abstract.length < 1) {
      $('#abstract').after('<span class="error">This field is required</span>');
      formError += 1;
    }
    if (paper_file.length < 1) {
      $('#paper_file').after('<span class="error">This field is required</span>');
      formError += 1;
    }

    if(formError == 0){
      $('#myform').submit();
    }
    else{
      e.preventDefault();
    }

  });
 
});


</script>




<script type="text/javascript">
  var rowNum = 0;
  function addRow(frm) {
    if(jQuery("input[name=add_co_author_name]").val() != "" && jQuery("input[name=add_co_author_email]").val() != "" && isEmail(jQuery("input[name=add_co_author_email]").val())){
        rowNum ++;
        var row = '<div class="form-group"><label class="control-label col-md-3"></label><div class="col-md-9" id="rowNum'+rowNum+'"> <input placeholder="Full Name" class="form-control" type="text" name="name[]" value="'+frm.add_co_author_name.value+'" readonly> <input placeholder="Email" class="form-control"  type="text" name="email[]" value="'+frm.add_co_author_email.value+'" readonly> <input class="btn btn-danger" type="button" value="Remove" onclick="removeRow('+rowNum+');"></div></div>';
        jQuery('#itemRows').append(row);
        frm.add_co_author_name.value = '';
        frm.add_co_author_email.value = '';
    }
    else{
      alert("Enter Name And Email");
    }
  }
  function removeRow(rnum) {
    jQuery('#rowNum'+rnum).remove();
  }
  function isEmail(email) {
    var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    return regex.test(email);
  }

</script>