<?php

include 'php/functions.php';

if (isset($_POST['email']) && isset($_POST['to'])) {
	$path = $_SERVER['HTTP_REFERER'];

	$admin_message = '<p>Hi, new contact from  ' . $path . '<br>These are the details.</p>';
	$admin_message .= '<p>Email:' . sanitize($_POST['email']) . '</p>';
	$admin_message .= '<br><br>';
	$admin_message .= 'Regards,<br />';

	$admin_subject = 'New contact from ' . $path;

	$sendToAdmin = $sendToUsers = '';

	$sendToAdmin = sendEmail(sanitize($_POST['to']), sanitize($_POST['email']), $admin_subject, $admin_message, sanitize($_POST['email']));

	if ($sendToAdmin || $sendToUsers) {
		$message = 'Success::<div class="row"><div class="alert alert-info alert-dismissible fade in"><strong><i class="fa fa-info message-icon"></i><span>Message sent successfully.</span></strong></div></div>';
	} else {
		$message = 'Error::<div class="row"><div class="alert alert-danger alert-dismissible fade in"><strong><i class="fa fa-info message-icon"></i><span>Could not perform operation!</span></strong></div></div>';
	}
} else {
	$message = 'Error::<div class="row"><div class="alert alert-danger alert-dismissible fade in"><strong><i class="fa fa-info message-icon"></i> <span>Could not perform operation!</span></strong></div></div>';
}

print $message;

