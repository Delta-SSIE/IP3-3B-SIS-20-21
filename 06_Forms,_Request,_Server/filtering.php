<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <title>Filtering</title>
</head>
<body class="container">

<?php
//var_dump(filter_has_var(INPUT_POST, "data"));
$filtrovano = filter_input(
    INPUT_GET,
    "checkMe",
    FILTER_VALIDATE_BOOLEAN,
    FILTER_NULL_ON_FAILURE
);


var_dump($filtrovano);

//if (is_null($filtrovano) || $filtrovano === false) {
//    echo "<h1>Error</h1>";
//} else {
//    echo "<h1>OK:{$filtrovano}</h1>";
//}
?>

<form method="get">

    <div class="form-group">
        <label for="data">Něco napiš:</label>
        <input type="text" name="data" id="data" >
    </div>

    <div class="form-group">
        <div class="form-check">
            <input class="form-check-input" type="checkbox" id="checkMe" name="checkMe">
            <label class="form-check-label" for="checkMe">
                Zaškrtni si
            </label>
        </div>
    </div>

    <input type="submit"  class="btn btn-primary" value="Odeslat">
</form>

</body>
</html>


