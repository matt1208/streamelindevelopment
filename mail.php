<?php
    $name = $_REQUEST['name'];
    $email = $_REQUEST['email'];
    $message = $_REQUEST['message'];
    $human = intval($_REQUEST['human']);
    $from = 'Message from website'; 
    $to = 'm@streamlinedev.org'; 
    $subject = 'Message from Website';

    $body = "From: $name\n E-Mail: $email\n Message:\n $message";

    // Check if name has been entered
    if (!$_REQUEST['name']) {
        $errName = 'Please enter your name';
    }

    // Check if email has been entered and is valid
    if (!$_REQUEST['email'] || !filter_var($_REQUEST['email'], FILTER_VALIDATE_EMAIL)) {
        $errEmail = 'Please enter a valid email address';
    }

    //Check if message has been entered
    if (!$_REQUEST['message']) {
        $errMessage = 'Please enter your message';
    }
    //Check if simple anti-bot test is correct
    if ($human !== 5) {
        $errHuman = 'Your anti-spam is incorrect';
    }

    // If there are no errors, send the email
    if (!$errName && !$errEmail && !$errMessage && !$errHuman) 
        {
        mail ($to, $subject, $body, $from);
        header("Location: confirmation.html");
        }
    else 
        {
            header("Location: error.html");
        }

?>