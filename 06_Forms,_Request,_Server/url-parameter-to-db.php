<!DOCTYPE html>

<html>
<head>
    <meta charset="UTF-8">
    <!-- Bootstrap-->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <title>Listování DB</title>
</head>
<body class="container">
<?php
$host = '127.0.0.1';
$db = 'ip_3';
$user = 'www-aplikace';
$pass = 'Bezpe4n0Heslo.';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
];
$pdo = new PDO($dsn, $user, $pass, $options);

$roomId = (int) $_GET['roomId'] ?? 0;

$query = "SELECT name FROM room WHERE room_id=?";
//$query = "SELECT name FROM room WHERE room_id='".$pdo->quote( $roomId )."'";

$stmt = $pdo->prepare($query);
$stmt->execute([$roomId]);

if ($stmt->rowCount() == 0) {
    echo "Záznam neobsahuje žádná data";
} else {
    while ($row = $stmt->fetch()) {
        echo "<p>Název: {$row['name']}</p>";
    }
}

?>
<form action="">
    <label for="roomId">Zadej číslo:</label><input type="number" name="roomId" id="roomId" value="<?=$roomId ?: ''?>"><br>
    <input type="submit" value="Odeslat">
</form>
</body>
</html>














<?php
//4' UNION SELECT TABLE_NAME AS name FROM information_schema.tables WHERE 1='1
//4%27%20UNION%20SELECT%20TABLE_NAME%20AS%20name%20FROM%20information_schema.tables%20WHERE%201%3D%271

//$stmt = $pdo->prepare("SELECT * FROM room WHERE room_id=:roomId");
//$stmt->execute(['roomId' => $roomId]);