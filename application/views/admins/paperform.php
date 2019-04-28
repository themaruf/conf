<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view("partial/header");
$this->load->view("partial/header_admin");
//var_dump($paper_data);
?>
<div>
  <h1>Choose Reviewer<h2>
</div>
<div class="table-responsive-md">
  <table class="table table-bordered">
    <tbody>
      <tr>
        <th class="srink" scope="row">Paper ID</th>
        <td><?php echo $paper_data->paper_id;?><a class="btn btn-info pull-right" href="<?php echo base_url('admins/show/');echo $paper_data->paper_id;?>" ><i class="fa fa-eye"></i></a></td>
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
              echo $value;
              echo "<br/>";
              if($i%2 == 0){
                echo "<hr>";
              }
            $i++;
          }?>
        </td>
      </tr>
      <tr>
        <th class="srink" scope="row">Choose Reviewers</th>
        <td>
            <select class="SlectBox" multiple="multiple" name="reviewers" id="reviewers">
              <?php foreach ($reviewers as $reviewer){
                  $data = $reviewer->first_name. " ". $reviewer->last_name." (". $reviewer->email. ") - ".$reviewer->keywords; 
                  echo "<option value='$reviewer->reviewer_id'> $data </option>";
              }?> 
            </select> 
        </td>
      </tr>

      <tr>
        <th class="srink" scope="row"></th>
        <td><button class="btn btn-info" id="assign_btn">Assign</button></td>
      </tr>
    </tbody>
  </table>
</div>

<?php $this->load->view("partial/footer"); ?>

<script type="text/javascript">
  $(document).ready(function () {
      $('.SlectBox').SumoSelect();

      <?php foreach ($assigned_reviewers as $assigned_reviewer): ?>
         $('.SlectBox')[0].sumo.selectItem(''+<?php echo ($assigned_reviewer->reviewer_id);?>);
      <?php endforeach ?>
      

      $('#assign_btn').on('click', function() {
        var reviewers_selected = [];
        $('.SlectBox option:selected').each(function(i) {
          reviewers_selected.push($(this).val());
        });

        $.ajax({
            type:'POST',
            url:'<?php echo base_url("admins/assign_paper"); ?>',
            data:{'reviewers': reviewers_selected, 'paper_id': '<?php echo $paper_data->paper_id;?>'},
            success:function(data)
            {
              if(data)
              {
                $.notify("Reviewers Are Assigned Successfully!", {
                  className:'success',
                  clickToHide: false,
                  autoHide: false,
                  globalPosition: 'bottom center'
                });
              }
              else
              {
                $.notify("Reviewers Could not be Assigned!!! Maybe already assigned", {
                  className:'error',
                  clickToHide: false,
                  autoHide: false,
                  globalPosition: 'bottom center'
                });
              }
              
              setTimeout(function(){
                window.location.replace("<?php echo base_url('admins/papers')?>");
              }, 1000);
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error Assigning');
            }
        });

      });
  });
</script>
