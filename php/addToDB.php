<?php
/**
 * Created by PhpStorm.
 * User: Cardyre
 * Date: 17.03.2017
 * Time: 11:54
 */

include_once ('function.php');

$objConnect = new dbfunction();

$idUser = 1;
$menuTitle = $_POST['title'];
$articleDetails = $_POST['text'];
$articleTitle = $_POST['artTitle'];

$insertMenu = $objConnect->InsertMenuInToDB($menuTitle);
$getMenuId = $objConnect->sendMenuId($menuTitle);

$IdNumber = $getMenuId[0]['idMenu'];
//var_dump($IdNumber);

$insertArticle =$objConnect->InsertArticleInToDB($articleTitle,$articleDetails,$IdNumber,$idUser);


//var_dump($IdNumber);
//$insertArticle = $objConnect->InsertArticleInToDB();

//Redirection page d'accueil
header('Location: index.php');
