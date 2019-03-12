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
		if($this->session->userdata('author_id')) {
			$this->load->view('authors/dashboard');
		}
		else{
			$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
			$this->form_validation->set_rules('email', 'email', 'trim|required|valid_email');
	        $this->form_validation->set_rules('password', 'password', 'trim|required');

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
				else
				{
					if($this->session->userdata('author_id')) {
						$data['author_info'] = $this->Author->get_author($this->session->userdata('author_id'));
					}
					$this->load->view('authors/dashboard', $data);
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
		$this->load->view('authors/login');
	}
}
