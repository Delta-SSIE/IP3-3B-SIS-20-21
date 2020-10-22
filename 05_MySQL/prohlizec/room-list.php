<?php
require_once ("_includes/db.php");
$roomId = (int) ($_GET['roomId'] ?? 0);

?>

<!DOCTYPE html>

<html>
<head>
    <meta charset="UTF-8">
    <!-- Bootstrap-->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <title>Seznam místností</title>
</head>
<body class="container">
<?php

$pdo = dbConnect();
$stmt = $pdo->query('SELECT * FROM room');

if ($stmt->rowCount() == 0) {
    echo "Záznam neobsahuje žádná data";
} else {

    $html = "<table class='table table-striped'>";

    $html .= "<tbody>";


    while ($row = $stmt->fetch()) { //nebo foreach ($stmt as $row)
        $html .= "<tr>";

        $html .= "<td>". htmlspecialchars($row['no'])  ."</td>";
        $html .= "<td><a href='room.php?roomId={$row['room_id']}'>". htmlspecialchars($row['name'] ) ."</a></td>";
        $html .= "<td>". htmlspecialchars($row['phone']) ."</td>";

        $html .= "</tr>";
    }

    $html .= "</tbody>";
    $html .= "</table>";

    echo $html;
}
unset($stmt);
?>
</body>
</html>