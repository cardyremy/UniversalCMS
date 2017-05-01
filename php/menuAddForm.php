<?php

/**********************************************************
// Societe: ETML
// Auteur:  Cardy Remy
// Date:    16.03.2017
// But:
//*********************************************************/
include_once ("header.inc.php");
header('Content-Type: text/html; charset=utf-8');

$getOption = $_POST['template'];

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
        Add Menu
    </h1>
</div>

<?php

if($getOption==1)
{

?>
        <form action="addToDB.php" name="addMenu" method="post" enctype="multipart/form-data" >
            <div class="row">
                <div class="large-4 columns">
                    <label>Title
                        <input name="title" type="text" placeholder="Menu Title" />
                    </label>
                </div>
            </div>

            <div class="row">
                <div class="large-4 columns">
                    <label>Article Title
                        <input name="artTitle" type="text" placeholder="Article title" />
                    </label>
                </div>
            </div>

            <div class="row">
                <div class="large-12 columns">
                    <label>
                        Article content
                        <textarea name="text" class="tinymce" placeholder="Article Content"></textarea>
                    </label>

                        <input type="file" id="imageFile" name="imageFile" class="file-input">
                    <br>

                    <input type="hidden" value="<?php echo $getOption ?>" name="templateNb">
                    <input class="submit"  type="submit" name="btnArticle" value="Submit" />
                </div>
        </form>

<?php
}
else if($getOption==2)
{
?>
<form action="addToDB.php" name="addMenu" method="post" enctype="multipart/form-data" >

    <div class="row">
        <div class="large-4 columns">
            <label>Title
                <input name="title" type="text" placeholder="Menu Title" />
            </label>
        </div>
    </div>
    <div class="row">
        <div class="large-4 columns">
            <label>Article Title
                <input name="artTitle" type="text" placeholder="Article title" />
            </label>
        </div>
    </div>

    <div class="row">
        <div class="large-12 columns">
            <label>
                Article content
                <textarea name="text" class="tinymce" placeholder="Article Content"></textarea>
            </label>


            <div class="row">
                <div class="large-4 columns">
                    <label>Article Title 2
                        <input name="artTitle2" type="text" placeholder="Article title 2" />
                    </label>
                </div>
            </div>

            <div class="row">
                <div class="large-12 columns">
                    <label>
                        Article content
                        <textarea name="text2" class="tinymce" placeholder="Article Content 2"></textarea>
                    </label>

                </div>

            </div>

            <input type="file" id="imageFile" name="imageFile" class="file-input">
            <br>

            <input type="hidden" value="<?php echo $getOption ?>" name="templateNb">


            <input class="submit"  type="submit" name="btnArticle" value="Submit" />
        </div>
</form>

<?php
}

else if($getOption==3)
{
    ?>

    <form action="addToDB.php" name="addMenu" method="post" enctype="multipart/form-data" >
        <div class="row">
            <div class="large-4 columns">
                <label>Title
                    <input name="title" type="text" placeholder="Menu Title" />
                </label>
            </div>
        </div>

        <div class="row">
            <div class="large-4 columns">
                <label>Article Title
                    <input name="artTitle" type="text" placeholder="Article title" />
                </label>
            </div>
        </div>

        <div class="row">
            <div class="large-12 columns">
                <label>
                    Article content
                    <textarea name="text" class="tinymce" placeholder="Article Content"></textarea>
                </label>


                <div class="row">
                    <div class="large-4 columns">
                        <label>Article Title 2
                            <input name="artTitle2" type="text" placeholder="Article title 2" />
                        </label>
                    </div>
                </div>

                <div class="row">
                    <div class="large-12 columns">
                        <label>
                            Article content 2
                            <textarea name="text2" class="tinymce" placeholder="Article Content 2"></textarea>
                        </label>

                    </div>

                </div>


                <div class="row">
                    <div class="large-4 columns">
                        <label>Article Title 3
                            <input name="artTitle3" type="text" placeholder="Article title 3" />
                        </label>
                    </div>
                </div>

                <div class="row">
                    <div class="large-12 columns">
                        <label>
                            Article content 3
                            <textarea name="text3" class="tinymce" placeholder="Article Content 3"></textarea>
                        </label>

                    </div>

                </div>

                <input type="file" id="imageFile" name="imageFile" class="file-input">
                <br>

                <input type="hidden" value="<?php echo $getOption ?>" name="templateNb">

                <input class="submit"  type="submit" name="btnArticle" value="Submit" />
            </div>
    </form>

    <?php
}
?>

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