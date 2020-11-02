<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Flexible array demo</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

</head>
<body class="container">

<form id="shopping-list">

    <div class="form-row">
        <div class="col-10">
            <input type="text" name="listItem[]" class="form-control" placeholder="Položka">
        </div>
        <div class="col">
            <input type="number" name="listCount[]" class="form-control" placeholder="Počet">
        </div>
    </div>

    <div class="form-row">
        <div class="col-10">
            <input type="text" name="listItem[]" class="form-control" placeholder="Položka">
        </div>
        <div class="col">
            <input type="number" name="listCount[]" class="form-control" placeholder="Počet">
        </div>
    </div>

    <div class="form-row">
        <div class="col-10">
            <input type="text" name="listItem[]" class="form-control" placeholder="Položka">
        </div>
        <div class="col">
            <input type="number" name="listCount[]" class="form-control" placeholder="Počet">
        </div>
    </div>

    <div class="form-row" id="submit-row">
        <div class="col">
            <input type="submit" value="Odeslat" class="btn btn-primary" />
        </div>
    </div>

</form>


<?php
var_dump($_GET);
?>

</body>
</html>

