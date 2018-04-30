<?php

    // Only process POST reqeusts.
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Get the form fields and remove whitespace.
        $email = filter_var(trim($_POST["omgandhi10@outlook.com"]), FILTER_SANITIZE_EMAIL);

        // Check that data was sent to the mailer.
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            // Set a 400 (bad request) response code and exit.
            echo "Oops! There was a problem with your submission. Please complete the form and try again.";
            exit;
        }

        // Set the recipient email address.
        // FIXME: Update this to your desired email address.
        $recipient = "omgandhi10@outlook.com";

        // Set the email subject.
        $subject = "DesignerDude";

        // Build the email content.
        $email_content = "Email Address: $email\n";

        // Build the email headers.
        $email_headers = "From: <$email>";

        // Send the email.
        if (mail($recipient, $subject, $email_content, $email_headers)) {
            // Set a 200 (okay) response code.
            echo "Success! We'll get back to you shortly.";
			$_POST=array();
        } else {			
            // Set a 500 (internal server error) response code.
            echo "Looks like something went wrong, we coundn't send your message.";
        }

    } else {
        // Not a POST request, set a 403 (forbidden) response code.
        header("HTTP/1.0 404 Not Found");
        echo "There was a problem with your submission, please try again.";
    }

?>
