<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Form demo 1</title>
</head>
<body>

<form method="post">
    Jméno: <input type="text" name="name" placeholder="vaše jméno" /><br />
    E-mail: <input type="email" name="email" placeholder="váš email" /><br />
    Pamatuj si mne: <input type="checkbox" name="remember" /><br />
    <input type="submit" value="Odeslat" />
</form>

<?php
var_dump($_GET);
var_dump($_POST);
?>

</body>
</html>


