<?php
/*
Credits: Bit Repository
URL: http://www.bitrepository.com/
*/

include 'config.php';

error_reporting (E_ALL ^ E_NOTICE);

$post = (!empty($_POST)) ? true : false;

if($post)
{

$name1 = stripslashes($_POST['name1']);
$name2 = stripslashes($_POST['name2']);
$email = trim($_POST['email']);
$service = stripslashes($_POST['service']);
$services = stripslashes($_POST['services']);
$subject = "New Lead";
$message = "Name : ".$name1." ".$name2."\r\nEmail : ".$email."\r\service : ".$service." services : ".$services."";

$error = '';



if(!$error)
{
$mail = mail(WEBMASTER_EMAIL, $subject, $message,
     "From: ".$name1." ".$name2." <".$email.">".$service." ".$services."\r\n"
    ."Reply-To: ".$email."\r\n"
    ."X-Mailer: PHP/" . phpversion());


if($mail)
{
header ('Location :thankyou.html');
}

}


}
?>