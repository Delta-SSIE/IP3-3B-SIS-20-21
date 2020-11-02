<?php 

session_start(); //zahájím session ještě před odesláním dat

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Výpis přihlášení</title>
    </head>
    <body>
        <?php
        
        if (array_key_exists('loggedIn', $_SESSION) && $_SESSION['loggedIn']) {
            echo "<p>Přihlášen uživatel ". htmlspecialchars($_SESSION['loginname']) . "</p>";
            echo "<p><a href='logout.php'>Odhlásit</a>";
        } else {
            echo "<p>Uživatel nepřihlášen</p>";
            echo "<p><a href='login.php'>Přihlásit</a>";
        }
        
        ?>
    </body>
</html>
