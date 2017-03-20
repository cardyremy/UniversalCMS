<?php
/**
 * Created by PhpStorm.
 * User: Cardyre
 * Date: 16.03.2017
 * Time: 15:31
 */

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

<div class="text-center">
    <h1>
        Add Menu
    </h1>

</div>
    <form action="addToDB.php" method="post">
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
                    <textarea name="text" placeholder="Article Content"></textarea>
                </label>
                <input class="button"  type="submit" name="btnArticle" value="Submit" />
            </div>
    </form>

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