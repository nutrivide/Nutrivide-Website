<?php

    require 'vendor/autoload.php';

    $firstname = $_POST['firstname'] ?? '';
    $lastname = $_POST['lastname'] ?? '';
    $email = $_POST['email'] ?? '';
    $subject = $_POST['subject'] ?? '';
    $message = $_POST['message'] ?? '';
    $emailsopt = $_POST['emailsopt'] ?? 0;
    $from = 'Demo Contact Form'; 
    $to = 'advil64@gmail.com'; 

    $from = new SendGrid\Email(null, $email);
    $to = new SendGrid\Email(null, $to);
    $content = new SendGrid\Content("text/plain", $message);
    $mail = new SendGrid\Mail($from, $subject, $to, $content);

    $apiKey = getenv('SENDGRIP_API_KEY');
    $sg = new \SendGrid($apiKey);

try{
    $response = $sg->client->mail()->send()->post($mail);
    header("Location: http://www.facebook.com/nutrivide"); 
}

catch (Exception $e) {
    echo 'Caught exception: '.  $e->getMessage(). "\n";
}

?>