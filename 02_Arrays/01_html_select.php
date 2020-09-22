<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>


<?php

function htmlSelect($name, $options, $selected = "") {
    $html = "<select name='" . htmlspecialchars( $name ) . "'>\n";

    foreach($options as $key => $value) {
        $html .= "<option value='".htmlspecialchars( $key ) . "'"
            . ($key === $selected ? " selected='selected'" : "")
            . ">".htmlspecialchars($value)."</option>\n";
    }

    $html .= "</select>\n";

    return $html;
}

function htmlRadio($name, $options, $selected = "") {
    $html = "<div>\n";

    foreach($options as $key => $value) {
        $html .= "<label>";
        $html .=  "<input type='radio'"
                . " value='".htmlspecialchars($key)."'"
                . " name='".htmlspecialchars($name)."'"
                . ($key === $selected ? " checked='checked'" : "")
                . ">";
        $html .= htmlspecialchars($value);
        $html .= "</label><br>";
    }

    $html .= "</div>\n";

    return $html;
}


$options = [
    "volvo" => "Volvo",
    "bmw" => "BMW",
    "trabant" => "Trabant",
    "skoda" => "Škoda"
];

//$options = [
//    "p" => "<p>",
//    "br" => "<br>",
//    "h1" => "<h1>",
//];

echo htmlSelect("auta", $options, "trabant");
echo htmlRadio("auta", $options, "trabant");


?>

</body>
</html>

