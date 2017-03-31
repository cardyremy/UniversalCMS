<?php
/**
 * Created by PhpStorm.
 * User: Cardyre
 * Date: 14.03.2017
 * Time: 08:35
 */

header('Content-Type: text/html; charset=utf-8');

include_once ("function.php");

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

<div id="bigSpace">

</div>

<div class="row">
    <div class="medium-6 medium-centered large-4 large-centered columns border-1">

        <form method="POST" action="login.php" id="login" name="formLogin">

            <div class="row column log-in-form">
                <h4 class="text-center">Log in with your username</h4>
                <label>Username
                    <input name="strLogin" type="text" placeholder="Username">
                </label>
                <label>Password
                    <input id="pwd" name="pwd" type="password" placeholder="Password">
                </label>
                <input id="show-password" type="checkbox"><label for="show-password">Show password</label>
                <input class="button expanded"  type="submit" name="btnLogin" value="Log In" />
                <p class="text-center"><a href="forgotPasswordForm.php">Forgot your password?</a></p>
                <p class="text-center"><a href="createAccount.php">Create an account</a></p>
            </div>
        </form>

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

<script type="text/javascript" src="../js/showPwd.js"></script>
<!--   -->


</body>
</html>