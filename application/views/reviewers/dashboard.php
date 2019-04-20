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
                <li class="list-group-item">
                  <b>Website</b> <a class="pull-right"><?php echo $reviewer_info->website == NULL ? 'No Website' : $reviewer_info->website;?></a>
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
                <a class="btn btn-success" href="<?php echo base_url('reviewers/editinfo');?>"><i class="fa fa-edit"></i></a>
              </div>
              <div>
                <h3 class="box-title">About Me</h3>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <strong><i class="fa fa-map-marker margin-r-5"></i> Address Line 1</strong>

              <p class="text-muted">
                <?php echo $reviewer_info->address_line_1 == NULL ? 'Not Specified' : $reviewer_info->address_line_1;?>
              </p>
              <hr>

              <strong><i class="fa fa-map-marker margin-r-5"></i> Address Line 2</strong>
              <p class="text-muted">
                <?php echo $reviewer_info->address_line_2 == NULL ? 'Not Specified' : $reviewer_info->address_line_2;?>
              </p>
              <hr>

              <strong><i class="fa fa-building margin-r-5"></i> City</strong>
              <p class="text-muted">
                <?php echo $reviewer_info->city == NULL ? 'Not Specified' : $reviewer_info->city;?>
              </p>
              <hr>

              <strong><i class="fa fa-flag margin-r-5"></i> Country</strong>
              <p class="text-muted">
                <?php echo $reviewer_info->country == NULL ? 'Not Specified' : $reviewer_info->country;?>
              </p>
              <hr>

              <strong><i class="fa fa-file-text-o margin-r-5"></i> Keywords</strong>
              <p class="text-muted">
                <?php echo $reviewer_info->keywords == NULL ? 'Not Specified' : $reviewer_info->keywords;?>
              </p>
              <hr>

              <strong><i class="fa fa-file-text-o margin-r-5"></i> About Me</strong>
              <p class="text-muted">
                <?php echo $reviewer_info->description == NULL ? 'Not Specified' : $reviewer_info->description;?>
              </p>
              <hr>

              <strong><i class="fa fa-file-text-o margin-r-5"></i> Affiliation</strong>
              <p class="text-muted">
                <?php echo $reviewer_info->affiliation == NULL ? 'Not Specified' : $reviewer_info->affiliation;?>
              </p>
              <hr>

              <strong><i class="fa fa-file-text-o margin-r-5"></i> CV</strong>
              <br/>
              <a href="<?php echo $reviewer_info->cv_url?>" target="_blank">
                <?php echo $reviewer_info->cv_url == NULL ? 'Not Specified' : $reviewer_info->cv_url;?>
              </a>

            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
</div>
<?php $this->load->view("partial/footer"); ?>
