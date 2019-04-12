<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view("partial/header");
$this->load->view("partial/header_admin");
?> 

<embed src="uploads/<?php echo($paper_id).".pdf"?>" width="100%" height="600px" />