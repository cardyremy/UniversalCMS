<?php
/**
 * Created by PhpStorm.
 * User: Cardyre
 * Date: 14.03.2017
 * Time: 08:23
 */

session_start();

//Inclusion fichiers
include_once ('function.php');

//$username = htmlentities($_POST['strLogin']);

// instanciation de l'objet d'interface a la base de donnees
$objConnect = new dbfunction();
$loadMenuData = $objConnect ->sendMenuRequest();
$userInf = $objConnect->idCheck();
//$loadUserInfo = $objConnect->sendRequestUser($username);


//$menuName = $objConnect->sendMenuName();

?>
<script src="../js/dblClickFunction.js"></script>
<script  src="../js/deleteConfirm.js"></script>
<script src="../js/deleteConfirm.js"></script>

<!--Titre -->
<div class="background2">
    <a href="index.php"><h3>Universal CMS</h3></a>

    <?php
    if(isset($_SESSION["useName"])){

        echo '<a href="userInformation.php"><h6>Bonjour '.strtoupper($_SESSION["useName"]).'</h6></a>';
    }
    else
    {
        if(empty($_GET['msg']))
        {
            echo '';
        }
        else
        {
            echo '<h6>'.$_GET['msg'].'</h6>';
        }
    }
    ?>
</div>

<div class="background2">
    <div class="row">

        <?php
        //
        if(isset($_SESSION['useRights'])&& $_SESSION["useRights"] == 2 ) {
            if (isset($_GET['id'])) {

                $menuName = $objConnect->sendMenuName($_GET['id']);

            }
            ?>

        <a href="chooseTemplate.php"><img src="../img/add2.png" style="height: 30px; width: 30px"><b style="color: white">Ajout</b> </a>
        <a href="editForm.php?id=<?php echo $_GET['id'];?>"><img src="../img/edit2.png" style="height: 25px; width: 25px" alt="info"><b style="color: white">Edition</b></a>
        <a onclick=" return deleteConf('<?php if (isset($_GET['id'])) { echo $menuName[0]['menName']; }?>');" href="deleteMenuArticle.php?id=<?php echo $_GET['id']; ?>" ><img src="../img/delete.png" style="height: 25px; width: 25px"><b style="color: white">Supression</b></a>

        <?php
        }
        ?>

        <div class="medium-8 columns ">

            <a onclick="" href="index.php?id=1" class="button"><b>Home</b></a>
            <?php
            //
            /*
            if(isset($_SESSION['useRights']))
            {
                if($_SESSION["useRights"] == 2)
                {
                   echo'<a href="homeEdit.php" class="button" style="background: red"><img src="../img/Edit-icon.png" style="height: 14px;width: 14px;float: right"><b>Edition page Home</b> </a>';
                }
            }
            ?>
            <?php
            */
            if(isset($_SESSION['useRights'])&& $_SESSION["useRights"] > 0 )
            {
            ?>

            <a href="news.php" class="button"><b>News</b></a>

            <?php

            }
            $countMenuData = count($loadMenuData);
            //Parcourt la base de donnée
            for($i=0;$i< $countMenuData;$i++)
            {
            ?>

            <a href="templateNewPages.php?id=<?php echo $loadMenuData[$i]['idMenu'];?>" class="button"><b><?php echo $loadMenuData[$i]['menName'];?></b></a>

            <?php  } ?>

                <!--<a href="news.php" class="button"><b>News</b></a> -->

        </div>

        <div class="medium-1 columns text-right">
            <?php
            if(!isset($_SESSION["useName"])){
                echo '<a href="loginForm.php" class="button"><b>Login</b></a>';
            } else {

                echo '<a href="deconnection.php" class="button"><b>LogOut</b></a>';
            }

            ?>

        </div>

    </div>

</div>
