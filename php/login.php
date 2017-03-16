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



$error=''; // Variable d'erreur
$msg="";
echo password_hash('.Etml-',PASSWORD_DEFAULT);

if (isset($_POST)) {
    if (empty($_POST['strLogin']) || empty($_POST['pwd']))
    {
        $msg = "Veuillez introduire votre nom d'utilisateur et mot de passe !";
        header('Location:index.php?msg='.htmlspecialchars($msg));

    }
    else
    {
        if(!empty($userConnect))
        {
            if(password_verify($password,$userConnect[0]['usePswd']))
            {
                session_start();
                //print 'Bienvenue !';
                $_SESSION['useName']= $username;
                $_SESSION['usePswd']= $userConnect[0]['usePswd'];
              //  $_SESSION['useRights'] = $userConnect[0]['useRights'];
                $msg = "Bienvenue";


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
       header('Location:index.php?msg='.htmlspecialchars($msg));
    }
}
