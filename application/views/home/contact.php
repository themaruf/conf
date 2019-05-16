<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view("partial/header");
$this->load->view("partial/header_normal");
?>


<section>
  <div>
    <div class="row">
      <div class="col-sm-12">
        <div class="row">
          <div class="col-sm-8 col-sm-offset-2">
            <div>
              <h2 style="color: #fff">CONTACT US FOR CONFERENCE</h2>
            </div>
            <?php echo validation_errors();?>
            <form method="post" action="<?php echo base_url('home/sendmail');?>" id="form" data-form-title="CONTACT US">
              <!-- <input type="hidden" data-form-email="true"> -->
              <div class="form-group">
                <input type="text" class="form-control" name="name" required="" placeholder="Name*" data-form-field="Name">
              </div>
              <div class="form-group">
                <input type="email" class="form-control" name="email" required="" placeholder="Email*" data-form-field="Email">
              </div>
              <div class="form-group">
                <input type="text" class="form-control" name="subject" placeholder="Subject" data-form-field="Subject">
              </div>
              <div class="form-group">
                <textarea class="form-control" name="message" required=""  placeholder="Message*" rows="7" data-form-field="Message"></textarea>
              </div>
              <div>
                <button type="submit" class="btn btn-lg btn-danger">CONTACT US</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<?php $this->load->view("partial/footer"); ?>


<script type="text/javascript">
$(document).ready(function() {
$("#commentForm").validate();
});
</script>

<style type="text/css">

body{
  background-image: url("images/home.png");
}

section {
  max-width: 1170px;
  margin: auto auto;
  padding: 0;
}
</style>