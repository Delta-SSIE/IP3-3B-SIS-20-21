<?php 

session_start(); //zahájím session ještě před odesláním dat

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Vypiš přihlášení</title>
    </head>
    <body>
        <?php
        
        if (array_key_exists('prihlasen', $_SESSION) && $_SESSION['prihlasen']) {
            echo "Přihlášen uživatel ". htmlspecialchars($_SESSION['jmeno']);
        } else {
            echo "Uživatel nepřihlášen";
        }
        
        ?>
    </body>
</html>
