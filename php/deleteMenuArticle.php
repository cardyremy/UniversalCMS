<?php
/**********************************************************
// Societe: ETML
// Auteur:  Cardy Remy
// Date:    20.03.2017
// But:
//*********************************************************/
include_once ('function.php');

$idParam = ($_GET['id']);
//var_dump($idParam);

// instanciation de l'objet d'interface a la base de donnees
$objConnect = new dbfunction();


$articleRigthCheck = $objConnect->articleRequestTemplate($idParam);

//Empeche la suppression des articles de la page home
if($articleRigthCheck[0]['artBlock']==1)
{
    echo 'Impossible de supprimer les articles de la page home !';
    header('Refresh:1 index.php');
}
//Supprime les articles qui on la valeur 2 dans le artBlock
else if ($articleRigthCheck[0]['artBlock']==2)
{
    $artBlock =2;
    $dropData = $objConnect->dropDataMenu($idParam);

    //$dropDataArticle = $objConnect->dropDataArticle($idParam);
    $dropAllArticles = $objConnect->deleteAllArticles($artBlock,$idParam);
    header('Location: index.php');
}
//Supprime les articles qui on la valeur 3 dans le artBlock
else if ($articleRigthCheck[0]['artBlock']==3)
{
    $artBlock =3;
    $dropData = $objConnect->dropDataMenu($idParam);

    $dropAllArticles = $objConnect->deleteAllArticles($artBlock,$idParam);
    header('Location: index.php');
}
//Effectue la suppresion pour le reste d'articles
else
{
    $dropData = $objConnect->dropDataMenu($idParam);
    $dropAllArticles = $objConnect->dropDataArticle($idParam);
    header('Location: index.php');

}

