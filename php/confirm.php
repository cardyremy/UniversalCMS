<?php
/**
 * Created by PhpStorm.
 * User: Cardyre
 * Date: 23.03.2017
 * Time: 10:21
 */

include_once ('function.php');

$objConnect = new dbfunction();

$user = $_GET['username'];
$keyGet = $_GET['key'];

$loadUserData = $objConnect->selectForControlUser($user);

//echo $user;
//echo '<br>';
//echo $keyGet;

if($loadUserData[0]['useKey']== $keyGet){

    $insertKeyToDB = $objConnect->updateConfirmKey($user);
    echo 'Merci de votre inscription';
}
else
{
    echo 'Erreur';
}

header ("Refresh:3 loginForm.php");
