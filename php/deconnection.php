<?php
/**
 * Created by PhpStorm.
 * User: Cardyre
 * Date: 16.03.2017
 * Time: 09:20
 */

session_start();
session_unset();
session_destroy();

header('Location: index.php');