<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view("partial/header");
$this->load->view("partial/header_normal");
?>
<div class="jumbotron">
  <h1 class="display-4">This is about page</h1>
  <p class="lead">This is a simple about page of <b>confmag</b></p>
  <hr class="my-4">

</div>

<?php $this->load->view("partial/footer"); ?>