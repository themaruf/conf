<body>
<nav class="navbar navbar-expand-md navbar-light navbar-custom">
    <a class="navbar-brand" href="<?php echo base_url('home/index');?>">CONFMAG</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ml-auto mt-2 mt-md-0">
        <li <?php if($this->uri->segment(2)=="index"){echo 'class="nav-item active"';}?> class="nav-item">
          <a class="nav-link" href="<?php echo base_url('home/index');?>">Home <span class="sr-only">(current)</span></a>
        </li>
        <li <?php if($this->uri->segment(2)=="about"){echo 'class="nav-item active"';}?> class="nav-item">
          <a class="nav-link" href="<?php echo base_url('home/about');?>">About Us</a>
        </li>
        <li <?php if($this->uri->segment(2)=="contact"){echo 'class="nav-item active"';}?> class="nav-item">
          <a class="nav-link" href="<?php echo base_url('home/contact');?>">Contact Us</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Login As
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
            <a <?php if($this->uri->segment(1)=="authors" && $this->uri->segment(2)=="login"){echo 'class="dropdown-item active"';}?> class="dropdown-item" href="<?php echo base_url('authors/login');?>">Author</a>
            <a <?php if($this->uri->segment(1)=="admins" && $this->uri->segment(2)=="login"){echo 'class="dropdown-item active"';}?> class="dropdown-item" href="<?php echo base_url('admins/login');?>">Admin</a>
            <a <?php if($this->uri->segment(1)=="reviewers" && $this->uri->segment(2)=="login"){echo 'class="dropdown-item active"';}?> class="dropdown-item" href="<?php echo base_url('reviewers/login');?>">Reviewer</a>
<!--                 <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Something else here</a> -->
          </div>
        </li>
      </ul>
    </div>
</nav>
<div class="nav-gap">


  <!-- Menu Toggle Script -->
  <script>
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
  </script>

<style type="text/css">
  .nav-gap{
    margin: 10px;
    min-height: 700px;
 }
.navbar-custom {
    background-color: #4DB6AC;
}

.navbar-light .nav-item.active .nav-link,
.navbar-light .nav-item:focus .nav-link,
.navbar-light .nav-item:hover .nav-link {
        color: #fafafa;
}
.dropdown-item.active, .dropdown-item:focus{
    background-color: #4DB6AC;
}       
</style>