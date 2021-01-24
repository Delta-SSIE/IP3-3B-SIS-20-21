<?php
require "_includes/bootstrap.inc.php";

use Tracy\Debugger;

Debugger::enable();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?php

$bob = new Person();
$bob->name = "Robert";
$bob->surname = "Parker";
echo $bob->fullName();

dump(DB::sqlServer);



?>
</body>
</html>
