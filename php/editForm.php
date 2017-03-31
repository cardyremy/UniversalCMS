<?php
/**
 * Created by PhpStorm.
 * User: Cardyre
 * Date: 20.03.2017
 * Time: 08:38
 */

include_once ('function.php');

$objConnect = new dbfunction();
$idMenu = $_GET['id'];

$loadArtData = $objConnect->articleRequestTemplate($idMenu);
$loadMenData = $objConnect->getMenuDataFromID($idMenu);


$articleRigthCheck = $objConnect->articleRequestTemplate($idMenu);

if($articleRigthCheck[0]['artBlock'] != 1)
{
    include_once ("header.inc.php");

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

        <script type="text/javascript" src="../js/jquery.min.js"></script>
        <script type="text/javascript" src="../plugins/tinymce/tinymce.min.js"></script>
        <script type="text/javascript" src="../js/init-tinymce.js"></script>
    </head>
    <body>

    <div id="space">

    </div>

    <div class="text-center">
        <h1>
            Edit Menu
        </h1>
    </div>

    <div class="row">
        <div class="large-4 columns">
            <label>Title
                <input name="title" type="text" placeholder="Menu Title" value="<?php echo $loadMenData[0]['menName'] ?>" />
            </label>
        </div>
    </div>

    <div class="row">
        <div class="large-4 columns">
            <label>Article Title
                <input name="artTitle" type="text" placeholder="Article title" value="<?php echo $loadArtData[0]['artName'] ?>" />
            </label>
        </div>
    </div>

    <div class="row">
        <div class="large-12 columns">
            <label>
                Article content
                    <textarea name="text" class="tinymce" placeholder="Article Content">
                        <?php echo $loadArtData[0]['artContent'];?>
                    </textarea>
            </label>

            <input type="file" id="imageFile" name="imageFile" class="file-input" >
            <br>

            <input class="submit" type="submit" name="btnArticle" value="Save" />
        </div>

        <form action="updateDB.php?id=<?php echo $idMenu ?>" name="addMenu" method="post" enctype="multipart/form-data" ></form>

    <div id="bigSpace">

    </div>
    <div id="bigSpace">

    </div>
    </div>

    <?php
    //Ajout footer
    include_once ("footer.inc.php");

    ?>

    <script src="../js/vendor/jquery.js"></script>
    <script src="../js/vendor/what-input.js"></script>
    <script src="../js/vendor/foundation.js"></script>
    <script src="../js/app.js"></script>
    </body>
    </html>

<?php }
else
{
    header('Location: index.php');
}
?>