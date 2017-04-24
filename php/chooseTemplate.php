<?php
/**
 * Created by PhpStorm.
 * User: Cardyre
 * Date: 06.04.2017
 * Time: 10:43
 */
//inclusion header
include_once ("header.inc.php");
header('Content-Type: text/html; charset=utf-8');

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
       Choose template
    </h1>

</div>

<div class="row">
    <form action="menuAddForm.php" method="post">
        <select name="template">
            <option  value="1">1 Article </option>
            <option  value="2">2 Articles </option>
            <option  value="3">3 Articles </option>
        </select>
        <input type="submit" value="choose">
    </form>

</div>
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