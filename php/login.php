<?php
/**
 * Created by PhpStorm.
 * User: Cardyre
 * Date: 15.03.2017
 * Time: 15:22
 */

header('Content-Type: text/html; charset=utf-8');

// Inclusion des fichiers
include_once ("function.php");

// instanciation de l'objet d'interface a la base de donnees
$objConnect = new dbfunction();

$username = htmlentities($_POST['strLogin']);
$password=  htmlentities($_POST['pwd']);

$userConnect = $objConnect->sendRequestUser($username);
$userCheck = $objConnect->usernameCheck($username);



$error=''; // Variable d'erreur
$msg="";
// password_hash('.Etml-',PASSWORD_DEFAULT);

if (isset($_POST))
{
    if (empty($_POST['strLogin']) || empty($_POST['pwd']))
    {
        $msg = "Veuillez introduire votre nom d'utilisateur et mot de passe !";
        header('Location:index.php?msg='.htmlspecialchars($msg));
    }
    else if(empty($userCheck[0]['useName']))
    {
        $msg = "L'utilisateur n'existe pas!";
        header('Location:index.php?msg='.htmlspecialchars($msg));
    }
    else if($userConnect[0]['useConfirm'] != 1)
    {
        $msg= 'Lutilisateur nas pas encore été confirmé ! Veuillez verifier votre boite email';
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
                $_SESSION['useRights'] = $userConnect[0]['useRights'];
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

?>



