<?php
$filename = $_GET['fileName'];
unlink($filename);

if (file_exists($filename)){
    echo "Datei wurde nicht gelöscht";
}
else{
    echo "Datei erfolgreich gelöscht!";
}
?>