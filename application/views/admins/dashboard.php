<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view("partial/header");
$this->load->view("partial/header_admin");
?>

<div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <h3 class="profile-username text-center"><?php echo $admin_info->first_name." ". $admin_info->last_name; ?></h3>

              <p class="text-muted text-center">Admin</p>

              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>Email</b> <a class="pull-right"><?php echo $admin_info->email;?></a>
                </li>
                <li class="list-group-item">
                  <b>Phone Number</b> <a class="pull-right"><?php echo $admin_info->phone_number;?></a>
                </li>
                <li class="list-group-item">
                  <b>DOB</b> <a class="pull-right"><?php echo $admin_info->dob;?></a>
                </li>
                <li class="list-group-item">
                  <b>Website</b> <a class="pull-right"><?php echo $admin_info->website == NULL ? 'No Website' : $admin_info->website;?></a>
                </li>
              </ul>

              <a href="<?php echo base_url('admins/logout');?>" class="btn btn-danger btn-block"><b>Logout</b></a>
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
                <a class="btn btn-success" href="<?php echo base_url('admins/editinfo');?>"><i class="fa fa-edit"></i></a>
              </div>
              <div>
                <h3 class="box-title">About Me</h3>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <strong><i class="fa fa-map-marker margin-r-5"></i> Address Line 1</strong>

              <p class="text-muted">
                <?php echo $admin_info->address_line_1 == NULL ? 'Not Specified' : $admin_info->address_line_1;?>
              </p>
              <hr>

              <strong><i class="fa fa-map-marker margin-r-5"></i> Address Line 2</strong>
              <p class="text-muted">
                <?php echo $admin_info->address_line_2 == NULL ? 'Not Specified' : $admin_info->address_line_2;?>
              </p>
              <hr>

              <strong><i class="fa fa-building margin-r-5"></i> City</strong>
              <p class="text-muted">
                <?php echo $admin_info->city == NULL ? 'Not Specified' : $admin_info->city;?>
              </p>
              <hr>

              <strong><i class="fa fa-flag margin-r-5"></i> Country</strong>
              <p class="text-muted">
                <?php echo $admin_info->country == NULL ? 'Not Specified' : $admin_info->country;?>
              </p>
              <hr>


              <strong><i class="fa fa-file-text-o margin-r-5"></i> About Me</strong>
              <p class="text-muted">
                <?php echo $admin_info->description == NULL ? 'Not Specified' : $admin_info->description;?>
              </p>
              <hr>

              <strong><i class="fa fa-file-text-o margin-r-5"></i> Affiliation</strong>
              <p class="text-muted">
                <?php echo $admin_info->affiliation == NULL ? 'Not Specified' : $admin_info->affiliation;?>
              </p>

            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
</div>
<?php $this->load->view("partial/footer"); ?>