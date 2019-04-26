<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view("partial/header");
$this->load->view("partial/header_author");
//var_dump($paper_files_data);
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
            $i=1;
            foreach ($paper_files_data as $file) {
            ?>
                <a href="<?php echo base_url('authors/showPaper/').$file->file_name;?>" target="_blank"><b>version <?php echo $i?></b> -  <?php echo $file->file_name?></a>
            <?php
            echo "<br/>";
            $i++;
            }
            ?>


          </p>
          
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
