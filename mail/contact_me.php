<?php

require_once ('../vendor/autoload.php');

if(empty($_POST['name'])      ||
   empty($_POST['email'])     ||
   empty($_POST['phone'])     ||
   empty($_POST['message'])   ||
   !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
   {
   echo "No arguments Provided!";
   return false;
   }
   
$name = strip_tags(htmlspecialchars($_POST['name']));
$email_address = strip_tags(htmlspecialchars($_POST['email']));
$phone = strip_tags(htmlspecialchars($_POST['phone']));
$message = strip_tags(htmlspecialchars($_POST['message']));
   
// Create the email and send the message
$to = new SendGrid\Email("On The Fly Pest Control", "ontheflypestcontrol@gmail.com"); // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
$email_subject = "Website Contact Form:  {$name}";
$email_body = new SendGrid\Content("text/html", "
You have received a new message from your website contact form<br>
Name : {$name}<br>
Email : {$email_address}<br>
Phone : {$phone}<br>
Message : {$message}
");

// "You have received a new message from your website contact form.\n\n"."Here are the details:\n\nName: $name\n\nEmail: $email_address\n\nPhone: $phone\n\nMessage:\n$message";
$from = new SendGrid\Email("Contact Form", "noreply@gmail.com"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.  

// mail($to,$email_subject,$email_body,$from);

$mail = new SendGrid\Mail($to, $email_subject, $email_body, $from);
$apiKey = ("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");
$sg = new \SendGrid($apiKey);

return true;         
?>


// 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