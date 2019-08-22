<?php

    require("sendgrid-php/sendgrid-php.php");

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

    $response = $sg->client->mail()->send()->post($mail);
    echo $response->statusCode();
    echo $response->headers();
    echo $response->body();

?>