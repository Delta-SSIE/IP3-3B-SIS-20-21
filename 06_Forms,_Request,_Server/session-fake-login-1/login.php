<?php
$expectedName = "admin";
$expectedPass = "tajemstvi";

// převezmu data z formuláře
$sentName = $_POST['name'] ?? "";
$sentPass = $_POST['pass'] ?? "";

$sentData = ($sentName !== "" || $sentPass !== ""); // true, pokud bylo něco posláno
$success = ($expectedName === $sentName && $expectedPass === $sentPass); // true, pokud byla poslána správná kombinace

if ($success) {
    session_start();
    $_SESSION['loggedIn'] = true;
    $_SESSION['loginname'] = $sentName;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Fake login</title>
</head>
<body>

<?php
if ($success) { // poslána správná kombinace
    echo "<h1>Přihlášen úspěšně</h1>";
    echo "<p><a href='stav.php'>Pokračujte na domovskou stránku</a></p>";
} else {

    if ($sentData) { //něco bylo posláno, ale ne správně
        echo "<h2>Neplatné přihlašovací údaje</h2>";
    }

    // vypsání formuláře
    echo  "<form method='post'>"
        . "Jméno: <input type='text' name='name' value='" . htmlspecialchars($sentName) . "' placeholder='uživatelské jméno' /><br />"
        . "Heslo: <input type='password' name='pass'/><br />" // heslo obvykle nepředvyplňujeme
        . "<input type='submit' value='Přihlásit' />"
        . "</form>";
}

?>

</body>
</html>
