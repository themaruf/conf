<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reviewers extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
    }

    //check session
    private function _is_logged_in() {
        if($this->session->userdata('reviewer_id')){
            return true;        
        } else {
            return false;
        }
    }

    //touched
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
		if($this->_is_logged_in()){
			$data['papers'] = $this->Reviewer->get_all_papers($this->session->userdata('reviewer_id'));
			$data['query']  = $this->Reviewer->get_last_query();
			$this->load->view('reviewers/papers',$data);
		}
		else{
			redirect('reviewers/index');
		}
	}

	public function view($paper_id = NULL){
		if($this->_is_logged_in()){
			if($this->PartialModel->is_valid_paper($paper_id)){
				$data['paper_data'] = $this->Reviewer->get_paper_by_id($paper_id);
				$data['paper_files_data'] = $this->Reviewer->get_files_by_id($paper_id);
				//getting this reviewer's review history
				$data['review_data'] = $this->Reviewer->get_review_history($paper_id, $this->session->userdata('reviewer_id'));

				foreach ($data['review_data'] as $rev) {
					//appending score text for showing comment timeline
					$rev->review_score_text = $this->PartialModel->return_score_text($rev->review_score);
				}

				$this->load->view('reviewers/paperform',$data);
			}
			else{
				redirect('reviewers/papers');
			}
		}
		else{
			redirect('reviewers/index');
		}
	}

	public function evaluatepaper(){
		if($this->_is_logged_in()){
			$review_score = $this->input->post('review_score');
			$review_comments = $this->input->post('review_comments');
			$paper_id = $this->input->post('paper_id');
			$reviewer_id = $this->session->userdata('reviewer_id');

			date_default_timezone_set('Asia/Dhaka');
		    $timestamp = date('Y-m-d G:i:s');

			if($this->Reviewer->evaluate_paper($paper_id, $review_score, $review_comments, $reviewer_id, $timestamp)){
				redirect('reviewers/papers');
			}
			else{
				redirect('reviewers/evaluatepaper');
			}
		}
		else{
			redirect('reviewers/index');
		}
	}

	//signup
	public function register($reg_id)
	{
		if($this->Reviewer->check_valid_reg_id($reg_id)){
			$data['invitation_id'] = $reg_id;
			$this->load->view('reviewers/signup',$data);
		}
		else{
			$this->load->view('reviewers/invalid_signup');
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
            $this->load->view('reviewers/signup');
        }
        else
        {
        	if($this->Reviewer->exists($this->input->post('email')))
        	{
        		$data['message'] = "email is already in use";
        		$this->load->view('reviewers/signup', $data);
        	}
        	else{
        		$first_name = $this->input->post('first_name');
        		$last_name = $this->input->post('last_name');
        		$phone = $this->input->post('phone_number');
        		$dob = $this->input->post('dob');
        		$email = $this->input->post('email');
                $password = $this->input->post('password');
                $invitation_id = $this->input->post('invitation_id');
                //check if inserted into db
                if($this->Reviewer->signup_new_user($invitation_id, $first_name, $last_name, $phone, $dob, $email, $password)){
                	$data['message'] = "Your account is created";
        			$this->load->view('reviewers/login', $data);
                }
        		//$this->Author->signup_new_user($first_name, $last_name, $phone, $dob, $email, $password);
        	}
            
        }
	}

	public function editinfo(){
		if($this->_is_logged_in()){
			$data['reviewer_info'] = $this->Reviewer->get_reviewer($this->session->userdata('reviewer_id'));
			$this->load->view('reviewers/editinfo',$data);
		}
		else{
			redirect('reviewers/index');
		}

	}

	public function saveinfo(){
		if($this->_is_logged_in()){
			$reviewer_data = array(
				'address_line_1' => $this->input->post('address_line_1'),
				'address_line_2' => $this->input->post('address_line_2'),
				'city' => $this->input->post('city'),
				'country' => $this->input->post('country'),
				'description' => $this->input->post('description'),
				'affiliation' => $this->input->post('affiliation'),
				'website' => $this->input->post('website'),
				'keywords' => $this->input->post('keywords'),
				'cv_url' => $this->input->post('cv_url'),
			);

			if($this->Reviewer->saveinfo($this->session->userdata('reviewer_id'), $reviewer_data)){
				redirect('reviewers/index');
			}
			else{
				redirect('reviewers/editinfo');
			}
		}
		else{
			redirect('reviewers/index');
		}
	}

	//touched
	public function logout(){
		$this->session->unset_userdata('reviewer_id');
		redirect('reviewers/login');
	}

	// public function paper_delete($paper_id){
	//     $query = $this->Reviewer->delete_by_id($paper_id);
	//     if($query)
	//       {
	//         echo json_encode(array("result" => TRUE));
	//       }
	//       else
	//       {
	//         echo json_encode(array("result" => FALSE));
	//       }
	// }

	public function showPaper($paper_name){
		if($this->_is_logged_in()){
			$data['paper_name'] = $paper_name;
			$this->load->view('reviewers/showpaper',$data);
		}
		else{
			redirect('reviewers/index');
		}
	}

}
