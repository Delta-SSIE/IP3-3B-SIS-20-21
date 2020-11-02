<?php 

session_start(); //zahájím session ještě před odesláním dat
$_SESSION = []; //vymažu všechna data
session_destroy();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Logout</title>
    </head>
    <body>
        <?php
        echo "<p>Byl jste odhlášen ze systému</p>";
        echo "<p><a href='login.php'>Znovu přihlásit</a>";
        ?>
    </body>
</html>
