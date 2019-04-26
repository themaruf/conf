<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view("partial/header");
$this->load->view("partial/header_admin");
//var_dump($review_data);
?>
<div>
  <h1>Paper information<h2>
</div>
<div class="table-responsive-md">
  <table class="table table-bordered">
    <tbody>
      <tr>
        <th class="srink" scope="row">Paper ID</th>
        <td><?php echo $paper_data->paper_id;?> <a class="btn btn-info pull-right" href="<?php echo base_url('admins/view/');echo $paper_data->paper_id;?>" ><i class="fa fa-edit"></i></a></td>
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
        <th class="srink" scope="row">Co Authors</th>
        <td>
          <?php 
            $i=1;
            foreach ($co_author_data as $key => $value) {
            if($value != ''){
           		echo $value;
              	echo "<br/>";
				if($i%2 == 0){
				echo "<hr>";
				}
            }
            $i++;
          }?>
        </td>
      </tr>

      <tr>
        <th class="srink" scope="row">Assigned Reviewers</th>
        <td>
        	<?php 
        		foreach ($assigned_reviewers as $ass_rev) {
        			echo $ass_rev->first_name. " ". $ass_rev->last_name. "<br/>" .$ass_rev->email ;
        			echo "<hr>";
        		}
        	?>
        </td>
      </tr>


      <tr>
        <th class="srink" scope="row">File</th>
        <td>
          <div> 
            <?php
            $i=1;
            foreach ($paper_files_data as $file) {
            ?>
                <a href="<?php echo base_url('admins/showPaper/').$file->file_name;?>" target="_blank"><b>version <?php echo $i?></b> -  <?php echo $file->file_name?></a>
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
              <cite>- <?php echo $review->first_name. " ". $review->last_name?></cite>
            </div>
          <?php
            }
          ?>
        </td>
      </tr>

    </tbody>
  </table>
</div>

<?php $this->load->view("partial/footer"); ?>


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
