<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Authors extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
    }

	public function index()
	{
		if($this->session->userdata('author_id')) {
			$data['author_info'] = $this->Author->get_author($this->session->userdata('author_id'));
			$data['papers'] = $this->Author->get_all_papers($this->session->userdata('author_id'));
			$data['query']  = $this->Author->get_last_query();
			$this->load->view('authors/dashboard',$data);
		}
		else{
			$this->load->view('authors/login');
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
	            $this->load->view('authors/login');
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
	  date_default_timezone_set('Asia/Dhaka');
      $date = date('Y-m-d');
      $timestamp = date('Y-m-d G:i:s');
      $unique_id = $this->session->userdata('author_id').time().$this->session->userdata('author_id');


		$config = array(
		'upload_path' => "./uploads/",
		'allowed_types' => "pdf",
		'overwrite' => FALSE,
		'max_size' => "8048000" // Can be set to particular file size , here it is 8 MB
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

      $insert = $this->Author->add_paper($paper_data,$paper_author_data);
      //successfull insert
      if($insert)
      {
        echo json_encode(array("result" => TRUE));
      }
      else
      {
        echo json_encode(array("result" => FALSE));
      }
	}

	public function paper_update(){
		//todo
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

	public function showPaper($file_name){
		$data['file_name'] = $file_name;
		$this->load->view('authors/showpaper',$data);
	}
}
