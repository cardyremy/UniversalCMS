<?php
/**
 * Created by PhpStorm.
 * User: Cardyre
 * Date: 20.03.2017
 * Time: 09:32
 */

include_once ('function.php');

$idParam = ($_GET['id']);
//var_dump($idParam);
$objConnect = new dbfunction();

$dropData = $objConnect->dropDataMenu($idParam);

$dropDataArticle = $objConnect->dropDataArticle($idParam);

header('Location: index.php');

