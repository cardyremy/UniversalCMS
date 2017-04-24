<?php
/**
 * Created by PhpStorm.
 * User: Cardyre
 * Date: 14.03.2017
 * Time: 11:26
 */

include_once ('function.php');

$idParam = ($_GET['id']);
$objConnect = new dbfunction();
$ArticleLoad = $objConnect ->articleRequestTemplate($idParam);

$artBlock = $objConnect->articleRequestArtBlock($idParam);

$artBlok= $ArticleLoad[0]['artBlock'];

//Ajout header
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
</head>
<body>

<div id="space">

</div>

<?php
if($ArticleLoad[0]['artBlock']!=1)
{
    if($ArticleLoad[0]['artBlock']==3)
    {
        ?>
        <div class="row small-up-1 medium-up-2 large-up-3">

            <?php
            for($i=0;$i<count($ArticleLoad);$i++)
            {
                ?>
                <div class="columns ">
                    <div class="text-center">
                        <h2><?php echo $ArticleLoad[$i]['artName'] //Affiche le nom d'article ?> </h2>
                    </div>
                    <p>
                        <?php
                        echo $ArticleLoad[$i]['artContent'] //affiche le contenu;
                        //var_dump($loadArticle[0]['artContent']);
                        ?>
                    </p>
                </div>
            <?php } ;?>
        </div>
        <?php
    }
    else if($ArticleLoad[0]['artBlock']==2)
    {
        ?>
        <div class="row">

            <?php
            for($i=0;$i<count($ArticleLoad);$i++)
            {
                ?>
                <div class="columns medium-6 ">
                    <div class="text-center">
                        <h2><?php echo $ArticleLoad[$i]['artName'] //Affiche le nom d'article ?> </h2>

                    </div>
                    <p>
                        <?php
                        echo $ArticleLoad[$i]['artContent'] //affiche le contenu;
                        //var_dump($loadArticle[0]['artContent']);
                        ?>
                    </p>
                </div>
            <?php } ;?>
        </div>
        <?php
    }
    else
    {
        ?>

        <div class="row">

            <?php
            for($i=0;$i<count($ArticleLoad);$i++)
            {
                ?>
                <div class="columns medium-12 ">
                    <div class="text-center">
                        <h1><?php echo $ArticleLoad[$i]['artName'] //Affiche le nom d'article ?> </h1>

                    </div>
                    <p>
                        <?php
                        echo $ArticleLoad[$i]['artContent'] //affiche le contenu;
                        //var_dump($loadArticle[0]['artContent']);
                        ?>
                    </p>
                </div>
            <?php } ;?>
        </div>
        <?php
    }
    ?>


    <div class="row">
        <div class="medium-12 colums">
            <p>
                <?php

                for($j=0; $j<count($ArticleLoad); $j++)
                {
                    if(empty($ArticleLoad[$j]['artFiles']))
                    {
                        echo '';
                    }
                    else
                    {
                        echo '<img src="../imagesUpload/'.$ArticleLoad[$j]['artFiles'].'">';

                    }
                }
                ?>
            </p>
        </div>
    </div>
        <?php
}

//Ajout footer
include_once ("footer.inc.php");

?>


<script src="../js/vendor/jquery.js"></script>
<script src="../js/vendor/what-input.js"></script>
<script src="../js/vendor/foundation.js"></script>
<script src="../js/app.js"></script>
</body>
</html>