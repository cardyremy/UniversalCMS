<?php

/**********************************************************
// Societe: ETML
// Auteur:  Cardy Remy
// Date:    14.03.2017
// But:
//*********************************************************/
?>

<!--Footer -->
<footer>

    <!--Copiright -->
    <div class="row expanded callout secondary text-center ">


        <div class="row">
            <div class="medium-3 columns text-center">
                <a href="contact.php"><p>Contact</p></a>
            </div>
            <div class="medium-3 columns text-center">
                <a href="aboutUs.php"><p>About us</p></a>
            </div>

            <div class="medium-3 columns text-center">
                <a href="news.php"><p>News</p></a>
            </div>

            <?php
            if(!isset($_SESSION["useName"])){
                echo '
                    <div class="medium-3 columns text-center">
                        <a href="loginForm.php"><p>Login</p></a>
                    </div>
                    ';

            } else {

                echo '<div class="medium-3 columns text-center">
                        <a href="deconnection.php"><p>LogOut</p></a>
                      </div>

                        ';
            }

            ?>

        </div>

    </div>

    <!--Réseaux sociaux logos  -->
    <div class="medium-12 columns text-center ">
        <a href="https://plus.google.com"><img src="../img/google.png" style="width: 50px;height: 50px"></a>
        <a href="https://fr-fr.facebook.com/"><img src="../img/face.png" style="width: 50px;height: 50px"></a>
        <a href="https://fr.pinterest.com/"><img src="../img/pinterest.png" style="width: 50px;height: 50px"></a>
        <a href="https://www.instagram.com"><img src="../img/insta.png" style="width: 50px;height: 50px"></a>
        <a href="https://twitter.com"><img src="../img/twitter.png" style="width: 50px;height: 50px"></a>
    </div>




</footer>
