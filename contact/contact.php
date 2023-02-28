<?php

$errorMSG = "";

// NAME
if (empty($_POST["name"])) {
    $errorMSG = "Name is required ";
} else {
    $name = $_POST["name"];
}

// EMAIL
if (empty($_POST["email"])) {
    $errorMSG .= "Email is required ";
} else {
    $email = $_POST["email"];
}

// Subject
if (empty($_POST["name2"])) {
    $errorMSG .= "Service is required ";
} else {
    $subject = $_POST["name2"];
}

// MESSAGE
if (empty($_POST["message"])) {
    $errorMSG .= "Message is required ";
} else {
    $message = $_POST["message"];
}

// MESSAGE
if (empty($_POST["phone"])) {
    $errorMSG .= "phone is required ";
} else {
    $message = $_POST["phone"];
}

$EmailTo = "aryarahul66@gmail.com";
$Subject = "New Message Received";

// prepare email body text
$Body .= "name: ";
$Body .= $name;
$Body .= "\n";
$Body .= "Email: ";
$Body .= $email;
$Body .= "\n";
$Body .= "service: ";
$Body .= $name2;
$Body .= "\n";
$Body .= "Message: ";
$Body .= $message;
$Body .= "\n";
$Body .= "phone: ";
$Body .= $phone;
$Body .= "\n";

// send email
$success = mail($EmailTo, $Subject, $Body, "From:".$email);

// redirect to success page
if ($success && $errorMSG == ""){
   header('Location: thankyou.html?message=Successfull');
}else{
    if($errorMSG == ""){
        echo "Something went wrong :(";
    } else {
        echo $errorMSG;
    }
}

?>