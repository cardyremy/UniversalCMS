<?php
/**
 * Created by PhpStorm.
 * User: Cardyre
 * Date: 13.03.2017
 * Time: 15:02
 */
//Inclusion fichiers
include_once ('function.php');
include_once ("header.inc.php");

// instanciation de l'objet d'interface a la base de donnees
$objConnect = new dbfunction();
$userName = $_SESSION['useName'];
$loadUserInf = $objConnect->sendRequestUser($userName);
$loadAllInfoUser = $objConnect->selectAllUser();

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
<div class="row">
    <div class="medium-12 colums">
        <p>
            <?php
            $useEmail = $loadUserInf[0]['useEmail'];

            echo "Nom de l'utilisateur: " .$userName. '<br>' ;
            echo "Adresse Email: " .$useEmail."<br>";

            if($loadUserInf[0]['useRights'] == 2)
            {
                echo 'Vous avez les droits de lecture,modification, suppression';
            }
            else if($loadUserInf[0]['useRights'] > 0)
            {
                echo 'Vous avez seulement les droits de lecture';
            }

            ?>
        </p>

        <?php
        if($_SESSION['useName']== 'admin')
        {
        ?>
        <p>
            Veuillez choisir un utilisateur et cochez les droits :
        </p>
        <form method="post" action="updateUserRights.php">

            <select name="use">
                <?php for($i=0;$i<count($loadAllInfoUser);$i++)
                {?>
                    <option value="<?php echo $loadAllInfoUser[$i]['useName'] ?>" >
                       <?php
                            echo $loadAllInfoUser[$i]['useName'];
                       ?>
                       </option>
                <?php } ?>
            </select>
            <input type="radio" name="option" value="2"
            <?php
            if($_SESSION['useRights']==2)
            {
                ?>
                checked="checked"
            <?php
            }
            ?>
            ><label>Modification/Supression</label><br>
            <input type="radio" name="option" value="1"><label>Lecture</label><br>
        <input type="submit" value="Save">
        </form>

        <?php }
        else
        {
            echo "";
        }
        ?>
    </div>
</div>
<div id="space">

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
