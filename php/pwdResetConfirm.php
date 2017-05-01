<?php

/**********************************************************
// Societe: ETML
// Auteur:  Cardy Remy
// Date:    24.03.2017
// But:     Forme avec les champs du nouveau mot de passe
//*********************************************************/
include_once ('function.php');

$objConnect = new dbfunction();

$username= $_GET['username'];
$key = $_GET['key'];
?>

<?php

$loadDataUser = $objConnect->selectForControlUser($username);

if($loadDataUser[0]['useKey'] == $key)
{
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

</head>

<body>

<div id="bigSpace">

</div>

<div class="row">
    <div class="large-6 columns medium-centered border-1">
        <div class="signup-panel">
            <p class="welcome"> Reset your password</p>

            <form method="post" action="newPsd.php">

                <div class="row collapse">
                    <div class="small-2 columns ">
                        <span class="prefix"><i class="fi-lock"></i></span>
                    </div>
                    <div class="small-10 columns ">
                        <input type="password" name="psw" maxlength="12" placeholder="password">
                    </div>
                </div>
                <div class="row collapse">
                    <div class="small-2 columns ">
                        <span class="prefix"><i class="fi-lock"></i></span>
                    </div>
                    <div class="small-10 columns ">
                        <input type="password" name="psw2" maxlength="12" placeholder="Enter again the password">
                    </div>
                </div>
                <input  name="key" type="hidden" value="<?php echo $key ?>" />
                <input class="button expanded"  type="submit" name="btnsignUp" value="Reset" />
            </form>
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
</body>
</html>


<?php }
else
{
    echo'Erreur';
}

