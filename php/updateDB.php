<?php
/**
 * Created by PhpStorm.
 * User: Cardyre
 * Date: 21.03.2017
 * Time: 09:10
 */

include_once ('function.php');

mb_internal_encoding('UTF-8');

$objConnect = new dbfunction();

$idUser = 1;
$menuTitle = $_POST['title'];
$articleDetails = $_POST['text'];
$articleTitle = $_POST['artTitle'];
$id = $_GET['id'];


//var_dump($updtArticleData);

// Constantes
define('TARGET', '../imagesUpload/');    // Repertoire cible
define('MAX_SIZE', 100000000000);                         // Taille max en octets du fichier
define('WIDTH_MAX', 200000000);                           // Largeur max de l'image en pixels
define('HEIGHT_MAX', 200000000);                          // Hauteur max de l'image en pixels

// Tableaux de donnees
$tabExt = array('jpg','gif','png','jpeg');          // Extensions autorisees
$infosImg = array();

// Variables
$extension = '';
$message = '';
$nomImage = '';

//Créer et vérifie le repertoire
if( !is_dir(TARGET) ) {
    if( !mkdir(TARGET, 0755) ) {
        exit('Erreur : le répertoire cible ne peut-être créé ! Vérifiez que vous disposez des droits suffisants pour le faire ou créez le manuellement !');
    }
}
/************************************************************
 * Script d'upload
 *************************************************************/

if(!empty($_POST))
{
    // On verifie si le champ est rempli
    if(!empty($_FILES['imageFile']['name']))
    {
        // Recuperation de l'extension du fichier
        $extension  = pathinfo($_FILES['imageFile']['name'], PATHINFO_EXTENSION);

        // On verifie l'extension du fichier
        if(in_array(strtolower($extension),$tabExt))
        {
            // On recupere les dimensions du fichier
            $infosImg = getimagesize($_FILES['imageFile']['tmp_name']);

            // On verifie le type de l'image
            if($infosImg[2] >= 1 && $infosImg[2] <= 14)
            {
                // On verifie les dimensions et taille de l'image
                if(($infosImg[0] <= WIDTH_MAX) && ($infosImg[1] <= HEIGHT_MAX) && (filesize($_FILES['imageFile']['tmp_name']) <= MAX_SIZE))
                {
                    // Parcours du tableau d'erreurs
                    if(isset($_FILES['imageFile']['error'])
                        && UPLOAD_ERR_OK === $_FILES['imageFile']['error'])
                    {
                        // On renomme le fichier
                        $nomImage = md5(uniqid()) .'.'. $extension;

                        // Si c'est OK, on teste l'upload
                        if(move_uploaded_file($_FILES['imageFile']['tmp_name'], TARGET.$nomImage))
                        {
                            // echo $message = 'Upload réussi !';
                        }
                        else
                        {
                            // Sinon on affiche une erreur systeme
                            echo $message = 'Problème lors de l\'upload !';
                        }
                    }
                    else
                    {
                        // Sinon on affiche un erreur interne
                        echo $message = 'Une erreur interne a empêché l\'uplaod de l\'image';
                    }
                }
                else
                {
                    // Sinon erreur sur les dimensions et taille de l'image
                    echo $message = 'Erreur dans les dimensions de l\'image !';
                }
            }
            else
            {
                // Sinon erreur sur le type de l'image
                echo $message = 'Le fichier à uploader n\'est pas une image !';
            }
        }
        else
        {
            // Sinon on affiche une erreur pour l'extension
            echo $message = 'L\'extension du fichier est incorrecte !';
        }
    }
    else
    {
        // Sinon on affiche une erreur pour le champ vide
        echo $message = 'Veuillez remplir le formulaire svp !';
    }

}

// chemin de l'image
$imgRoute= $nomImage;

// Met dans la variable $InsertNewAlbum la requete se trouvant dans la page de connection à la base données et de requêtes.

if(empty($imgRoute))
{

    $updArticleData = $objConnect->updDataToDB($articleTitle,$articleDetails,$imgRoute=null,$id);
    $uptMenuTitle = $objConnect->updMenuTitleToDB($menuTitle,$id);
}
else
{

    $updArticleData = $objConnect->updDataToDB($articleTitle,$articleDetails,$imgRoute,$id);
    $uptMenuTitle = $objConnect->updMenuTitleToDB($menuTitle,$id);
}

header('Location: index.php');

