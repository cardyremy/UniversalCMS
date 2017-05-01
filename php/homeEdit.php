<?php

/**********************************************************
// Societe: ETML
// Auteur:  Cardy Remy
// Date:    20.03.2017
// But:
//*********************************************************/
include_once ('function.php');

$objConnect = new dbfunction();
$loadArticle = $objConnect->articleHomeSelect();

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
            <p>Image</p>
            <input type="file" id="imageFile" name="imageFile" class="file-input" >
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