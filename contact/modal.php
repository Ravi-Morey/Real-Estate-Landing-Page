<?php

// Define some constants
define( "RECIPIENT_NAME", "Ankush Jain" );
define( "RECIPIENT_EMAIL", "info@digitalizetheglobe.com" );


// Read the form values
$success = false;
$sendername = isset( $_POST['name'] ) ? preg_replace( "/[^\.\-\_\@a-zA-Z0-9]/", "", $_POST['name'] ) : "";
$senderEmail = isset( $_POST['email'] ) ? preg_replace( "/[^\.\-\_\@a-zA-Z0-9]/", "", $_POST['email'] ) : "";
$senderSubject = isset( $_POST['phone'] ) ? preg_replace( "/[^\.\-\' a-zA-Z0-9]/", "", $_POST['phone'] ) : "";
$message = isset( $_POST['message'] ) ? preg_replace( "/(From:|To:|BCC:|CC:|Subject:|Content-Type:)/", "", $_POST['message'] ) : "";

// If all values exist, send the email
if ( $sendername && $senderEmail && $senderSubject && $message) {
  $recipient = RECIPIENT_NAME . " <" . RECIPIENT_EMAIL . ">";
  $headers = " From: " . $senderEmail . " <" . $senderSubject . ">";
  $msgBody = " Message: " . $message . "";
  $success = mail( $recipient, $headers, $msgBody );

  //Set Location After Successsfull Submission
  header('Location: thankyou.html?message=Successfull');
}

else{
	//Set Location After Unsuccesssfull Submission
  	header('Location: index.html?message=Failed');	
}

?>