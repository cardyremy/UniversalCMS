<?php

/**********************************************************
// Societe: ETML
// Auteur:  Cardy Remy
// Date:    30.03.2017
// But:     Mettre à jour les droits des utilisateurs
//*********************************************************/
include_once ('function.php');
$objConnect = new dbfunction();

$useName = $_POST['use'];

if(isset($_POST['option']))
{
    $radioRights = $_POST['option'];
    if($useName=='admin')
    {
        echo "Vous ne pouvez pas changer les droits sur l'admin";
    }
    else
    {
        $updateUseRights = $objConnect->updateUseRights($radioRights,$useName);
        echo "Les droits ont été modifiés avec succes";
        header('Refresh:1 index.php');
    }
}
else
{
    echo 'Veuillez remplir tous les champs ! ';
    header('Refresh:2 userInformation.php');
}
//var_dump($radioRights);

