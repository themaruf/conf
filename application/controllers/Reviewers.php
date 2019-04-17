<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reviewers extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
    }

	public function index()
	{
		if($this->session->userdata('reviewer_id')) {
			$data['reviewer_info'] = $this->Reviewer->get_reviewer($this->session->userdata('reviewer_id'));
			$data['papers'] = $this->Reviewer->get_all_papers($this->session->userdata('reviewer_id'));
			$this->load->view('reviewers/dashboard',$data);
		}
		else{
			$data['message'] = "";
			$this->load->view('reviewers/login',$data);
		}
	}

	//touched
	public function papers(){
		$data['papers'] = $this->Reviewer->get_all_papers($this->session->userdata('reviewer_id'));
		$data['query']  = $this->Reviewer->get_last_query();
		$this->load->view('reviewers/papers',$data);
	}

	public function register($reg_id)
	{
		if($this->Reviewer->check_valid_reg_id($reg_id)){
			$this->load->view('reviewers/signup');
		}
		else{
			echo "invalid registration code";
		}	
	}

	//touched
	public function login()
	{
		//if already logged in
		if($this->session->userdata('reviewer_id')) {
			$data['reviewer_info'] = $this->Reviewer->get_reviewer($this->session->userdata('reviewer_id'));
			redirect('reviewers/index');
		}
		else{
			$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
			$this->form_validation->set_rules('email', 'email', 'trim|required|valid_email');
	        $this->form_validation->set_rules('password', 'password', 'trim|required');

	        //failed login
	        if ($this->form_validation->run() == FALSE)
	        {
	        	$data['message'] = "";
	            $this->load->view('reviewers/login',$data);
	        }
	        else
	        {
	            $email = $this->input->post('email');
	            $password = $this->input->post('password');

	            if(!$this->Reviewer->login($email, $password))
				{
					$data['message'] = "Invalid email or password";
					$this->load->view('reviewers/login', $data);
				}
				//successful login
				else
				{
					if($this->session->userdata('reviewer_id')) {
						$data['reviewer_info'] = $this->Reviewer->get_reviewer($this->session->userdata('reviewer_id'));
					}
					//$this->load->view('reviewers/dashboard', $data);
					redirect('reviewers/index');
				}
	        }
    	}
	}

	//touched
	public function logout(){
		$this->session->unset_userdata('reviewer_id');
		redirect('reviewers/login');
	}

}
