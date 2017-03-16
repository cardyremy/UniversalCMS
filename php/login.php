<?php
/**
 * Created by PhpStorm.
 * User: Cardyre
 * Date: 15.03.2017
 * Time: 15:22
 */

include_once ("function.php");

$objConnect = new dbfunction();
$username = htmlentities($_POST['strLogin']);
$password=  htmlentities($_POST['pwd']);

$userConnect = $objConnect->sendRequestUser($username);

session_start();

$error=''; // Variable d'erreur
$msg="";
echo password_hash('.Etml-',PASSWORD_DEFAULT);

if (isset($_POST)) {
    if (empty($_POST['strLogin']) || empty($_POST['strPwd']))
    {
        $msg = "Veuillez introduire votre nom d'utilisateur et mot de passe !";
        header('Location:../index.php?msg='.htmlspecialchars($msg));


        //$pass= password_hash('0000',PASSWORD_DEFAULT);
        //var_dump($pass);
    }
    else
    {
        if(!empty($userConnect))
        {
            if(password_verify($password,$userConnect[0]['usePassword']))
            {
                //print 'Bienvenue !';
                $_SESSION['useName']= $username;
                $_SESSION['usePassword']= $userConnect[0]['usePassword'];
              //  $_SESSION['useRights'] = $userConnect[0]['useRights'];


            }else
            {
                $msg="Mot de passe incorrect !";
            }
        }
        else
        {
            //header('Location:../index.php');
            $msg="Nom d'utilisateur ou mot de passe incorrect !";
        }
        header('Location:../index.php?msg='.htmlspecialchars($msg));
    }
}
?>