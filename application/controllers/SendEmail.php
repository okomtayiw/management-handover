<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class SendEmail  {

	public function __construct() { 
                
                
                require APPPATH.'libraries/phpmailer/src/Exception.php';
                require APPPATH.'libraries/phpmailer/src/PHPMailer.php';
                require APPPATH.'libraries/phpmailer/src/SMTP.php';
                
                 
                    }
    function index($nameunit,$email) 
    {  
        
                        // PHPMailer object
                    $response = false;
                    $mail = new PHPMailer();
                   
            
                    // SMTP configuration
                    $mail->isSMTP();
                    $mail->Host     = 'smtp.gmail.com'; //sesuaikan sesuai nama domain hosting/server yang digunakan
                    $mail->SMTPAuth = true;
                    $mail->Username = 'wiyatmoko@gmail.com'; // user email
                    $mail->Password = 'umeecsxttpimlebn'; // password email
                    $mail->SMTPSecure = 'tls';
                    $mail->Port     = 587;
            
                    $mail->setFrom('admin@checkdeliver.com', ''); // user email
                    $mail->addReplyTo('wiyatmoko@gmail.com', ''); //user email
            
                    // Add a recipient
                    $mail->addAddress($email); //email tujuan pengiriman email
            
                    // Email subject
                    $mail->Subject = 'Unit serah terima dan open defect'; //subject email
            
                    // Set email format to HTML
                    $mail->isHTML(true);
            
                    // Email body content
                    $mailContent = "<h1>UNIT SERAH TERIMA TOKYO RESIDENCES</h1>
                        <p>Unit $nameunit sudah serah terima </p>
                        <a href='https://checkdeliver.com/report-pdf/09-02-202111:33:084/4'>Klik disini untuk melihat defect</a>"; // isi email
                    $mail->Body = $mailContent;
            
                    // Send email
                    if(!$mail->send()){
                        // echo 'Message could not be sent.';
                        // echo 'Mailer Error: ' . $mail->ErrorInfo;
                    }else{
                        // echo 'Message has been sent';
                    }
    }

}