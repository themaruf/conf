<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
class PHPMailer_Lib
{
    public function __construct(){
        log_message('Debug', 'PHPMailer class is loaded.');
    }

    public function load(){
        // Include PHPMailer library files
        require_once APPPATH.'third_party/PHPMailer/Exception.php';
        require_once APPPATH.'third_party/PHPMailer/PHPMailer.php';
        require_once APPPATH.'third_party/PHPMailer/SMTP.php';
        
        $mail = new PHPMailer;
        $mail->SMTPDebug = 2;
        $mail->Host     = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'confmagassist@gmail.com';
        $mail->Password = '01827727057';
        $mail->SMTPSecure = 'ssl';
        $mail->Port     = 465;
        
        $mail->setFrom('confmagassist@gmail.com', 'ConfMag');
        $mail->addReplyTo('confmagassist@gmail.com', 'ConfMag');
        // Set email format to HTML
        $mail->isHTML(true);
        // SMTP configuration
        //$mail->isSMTP();
        return $mail;
    }
}