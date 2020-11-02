<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Forms and arrays</title>
</head>
<body>
<form method='get' id="pizza">
    <input type="checkbox" name="pizza[]" value="pizza41" id="pizza41"/>
    <label for="pizza41">Šunková</label><br />
    <input type="checkbox" name="pizza[]" value="pizza63" id="pizza63"/>
    <label for="pizza63">Hawaii</label><br />
    <input type="checkbox" name="pizza[]" value="pizza65" id="pizza65"/>
    <label for="pizza65">Čtyři roční období</label><br />
    <input type="submit" value="odeslat" />
</form>

<?php
    var_dump($_GET);
?>

</body>
</html>

