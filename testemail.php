<?php
include_once("config.php");

$result = mysqli_query($mysqli,"SELECT * FROM jadwal ");

$to_email = "yobel.oktavinus98@gmail.com";
$subject = "Simple Email Test via PHP";
$body = "Hi,nn This is test email send by PHP Script";
$headers = "From: sender\'s email";

while($row = $result->fetch_assoc()) {    
    if (new DateTime() > new DateTime("2019-11-13 20:00:00")) {
    # current time is greater than 2010-05-15 16:00:00
    # in other words, 2010-05-15 16:00:00 has passed
        if (mail($to_email, $subject, $body, $headers)) {
        echo("Email successfully sent to $to_email...");
        } else {
        echo("Email sending failed...");
        }
}
    else{
        echo("The time has yet to come");
    }
}
