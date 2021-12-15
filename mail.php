<?php
require "PHPMailer/PHPMailerAutoload.php";

function smtpmailer($to, $from, $from_name, $subject, $body)
    {
        $mail = new PHPMailer();
        $mail->IsSMTP();
        $mail->SMTPAuth = true; 
 
        $mail->SMTPSecure = 'ssl'; 
        $mail->Host = 'mail.dev-ashanur.com';
        $mail->Port = 465;  
        $mail->Username = 'dev-php@dev-ashanur.com';
        $mail->Password = 'KgbXx=YUM*4-';   
   
   //   $path = 'reseller.pdf';
   //   $mail->AddAttachment($path);
   
        $mail->IsHTML(true);
        $mail->From="dev-php@dev-ashanur.com";
        $mail->FromName=$from_name;
        $mail->Sender=$from;
        $mail->AddReplyTo($from, $from_name);
        $mail->Subject = $subject;
        $mail->Body = "
            <html>
                <head>
                    <title></title>
                </head>
                <body>
                    <h2>Sender Name : " .$from_name."</h2>
                    <h2>Sender Email : " .$from."</h2>
                    <h2>Subject : " .$subject."</h2>
                    <h4>Message : " .$body."</h4>
                </body>
            </html>";
        $mail->AddAddress($to);
        if(!$mail->Send())
        {
            $error ="Please try Later, Error Occured while Processing...";
            // return $error; 
            return $status_code = 500;
            
        }
        else 
        {
            $error = "Thanks You !! Your email is sent.";  
            // return $error;
            return $status_code = 200;
        }
    }
    
    if(isset($_POST['email'])){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $subject = $_POST['subject'];
        $message = $_POST['message'];
        //$userid = $_POST['userid'];
        
        // echo $name;
        
        $to   = 'ashanour009@gmail.com';
        $from = $email;
        // $name = 'Md Ashanaur Rahman';
        $subj = $subject;
        $msg = $message;
        
        $error = smtpmailer($to,$from, $name ,$subj, $msg);
        echo $error;
        
    }
    
    
    
?>

