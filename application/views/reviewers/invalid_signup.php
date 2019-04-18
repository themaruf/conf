<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view("partial/header");
$this->load->view("partial/header_normal");
?>

<div class="page-wrap d-flex flex-row align-items-center">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 text-center">
                <div class="mb-4 lead">Your invitation code is invalid</div>
                <a href="<?php echo base_url();?>" class="btn btn-link">Back to Home</a>
            </div>
        </div>
    </div>
</div>


<?php $this->load->view("partial/footer");?>
