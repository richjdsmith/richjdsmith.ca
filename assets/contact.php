<?php

//Section 1. This checks to see if the invisible field is empty.
//Section 2. This validates that all the fields are filled in.
//Section 3. This sends the email.
//Section 4. If the invisible field is not empty, the form is being submitted by a bot and the email is not sent.

// Section 1.
if( $_POST['name_here_goes'] == '' ){
    
    // Section 2.
    if ( !empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['subject']) && !empty($_POST['message']) ) {
    
        $to         = 'contact@richjdsmith.ca';
        $subject     = 'Contact Form' . ': ' . $_POST['subject'];
        $message     = $_POST['name'] . ': ' . $_POST['message'];
        $headers     = 'From: ' . $_POST['email'] . ' ' . "\r\n" .
                      'Reply-To: ' . $_POST['email'] . '' . "\r\n" .
                      'X-Mailer: PHP/' . phpversion();
    
        // Section 3.
        if ( mail($to, $subject, $message, $headers) ) {
            echo 'Email sent. I will get back to you as soon as I can!';
        }
    }else{
        echo 'Please fill all the info.';
    }
    
}else{
     
     // Section 4.
     echo 'Spam detected! bugger off you bot';
     
}