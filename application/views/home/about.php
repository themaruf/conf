<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view("partial/header");
$this->load->view("partial/header_normal");
?>

  <header class="masthead text-white text-center">
    <div class="overlay"></div>
    <div class="container-fluid">
      <div class="row">
        <div class="col-xl-9 mx-auto">
          <h1 class="mb-5">CONFMAG</h1>
          <h5>A Conference Management System for Research Development</h5>
        </div>
        <div class="col-md-10 col-lg-8 col-xl-7 mx-auto">
          <p>"A Conference Management System for Research Development" is a web based software
			that will help to manage a conference. This project will help the organizers, authors and
			reviewers to in their respective activities. This user friendly software will help to manage all the
			research in a whole conference. The conference chair (admin) will register for a conference.
			Authors are invited to publish in that conference. Authors will register and upload their papers as
			per the policy of that conference. System will assign an idintification number for the paper and
			the paper will be tracked with that identification number. Reviewers will also register for the
			conference. Then the conference chair will assign reviewer for each paper. Reviewers will login
			and go through the papers and give them a score based on the rules. They also can make
			comments on the paper. Authors can check the progress of his/her paper. They also can withdraw
			the submission. Authors will be notified via e-mail if there is any revision to make. The authors

			will re-upload the paper. The reviewer will be notified via e-mail if there is any paper to be re-
			reviewed. The author will re-review and will give a clearance to the conference chair.

			Conference chair will notify the author with the result. All the data can be exported as CSV,
			Excel, PDF, etc. All the users can have login recovery in case they forget the password.</p>
        </div>
      </div>
    </div>
  </header>

<?php $this->load->view("partial/footer"); ?>


<style type="text/css">
header.masthead {
  position: relative;
  background-color: #343a40;
  background: url("images/home.png") no-repeat center center;
  background-size: cover;
  padding-bottom: 300px;
}

.nav-gap{
	margin: 0px;
}
</style>