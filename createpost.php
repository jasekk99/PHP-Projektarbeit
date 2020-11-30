    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Create a Post</title>
        <link rel="stylesheet" href="css/create-edit.css">
        <link rel="stylesheet" href="css/global.css">
        
    </head>
    <body>
        <header>
            <a href="index.php" id="jacksnewsLink"><h1 class="jacksnews">Jacks News</h1></a>
            <!-- Navbar -->
            <div>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a class="active" href="createpost.php">Beitrag Erstellen</a></li>
                    <li><a href="manage.php">Manage</a></li>
                </ul>
            </div>
            <h1 style="margin-left:30px;margin-top:40px">Beitrag Erstellen</h1>
        </header>
        <!-- Form for creating a post -->
        <div class="formular">
            <form enctype="multipart/form-data" action="" method="post">
                <label><h3>Datei Name</h3>
                <input type="text" name="filename" placeholder="Datei Name eingeben" class="filename" required>
                </label>

                <label><h3>Author</h3>
                <input type="text" name="author" placeholder="Name eingeben" class="author" required>
                </label>
                
                <label><h3>Überschrift</h3>
                <input type="text" name="ueberschrift" placeholder="Überschrift eingeben" class="ueberschrift" required>
                </label>

                <textarea type="textarea" name="message" placeholder="Enter your message here" class="messagebox" required required rows="10" maxlength="2000" spellcheck></textarea><br>

                <h2>Upload Image</h2>
                <input type="file" name="file" required><br>
                <input type="submit" name="submit" class="submit">
            </form>
        </div>
        <?php
            /* Nur wenn der Submit Button Gedrückt wird, wird der unten stehender Code ausgeführt */
            if(isset($_POST['submit'])){

            $filetxt = $_POST['filename'];/* Die Text-Dateiname heisst jetzt einfach $filetxt statt $fileName da es unten für das Bild verwendet wird*/
            $author = $_POST['author'];
            $ueberschrift = $_POST['ueberschrift'];
            $main = $_POST['message'];

            /*Lädt Bild hoch*/
            $file= $_FILES['file'];
	        $fileName= $_FILES['file']['name'];
	        $fileTmpName= $_FILES['file']['tmp_name']; 
	        $fileFehler= $_FILES['file']['error']; 
            $fileTyp= $_FILES['file']['type'];
            $fileGroesse= $_FILES['file']['size'];

            $fileArt = explode('.',$fileName);
            $fileActualExt= strtolower(end($fileArt));

            if($fileActualExt === "jpg") {            
                if($fileFehler=== 0) {                           
                    if($fileGroesse< 10000000) { 
                        $fileZiel = "images/".$filetxt.".jpg";
                        move_uploaded_file($fileTmpName, $fileZiel);
            }else{
                echo"Das File ist zu gross !";
            }
                }else{
                    echo "Es gab einen Fehler, es tut uns leid !";
                }
                    }else{
                        echo "Ihr Bild muss ein JPG image sein !";
                    }

            /*||.txt Datei Code||*/
            $filename = "textdocuments/".$filetxt.".txt";
            /* Existiert dieser .txt Datei schon? */
            if(file_exists($filename)){echo "THIS FILE ALREADY EXISTS!";}
            else{
                /* Wenn nicht, kreeiert und setzt die eingegebenen Werte in die Datei*/
                $inhalt = date("d.m.Y, H:i")."|||".$ueberschrift."|||".$author."|||".$main;
                file_put_contents($filename, $inhalt);
                }
            }
        ?>
        <footer>
            <div id="footer-copyright">
            <u>Copyright©  - Jack Green</u>
            </div>
        </footer>
    </body>
</html>