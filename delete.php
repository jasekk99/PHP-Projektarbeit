<?php
$filenameTXT = $_GET['filename'];
//Löscht Text Datei
unlink($filenameTXT);

//Löscht Bild
$filenameIMGtrim = trim($filenameTXT,"textdocuments/.txt");
$filenameIMG = "images/".$filenameIMGtrim.".jpg";
unlink($filenameIMG);

header('Location: manage.php');
?>