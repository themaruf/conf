<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
		//https://stackoverflow.com/questions/9564400/send-email-by-email-class-in-codeigniter-with-gmail
         $this->load->library('email');
         $this->load->helper('url');
         $this->load->helper('form');

        $config= Array(
        'protocol' => 'smtp',
        'smtp_host' => 'ssl://smtp.googlemail.com',
        'smtp_port' => 465,
        'smtp_user' => 'maruf01676@gmail.com',
        'smtp_pass' => '01827727057',
        'mailtype'  => 'html',
        'charset'   => 'iso-8859-1'
            );

        $this->load->library('email', $config);


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

		if($this->email->send())
        {
            echo "your email send";
        }
        else
        {
            show_error($this->email->print_debugger());
        }
	}

	public function sendmail($from, $nameOfSender, $to, $subject, $message)
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
}
