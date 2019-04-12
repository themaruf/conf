<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admins extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
    }

    //touched
	public function index()
	{
		if($this->session->userdata('admin_id')) {
			$data['admin_info'] = $this->Admin->get_admin($this->session->userdata('admin_id'));
			$data['papers'] = $this->Admin->get_all_papers();
			$this->load->view('admins/dashboard',$data);
		}
		else{
			$data['message'] = "";
			$this->load->view('admins/login',$data);
		}
	}

	//touched
	public function papers(){
		$data['papers'] = $this->Admin->get_all_papers();
		$data['query']  = $this->Admin->get_last_query();
		$this->load->view('admins/papers',$data);
	}

	//touched
	public function signup()
	{
		$this->load->view('admins/signup');
	}

	//touched
	public function login()
	{
		//if already logged in
		if($this->session->userdata('admin_id')) {
			$data['admin_info'] = $this->Admin->get_admin($this->session->userdata('admin_id'));
			redirect('admins/index');
		}
		else{
			$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
			$this->form_validation->set_rules('email', 'email', 'trim|required|valid_email');
	        $this->form_validation->set_rules('password', 'password', 'trim|required');

	        //failed login
	        if ($this->form_validation->run() == FALSE)
	        {
	        	$data['message'] = "";
	            $this->load->view('admins/login',$data);
	        }
	        else
	        {
	            $email = $this->input->post('email');
	            $password = $this->input->post('password');

	            if(!$this->Admin->login_admin($email, $password))
				{
					$data['message'] = "Invalid email or password";
					$this->load->view('admins/login', $data);
				}
				//successful login
				else
				{
					if($this->session->userdata('admin_id')) {
						$data['admin_info'] = $this->Admin->login_admin($this->session->userdata('admin_id'));
					}
					//$this->load->view('admins/dashboard', $data);
					redirect('admins/index');
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
            $this->load->view('admins/signup');
        }
        else
        {
        	if($this->Admin->exists($this->input->post('email')))
        	{
        		$data['message'] = "email is already in use";
        		$this->load->view('admins/signup', $data);
        	}
        	else{
        		$first_name = $this->input->post('first_name');
        		$last_name = $this->input->post('last_name');
        		$phone = $this->input->post('phone_number');
        		$dob = $this->input->post('dob');
        		$email = $this->input->post('email');
                $password = $this->input->post('password');
                //check if inserted into db
                if($this->Admin->signup_new_user($first_name, $last_name, $phone, $dob, $email, $password)){
                	$data['message'] = "Your account is created";
        			$this->load->view('admins/login', $data);
                }
        	}
            
        }
	}

	//touched
	public function logout(){
		$this->session->unset_userdata('admin_id');
		redirect('admins/login');
	}

	public function ajax_edit($paper_id){
		$data = $this->Admin->get_paper_by_id($paper_id);
    	echo json_encode($data);
	}

	public function paper_delete($paper_id){
	    $query = $this->Admin->delete_by_id($paper_id);
	    if($query)
	      {
	        echo json_encode(array("result" => TRUE));
	      }
	      else
	      {
	        echo json_encode(array("result" => FALSE));
	      }
	}

	public function showPaper($file_name){
		$data['file_name'] = $file_name;
		$this->load->view('admins/showpaper',$data);
	}

	public function show($paper_id){
		$data['paper_id'] = $paper_id;
		$this->load->view('admins/show',$data);
	}
}
