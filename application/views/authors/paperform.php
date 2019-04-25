<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view("partial/header");
$this->load->view("partial/header_author");
//var_dump($review_data);

$temp_files = glob(__dir__.'/*');
foreach($temp_files as $file) {
  print_r($file);
  echo "<br/>";
}

?>
<div>
  <h1>Update Paper<h2>
</div>
<form action="<?php echo base_url('authors/paper_update');?>" id="form" method="post" class="form-horizontal" enctype="multipart/form-data">
<div class="table-responsive-md">
  <table class="table table-bordered">
    <tbody>
      <tr>
        <th class="srink" scope="row">Paper ID</th>
        <td><input name="paper_id" class="form-control" value="<?php echo $paper_data->paper_id;?>" type="text" readonly></td>
      </tr>
      <tr>
        <th class="srink" scope="row">Paper Title</th>
        <td><input name="paper_title" placeholder="Paper Title" class="form-control" value="<?php echo $paper_data->paper_name;?>" type="text" readonly></td>
      </tr>
      <tr>
        <th class="srink" scope="row">Keywords</th>
        <td><input name="keywords" placeholder="Keywords" data-role="tagsinput" class="form-control" value="<?php echo $paper_data->paper_keywords;?>" type="text"></td>
      </tr>
      <tr>
        <th class="srink" scope="row">Abstract</th>
        <td>
          <textarea name="abstract" id="editor" class="form-control">
            <?php echo $paper_data->abstract;?>
          </textarea>
        </td>
      </tr>
      <tr>
        <th class="srink" scope="row">File</th>
        <td>
          <p>
            
            <?php
            //todo show same type name file
            // echo base_url();
            foreach (glob(base_url() . '/uploads/*.{pdf}') as $filename) {
                print_r($filename);
            }
            ?>


          </p>
          <a href="<?php echo base_url('authors/showPaper/').$paper_data->paper_id;?>" target="_blank"><?php echo $paper_data->file_url?></a>
          <input type="file" name="paper_file" id="paper_file">
        </td>
      </tr>

      <tr>
        <th class="srink" scope="row"></th>
        <td><input class="btn btn-info" type="submit" name="save" value="Save"></td>
      </tr>
    </tbody>
  </table>
</div>
</form>

<?php $this->load->view("partial/footer"); ?>

<script>
    CKEDITOR.replace('editor', {
      height: 250
    });
</script>
