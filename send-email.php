<?php
require 'vendor/autoload.php'; // If you're using Composer (recommended)

$from = new \SendGrid\Mail\From("test@example.com", "Example User");
$subject = new \SendGrid\Mail\Subject("Sending with SendGrid is Fun");
$to = new \SendGrid\Mail\To("test@example.com", "Example User");
$plainTextContent = new \SendGrid\Mail\PlainTextContent(
    "and easy to do anywhere, even with PHP"
);
$htmlContent = new \SendGrid\Mail\HtmlContent(
    "<strong>and easy to do anywhere, even with PHP</strong>"
);
$email = new \SendGrid\Mail\Mail(
    $from,
    $to,
    $subject,
    $plainTextContent,
    $htmlContent
);
$sendgrid = new \SendGrid("getenv('SENDGRID_API_KEY')");
try {
    $response = $sendgrid->send($email);
    print $response->statusCode() . "\n";
    print_r($response->headers());
    print $response->body() . "\n";
} catch (Exception $e) {
    echo 'Caught exception: ',  $e->getMessage(), "\n";
}