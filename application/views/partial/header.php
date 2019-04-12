<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<base href="<?php echo base_url();?>" />
	<title>Conf</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url();?>adminlte/bower_components/bootstrap/dist/css/bootstrap.min.css"/>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url();?>adminlte/bower_components/font-awesome/css/font-awesome.min.css"/>
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url();?>css/bootstrap-tagsinput.css"/>
  
  <link rel="stylesheet" href="<?php echo base_url();?>css/selectize.bootstrap3.css"/>
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url();?>adminlte/bower_components/Ionicons/css/ionicons.min.css"/>
   <!-- DataTables -->
     <link href="<?php echo base_url();?>datatables/css/dataTables.bootstrap.css" rel="stylesheet"/>
  <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />
  <link rel="stylesheet" href="<?php echo base_url();?>adminlte/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url();?>adminlte/dist/css/AdminLTE.min.css"/>
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url();?>adminlte/dist/css/skins/_all-skins.min.css"/>
  <!-- Morris chart -->
  <link rel="stylesheet" href="<?php echo base_url();?>adminlte/bower_components/morris.js/morris.css"/>
  <!-- jvectormap -->
  <link rel="stylesheet" href="<?php echo base_url();?>adminlte/bower_components/jvectormap/jquery-jvectormap.css"/>
  <!-- Date Picker -->
  <link rel="stylesheet" href="<?php echo base_url();?>adminlte/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css"/>
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?php echo base_url();?>adminlte/bower_components/bootstrap-daterangepicker/daterangepicker.css"/>
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="<?php echo base_url();?>adminlte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css"/>

  <link rel="stylesheet" href="<?php echo base_url();?>adminlte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css"/>

  <link rel="stylesheet" href="<?php echo base_url();?>css/styles.css"/>
  <link rel="stylesheet" href="<?php echo base_url();?>css/login.css"/>

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic"/>

	<style type="text/css">
		html {
			overflow: auto;
		}
		.bootstrap-tagsinput {
		  width: 100% !important;
		}
	</style>

	<!-- jQuery 3 -->
<script src="<?php echo base_url();?>adminlte/bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo base_url();?>adminlte/bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url();?>adminlte/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  <script src="<?php echo base_url('datatables/js/jquery.dataTables.min.js')?>"></script>
  <script src="<?php echo base_url('datatables/js/dataTables.bootstrap.js')?>"></script>

<script src="<?php echo base_url('/ckeditor/ckeditor.js')?>"></script>
<!-- DataTables -->
<script src="<?php echo base_url();?>adminlte/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url();?>adminlte/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="<?php echo base_url();?>js/bootstrap-tagsinput.js"></script>
<script src="<?php echo base_url();?>js/selectize.min.js"></script>
<!-- notify js -->
  <script src="<?php echo base_url('js/notify.min.js')?>"></script>
<!-- Morris.js charts -->
<script src="<?php echo base_url();?>adminlte/bower_components/raphael/raphael.min.js"></script>
<script src="<?php echo base_url();?>adminlte/bower_components/morris.js/morris.js"></script>
<!-- Sparkline -->
<script src="<?php echo base_url();?>adminlte/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="<?php echo base_url();?>adminlte/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="<?php echo base_url();?>adminlte/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?php echo base_url();?>adminlte/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?php echo base_url();?>adminlte/bower_components/moment/min/moment.min.js"></script>
<script src="<?php echo base_url();?>adminlte/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="<?php echo base_url();?>adminlte/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="<?php echo base_url();?>adminlte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="<?php echo base_url();?>adminlte/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url();?>adminlte/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url();?>adminlte/dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo base_url();?>adminlte/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url();?>adminlte/dist/js/demo.js"></script>
</head>


<style type="text/css">
body{
	font-size: 16px;
}	
.container-fluid {
    padding-right: 0px;
    padding-left: 0px;
}
</style>
