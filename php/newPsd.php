<?php

/**********************************************************
// Societe: ETML
// Auteur:  Cardy Remy
// Date:    24.03.2017
// But:     Mise à jour du mot de passe
//*********************************************************/
include_once ('function.php');

$objConnect = new dbfunction();

$pswd = $_POST['psw'];
$psw2 = $_POST['psw2'];
$userKey = $_POST['key'];

//$keyGet = $_GET['key'];


if($pswd != $psw2)
{
    echo 'Les mots de passes sont pas identiques, veuillez introduire deux fois votre mot de passe';
    header ("Refresh:1 newPasswordForm.php");
}
else
{
    $pswHashed = password_hash($pswd,PASSWORD_DEFAULT);
    $updToDBPass = $objConnect->updatePasswordUser($pswHashed,$userKey);
    echo 'Votre mot de passe a été mis à jour';
    header('Refresh:2 index.php');
}

//$loadUserData = $objConnect->selectForControlUser($user);

//echo $user;
//echo '<br>';
//echo $keyGet;



