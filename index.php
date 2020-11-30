<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>News</title>
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/global.css">
</head>
<header>
            <a href="index.php" id="jacksnewsLink"><h1 class="jacksnews">Jacks News</h1></a>
            <!-- Navbar -->
            <div>
                <ul>
                    <li><a class="active" href="index.php">Home</a></li>
                    <li><a href="createpost.php">Beitrag Erstellen</a></li>
                    <li><a href="manage.php">Manage</a></li>
                </ul>
            </div>
            <h1 style="margin-left:30px;margin-top:40px;margin-right:30px">News</h1>
</header>
<body>
    <div id="alleBeiträge">
        <?php
            foreach(glob("textdocuments/*.txt") as $filename) {
            //Ausgabe der gefundenen Dateiname
            $daten = file_get_contents($filename);
            $alles = explode("|||", $daten);

            $datum = $alles[0]; 
            $ueberschrift = $alles[1];
            $author = $alles[2];
            $main = $alles[3];

            $imagefile = str_replace(array("textdocuments/", ".txt"), array("images/", ".jpg"), $filename);

            if (file_exists($imagefile)){
                $image = '<img src="'.$imagefile.'">';
            }else{
                $image = "";      
            }
            echo "<div id='newsbox'>
                <h2 id='ueberschrift'>".$ueberschrift."</h2>
                <h3 id='datum'>".$datum."</h3>
                <hr>
                <h2 id='author'>".$author."</h2>
                <p id='main'>".$main."</p></br>
                <div id='image'>".$image."</div>
                </div>";
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