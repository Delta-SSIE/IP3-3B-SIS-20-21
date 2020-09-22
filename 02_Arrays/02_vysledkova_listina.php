<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .colored {
            background-color: beige;
        }
    </style>
</head>
<body>

<?php

$vitezove = [
    "Petr Vincena",
    "Markéta Calábková",
    "Marian Poljak",
    "Martin Kubeša",
    "Jan Šuta",
    "Jan Gocník",
    "Tomáš Kremel",
];

// prostý seznam
echo "<ol>";
foreach ($vitezove as $item)
    echo "<li>".htmlspecialchars($item)."</li>";
echo "</ol>";

//tabulka
echo "<table>";
//$i = 1;
foreach ($vitezove as $key => $item) {
    echo "<tr".($key % 2 === 0 ? " class='colored'" : "").">";
    echo "<td>".($key+1).".</td>";
    echo "<td>".htmlspecialchars($item)."</td>";
    echo "</tr>";
//    $i++;
}
echo "</table>";


$vitezove2 = [
    [ 'jmeno' => "Petr Vincena", 'poradi' => 1],
    "Markéta Calábková",
    "Marian Poljak",
    "Martin Kubeša",
    "Jan Šuta",
    "Jan Gocník",
    "Tomáš Kremel",
];
?>

</body>
</html>
