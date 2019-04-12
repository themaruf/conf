<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view("partial/header");
$this->load->view("partial/header_author");
?>

    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="<?php echo base_url();?>adminlte/dist/img/avatar.png" alt="User profile picture">

              <h3 class="profile-username text-center"><?php echo $author_info->first_name." ". $author_info->last_name; ?></h3>

              <p class="text-muted text-center">Author</p>

              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>Email</b> <a class="pull-right"><?php echo $author_info->email;?></a>
                </li>
                <li class="list-group-item">
                  <b>Phone Number</b> <a class="pull-right"><?php echo $author_info->phone_number;?></a>
                </li>
                <li class="list-group-item">
                  <b>DOB</b> <a class="pull-right"><?php echo $author_info->dob;?></a>
                </li>
              </ul>

              <a href="<?php echo base_url('authors/logout');?>" class="btn btn-danger btn-block"><b>Logout</b></a>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <!-- About Me Box -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">About Me</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <strong><i class="fa fa-book margin-r-5"></i> Education</strong>

              <p class="text-muted">
                B.S. in Computer Science from the University of Tennessee at Knoxville
              </p>

              <hr>

              <strong><i class="fa fa-map-marker margin-r-5"></i> Location</strong>

              <p class="text-muted">Malibu, California</p>

