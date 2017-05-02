<?php

$files = $_POST['upload'];

$zip = new zipArchive();

$zip->open("test3.zip", ZipArchive::CREATE);
$zip->addFile("../imagesUpload/0a55c6fe790b506f640f09b73bc7b07f.jpg", "");
//$zip->addFromString("testFile.txt,", "Test");


$zip->close();

?>

