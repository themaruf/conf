<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view("partial/header");
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

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Papers</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Paper ID</th>
                  <th>Title</th>
                  <th>Keywords</th>
                  <th>Abstract</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                  <td>1</td>
                  <td>Test Title</td>
                  <td>ios android mobile</td>
                  <td>lorem ipsum...</td>
                  <td>On Review</td>
                  <td><a href="#" class="modal-dlg" data-btn-submit="Submit" title="Edit"><span class="glyphicon glyphicon-edit"></span></a>  <a href="#" class="modal-dlg" title="Details"><span class="glyphicon glyphicon-list-alt"></span></a>  <a href="#" class="modal-dlg" data-btn-submit="Submit" title="Delete"><span class="glyphicon glyphicon-trash"></span></a></td>
                </tr>
                <tr>
                  <td>2</td>
                  <td>Test paper</td>
                  <td>iot machine learning</td>
                  <td>lorem ipsum...</td>
                  <td>Reviewed</td>
                  <td><a href="#" class="modal-dlg" data-btn-submit="Submit" title="Edit"><span class="glyphicon glyphicon-edit"></span></a>  <a href="#" class="modal-dlg" title="Details"><span class="glyphicon glyphicon-list-alt"></span></a>  <a href="#" class="modal-dlg" data-btn-submit="Submit" title="Delete"><span class="glyphicon glyphicon-trash"></span></a></td>
                </tr>
                </tbody>
                <tfoot>
                <tr>
                  <th>Paper ID</th>
                  <th>Title</th>
                  <th>Keywords</th>
                  <th>Abstract</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

    </section>
    <!-- /.content -->

