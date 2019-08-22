<?php

    $firstname = $_POST['firstname'] ?? '';
    $lastname = $_POST['lastname'] ?? '';
    $email = $_POST['email'] ?? '';
    $subject = $_POST['subject'] ?? '';
    $message = $_POST['message'] ?? '';
    $emailsopt = $_POST['emailsopt'] ?? 0;
    $from = 'Demo Contact Form'; 
    $to = 'advil64@gmail.com'; 

    function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }

    $email_message = "Form details below.\n\n";
    $email_message .= "First Name: ".clean_string($firstname)."\n";
    $email_message .= "Last Name: ".clean_string($lastname)."\n";
    $email_message .= "Email: ".clean_string($email)."\n";
    $email_message .= "Comments: ".clean_string($message)."\n";

    // create email headers
    $headers = 'From: '.$firstname.' '.$lastname."\r\n".
    'Reply-To: '.$email."\r\n" .
    'X-Mailer: PHP/' . phpversion();
    @mail($to, $subject, $email_message, $headers);

?>