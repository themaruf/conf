<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view("partial/header");
?> 

    <button class="btn btn-success" onclick="add_paper()"><i class="glyphicon glyphicon-plus"></i> Add Paper</button>


<script type="text/javascript">
      function add_paper()
    {
      save_method = 'add';
      $('#form')[0].reset(); // reset form on modals
      $('#modal_form').modal('show'); // show bootstrap modal
    //$('.modal-title').text('Add Person'); // Set Title to Bootstrap modal title
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

       // ajax adding data to database
          $.ajax({
            url : url,
            type: "POST",
            data: $('#form').serialize(),
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
        <form action="#" id="form" class="form-horizontal">
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
                <input name="keywords" placeholder="Keywords" class="form-control" type="text">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3">Abstract</label>
              <div class="col-md-9">
                <textarea name="abstract" placeholder="Abstract" class="form-control" rows="4" cols="50"></textarea>
              </div>
            </div>

<div class="control-group">
  <select id="select-yourself" class="demo-default" placeholder="Type your name...">
    <option value="">Type your name ...</option>
  </select>
</div>


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



  <script type="text/javascript">
    
  $(document).ready( function () {

$('#select-yourself').selectize({
    valueField: 'name',
    labelField: 'name',
    searchField: 'name',
    options: [],
    create: false,
    load: function(query, callback) {
        if (!query.length) return callback();
        $.ajax({
            url: '<?php echo site_url("authors/suggest_author"); ?>',
            type: 'GET',
            dataType: 'json',
            data: {
                name: query,
            },
            error: function() {
                callback();
            },
            success: function(res) {
                callback(res);
            }
        });
    });
  });

});
  </script>