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
    <title>Templating</title>
</head>
<body>
<?php

$m = new Mustache_Engine(array('entity_flags' => ENT_QUOTES));

$template = "
<h2>Welcome {{name}}</h2>
<p>We are glad to see you, team {{team}}.</p>
";

$data1 = ["name" => "Bob", "team" => "Goldilocks"];
$data2 = ["name" => "Jim", "team" => "Three pigs"];

echo $m->render($template, $data1);
echo $m->render($template, $data2);

$t2 = "<p>Hello {{name}}
You have just won {{value}} dollars!
{{#in_ca}}
Well, {{taxed_value}} dollars, after taxes.
{{/in_ca}}</p>";

$him = new Chriss();
$him->name = "<em>Chris</em>";
$him->in_ca = false;
echo $m->render($t2, $him);

$bob = new ArrayPerson();
$bob->name = "Robert";
$bob->surname = "Parker";
$bob->value = 50000;
$bob->in_ca = false;

echo $m->render($t2, $bob);







?>
</body>
</html>
