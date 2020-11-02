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
<?php
    $pizzas = [
        41 => "Šunková",
        63 => "Hawaii",
        65 => "Čtyři roční období"
    ];

    function makePizzaMenu($pizzas) {
        $html = "";
        foreach ($pizzas as $key => $name) {
            $html .= "<input type='checkbox' name='pizza[]' value='pizza{$key}' id='pizza{$key}'/>\n";
            $html .= "<label for='pizza{$key}'>" . htmlspecialchars($name) . "</label><br />\n";

        }
        return $html;
    }
?>
<form method='get' id="pizza">
<?php  echo makePizzaMenu($pizzas); ?>
    <input type="submit" value="odeslat" />
</form>

<?php
var_dump($_GET);
?>

</body>
</html>

