<?php
/**********************************************************
// Societe: ETML
// Auteur:  Cardy Remy
// Date:    16.03.2017
// But:
//*********************************************************/
session_start();
session_unset();
session_destroy();

header('Location: index.php');