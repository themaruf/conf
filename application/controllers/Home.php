<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
		$this->load->view('home/index');
	}

	public function about()
	{
		$this->load->view('home/about');
	}

	public function contact()
	{
		$this->load->view('home/contact');
	}

	public function forgot_password(){
		$data['message'] = '';
        $this->load->view('home/forgotpassword',$data);
	}

	public function forgot_password_send_mail(){
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		$this->form_validation->set_rules('email', 'email', 'trim|required|valid_email|callback_check_my_recovery_email');

        //failed login
        if ($this->form_validation->run() == FALSE)
        {
        	$data['message'] = '';
            $this->load->view('home/forgotpassword',$data);
        }
        else{
        	//generate an recovery_identity
        	$this->load->helper('string');
			$unique_id = random_string('alnum', 16);
			$unique_id = $unique_id. uniqid();

			//send it to db where mail is $this->input->post('email')
			$mail_address =  $this->input->post('email');
			if($this->PartialModel->recovery_identity_exist($mail_address)){
				//recovery id is already exist 
	        	$data['message'] = 'Recovery code is already sent to your email';
	            $this->load->view('home/forgotpassword',$data);
			}
			else{
				if($this->PartialModel->insert_recovery_identity($mail_address, $unique_id)){
					//send recovery mail. link is: www.example.com/recover_password/unique_id
					//todo

					//send confirmation
		        	$data['message'] = 'Mail is sent to your email';
		            $this->load->view('home/forgotpassword',$data);
				}
				else{
		        	$data['message'] = 'Oops! Something went wrong';
		            $this->load->view('home/forgotpassword',$data);
				}
			}
        }
	}

	public function recover_password($recovery_identity = NULL){
		if($recovery_identity == NULL){
			redirect('home/index');
		}
		else{
			if($this->PartialModel->is_valid_recovery_identity($recovery_identity)){
				//echo "valid recovery code";
				$data['message'] = '';
				$data['recovery_identity'] = $recovery_identity;
				$this->load->view('home/changepassword',$data);
			}
			else{
				//invalid recovery code
				redirect('home/index');
			}
		}
	}

	public function change_password(){
		$recovery_identity = $this->input->post('recovery_identity');
		$password = $this->input->post('password');
		//echo $recovery_identity;

		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[2]|alpha_numeric');
        $this->form_validation->set_rules('passconf', 'Confirm Password', 'required|matches[password]|min_length[2]|alpha_numeric');

        if ($this->form_validation->run() == FALSE)
        {
        	$data['message'] = '';
           	$data['recovery_identity'] = $recovery_identity;
			$this->load->view('home/changepassword',$data);
        }else{
        	//change password
        	$password_data = array(
            	'password' => $password
        	);
        	if($this->PartialModel->change_password($recovery_identity, $password_data)){
        		$data['message'] = 'Password is changed successfully';
				$this->load->view('authors/login',$data);
        	}
        }
	}

	//callback function for email check
    public function check_my_recovery_email($email){
    	if (!$this->Author->exists($email)){
           $this->form_validation->set_message('check_my_recovery_email', 'No account found! Please check your email');
            return false;
    	}else{
    		return true;
    	}
    }

	public function sendmail(){
			$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
			$this->form_validation->set_rules('name', 'Name', 'required');
	  	    $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
	  	    $this->form_validation->set_rules('subject', 'Subject', 'required');
	  	    $this->form_validation->set_rules('message', 'Message', 'required');

	        if ($this->form_validation->run() == FALSE)
	        {
	            $this->load->view('home/contact');
	        }else
	        {
	        	$confmagContactEmail = "maruf01676@gmail.com";

	        	$name = $this->input->post('name');
	        	$email = $this->input->post('email');
	        	$subject = $this->input->post('subject');
	        	$message = $this->input->post('message');
				// Load PHPMailer library
				$this->load->library('phpmailer_lib');
				// PHPMailer object
				$mail = $this->phpmailer_lib->load();
				// Add a recipient
				$mail->addAddress($confmagContactEmail);
				// Email subject
				$mail->Subject = $subject;  
				// Email body content
				$mailContent = "<h1>A query from $name</h1>Contact Email: $email <br/>".$message;
				$mail->Body = $mailContent;

				// Send email
				if(!$mail->send()){
				    echo 'Message could not be sent.';
				    echo 'Mailer Error: ' . $mail->ErrorInfo;
				}else{
				    echo 'Message has been sent';
				    redirect('home/index');
				}
	        }

	}


}
