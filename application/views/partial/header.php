<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<base href="<?php echo base_url();?>" />
	<title></title>

	<link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url();?>images/icon.png"/>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/bootstrap.min.css"/>

	<script src="<?php echo base_url();?>js/jquery-3.3.1.min.js"></script>
	<script src="<?php echo base_url();?>js/bootstrap.min.js"></script>
	<style type="text/css">
		html {
			overflow: auto;
		}
	</style>
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">CONFMAG</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">About Us</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Dropdown
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Home</a>
          <a class="dropdown-item" href="#">About Us</a>
        </div>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>



		<div class="container-fluid">
			<div class="row">


	<script type="text/javascript">
		//language change button -> block CTRL+click
        $(document).ready(function() {
	        $('.langChange').click(function (e){  
			    if (e.ctrlKey) {
			        return false;
			    }
			    else if(e.shiftKey){
			    	return false;
			    }
			});
        });
    </script>

<style type="text/css">
    .dropdown-menu>li>a {
	    padding: 10px 20px;
	}	
	.navbar-default .navbar-nav>.open>a:focus{
		color: #fff;
		background-color: #18bc9c;
	}
	.navbar-default .navbar-nav>li:hover{
		background-color: #18bc9c;
	}
	.navbar-default .navbar-nav>li>a:hover{
		color: #ffffff;
	}
	.langoptions>li>a:hover, .langoptions>li>a:focus{
		color: #fff;
		background-color: #18bc9c;
	}

	.navbar-brand>img {
		margin-top: -7px;
    	vertical-align: baseline;
	}
	.navbar-brand>img:hover{
		transform: scale(1.1, 1.1);
	}
</style>

