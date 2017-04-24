<?php
/**
 * Created by PhpStorm.
 * User: Cardyre
 * Date: 14.03.2017
 * Time: 09:17
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
    <link href="../foundation-icons/foundation-icons.css" rel="stylesheet">
    <script src="../js/checkForm.js"></script>
</head>

<body>

<div id="bigSpace">

</div>

<div class="row">
    <div class="large-6 columns medium-centered border-1">
        <div class="signup-panel">
            <p class="welcome"> Create an user account</p>

            <form method="post" action="signUP.php" onclick="verifPseudo()">
                <div class="row collapse">
                    <div class="small-2 columns">
                        <span class="prefix"><i class="fi-torso-female"></i></span>
                    </div>
                    <div class="small-10  columns">
                        <input type="text" name="username"  maxlength="12" placeholder="username">
                    </div>
                </div>
                <div class="row collapse">
                    <div class="small-2 columns">
                        <span class="prefix"><i class="fi-mail"></i></span>
                    </div>
                    <div class="small-10  columns">
                        <input type="text" name="email" placeholder="email">
                    </div>
                </div>

                <div class="row collapse">
                    <div class="small-2 columns ">
                        <span class="prefix"><i class="fi-lock"></i></span>
                    </div>
                    <div class="small-10 columns ">
                        <input type="password"  name="psw" maxlength="12" onblur="verifPseudo(this)" placeholder="password">
                    </div>

                </div>

                <div class="row collapse">
                    <div class="small-2 columns ">

                    </div>

                    <div class="small-10 columns">
                        <div class="g-recaptcha" data-sitekey="6LdzZR4UAAAAAERKGuRUYRfZURQ1Os3WistIZ3ix"></div>
                    </div>

                </div>

                <input class="button expanded"  type="submit" name="btnsignUp" value="Sign Up" />
            </form>

            <p>Already have an account? <a href="loginForm.php">Login here &raquo</a></p>
        </div>
    </div>
</div>

<div id="bigSpace">

</div>

<?php
//Ajout footer
include_once ("footer.inc.php");

?>

<script src="../js/vendor/jquery.js"></script>
<script src="../js/vendor/what-input.js"></script>
<script src="../js/vendor/foundation.js"></script>
<script src="../js/app.js"></script>
<script src='https://www.google.com/recaptcha/api.js'></script>

</body>
</html>