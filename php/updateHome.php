<?php

/**********************************************************
// Societe: ETML
// Auteur:  Cardy Remy
// Date:    27.03.2017
// But:     Mette à jour la page d'accueil
//*********************************************************/
include_once ('function.php');
session_start();

if($_SESSION['useRights']==2)
{
    $artTitle1 = $_POST['artTitle0'];
    $artTitle2 = $_POST['artTitle1'];
    $artTitle3 = $_POST['artTitle2'];

    $artContent1 = $_POST['text0'];
    $artContent2 = $_POST['text1'];
    $artContent3 = $_POST['text2'];

    $ID1 = $_POST['idArticle0'];
    $ID2 = $_POST['idArticle1'];
    $ID3 = $_POST['idArticle2'];

//var_dump($ID3);die();

//echo $artContent2;
    $objConnect = new dbfunction();
    $updateArticlesHome = $objConnect->updDataHomeToDB($artTitle1,$artContent1,$ID1);
    $updateArticlesHome = $objConnect->updDataHomeToDB($artTitle2,$artContent2,$ID2);
    $updateArticlesHome = $objConnect->updDataHomeToDB($artTitle3,$artContent3,$ID3);

    header('Location: index.php');

}
else
{
    echo 'Erreur';
}

