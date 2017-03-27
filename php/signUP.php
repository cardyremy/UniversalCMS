<?php
/**
 * Created by PhpStorm.
 * User: Cardyre
 * Date: 21.03.2017
 * Time: 13:50
 */
include_once ('function.php');
$objConnect = new dbfunction();

$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['psw'];

$loadUserMail = $objConnect->emailCheckUser($email);
$loadUserName = $objConnect->usernameCheck($username);

if (preg_match('#^[\w.-]+@[\w.-]+\.[a-z]{2,6}$#i', $email))
{
    if(count($loadUserMail)>0)
    {
        echo "Cette adresse éléctronique est déja assigné a un autre compte, veuillez introduire une autre adresse email";
    }
    else if(count($loadUserName)>0)
    {
        echo "l'utilisateur est deja prit";
    }
    else
    {
        $keyLength = 15;
        $key ='';

        for($i=0;$i<$keyLength;$i++)
        {
            $key.= mt_rand(0,9);
        }

        $from = "MIME-Version: 1.0"."\r\n";
        $from .= "Content-type: text/html; charset=utf-8"."\r\n";

        $to = $email;
        $subject = 'Message from Contact Demo ';
        $result = "";
        $body = '

<html>
<body>
            <a href="http://127.0.0.1/projects/php/confirm.php?username='.urlencode($username).'&key='.$key.'">Veuillez cliquer sur ce lien pour confirmer votre inscription </a>

</body>
</html>


        ';

        if (mail ($to, $subject, $body, $from)) {
            $result='<div class="alert alert-success">Thank You! I will be in touch</div>';
        } else {
            $result='<div class="alert alert-danger">Sorry there was an error sending your message. Please try again later</div>';
        }

        $passwordHashed = password_hash($password,PASSWORD_DEFAULT);

        $insertUserData = $objConnect->signUpData($username,$passwordHashed,$key,$email);

        echo 'Merci pour votre inscription, un mail de validation a été envoye à :'.$email;
//Redirection page index
        header ("Refresh:1 index.php");
    }
}
else
{
    echo "Le mail n'est pas correct!";
}



/*
for($i=0;$i<count($loadUserMail);$i++)
{
    if($loadUserMail[$i]['useEmail']== $email)
    {

    }
}
*/


?>

</body>
</html>
