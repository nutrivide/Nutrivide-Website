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


    if (mail ($to, $subject, $message)) {
		echo "success";
	} else {
		echo "tryagain";
	}

?>