<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\Exception;

class SendEmail extends CI_Controller  {

	public function __construct() { 
        parent:: __construct();       
        $models = array(
          'AlltowerModel' => 'AlltowerModel',
          'SendEmailModel' => 'SendEmailModel'
        ); 
        $this->load->model($models);
        require APPPATH.'libraries/phpmailer/src/Exception.php';
        require APPPATH.'libraries/phpmailer/src/PHPMailer.php';
        require APPPATH.'libraries/phpmailer/src/SMTP.php';
        $this->load->helper('date');
  }
    function index() 
    {  
        
                        // PHPMailer object
                    // $response = false;

                    //date now
                    $datestring = '%Y-%m-%d';
                    $time = time();
                    $data['dateNow'] = mdate($datestring, $time);

                    $dateho=date_create("2021-08-07");
                    $datenow=date_create(mdate($datestring, $time));
                    $diff= date_diff($dateho,$datenow);
                    $diffdate = $diff->format("%a");
                    if ($diffdate == 7) {
                      $this->SendEmail();

                    } else {
                       echo "gagal gaes";
                    }
                   
                  
    }


    function SendEmail(){
      $mail = new PHPMailer();
                    
            
      // SMTP configuration gmail
      $mail->isSMTP();
      $mail->Host     = 'smtp.gmail.com'; //sesuaikan sesuai nama domain hosting/server yang digunakan
      $mail->SMTPAuth = true;
      $mail->Username = 'andriananoke19@gmail.com'; // user email
      $mail->Password = 'k0k0metal'; // password email
      $mail->SMTPSecure = 'tls';
      $mail->Port     = 587;

      // $mail = new PHPMailer();
      // $mail->isSMTP();
      // $mail->Host = 'smtp.mailtrap.io';
      // $mail->SMTPAuth = true;
      // $mail->Port = 2525;
      // $mail->Username = '9e55ff023f75ba';
      // $mail->Password = '60ad48919577dd';
                  
      $mail->setFrom('andriananoke19@gmail.com', ''); // user email
      $mail->addReplyTo('andriananoke19@gmail.com', ''); //user email

      // Add a recipient
      
      $dataEmail = $this->SendEmailModel->getSendEmailModelData();
      foreach ( $dataEmail as  $rows){
      $mail->addAddress($rows['email']); //email tujuan pengiriman email
      }
      // Email subject
      $mail->Subject = 'Unit serah terima dan open defect'; //subject email

      // Set email format to HTML
      $mail->isHTML(true);

      // Email body content
      $mailContent = "<!DOCTYPE html>
      <html>
        <head>
          <title>Title of the document</title>
          <style>
            body {
              font-family: Arial, sans-serif;
              line-height: 2;
            }
            h2 {
              text-align: center;
            }
            ul {
              padding: 0;
            }
            ul li {
              list-style-type: none;
              display: inline-block;
              margin-right: 10px;
            }
            a {
              display: block;
              color: #778899;
            }
          </style>
        </head>
        <body>
          <header>
            <nav>
              <ul>
                <li>
                </li>
                <li>
                 
                </li>
              </ul>
            </nav>
            <h1>Welcome to our page</h1>
            <hr>
          </header>
          <main>
            <h2>Get answers to your coding questions</h2>
            <p>
              Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs. The passage is attributed to an unknown typesetter in the 15th century who is thought to have scrambled parts of Cicero's De Finibus Bonorum et Malorum for use in a type specimen book.
            </p>
            <p>
              Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs. The passage is attributed to an unknown typesetter in the 15th century who is thought to have scrambled parts of Cicero's De Finibus Bonorum et Malorum for use in a type specimen book. Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs. The passage is attributed to an unknown typesetter in the 15th century who is thought to have scrambled parts of Cicero's De Finibus Bonorum et Malorum for use in a type specimen book.
            </p>
          </main>
        </body>
      </html>"; // isi email
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