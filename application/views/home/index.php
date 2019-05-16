<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view("partial/header");
$this->load->view("partial/header_normal");
?>


  <!-- Masthead -->
  <header class="masthead text-white text-center">
    <div class="overlay"></div>
    <div class="container-fluid">
      <div class="row">
        <div class="col-xl-9 mx-auto">
          <h1 class="mb-5">CONFMAG</h1>
          <h5>A Conference Management System for Research Development</h5>
        </div>
        <div class="col-md-10 col-lg-8 col-xl-7 mx-auto">
          <p>A Research Development Project - Authors, Reviewer, Conferences Chair and the thousands of others from over 100 countries explore PROCONF to power their conferences, workshops, symposia, journals, books, grants, and competitions</p>
          <p>
            <a href="<?php echo base_url('home/contact');?>" class="btn btn-primary btn-sm my-2">   <i class="fa fa-creative-commons" aria-hidden="true"></i> Create your Conference</a>
          </form>
        </div>
      </div>
    </div>
  </header>

  <!-- Icons Grid -->
  <section class="features-icons bg-light text-center">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-4">
          <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
            <div class="features-icons-icon d-flex">
              <i class="icon-check m-auto text-primary"></i>
            </div>
            <h3>Submit papers</h3>
            <p class="lead mb-0">Submit your papers</p>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
            <div class="features-icons-icon d-flex">
              <i class="icon-layers m-auto text-primary"></i>
            </div>
            <h3>Email notifications</h3>
            <p class="lead mb-0">Get notified via email</p>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="features-icons-item mx-auto mb-0 mb-lg-3">
            <div class="features-icons-icon d-flex">
              <i class="icon-screen-desktop m-auto text-primary"></i>
            </div>
            <h3>Progress Tracking</h3>
            <p class="lead mb-0">Track your progress of paper</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Image Showcases -->
  <section class="showcase">
    <div class="container-fluid p-0">
      <div class="row no-gutters">
        <div class="col-lg-6 text-white showcase-img" style="background-image: url('images/bg-showcase-2.jpg');"></div>
        <div class="col-lg-6 my-auto showcase-text">
          <h2>Automatic paper identification number</h2>
          <p class="lead mb-0">ConfMaf will assign identification number to the papers automatically</p>
        </div>
      </div>
      <div class="row no-gutters">
        <div class="col-lg-6 order-lg-2 text-white showcase-img" style="background-image: url('images/bg-showcase-3.jpg');"></div>
        <div class="col-lg-6 order-lg-1 my-auto showcase-text">
          <h2>Easy to Use &amp; Customize</h2>
          <p class="lead mb-0">ConfMag is easy to use for the users. It has very intutive design which is easy to use</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Testimonials -->
  <section class="testimonials text-center bg-light">
    <div class="container-fluid">
      <h2 class="mb-5">What people are saying...</h2>
      <div class="row">
        <div class="col-lg-4">
          <div class="testimonial-item mx-auto mb-5 mb-lg-0">
            <img class="img-fluid rounded-circle mb-3" src="images/sir.jpg" alt="">
            <h5>Md. Saeed Siddik</h5>
            <p class="font-weight-light mb-0">"I'm very impressed by the paper assignment of your system"</p>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="testimonial-item mx-auto mb-5 mb-lg-0">
            <img class="img-fluid rounded-circle mb-3" src="images/mos.jpg" alt="">
            <h5>Mostafizur Rahman</h5>
            <p class="font-weight-light mb-0">"I just submitted a paper to ICALP and was very impressed by ConfMag"</p>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="testimonial-item mx-auto mb-5 mb-lg-0">
            <img class="img-fluid rounded-circle mb-3" src="images/news.jpg" alt="">
            <h5>Jayed News</h5>
            <p class="font-weight-light mb-0">"The system is great. Very intuitive, very powerful."</p>
          </div>
        </div>
      </div>
    </div>
  </section>



<?php $this->load->view("partial/footer"); ?>


<style type="text/css">
/*!
 * Start Bootstrap - Landing Page v5.0.4 (https://startbootstrap.com/template-overviews/landing-page)
 * Copyright 2013-2019 Start Bootstrap
 * Licensed under MIT (https://github.com/BlackrockDigital/startbootstrap-landing-page/blob/master/LICENSE)
 */

body {
  font-family: 'Lato', 'Helvetica Neue', Helvetica, Arial, sans-serif;
}

h1,
h2,
h3,
h4,
h5,
h6 {
  font-family: 'Lato', 'Helvetica Neue', Helvetica, Arial, sans-serif;
  font-weight: 700;
}

.nav-gap{
	margin: 0px;
}

header.masthead {
  position: relative;
  background-color: #343a40;
  background: url("images/home.png") no-repeat center center;
  background-size: cover;
}

header.masthead .overlay {
  position: absolute;
  background-color: #212529;
  height: 100%;
  width: 100%;
  top: 0;
  left: 0;
  opacity: 0.3;
}

header.masthead h1 {
  font-size: 2rem;
}

@media (min-width: 768px) {
  header.masthead {
    padding-top: 12rem;
    padding-bottom: 12rem;
  }
  header.masthead h1 {
    font-size: 3rem;
  }
}

.showcase .showcase-text {
  padding: 3rem;
}

.showcase .showcase-img {
  min-height: 30rem;
  background-size: cover;
}

@media (min-width: 768px) {
  .showcase .showcase-text {
    padding: 7rem;
  }
}

.features-icons {
  padding-top: 7rem;
  padding-bottom: 7rem;
}

.features-icons .features-icons-item {
  max-width: 20rem;
}

.features-icons .features-icons-item .features-icons-icon {
  height: 7rem;
}

.features-icons .features-icons-item .features-icons-icon i {
  font-size: 4.5rem;
}

.features-icons .features-icons-item:hover .features-icons-icon i {
  font-size: 5rem;
}

.testimonials {
  padding-top: 7rem;
  padding-bottom: 7rem;
}

.testimonials .testimonial-item {
  max-width: 18rem;
}

.testimonials .testimonial-item img {
  max-width: 12rem;
  -webkit-box-shadow: 0px 5px 5px 0px #adb5bd;
  box-shadow: 0px 5px 5px 0px #adb5bd;
}

.call-to-action {
  position: relative;
  background-color: #343a40;
  background: url("../img/bg-masthead.jpg") no-repeat center center;
  background-size: cover;
  padding-top: 7rem;
  padding-bottom: 7rem;
}

.call-to-action .overlay {
  position: absolute;
  background-color: #212529;
  height: 100%;
  width: 100%;
  top: 0;
  left: 0;
  opacity: 0.3;
}

footer.footer {
  padding-top: 4rem;
  padding-bottom: 4rem;
}

</style>