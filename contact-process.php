<?php
session_start();
if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['message']) && $_POST['name'] != "" && $_POST['email'] != "" && $_POST['message'] != "")
{
  $name = $_POST['name'];
  $email = $_POST['email'];
  $message = $_POST['message'];
  
  $email_body = "";
  
  $email_body .= "Name: " . $name . "\n\n";
  
  $email_body .= "E-mail: " . $email . "\n\n";
  
  $email_body .= "Message: \n" . $message;
  
  mail("todd.nestor@gmail.com", "toddnestor.com Contact Form", $email_body);
  
  $_SESSION['name'] = "";
  $_SESSION['email'] = "";
  $_SESSION['message'] = "";
  
  header("Location: contact.php?sent=1");
}
else
{
  $_SESSION['name'] = $_POST['name'] != "" ? $_POST['name']:"";
  $_SESSION['email'] = $_POST['email'] != "" ? $_POST['email']:"";
  $_SESSION['message'] = $_POST['message'] != "" ? $_POST['message']:"";
  header("Location: contact.php?error=1");
}
?>