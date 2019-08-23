<?php

    require 'vendor/autoload.php';

    $firstname = $_POST['firstname'] ?? '';
    $lastname = $_POST['lastname'] ?? '';
    $emailfrom = $_POST['email'] ?? '';
    $subject = $_POST['subject'] ?? '';
    $message = $_POST['message'] ?? '';
    $emailsopt = $_POST['emailsopt'] ?? 0;
    $from = 'Demo Contact Form'; 
    $to = 'advil64@gmail.com'; 

    $email = new \SendGrid\Mail\Mail(); 
    $email->setFrom($emailfrom, $firstname . ' ' . $lastname);
    $email->setSubject($subject);
    $email->addTo($to, "Example User");
    $email->addContent("text/plain", $emailsopt);

    $sendgrid = new \SendGrid(getenv('SENDGRID_API_KEY'));

try{
     $response = $sendgrid->send($email);
    header("Location: http://www.facebook.com/nutrivide"); 
}

catch (Exception $e) {
    echo 'Caught exception: '.  $e->getMessage(). "\n";
}

?>