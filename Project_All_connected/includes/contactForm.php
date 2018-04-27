<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function submit_form() {
    if (isset($_POST['email'])) {
        $email_to = "larisa.sabalin@gmail.com";
        $email_subject = clean_string($subject);

        function died($error) {
            echo "We are very sorry, but there were error(s) found with the form you submitted. ";
            echo "These errors appear below.<br /><br />";
            echo $error . "<br /><br />";
            echo "Please go back and fix these errors.<br /><br />";
            die();
        }

        if (!isset($_POST['name']) ||
                !isset($_POST['email']) ||
                !isset($_POST['telephone']) ||
                !isset($_POST['text']) ||
                !isset($_POST['subject'])) {
            died('We are sorry, but there appears to be a problem with the form you submitted.');
        }

        $name = $_POST['name'];
        $email_from = $_POST['email'];
        $telephone = $_POST['phone'];
        $comments = $_POST['text'];
        $subject = $_POST['subject'];

        $error_message = "";
        if (strlen($error_message) > 0) {
            died($error_message);
        }
        $email_message = "Form details below.\n\n";

        function clean_string($string) {
            $bad = array("content-type", "bcc:", "to:", "cc:", "href");
            return str_replace($bad, "", $string);
        }

        $email_message .= "Name: " . clean_string($name) . "\n";
        $email_message .= "Email: " . clean_string($email_from) . "\n";
        $email_message .= "Telephone: " . clean_string($telephone) . "\n";
        $email_message .= "Comments: " . clean_string($comments) . "\n";


        $headers = 'From: ' . $email_from . "\r\n" .
                'Reply-To: ' . $email_from . "\r\n" .
                'X-Mailer: PHP/' . phpversion();
        @mail($email_to, $email_subject, $email_message, $headers);
        ?>

        Thank you for contacting us. We will be in touch with you soon. You will now be redirected back to home page.
        <META http-equiv="refresh" content="2;URL=home.php">


        <?php
    }
    die();
}
?>
