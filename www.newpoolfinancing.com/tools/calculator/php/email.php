<?php
	/* Hide errors */
error_reporting(0);

/* Variables */
$invalidEmail = "The email address you entered was invalid. Please try again!"; // To be displayed when the email is not valid
$emailSent = "Your message has been sent"; // To be displayed when email sending was successful
$emailFailed = "There was a problem sending the email"; // To be displayed when email failed sending
$subject = "Your mortgage amortization table"; // Email subject
$from = "your_email_address@domain.com"; // Sender email address

/* Data posted by script */
$to = $_POST['to'];
$path = $_POST['path'];
$content = $_POST['content'];

/* Prepare headers */
$headers = "From: " . strip_tags($from) . "\r\n";
$headers .= "Reply-To: " . strip_tags($from) . "\r\n";
$headers .= "CC: " . strip_tags($from);
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=UTF-8\r\n";

/* Prepare the table result content */
$message .= '<style>';
$message .= file_get_contents('../css/mg-main.css');
$message .= file_get_contents('../css/mg-light-white.css');
$message .= '</style>';
$message .= $content;

/* Send the email */
if (strlen(strip_tags($to)) > 0) {
	if (mail($to, $subject, $message, $headers)) {
		echo $emailSent;
	}
	else {
	  echo $emailFailed;
	}
}

?>