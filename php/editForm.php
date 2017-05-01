<?php
/**********************************************************
// Societe: ETML
// Auteur:  Cardy Remy
// Date:    20.03.2017
// But:
//*********************************************************/
//inclusion fichiers
include_once ('function.php');
include_once ('header.inc.php');

// instanciation de l'objet d'interface a la base de donnees
$objConnect = new dbfunction();
$idMenu = $_GET['id'];
$tawoArticles = 2;

$loadArtData = $objConnect->articleRequestTemplate($idMenu);
$loadMenData = $objConnect->getMenuDataFromID($idMenu);

$articleRigthCheck = $objConnect->articleRequestTemplate($idMenu);
$artBlockCheck = $objConnect->articleRequestArtBlock($idMenu);

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

<?php
if($idMenu==1)
{
    $loadArticle = $objConnect->articleHomeSelect();

    ?> <div id="space">

    </div>

    <div class="text-center">
        <h1>
    Edit Home Articles
    </h1>

    </div>

    <form action="updateHome.php" name="addMenu" method="post" enctype="multipart/form-data" >
        <div class="row">
    <?php

    for($i=0;$i<count($loadArticle);$i++)
    {
        ?>

        <div class="columns">
            <label>Article Title<?php echo $i+1 ?>
                <input name="artTitle<?php echo $i ?>"  type="text" placeholder="Article title" value="<?php echo $loadArticle[$i]['artName']; ?>" />
            </label>
        </div>
        <div class="columns">
            <label>
                Article content
                    <textarea name="text<?php echo $i ?>" class="tinymce" placeholder="Article Content">
                        <?php echo $loadArticle[$i]['artContent']; ?>
                    </textarea>
            </label>
        </div>
        <input type="hidden" value="<?php echo $loadArticle[$i]['idArticle']; ?>" name="idArticle<?php echo $i ?>">

    <?php } ?>
        <div class="columns">
            <!--
            <p>Image</p>
            <input type="file" id="imageFile" name="imageFile" class="file-input" >
            -->
            <br>
            <input class="submit" type="submit" name="btnArticle" value="Save" />
        </div>

        </div>
        </div>
        </form>

        <div id="bigSpace">

        </div>
        <div id="bigSpace">

        </div>
        </div>
        </body>
        <?php

        //Ajout footer
        include_once ("footer.inc.php");

}
else if($articleRigthCheck[0]['artBlock']==3)
{

    ?> <div id="space">

</div>

    <div class="text-center">
        <h1>
            Edit Home Articles
        </h1>

    </div>

    <form action="updateThreeArticles.php?id=<?php echo $idMenu?>" name="addMenu" method="post" enctype="multipart/form-data" >
        <div class="row">

            <div class="large-4 columns">
                <label>Title
                    <input name="title" type="text" placeholder="Menu Title" value="<?php echo $loadMenData[0]['menName'] ?>" />
                </label>
            </div>

            <?php

            $threeArticles =3;

            $loadArtForArtBlock = $objConnect->artSelectWhithArtBlock($threeArticles,$idMenu);
            for($i=0;$i<count($loadArtForArtBlock);$i++)
            {
                ?>

                <div class="columns">
                    <label>Article Title<?php echo $i+1 ?>
                        <input name="artTitle<?php echo $i ?>"  type="text" placeholder="Article title" value="<?php echo $loadArtForArtBlock[$i]['artName']; ?>" />
                    </label>
                </div>
                <div class="columns">
                    <label>
                        Article content
                    <textarea name="text<?php echo $i ?>" class="tinymce" placeholder="Article Content">
                        <?php echo $loadArtForArtBlock[$i]['artContent']; ?>
                    </textarea>
                    </label>
                </div>
                <input type="hidden" value="<?php echo $loadArtForArtBlock[$i]['idArticle']; ?>" name="idArticle<?php echo $i ?>">

            <?php } ?>
            <div class="columns">

                <p>Image</p>
                <input type="file" id="imageFile" name="imageFile" class="file-input" >

                <br>
                <input class="submit" type="submit" name="btnArticle" value="Save" />
            </div>
            <div class="row">
                <div class="columns">
                    <img src="../imagesUpload/<?php echo $loadArtData[0]['artFiles'];?>">
                </div>
            </div>
        </div>

    </form>

    <div id="bigSpace">

    </div>
    <div id="bigSpace">

    </div>
    </div>

    </body>
<?php

//Ajout footer
include_once ("footer.inc.php");
}
else if($articleRigthCheck[0]['artBlock']==2)
{
echo "tim 2";

?> <div id="space">

</div>

    <div class="text-center">
        <h1>
            Edit Home Articles
        </h1>

    </div>

    <form action="updateTwoArticles.php?id=<?php echo $loadMenData[0]['idMenu'] ?>" name="addMenu" method="post" enctype="multipart/form-data" >
        <div class="row">

            <div class="large-4 columns">
                <label>Title
                    <input name="title" type="text" placeholder="Menu Title" value="<?php echo $loadMenData[0]['menName'] ?>" />
                </label>
            </div>

            <?php
            $threeArticles =2;

            $loadArtForArtBlock = $objConnect->artSelectWhithArtBlock($threeArticles,$idMenu);
            for($i=0;$i<count($loadArtForArtBlock);$i++)
            {
                ?>
                <div class="columns">
                    <label>Article Title<?php echo $i+1 ?>
                        <input name="artTitle<?php echo $i ?>"  type="text" placeholder="Article title" value="<?php echo $loadArtForArtBlock[$i]['artName']; ?>" />
                    </label>
                </div>
                <div class="columns">
                    <label>
                        Article content
                    <textarea name="text<?php echo $i ?>" class="tinymce" placeholder="Article Content">
                        <?php echo $loadArtForArtBlock[$i]['artContent']; ?>
                    </textarea>
                    </label>
                </div>
                <input type="hidden" value="<?php echo $loadArtForArtBlock[$i]['idArticle']; ?>" name="idArticle<?php echo $i ?>">

            <?php } ?>
            <div class="columns">

                <p>Image</p>
                <input type="file" id="imageFile" name="imageFile" class="file-input" >

                <br>
                <input class="submit" type="submit" name="btnArticle" value="Save" />
            </div>

            <div class="row">
                <div class="columns">
                    <img src="../imagesUpload/<?php echo $loadArtData[0]['artFiles'];?>">
                </div>
            </div>
        </div>
        </div>
    </form>

    <div id="bigSpace">

    </div>
    <div id="bigSpace">

    </div>
    </div>
    </body>
<?php

//Ajout footer
include_once ("footer.inc.php");
}


else // ($articleRigthCheck[0]['artBlock'] != 1)
{
    ?>

    <div id="space">

    </div>
    <div class="text-center">
        <h1>
            Edit Menu
        </h1>
    </div>

    <div class="row">
        <form action="updateDB.php?id=<?php echo $idMenu?>" name="addMenu" method="post" enctype="multipart/form-data" >
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

        </form>
        </div>
    <br>

    <div class="row">
            <div class="columns">
                <img src="../imagesUpload/<?php echo $loadArtData[0]['artFiles'];?>">
            </div>
        </div>
    <div id="bigSpace">

    </div>
    <div id="bigSpace">

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

<?php
}

?>