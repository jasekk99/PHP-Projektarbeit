<?php
    //Liest Varuablen aus dem URL
    $daten = $_GET['postContents'];
    $filenameCurrent = $_GET['fileName'];
    //Teilt alle Elemente des Posts auf
    $alles = explode("|||", $daten);

    $datum = $alles[0]; 
    $ueberschrift = $alles[1];
    $author = $alles[2];
    $main = $alles[3];

    //Trimmt das Verzeichnis von $filenameCurrent sodass nur die Dateiname bleibt
    $filenameTrim = trim($filenameCurrent,"textdocuments/.");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/create-edit.css">
    <link rel="stylesheet" href="css/global.css">
    <title>Edit | <?php echo $ueberschrift ?></title>
</head>
<header>
            <a href="index.php" id="jacksnewsLink"><h1 class="jacksnews">Jacks News</h1></a>
            <!-- Navbar -->
            <div>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="createpost.php">Beitrag Erstellen</a></li>
                    <li><a href="manage.php">Manage</a></li>
                </ul>
            </div>
            <h1 style="margin-left:30px;margin-top:40px">Beitrag "<?php echo "<div style='color:#cc3333; display: inline;'>".$ueberschrift."</div>" ?>" Bearbeiten</h1>
</header>
    <body>
        <div class="formular">
            <form enctype="multipart/form-data" action="" method="post">
                <label><h3>Datei Name</h3>
                <input type="text" name="filenameEdit" value="<?php echo $filenameTrim ?>" class="filename" required>
                </label>

                <label><h3>Author</h3>
                <input type="text" name="author" value="<?php echo $author ?>" class="author" required>
                </label>
                    
                <label><h3>Überschrift</h3>
                <input type="text" name="ueberschrift" value="<?php echo $ueberschrift ?>" class="ueberschrift" required>
                </label>

                <textarea type="textarea" name="message" class="messagebox" required required rows="10" maxlength="2000" spellcheck><?php echo $main ?></textarea><br>

                <h2>Upload Image</h2>
                <input type="file" name="file" required><br>
                <input type="submit" name="submit" class="submit">
                </form>
            </div>
<?php
 if(isset($_POST['submit'])){
            /*$filenameNew = $_POST['filenameEdit'];
            /*Lädt Bild hoch*/
            /*$file= $_FILES['file'];
	        $fileName= $_FILES['file']['name'];
	        $fileTmpName= $_FILES['file']['tmp_name']; 
	        $fileFehler= $_FILES['file']['error']; 
            $fileTyp= $_FILES['file']['type'];
            $fileGroesse= $_FILES['file']['size'];
            
            $fileZiel1 = "images/".$filenameCurrent.".jpg";
            $fileArt = explode('.',$filenameCurrent);
            $fileActualExt= strtolower(end($fileArt));
            unlink($fileNameSplit);


            if($fileActualExt === "jpg") {            
                if($fileFehler=== 0) {                           
                    if($fileGroesse< 10000000) { 
                        $fileZiel2 = "images/".$filenameNew.".jpg";
                        move_uploaded_file($fileTmpName, $fileZiel2);
            }else{
                echo"Das File ist zu gross !";
            }
                }else{
                    echo "Es gab einen Fehler, es tut uns leid !";
                }
                    }else{
                        echo "Ihr Bild muss ein JPG image sein !";
                    }*/

            $filetxt = $_POST['filenameEdit'];/* Die Text-Dateiname heisst jetzt einfach $filetxt statt $fileName da es unten für das Bild verwendet wird*/
            $author = $_POST['author'];
            $ueberschrift = $_POST['ueberschrift'];
            $main = $_POST['message'];
            $filenametxt = "textdocuments/".trim($filetxt,"textdocuments/.").".txt";
            $inhalt = date("d.m.Y, H:i")."|||".$ueberschrift."|||".$author."|||".$main;
            file_put_contents($filenametxt, $inhalt);
 }
?>
        <footer>
            <div id="footer-copyright">
            <u>Copyright©  - Jack Green</u>
            </div>
        </footer>
    </body>
</html>