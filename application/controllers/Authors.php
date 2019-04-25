<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Authors extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
    }

    //dashboard
	public function index()
	{
		if($this->session->userdata('author_id')) {
			$data['author_info'] = $this->Author->get_author($this->session->userdata('author_id'));
			$data['papers'] = $this->Author->get_all_papers($this->session->userdata('author_id'));
			$data['query']  = $this->Author->get_last_query();
			$this->load->view('authors/dashboard',$data);
		}
		else{
			$data['message'] = "";
			$this->load->view('authors/login',$data);
		}
	}

	public function papers(){
		$data['papers'] = $this->Author->get_all_papers($this->session->userdata('author_id'));
		$this->load->view('authors/papers',$data);
	}

	public function view($paper_id = -1){
		if($paper_id > 0){
			$data['paper_data'] = $this->Author->get_paper_by_id($paper_id);
			$this->load->view('authors/paperform',$data);
		}
		else{
			$data['paper_data'] = (object)[
									  "paper_name" => "",
									  "paper_keywords" => "",
									  "abstract" => "",
									  "file_url" => ""
									];

			$this->load->view('authors/paperform',$data);
		}
	}

	public function signup()
	{
		$this->load->view('authors/signup');
	}

	public function login()
	{
		//if already logged in
		if($this->session->userdata('author_id')) {
			$data['author_info'] = $this->Author->get_author($this->session->userdata('author_id'));
			//$this->load->view('authors/dashboard',$data);
			redirect('authors/index');
		}
		else{
			$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
			$this->form_validation->set_rules('email', 'email', 'trim|required|valid_email');
	        $this->form_validation->set_rules('password', 'password', 'trim|required');

	        //failed login
	        if ($this->form_validation->run() == FALSE)
	        {
	        	$data['message'] = "";
	            $this->load->view('authors/login',$data);
	        }
	        else
	        {
	            $email = $this->input->post('email');
	            $password = $this->input->post('password');

	            if(!$this->Author->login_author($email, $password))
				{
					$data['message'] = "Invalid email or password";
					$this->load->view('authors/login', $data);
				}
				//successful login
				else
				{
					if($this->session->userdata('author_id')) {
						$data['author_info'] = $this->Author->get_author($this->session->userdata('author_id'));
					}
					//$this->load->view('authors/dashboard', $data);
					redirect('authors/index');
				}
	        }
    	}
	}

	public function validate()
	{
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		$this->form_validation->set_rules('first_name', 'First Name', 'required');
  	    $this->form_validation->set_rules('last_name', 'Last Name', 'required');
  	    $this->form_validation->set_rules('phone_number', 'Phone Number', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[2]|alpha_numeric');
        $this->form_validation->set_rules('passconf', 'Confirm Password', 'required|matches[password]|min_length[2]|alpha_numeric');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');

        if ($this->form_validation->run() == FALSE)
        {
            $this->load->view('authors/signup');
        }
        else
        {
        	if($this->Author->exists($this->input->post('email')))
        	{
        		$data['message'] = "email is already in use";
        		$this->load->view('authors/signup', $data);
        	}
        	else{
        		$first_name = $this->input->post('first_name');
        		$last_name = $this->input->post('last_name');
        		$phone = $this->input->post('phone_number');
        		$dob = $this->input->post('dob');
        		$email = $this->input->post('email');
                $password = $this->input->post('password');
                //check if inserted into db
                if($this->Author->signup_new_user($first_name, $last_name, $phone, $dob, $email, $password)){
                	$data['message'] = "Your account is created";
        			$this->load->view('authors/login', $data);
                }
        		//$this->Author->signup_new_user($first_name, $last_name, $phone, $dob, $email, $password);
        	}
            
        }
	}

	public function editinfo(){
		$data['author_info'] = $this->Author->get_author($this->session->userdata('author_id'));
		$this->load->view('authors/editinfo',$data);
	}

	public function saveinfo(){
		$author_data = array(
			'address_line_1' => $this->input->post('address_line_1'),
			'address_line_2' => $this->input->post('address_line_2'),
			'city' => $this->input->post('city'),
			'country' => $this->input->post('country'),
			'description' => $this->input->post('description'),
			'affiliation' => $this->input->post('affiliation'),
			'website' => $this->input->post('website'),
		);

		if($this->Author->saveinfo($this->session->userdata('author_id'), $author_data)){
			redirect('authors/index');
		}
		else{
			redirect('authors/editinfo');
		}
	}

	public function showpaper($paper_id){
		$data['paper_id'] = $paper_id;
		$this->load->view('authors/showpaper',$data);
	}

	public function show($paper_id){
		if($this->Author->paper_exists($paper_id)){
			$data['paper_data'] = $this->Author->get_paper_by_id($paper_id);
			$data['co_author_data'] = $this->Author->get_co_author_by_id($paper_id);
			//getting this reviewer's review history
			$data['review_data'] = $this->Author->get_review_history($paper_id);

			foreach ($data['review_data'] as $rev) {
				//appending score text for showing comment timeline
				$rev->review_score_text = $this->PartialModel->return_score_text($rev->review_score);
			}
			$this->load->view('authors/show',$data);
		}
		else{
			echo "nothing found";
		}
	}


	public function logout(){
		$this->session->unset_userdata('author_id');
		redirect('authors/login');
	}

	public function ajax_edit($paper_id){
		$data = $this->Author->get_paper_by_id($paper_id);
    	echo json_encode($data);
	}

	public function paper_delete($paper_id){
	    $query = $this->Author->delete_by_id($paper_id);
	    if($query)
	      {
	        echo json_encode(array("result" => TRUE));
	      }
	      else
	      {
	        echo json_encode(array("result" => FALSE));
	      }
	}

	public function paper_add(){

		$co_author_name_array = $this->input->post('name');
		$co_author_email_array = $this->input->post('email');
		print_r($co_author_name_array);
		print_r($co_author_email_array);

	  date_default_timezone_set('Asia/Dhaka');
      $date = date('Y-m-d');
      $timestamp = date('Y-m-d G:i:s');
      $unique_id = $this->session->userdata('author_id').time().$this->session->userdata('author_id');


		$config = array(
		'upload_path' => "./uploads/",
		'allowed_types' => "pdf",
		'overwrite' => FALSE,
		'max_size' => "8048000", // Can be set to particular file size , here it is 8 MB
		'file_name' => $unique_id
		);

		//echo var_dump($config['upload_path']);
		$this->load->library('upload', $config);
		$this->upload->initialize($config);

		if($this->upload->do_upload('paper_file'))
		{
			$data = array('upload_data' => $this->upload->data());
			//print_r($data);
		}

      $paper_data = array(
      	  'paper_id' => $unique_id,
      	  'paper_name' => $this->input->post('paper_title') == NULL ? '' : $this->input->post('paper_title'),
          'paper_keywords' => $this->input->post('keywords') == NULL ? '' : $this->input->post('keywords'),
          'file_url' => $data['upload_data']['file_name'],
          'added_time' => $timestamp,
          'abstract' => $this->input->post('abstract') == NULL ? '' : $this->input->post('abstract'),
          'status' => 1,
          'deleted' => 0,
        );
      $paper_author_data = array(
    	'author_id' => $this->session->userdata('author_id'),
    	'paper_id' => $unique_id,
      );


      $insert = $this->Author->add_paper($paper_data,$paper_author_data,$co_author_name_array,$co_author_email_array);
      //successfull insert
      if($insert)
      {
        echo json_encode(array("result" => TRUE));
        //send mail to co authors
        // Load PHPMailer library
        $this->load->library('phpmailer_lib');
        // PHPMailer object
        $mail = $this->phpmailer_lib->load();
        // Add a recipient
        $mail->addAddress($email);
        // Email subject
        $mail->Subject = 'A Paper is submitted on ConfMag';  
        // Email body content
        $mailContent = "<h1>Your Paper is Submitted on ConfMag</h1>";
        $mail->Body = $mailContent;
        // Send email
        if(!$mail->send()){
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        }else{
            echo 'Message has been sent';
        }
        redirect('authors/papers');
      }
      else
      {
        echo json_encode(array("result" => FALSE));
        redirect('authors/view');
      }
	}

	public function get_filename($path, $filename){
	    if ($pos = strrpos($filename, '.')) {
	           $name = substr($filename, 0, $pos);
	           $ext = substr($filename, $pos);
	    } else {
	           $name = $filename;
	    }

	    $newpath = $path.'/'.$filename;
	    $newname = $filename;
	    $counter = 0;
	    while (file_exists($newpath)) {
	           $newname = $name .'_'. $counter . $ext;
	           $newpath = $path.'/'.$newname;
	           $counter++;
	     }

	    return $newname;
	}

	public function paper_update(){

      $paper_id_update = $this->input->post('paper_id') == NULL ? '' : $this->input->post('paper_id');

		$config = array(
		'upload_path' => "./uploads/",
		'allowed_types' => "pdf",
		'overwrite' => FALSE,
		'max_size' => "80480000", // Can be set to particular file size , here it is 80 MB
		'file_name' => $paper_id_update
		);

		//print_r( $this->get_filename("./uploads/", $paper_id_update.'pdf') );
		//echo var_dump($config['upload_path']);
		$this->load->library('upload', $config);
		$this->upload->initialize($config);

		if($this->upload->do_upload('paper_file'))
		{
			$data = array('upload_data' => $this->upload->data());
			//print_r($data);
		}
		else{
			$data = array();
		}

		if (empty($data)) {
			$paper_data = array(
		      	  'paper_id' => $paper_id_update,
		          'paper_keywords' => $this->input->post('keywords') == NULL ? '' : $this->input->post('keywords'),
		          'abstract' => $this->input->post('abstract') == NULL ? '' : $this->input->post('abstract'),
		        );
		}
		else{
			$paper_data = array(
		      	  'paper_id' => $paper_id_update,
		          'paper_keywords' => $this->input->post('keywords') == NULL ? '' : $this->input->post('keywords'),
		          'file_url' => $data['upload_data']['file_name'],
		          'abstract' => $this->input->post('abstract') == NULL ? '' : $this->input->post('abstract'),
		        );
		}

      $insert = $this->Author->update_paper($paper_id_update,$paper_data);
      //successfull insert
      if($insert)
      {
        echo json_encode(array("result" => TRUE));
        redirect('authors/papers');
      }
      else
      {
        echo json_encode(array("result" => FALSE));
        redirect('authors/view');
      }
	}

	public function ajax_search_author($author_id){
		$author = $this->Author->get_author($author_id);
		print_r($author);
	}

	public function suggest_author(){
		$suggestions = $this->Author->get_search_suggestions_author($this->input->post_get('term'));

		echo json_encode($suggestions);
	}

	//test function
	public function addpaper(){
		$this->load->view('authors/addpaper');
	}

}
