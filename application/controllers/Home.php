<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
		$this->load->view('home/index');
	}

	public function sendmails($from, $nameOfSender, $to, $subject, $message)
	{
		$from = 'maruf01676@gmail.com';
		$nameOfSender = 'Maruf';
		$to = 'hasan.m.maruf@gmail.com';
		$subject = 'Email Test';
		$message ='Testing the email class.';

		$this->email->from($from, $nameOfSender);
		$this->email->to($to);
		// $this->email->cc('another@another-example.com');
		// $this->email->bcc('them@their-example.com');

		$this->email->subject($subject);
		$this->email->message($message);

		$this->email->send();
	}

	public function sendmail(){
		//https://stackoverflow.com/questions/9564400/send-email-by-email-class-in-codeigniter-with-gmail
         $this->load->helper('url');
         $this->load->helper('form');

        $config= Array(
        'protocol' => 'smtp',
        'smtp_host' => 'mail.gmail.com',
        'smtp_port' => 587,
        'smtp_user' => 'maruf01676@gmail.com',
        'smtp_pass' => '',
        'mailtype'  => 'html',
        'charset'   => 'iso-8859-1'
        );

        $this->load->library('email', $config);
		$this->email->set_newline("\r\n");


		$from = 'maruf01676@gmail.com';
		$nameOfSender = 'Maruf';
		$to = 'hasan.m.maruf@gmail.com';
		$subject = 'Email Test';
		$message ='Testing the email class';

		$this->email->from($from, $nameOfSender);
		$this->email->to($to);
		// $this->email->cc('another@another-example.com');
		// $this->email->bcc('them@their-example.com');

		$this->email->subject($subject);
		$this->email->message($message);

		if($this->email->send())
        {
            echo "your email is sent";
            print_r($this->email->print_debugger());
        }
        else
        {
            show_error($this->email->print_debugger());
        }
	}
}
