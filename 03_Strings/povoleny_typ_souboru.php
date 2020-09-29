<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
<?php

$retezec = "FOTKA.JPG";

$povoleneTypy = [
    'jpg',
    'png',
    'gif',
    'jpeg'
];

if (jeSouborPovolen($retezec, $povoleneTypy)) {
    echo "Soubor je povoleného typu";
} else {
    echo "Soubor není povolen";
}


function jeSouborPovolen($nazev, $whitelist) {
    $polohaTecky = mb_strrpos($nazev, "."); //pozice tecky
    $pripona = mb_substr($nazev, $polohaTecky + 1); //to, co je za teckou
    $pripona = mb_strtolower($pripona); //to za teckou, mala pismena

    return in_array($pripona, $whitelist);
}
?>
</body>
</html>