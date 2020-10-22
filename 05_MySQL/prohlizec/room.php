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
    <title>Detail místnosti</title>
</head>
<body class="container">
<?php

$pdo = dbConnect();

$stmt = $pdo->prepare("SELECT * FROM room WHERE room_id=:roomId");
$stmt->execute(['roomId' => $roomId]);

if ($stmt->rowCount() == 0) {
    echo "Záznam neobsahuje žádná data";
} else {
    $html = "<h1>Detail Místnosti $roomId</h1>";

    $row = $stmt->fetch();

    $html .= "<dl>";
    $html .= "<dt>Číslo</dt>";
    $html .= "<dd>". htmlspecialchars($row['no']) ."</dd>";
    $html .= "<dt>Název</dt>";
    $html .= "<dd>". htmlspecialchars($row['name']) ."</dd>";
    $html .= "<dt>Telefon</dt>";
    $html .= "<dd>". htmlspecialchars($row['phone'])."</dd>";
    $html .= "</dl>";

    echo $html;
}
unset($stmt);
?>
</body>
</html>