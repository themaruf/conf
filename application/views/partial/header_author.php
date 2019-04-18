<body>
<nav class="navbar navbar-expand-md navbar-light navbar-custom">
    <a class="navbar-brand" href="<?php echo base_url('authors/index');?>">CONFMAG</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ml-auto mt-2 mt-md-0">
        <li <?php if($this->uri->segment(2)=="index"){echo 'class="nav-item active"';}?> class="nav-item">
          <a class="nav-link" href="<?php echo base_url('authors/index');?>">Home <span class="sr-only">(current)</span></a>
        </li>
        <li <?php if($this->uri->segment(2)=="papers"){echo 'class="nav-item active"';}?> class="nav-item">
          <a class="nav-link" href="<?php echo base_url('authors/papers');?>">My Papers</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            More
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
            <a <?php if($this->uri->segment(2)=="papers"){echo 'class="dropdown-item active"';}?> class="dropdown-item" href="<?php echo base_url('authors/papers');?>">My Papers</a>
            <a <?php if($this->uri->segment(2)=="view"){echo 'class="dropdown-item active"';}?> class="dropdown-item" href="<?php echo base_url('authors/view');?>">Submit Paper</a>
        <div class="dropdown-divider"></div>
            <a class="dropdown-item logout" href="<?php echo base_url('authors/logout');?>">Logout</a>
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
.logout, .logout:focus{
    color: red;
}
.dropdown-item.active, .dropdown-item:focus{
    background-color: #4DB6AC;
}     
</style>