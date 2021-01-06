<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage</title>
    <link rel="stylesheet" href="css/manage.css">
    <link rel="stylesheet" href="css/global.css">
</head>
<header>
            <a href="index.php" id="jacksnewsLink"><h1 class="jacksnews">Jacks News</h1></a>
            <!-- Navbar -->
            <div>
                <ul>
                    <li><a href="index.php">News</a></li>
                    <li><a href="createpost.php">Beitrag Erstellen</a></li>
                    <li><a class="active" href="manage.php">Manage</a></li>
                </ul>
            </div>
            <h1 style="margin-left:30px;margin-top:40px">Manage</h1>
</header>
<body>
    <div>
    
    </div>
    <div id="alleBeiträge">
        <?php
            foreach(glob("textdocuments/*.txt") as $filename) {
                
            //Ausgabe der gefundenen Dateiname
            $daten = file_get_contents($filename);
            $alles = explode("|||", $daten);

            //Setzt Variablen für alle Elemente des .txt Datei
            $datum = $alles[0]; 
            $ueberschrift = $alles[1];
            $author = $alles[2];
            $main = $alles[3];
            
            //Kreiert einen Edit Link mit variablen $daten und $filename als GET
            $edit = "<a href='edit.php?postContents=".$daten."&fileName=".$filename."'><button class='edit'>Edit</button></a>";
            //Kreiert einen Delete Button welches den Beitrag löscht (.txt und Bild Datei werden im Verzeichnis gelöscht)
            $deleteButton = "<a href='delete.php?filename=".$filename."'><button class='delete'>Delete</button></a>";

            $filenameTRIM = trim($filename,"textdocuments/");
            $filenameFinal = $filenameTRIM."txt";
            
            //Image
            $imagefile = str_replace(array("textdocuments/", ".txt"), array("images/", ".jpg"), $filename);
            if (file_exists($imagefile)){
                $image = '<img class="imageManage" src="'.$imagefile.'">';
            }else{
                $image = "";      
            }

            echo "<div class='newsbox'>
                <h2 class='ueberschrift'>".$ueberschrift."</h2>
                <h3 class='filename'>".$filenameFinal."</h3>
                <h3 class='datum'>".$datum."</h3>
                <h2 class='author'>".$author."<br>".$image."</h2><br><br>"
                .$edit.$deleteButton."</div>";
            }
        ?>
    </div>
<footer>
    <div id="footer-copyright">
        <u>Copyright©  - Jack Green</u>
    </div>
</footer>
</body>
</html>