<?php
/**
 * Created by PhpStorm.
 * User: Cardyre
 * Date: 14.03.2017
 * Time: 08:23
 */

session_start();
?>
<!--Titre -->
<div class="background2">
    <a href="index.php"><h3>Universal CMS</h3></a>
    <?php
    if(isset($_SESSION["useName"])){

        echo '<h6>Bonjour '.$_SESSION["useName"].'</h6>';
    }

    ?>
</div>

<div class="background2">
    <div class="row">

        <!--Liens acceuil et news -->
        <div class="medium-6 columns ">

                <a href="index.php" class="button"><b>Home</b></a>
                <a href="news.php" class="button"><b>News</b></a>

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
