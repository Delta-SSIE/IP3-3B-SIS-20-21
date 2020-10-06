<?php 

session_start(); //zahájím session ještě před odesláním dat
$_SESSION['prihlasen'] = true;
$_SESSION['jmeno'] = "Vomáčka František";

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Login</title>
    </head>
    <body>
        <?php
        echo "Uživatel byl přihlášen";
        ?>
    </body>
</html>
