<?php
/**
 * Created by PhpStorm.
 * User: Cardyre
 * Date: 13.03.2017
 * Time: 15:02
 */
//Inclusion fichiers
include_once ('function.php');

// instanciation de l'objet d'interface a la base de donnees
$objconnect = new dbfunction();

//Selection de tout dans la table t_article
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
    <div class="columns ">
        <h4><?php echo $loadArticle[0]['artName'] //Affiche le nom d'article ?> </h4>
        <p>
            <?php
            echo $loadArticle[0]['artContent'] //affiche le contenu;
            //var_dump($loadArticle[0]['artContent']);
            ?>
        </p>
    </div>

    <div class="columns ">
        <h4><?php echo $loadArticle[1]['artName'] //affiche le nom d'article ?> </h4>

        <p>
            <?php
            echo $loadArticle[1]['artContent'] //affiche le contenu de l'article;
            //var_dump($loadArticle[0]['artContent']);
            ?>
        </p>
    </div>

    <div class="columns">

        <h4>Test</h4>

        <p>
            Nemo quaeso miretur, si post exsudatos labores itinerum longos congestosque adfatim commeatus fiducia vestri ductante barbaricos pagos adventans velut mutato repente consilio ad placidiora deverti.

            Alii nullo quaerente vultus severitate adsimulata patrimonia sua in inmensum extollunt, cultorum ut puta feracium multiplicantes annuos fructus, quae a primo ad ultimum solem se abunde iactitant possidere, ignorantes profecto maiores suos, per quos ita magnitudo Romana porrigitur, non divitiis eluxisse sed per bella saevissima, nec opibus nec victu nec indumentorum vilitate gregariis militibus discrepantes opposita cuncta superasse virtute.

            Ciliciam vero, quae Cydno amni exultat, Tarsus nobilitat, urbs perspicabilis hanc condidisse Perseus memoratur, Iovis filius et Danaes, vel certe ex Aethiopia profectus Sandan quidam nomine vir opulentus et nobilis et Anazarbus auctoris vocabulum referens, et Mopsuestia vatis illius domicilium Mopsi, quem a conmilitio Argonautarum cum aureo vellere direpto redirent, errore abstractum delatumque ad Africae litus mors repentina consumpsit, et ex eo cespite punico tecti manes eius heroici dolorum varietati medentur plerumque sospitales.
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
