<?php
/**
 * Created by PhpStorm.
 * User: Cardyre
 * Date: 13.03.2017
 * Time: 15:02
 */
include_once ('function.php');

$objconnect = new dbfunction();

$loadArticle = $objconnect ->articleRequest();




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

<?php

//Ajout du header
include_once ("header.inc.php");

//$pass= password_hash('.Etml-',PASSWORD_DEFAULT);
//var_dump($pass);

?>

<div id="space">

</div>

<div class="row small-up-1 medium-up-2 large-up-3">
    <div class="columns">
        <h4><?php echo $loadArticle[0]['artName'] ?> </h4>
        <p>
            <?php
            echo $loadArticle[0]['artContent'];
            //var_dump($loadArticle[0]['artContent']);
            ?>
        </p>
    </div>

    <div class="columns">
        <h4><?php echo $loadArticle[1]['artName'] ?> </h4>

        <p>
            <?php
            echo $loadArticle[1]['artContent'];
            //var_dump($loadArticle[0]['artContent']);
            ?>
        </p>
    </div>

    <div class="columns">

        <h4>Test</h4>

        <p>
            Bla bla
        </p>
    </div>

</div>

<div class="text-center">
    <img src="../img/paysage.jpeg">
</div>


<div class="background3">

</div>

<?php

//Ajout du footer
include_once ("footer.inc.php");

?>


<script src="../js/vendor/jquery.js"></script>
<script src="../js/vendor/what-input.js"></script>
<script src="../js/vendor/foundation.js"></script>
<script src="../js/app.js"></script>
</body>
</html>
