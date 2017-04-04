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

<div class="text-center">
    <h1>
        <?php

        for($j=0; $j<count($ArticleLoad); $j++)
        {
            echo $ArticleLoad[$j]['artName'];
        }

        ?>
    </h1>
</div>

<div class="row">
    <div class="medium-12 colums">
        <p>
            <?php

            for($j=0; $j<count($ArticleLoad); $j++)
            {
                echo $ArticleLoad[$j]['artContent'];
            }
            ?>
        </p>
    </div>
</div>

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
//Ajout footer
include_once ("footer.inc.php");

?>


<script src="../js/vendor/jquery.js"></script>
<script src="../js/vendor/what-input.js"></script>
<script src="../js/vendor/foundation.js"></script>
<script src="../js/app.js"></script>
</body>
</html>