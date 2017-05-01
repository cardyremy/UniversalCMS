<?php

/**********************************************************
// Societe: ETML
// Auteur:  Cardy Remy
// Date:    24.03.2017
// But:
//*********************************************************/

//Inclusion fichier
include_once "function.php";

// instanciation de l'objet d'interface a la base de donnees

$objConnect = new dbfunction();

//recuperation du nom d'utilisateur
$email = $_POST['strLogin'];

$loadUserData = $objConnect->selectDataForPassword($email);
$username = $loadUserData[0]['useName'];
$key = $loadUserData[0]['useKey'];

//Verifie le bon format de l'email
if (preg_match('#^[\w.-]+@[\w.-]+\.[a-z]{2,6}$#i', $email))
{

    //Variables pour la fonction mail
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
                        <a href="http://127.0.0.1/projects/UniversalCMS/php/pwdResetConfirm.php?username='.urlencode($username).'&key='.$key.'">Veuillez cliquer sur ce lien pour reinitialiser votre mot de passe ! </a>

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