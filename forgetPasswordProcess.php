<?php

include "connection.php";


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


require "Exception.php";
require "PHPMailer.php";
require "SMTP.php";

$email = $_POST["e"];
$vcode = uniqid();


$rs = Database::search("SELECT * FROM `user` WHERE `email` = '".$email."'");
$num = $rs->num_rows;



if ($num > 0) {
 //user found
Database::iud("UPDATE `user` SET `v_code` = '".$vcode."' WHERE `email` = '".$email."'");


$mail = new PHPMailer(true);

try{   
$mail->IsSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->Username = 'yasuruthilakshana@gmail.com';
$mail->Password = 'gafpbploprcrplnq';
$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
$mail->Port = 465;
$mail->setFrom('yasuruthilakshana@gmail.com', 'OZIZ STORE');
//$mail->addReplyTo('thilakshanayasuru@gmail.com', 'Reset Password');
$mail->addAddress($email);
$mail->isHTML(true);
$mail->Subject = 'OZIZ Forgot Password Verification Code';
//$bodyContent = '<h1 style="color:green;">Your verification code is '.$code.'</h1>';
$mail->Body    = '
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>


    <table style="width: 100%; font-family:sens-serif; ">
        <tbody>
            <tr>
                <td align="center">

                    <table style="max-width: 600px;">
                        <tr>
                            <td align="center">
                                <a href="" style="font-size: 35px; font-weight:bold; color:black; text-decoration:none;">OZIZ</a>
                                <hr>
                            </td>

                        </tr>

                        <tr>
                            <td>
                                <h1 style="font-size: 25px; line-height:45px; font-weight:600;">Reset Your Password</h1>
                                <p>If you want to change your password You can Click bellow Button</p>

                                <div>
                                    <a href="http://localhost/oziz/resetPassword.php?vcode='.$vcode.'" style="text-decoration: none; display:inline-block; border-radius:9px; background-color:blueviolet;
                                    color:white; padding:15px; ">
                                            <span>Reset Password</span>

                                    </a>


                                </div>

                                <p style="margin-top: 24px;">
                                    if you did\'t ask to reset Password Yolu Can ignore this email.
                                </p>
                                <hr>

                            </td>

                        </tr>
                        <tr>
                            <td align="center">
                                        <p style="font-weight:500;">&copy; OZIZ.lk || All Rights Reservad </p>
                            </td>
                        </tr>
                    </table>

                </td>
            </tr>
        </tbody>
    </table>






</body>

</html>
';

!$mail->send();
echo 'success';

} catch(Exception $email){
    echo "Message Could Not Be SEND > Mailer Error: {$mail->ErrorInfo}";
}

} else {

echo("Invalid User");
}





?>