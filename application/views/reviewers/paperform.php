<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view("partial/header");
$this->load->view("partial/header_reviewer");
//var_dump($review_data);
?>
<div>
  <h1>Evaluate Paper<h2>
</div>
<form action="<?php echo base_url('reviewers/evaluatepaper');?>" id="evaluate_form" method="post" class="form-horizontal" enctype="multipart/form-data">
<div class="table-responsive-md">
  <table class="table table-bordered">
    <tbody>
      <tr>
        <th class="srink" scope="row">Paper ID</th>
        <td><input name="paper_id" class="form-control" value="<?php echo $paper_data->paper_id;?>" type="text" readonly></td>
      </tr>
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
        <th class="srink" scope="row">File</th>
        <td>
          <div>
            <?php
            $i=1;
            foreach ($paper_files_data as $file) {
            ?>
                <a href="<?php echo base_url('reviewers/showPaper/').$file->file_name;?>" target="_blank"><b>version <?php echo $i?></b> -  <?php echo $file->file_name?></a>
            <?php
            echo "<br/>";
            $i++;
            }
            ?>
          </div>
        </td>
      </tr>

      <tr>
        <th class="srink" scope="row">Review History</th>
        <td>
          <?php 
            foreach ($review_data as $review) {
          ?>
            <div class="timeline-item" date-is='<?php echo $review->timestamp?>'>
              <h1><?php echo $review->review_score_text?></h1>
              <p>
                <?php echo $review->review_comments?>
              </p>
            </div>
          <?php
            }
          ?>
        </td>
      </tr>
      <tr>
<!--    -2 Reject
        -1 Weakly Reject
         0 Neutral
         1 Weakly Accept
         2 Accept -->
      <th class="srink" scope="row">Score<span class="error">*</span></th>
        <td>
            <select class="form-control" name="review_score" id="review_score">
                  <option value="-2">Reject</option>
                  <option value="-1">Weakly Reject</option>
                  <option value="0">Neutral</option>
                  <option value="1">Weakly Accept</option>
                  <option value="2">Accept</option>
            </select> 
        </td>
      </tr>

      <tr>
        <th class="srink" scope="row">Comment<span class="error">*</span></th>
        <td>
            <textarea name="review_comments" id="review_comments" class="form-control required" rows="8"></textarea>
        </td>
      </tr>

      <tr>
        <th class="srink" scope="row"></th>
        <td><button class="btn btn-info" id="eval_btn">Evaluate</button></td>
      </tr>
    </tbody>
  </table>
</div>
</form>

<?php $this->load->view("partial/footer"); ?>


<script type="text/javascript">
  $(document).ready(function(){
    $("#evaluate_form").validate();
  });
</script>


<style type="text/css">
  @import url("https://fonts.googleapis.com/css?family=Oswald|Roboto:400,700");
body {
  font-size: 14px;
  line-height: 1.5;
}

h1, h2, h3, h4, h5, h6 {
  font-family: 'Oswald', sans-serif;
}

h1 {
  font-size: 2rem;
  margin-bottom: .5em;
}

p {
  font-family: 'Roboto', sans-serif;
  font-size: .8rem;
}

.container {
  max-width: 1024px;
  width: 90%;
  margin: 0 auto;
}

.timeline-item {
  padding: 3em 2em 2em;
  position: relative;
  color: rgba(0, 0, 0, 0.7);
  border-left: 2px solid rgba(0, 0, 0, 0.3);
}
.timeline-item p {
  font-size: 1rem;
}
.timeline-item::before {
  content: attr(date-is);
  position: absolute;
  left: 2em;
  font-weight: bold;
  top: 1em;
  display: block;
  font-family: 'Roboto', sans-serif;
  font-weight: 700;
  font-size: .785rem;
}
.timeline-item::after {
  width: 10px;
  height: 10px;
  display: block;
  top: 1em;
  position: absolute;
  left: -7px;
  border-radius: 10px;
  content: '';
  border: 2px solid rgba(0, 0, 0, 0.3);
  background: white;
}
.timeline-item:last-child {
  -o-border-image: linear-gradient(to bottom, rgba(0, 0, 0, 0.3) 60%, transparent) 1 100%;
     border-image: -webkit-linear-gradient(top, rgba(0, 0, 0, 0.3) 60%, transparent) 1 100%;
     border-image: linear-gradient(to bottom, rgba(0, 0, 0, 0.3) 60%, transparent) 1 100%;
}

</style>
