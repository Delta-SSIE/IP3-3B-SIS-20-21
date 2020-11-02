<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Form demo 2</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>
<body class="container">

<form method="post">
    <div class="form-group">
        <label for="name">Jméno</label>
        <input type="text" name="name" id="name" placeholder="vaše jméno" class="form-control"/>
    </div>
    <div class="form-group">
        <label for="email">E-mail</label>
        <input type="email" id="email" name="email" placeholder="váš email" class="form-control" />
    </div>
    <div class="form-check">
        <input type="checkbox" name="remember" id="remember" class="form-check-input" />
        <label for="remember" class="form-check-label">Pamatuj si mne</label>
    </div>
    <input type="submit" value="Odeslat" class="btn btn-primary" />
</form>


</body>
</html>


