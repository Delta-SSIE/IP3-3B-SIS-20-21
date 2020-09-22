<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body class="container">

<?php

$elh = [
    ["poradi" => "1", "mesto" => "Plzen", "zapasy" => 10, "vyhry" => 6, "prohry" => 2, "skore" => "38:24", "body" => 21 ],
    ["poradi" => "2", "mesto" => "Liberec", "zapasy" => 10, "vyhry" => 5, "prohry" => 3, "skore" => "29:22", "body" => 19 ],
    ["poradi" => "3", "mesto" => "Olomouc", "zapasy" => 9, "vyhry" => 5, "prohry" => 2, "skore" => "19:15", "body" => 19 ],
    ["poradi" => "4", "mesto" => "Brno", "zapasy" => 10, "vyhry" => 6, "prohry" => 3, "skore" => "32:29", "body" => 19 ],
    ["poradi" => "5", "mesto" => "Sparta", "zapasy" => 10, "vyhry" => 4, "prohry" => 2, "skore" => "43:37", "body" => 18 ],
    ["poradi" => "6", "mesto" => "Ml. Boleslav", "zapasy" => 9, "vyhry" => 5, "prohry" => 2, "skore" => "23:17", "body" => 17 ],
    ["poradi" => "7", "mesto" => "Hradec Kralove", "zapasy" => 10, "vyhry" => 5, "prohry" => 3, "skore" => "29:31", "body" => 17 ],
    ["poradi" => "8", "mesto" => "Chomutov", "zapasy" => 10, "vyhry" => 4, "prohry" => 4, "skore" => "19:22", "body" => 15 ],
    ["poradi" => "9", "mesto" => "Vitkovice", "zapasy" => 9, "vyhry" => 4, "prohry" => 4, "skore" => "30:25", "body" => 14 ],
    ["poradi" => "10", "mesto" => "Trinec", "zapasy" => 10, "vyhry" => 4, "prohry" => 6, "skore" => "27:26", "body" => 12 ],
    ["poradi" => "11", "mesto" => "Pardubice", "zapasy" => 9, "vyhry" => 3, "prohry" => 6, "skore" => "16:26", "body" => 9 ],
    ["poradi" => "12", "mesto" => "Litvinov", "zapasy" => 10, "vyhry" => 1, "prohry" => 6, "skore" => "22:28", "body" => 8 ],
    ["poradi" => "13", "mesto" => "Zlin", "zapasy" => 8, "vyhry" => 2, "prohry" => 5, "skore" => "14:24", "body" => 7 ],
    ["poradi" => "14", "mesto" => "Karlovy Vary", "zapasy" => 10, "vyhry" => 2, "prohry" => 8, "skore" => "21:36", "body" => 6 ],
];

$fields = ['poradi', 'mesto', 'zapasy', 'vyhry', 'prohry', 'skore', 'body'];

$html = "<table class='table table-striped'>";
$html .= "<thead>" .
        "<tr>" .
            "<th>Pořadí</th>" .
            "<th>Město</th>" .
            "<th>Zápasy</th>" .
            "<th>Výhry</th>" .
            "<th>Prohry</th>" .
            "<th>Skore</th>" .
            "<th>Body</th>" .
        "</tr>" .
    "</thead>";
$html .= "<tbody>";
foreach ($elh as $row) {
    $html .= "<tr>";
    foreach ($fields as $field) {
        $html .= "<td>" . htmlspecialchars( $row[$field] ) . "</td>";
        }
    $html .= "</tr>";
//    $html .= "<tr>" .
//            "<td>{$row['poradi']}</td>" .
//            "<td>{$row['mesto']}</td>" .
//            "<td>{$row['zapasy']}</td>" .
//            "<td>{$row['vyhry']}</td>" .
//            "<td>{$row['prohry']}</td>" .
//            "<td>{$row['skore']}</td>" .
//            "<td>{$row['body']}</td>" .
//        "</tr>";
}

$html .= "</tbody>";
$html .="</table>";

echo $html;

?>
</body>
</html>
