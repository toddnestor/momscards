<?php
session_start();
require_once("inc/config.php");
if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['message']) && trim($_POST['name']) != "" && trim($_POST['email']) != "" && trim($_POST['message']) != "")
{
  $_SESSION['name'] = $_POST['name'] != "" ? $_POST['name']:"";
  $_SESSION['email'] = $_POST['email'] != "" ? $_POST['email']:"";
  $_SESSION['message'] = $_POST['message'] != "" ? $_POST['message']:"";
  
  foreach($_POST as $value) {
    if(strpos($value,'Content-Type:') !== FALSE) {
      header("Location: " . BASE_URL . "contact/?msg=spam");
      exit;
    }
  }
  
  if(isset($_POST['address']) && $_POST['address'] != "")
  {
    header("Location: " . BASE_URL . "contact/?msg=spam");
    exit;
  }
  $name = $_POST['name'];
  $email = $_POST['email'];
  $message = $_POST['message'];
  
  require_once("inc/phpmailer/class.phpmailer.php");
  $mail = new PHPMailer();
  
  if(!$mail->ValidateAddress($email)) {
    header("Location: " . BASE_URL . "contact/?msg=email");
    exit;
  }
  
  $email_body = "";
  
  $email_body .= "Name: " . $name . "\n\n";
  
  $email_body .= "E-mail: " . $email . "\n\n";
  
  $email_body .= "Message: \n" . $message;
  
  $mail->SetFrom($email, $name);
  
  $address = "todd.nestor@gmail.com";
  $mail->AddAddress($address, "Todd Nestor");
  
  $mail->Subject = "sherriscards.com Contact Form | " . $name;
  
  $mail->AltBody = $email_body;
  
  $mail->MsgHTML(str_replace("\n","<br>",$email_body));
  
  if(!$mail->Send()) {
    header("Location: " . BASE_URL . "contact/?msg=error");
    exit();
  } else {
    header("Location: " . BASE_URL . "contact/?msg=sent");
    exit();
  }
  
  $_SESSION['name'] = "";
  $_SESSION['email'] = "";
  $_SESSION['message'] = "";
  
  header("Location: " . BASE_URL . "contact/?sent=1");
}
else
{
  $_SESSION['name'] = $_POST['name'] != "" ? $_POST['name']:"";
  $_SESSION['email'] = $_POST['email'] != "" ? $_POST['email']:"";
  $_SESSION['message'] = $_POST['message'] != "" ? $_POST['message']:"";
  header("Location: " . BASE_URL . "contact/?msg=error");
}
?>