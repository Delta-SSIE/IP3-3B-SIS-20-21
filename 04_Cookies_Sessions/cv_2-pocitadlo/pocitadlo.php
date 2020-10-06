<?php
//if (!isset($_COOKIE['pocet'] )) {
//    $pocet = 1;
//} else {
//    $pocet = $_COOKIE['pocet']+1;
//}

$pocet = $_COOKIE["pocet"] ?? 0;
$pocet++;
setcookie("pocet", $pocet, time() + 60); //životnost je 60 sekund

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Počítadlo</title>
</head>
<body>
Počet zobrazení stránky: <?php echo $pocet; ?>
</body>
</html>