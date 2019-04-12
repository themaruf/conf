<body>
<div class="container-fluid">
    <nav class="navbar navbar-inverse">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?php echo base_url('authors/index');?>">CONFMAG</a>
        </div>
        <!-- Collection of nav links, forms, and other content for toggling -->
        <div id="navbarCollapse" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li <?php if($this->uri->segment(2)=="index"){echo 'class="active"';}?> ><a href="<?php echo base_url('authors/index');?>">Home</a></li>
                <li <?php if($this->uri->segment(2)=="papers"){echo 'class="active"';}?> ><a href="<?php echo base_url('authors/papers');?>">My Papers</a></li>
                <!-- <li><a href="<?php echo base_url('authors/papers');?>">My Papers</a></li> -->
            </ul>

            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">More <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="<?php echo base_url('authors/papers');?>">My Papers</a></li>
                        <li><a href="<?php echo base_url('authors/view');?>">Submit Paper</a></li>
                        
                        <li class="divider"></li>
                        <li><a href="<?php echo base_url('authors/logout');?>">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</div>