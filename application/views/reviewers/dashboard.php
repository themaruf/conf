<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view("partial/header");
$this->load->view("partial/header_reviewer");
?>

<div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="<?php echo base_url();?>adminlte/dist/img/avatar.png" alt="User profile picture">

              <h3 class="profile-username text-center"><?php echo $reviewer_info->first_name." ". $reviewer_info->last_name; ?></h3>

              <p class="text-muted text-center">Reviewer</p>

              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>Email</b> <a class="pull-right"><?php echo $reviewer_info->email;?></a>
                </li>
                <li class="list-group-item">
                  <b>Phone Number</b> <a class="pull-right"><?php echo $reviewer_info->phone_number;?></a>
                </li>
                <li class="list-group-item">
                  <b>DOB</b> <a class="pull-right"><?php echo $reviewer_info->dob;?></a>
                </li>
              </ul>

              <a href="<?php echo base_url('reviewers/logout');?>" class="btn btn-danger btn-block"><b>Logout</b></a>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>

        <div class="col-md-9">
          <!-- About Me Box -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <div class="pull-right">
                <a class="btn btn-success" href="<?php echo base_url('reviewers/papers');?>"><i class="fa fa-book"></i> Show Paper</a>
              </div>
              <div>
                <h3 class="box-title">About Me</h3>
              </div>
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
</div>
<?php $this->load->view("partial/footer"); ?>