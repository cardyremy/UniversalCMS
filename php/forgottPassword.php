<?php
/**
 * Created by PhpStorm.
 * User: Cardyre
 * Date: 24.03.2017
 * Time: 10:17
 */

include_once "function.php";

$objConnect = new dbfunction();

$email = $_POST['strLogin'];

$loadUserData = $objConnect->selectDataForPassword($email);
$username = $loadUserData[0]['useName'];
$key = $loadUserData[0]['useKey'];

if (preg_match('#^[\w.-]+@[\w.-]+\.[a-z]{2,6}$#i', $email))
{

    $from = "MIME-Version: 1.0"."\r\n";
    $from .= "Content-type: text/html; charset=utf-8"."\r\n";

    $to = $email;
    $subject = 'Message from Contact Demo ';
    $result = "";
    $body = '

<html>
<body>
            <h3> Demande de reinitialisation du mot de passe pour le login '.$username.' </h3>
            <p>
                        <a href="http://127.0.0.1/projects/php/pwdResetConfirm.php?username='.urlencode($username).'&key='.$key.'">Veuillez cliquer sur ce lien pour reinitialiser votre mot de passe ! </a>

            </p>

</body>
</html>


        ';

    if (mail ($to, $subject, $body, $from)) {
        $result='<div class="alert alert-success">Thank You! I will be in touch</div>';
    } else {
        $result='<div class="alert alert-danger">Sorry there was an error sending your message. Please try again later</div>';
    }

    header ("Refresh:2 index.php");

}

//echo $email;