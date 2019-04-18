<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view("partial/header");
$this->load->view("partial/header_author");
?>

<div class="col-md-12">
  <div>
    <?php //var_dump($query);?>
    <br/>
    <table id="table_id" class="table table-striped table-bordered table-responsive">
      <thead>
        <tr>
            <th>Paper ID</th>
            <th>Title</th>
            <th>Keywords</th>
            <th>Abstract</th>
            <th>Status</th>
          <th style="width:80px;">Action
          </p></th>
        </tr>
      </thead>
      <tbody>

        <?php foreach($papers as $paper){?>
             <tr>
                 <td><?php echo $paper->paper_id;?></td>
                 <td><?php echo $paper->paper_name;?></td>
                 <td><?php echo $paper->paper_keywords;?></td>
                 <td><?php echo $paper->abstract;?></td>
                 <td><?php echo $paper->status;?></td>
                <!-- <td><?php echo date("d-M-Y",strtotime($paper->created_date));?></td> -->
                <td>
                  <a class="btn btn-warning" href="<?php echo base_url('authors/view/');echo $paper->paper_id;?>" ><i class="fa fa-edit"></i></a>
                  <a class="btn btn-danger" onclick="delete_paper(<?php echo $paper->paper_id;?>)"><i class="fa fa-trash"></i></a>

                </td>
              </tr>
             <?php }?>
      </tbody>
    </table>
    </div>

        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

    </section>
    <!-- /.content -->

<script type="text/javascript">
  $(document).ready( function () {
      $('#table_id').dataTable({
       "columnDefs": [
          { "targets": [4,5],
           "orderable": false }
        ],

        "language": {
            "emptyTable": "No Paper Found"
        },

        "columnDefs": [
          { "targets": [3,4,5],
           "searchable": false }
        ],
        "pageLength": 10
    });

    $('input[name="created_date"]').daterangepicker({
        autoClose: true,
        singleDatePicker: true,
        "drops": "up",
        locale: {
            format: 'YYYY-MM-DD'
        }
    });

});

    function delete_paper(id)
    {
      if(confirm('Are you sure delete this data?'))
      {
        // ajax delete data from database
          $.ajax({
            url : "<?php echo site_url('authors/paper_delete')?>/"+id,
            type: "POST",
            dataType: "JSON",
            success: function(data)
            {    
              if(data.result)
              {
                $.notify("Paper is Deleted Successfully!", {
                  className:'success',
                  clickToHide: false,
                  autoHide: false,
                  globalPosition: 'bottom center'
                });
              }
              else
              {
                $.notify("Paper Could not be Deleted!!!", {
                  className:'error',
                  clickToHide: false,
                  autoHide: false,
                  globalPosition: 'bottom center'
                });
              }
              
              setTimeout(function(){
                location.reload();// for reload a page
              }, 1000);
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error deleting data');
            }
        });

      }
    }

  </script>

<?php $this->load->view("partial/footer"); ?>

