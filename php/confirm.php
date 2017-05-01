<?php
/**********************************************************
// Societe: ETML
// Auteur:  Cardy Remy
// Date:    23.03.2017
// But:
//*********************************************************/
include_once ('function.php');

// instanciation de l'objet d'interface a la base de donnees
$objConnect = new dbfunction();

//declaration variables
$user = $_GET['username'];
$keyGet = $_GET['key'];

$loadUserData = $objConnect->selectForControlUser($user);


//Verifie que la clef correspond à celle de la base de donnés
if($loadUserData[0]['useKey']== $keyGet){

    $insertKeyToDB = $objConnect->updateConfirmKey($user);

    ?>
    <!doctype html>
    <html class="no-js" lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>CMS</title>
        <link rel="stylesheet" href="../css/foundation.css">
        <link rel="stylesheet" href="../css/app.css">
    </head>
    <body>
    <div id="space">

    </div>
    <div id="space">

    </div>
    <div class="row">
        <div class="columns">
            <div class="text-center">

                <h1 class="text-center">Merci pour votre inscription</h1>
            </div>
            <br>
            <div class="text-center">
                <img  src="../img/THB.png">
            </div>

            <div id="bigSpace">

            </div>
            <div id="bigSpace">

            </div>

        </div>
    </div>

    </body>
    </html>

    <?php
}
else
{
    echo 'Erreur';
}

header ("Refresh:3 loginForm.php");
