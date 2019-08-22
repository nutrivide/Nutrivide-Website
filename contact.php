<?php

    $firstname = $_POST['firstname'] ?? '';
    $lastname = $_POST['lastname'] ?? '';
    $email = $_POST['email'] ?? '';
    $subject = $_POST['subject'] ?? '';
    $message = $_POST['message'] ?? '';
    $emailsopt = $_POST['emailsopt'] ?? 0;
    $from = 'Demo Contact Form'; 
    $to = 'advil64@gmail.com'; 
    $subject = 'Message from Contact Demo ';

    $fields = array('name' => 'Name', 'email' => 'Email', 'message' => 'Message'); // array variable name => Text to appear in email
    $okMessage = 'Contact form successfully submitted.';
    $errorMessage = 'There was an error while submitting the form. Please try again later.';

    try
    
    {
        $emailText = "You have new message from contact form\n=============================\n";
        foreach ($_POST as $key => $value) {
            if (isset($fields[$key])) {
                $emailText .= "$fields[$key]: $value\n";
            }
        }
        mail($to, $subject, $emailText, "From: " . $from);
        $responseArray = array('type' => 'success', 'message' => $okMessage);
    }

    catch (\Exception $e)
    {
        $responseArray = array('type' => 'danger', 'message' => $errorMessage);
    }

    if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
        $encoded = json_encode($responseArray);

        header('Content-Type: application/json');

        echo $encoded;
    }

    else {
        echo $responseArray['message'];
    }


    

?>