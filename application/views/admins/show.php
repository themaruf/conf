<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view("partial/header");
$this->load->view("partial/header_admin");
// var_dump($paper_data);
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
        	
        </td>
      </tr>

    </tbody>
  </table>
</div>

<?php $this->load->view("partial/footer"); ?>




<!-- <embed src="uploads/<?php echo($paper_data->paper_id).".pdf"?>" width="100%" height="600px" />  -->

