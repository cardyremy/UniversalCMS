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

?>

<!--Titre -->
<div class="background2">
    <a href="index.php"><h3>Universal CMS</h3></a>
    <?php
    if(isset($_SESSION["useName"])){

        echo '<h6>Bonjour '.$_SESSION["useName"].'</h6>';
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
        if(isset($_SESSION['useRights'])&& $_SESSION["useRights"] == 1 )
        {
            ?>
        <a href="menuAddForm.php"><img src="../img/add2.png" style="height: 30px; width: 30px"></a>
        <a href="editForm.php?id=<?php echo $_GET['id'];?>"><img src="../img/edit2.png" style="height: 25px; width: 25px" alt="info"></a>
        <a href="deleteMenuArticle.php?id=<?php echo $_GET['id']; ?>"><img src="../img/delete.png" style="height: 25px; width: 25px"></a>

        <?php
        }
        ?>

        <div class="medium-8 columns ">

            <a href="index.php" class="button"><b>Home</b></a>
            <a href="news.php" class="button"><b>News</b></a>

            <?php
            $countMenuData = count($loadMenuData);
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
