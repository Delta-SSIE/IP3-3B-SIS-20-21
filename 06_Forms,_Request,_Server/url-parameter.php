<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>URL parameter</title>
</head>
<body>
<h1>Formulářík a data z něj</h1>

<h2>Co bylo předáno?</h2>
text:
<?php

echo $_GET['sent'] ?? "";
//echo htmlspecialchars($_GET['sent']) ?? "";


?>

<h2>Vlastní odesílání</h2>

<form action="">
    <label for="sent">Něco napiš:</label> <input type="text" name="sent" id="sent"><br>
    <input type="submit" value="Odeslat">
</form>

</body>
</html><?php









// Já si tu jen něco odložím
// <script>alert("baf");</script>
// https://www.urlencoder.org/
// <p onmouseover="document.body.innerHTML='<p>Byl jsem tu!</p><h2>Fantomas</h2>';">Najeď na mne myší</p>