<!--               <hr>

              <strong><i class="fa fa-pencil margin-r-5"></i> Skills</strong>

              <p>
                <span class="label label-danger">UI Design</span>
                <span class="label label-success">Coding</span>
                <span class="label label-info">Javascript</span>
                <span class="label label-warning">PHP</span>
                <span class="label label-primary">Node.js</span>
              </p> -->

              <hr>

              <strong><i class="fa fa-file-text-o margin-r-5"></i> Notes</strong>

              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">

  <div>
    <button class="btn btn-success" onclick="add_paper()"><i class="glyphicon glyphicon-plus"></i> Add Paper</button>
    <br/>
    <?php var_dump($query);?>
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
                  <button class="btn btn-warning" onclick="edit_paper(<?php echo $paper->paper_id;?>)"><i class="glyphicon glyphicon-edit"></i></button>
                  <button class="btn btn-danger" onclick="delete_paper(<?php echo $paper->paper_id;?>)"><i class="glyphicon glyphicon-trash"></i></button>

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
          { "targets": [2,4],
           "orderable": false }
        ],

        "columnDefs": [
          { "targets": [3,4],
           "searchable": false }
        ],
        "pageLength": 25
    });    
});
    var save_method; //for save method string
    var table;

    function add_paper()
    {
      save_method = 'add';
      $('#form')[0].reset(); // reset form on modals
      $('#modal_form').modal('show'); // show bootstrap modal
    //$('.modal-title').text('Add Paper'); // Set Title to Bootstrap modal title
    }

    function edit_paper(id)
    {
      save_method = 'update';
      $('#form')[0].reset(); // reset form on modals

      //Ajax Load data from ajax
      $.ajax({
        url : "<?php echo site_url('authors/ajax_edit/')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
            console.log(data);
            $('[name="paper_id"]').val(data.paper_id);
            $('[name="paper_title"]').val(data.paper_name);
            //clearing data
            $('[name="keywords"]').tagsinput('removeAll');
            $('[name="keywords"]').tagsinput('add',data.paper_keywords);
            $('[name="abstract"]').val(data.abstract);
            $('#file_link').html(data.file_url).attr("href", "<?php echo site_url('authors/showPaper')?>/" + data.file_url);

            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Edit Paper'); // Set title to Bootstrap modal title

        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error getting data from ajax');
        }
    });
    }



    function save()
    {
      var url;
      if(save_method == 'add')
      {
          url = "<?php echo site_url('authors/paper_add')?>";
      }
      else
      {
          url = "<?php echo site_url('authors/paper_update')?>";
      }

      var form_data = new FormData($('#form')[0]);

      // Display the key/value pairs
      for (var pair of form_data.entries()) {
          console.log(pair[0]+ ', ' + pair[1]); 
      }

       //ajax adding data to database
          $.ajax({
            url : url,
            type: "POST",
            enctype: "multipart/form-data",
            contentType: false,
            cache: false,
            processData:false,
            data: form_data,
            dataType: "JSON",
            success: function(data)
            {
              //console.log(data.result);
               //if success close modal and reload ajax table
              $('#modal_form').modal('hide');
              if(data.result)
              {
                $.notify("Paper is Created/Updated Successfully!", {
                  className:'success',
                  clickToHide: false,
                  autoHide: false,
                  globalPosition: 'bottom center'
                });
              }
              else
              {
                $.notify("Paper could not be Created/Updated!", {
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
                alert('Error adding / update data');
            }
        });
    }

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

  <!-- Bootstrap modal -->
  <div class="modal fade" id="modal_form" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal-title">Paper Form</h3>
      </div>
      <div class="modal-body form">
        <form action="#" id="form" class="form-horizontal" enctype="multipart/form-data">
          <div class="form-body">
              <div class="form-group">
              <label class="control-label col-md-3">Paper Title</label>
              <div class="col-md-9">
                <input name="paper_title" placeholder="Paper Title" class="form-control" type="text">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3">Keywords</label>
              <div class="col-md-9">
                <input name="keywords" placeholder="Keywords" data-role="tagsinput" class="form-control" type="text">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3">Abstract</label>
              <div class="col-md-9">
              <textarea name="abstract" placeholder="Abstract" class="form-control" rows="12" cols="30"></textarea>
              </div>
            </div>

            <div>
              <input type="file" name="paper_file" id="paper_file">
              <a id="file_link" target="_blank"></a>
            </div>
<!--             <div class="form-group">
              <label class="control-label col-md-3">Co Author</label>
              <div class="col-md-9">
                <input name="co_author" id="co_author" placeholder="Co Author" class="form-control" type="text">
              </div>
            </div> -->
<!--             <div class="container1">
              <button class="add_form_field">Add New &nbsp; <span style="font-size:16px; font-weight:bold;">+ </span></button>
              <div><input class="co_author" type="text" name="co_author[]"></div>
            </div> -->
            <!-- maruf -->
<!--             <div class="form-group">
              <label class="control-label col-md-3">Created Date</label>
              <div class="col-md-9">
                <input class="form-control form-control-lg" type="text" id="created_date" name="created_date" />
              </div>
            </div> -->
            <!-- maruf -->

          </div>
        </form>
          </div>
          <div class="modal-footer">
            <button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Save</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
  <!-- End Bootstrap modal -->


<?php $this->load->view("partial/footer"); ?>


<!-- maruf -->
<script type="text/javascript">
  $(document).ready( function () {
    $('input[name="created_date"]').daterangepicker({
        autoClose: true,
        singleDatePicker: true,
        "drops": "up",
        locale: {
            format: 'YYYY-MM-DD'
        }
    });

 // $(".co_author").autocomplete({
 //    source: '<?php echo site_url("authors/suggest_author"); ?>',
 //    minChars:0,
 //    autoFocus: false,
 //    delay:10,
 //    appendTo: ".modal-content",
 //    select: function(e, ui) {
 //      if ($("#author_" + ui.item.value).length == 1)
 //      {
 //        $("#author_" + ui.item.value).val(parseFloat( $("#author_" + ui.item.value).val()) + 1);
 //      }
 //      else
 //      {
 //        $("#authors_list").append("<tr><td><a href='#' onclick='return delete_author(this);'><span class='glyphicon glyphicon-trash'></span></a></td><td>" + ui.item.label + "</td><td><input class='quantity form-control input-sm' id='author_" + ui.item.value + "' type='text' name=author[" + ui.item.value + "] value='1'/></td></tr>");
 //      }
 //      $("#co_author").val("");
 //      return false;
 //    }
 //  });

 function delete_author(link)
{
  preventDefault();
  $(link).parent().parent().remove();
  return false;
}


    var max_fields  = 3;
    var wrapper = $(".container1");
    var add_button = $(".add_form_field");
  
    var x = 1;
    $(add_button).click(function(e){
        e.preventDefault();
        if(x < max_fields){
            x++;
            $(wrapper).append('<div><input type="text" name="co_author[]"/><a href="#" class="delete">Delete</a></div>'); //add input box
        }
  else
  {
  alert('You Reached the limits')
  }
    });
  
    $(wrapper).on("click",".delete", function(e){
        e.preventDefault(); $(this).parent('div').remove(); x--;
    })
});

</script>
<!-- maruf -->