<?php 

session_start(); //zahájím session ještě před odesláním dat
$_SESSION = []; //vymažu všechna data
session_destroy();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        echo "Byl jste odhlášen ze systému";
        ?>
    </body>
</html>
