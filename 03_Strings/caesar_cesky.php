<?php


function nextChar($char, $alphabet) {
    $char = mb_strToUpper($char);
    for ($i = 0; $i < count($alphabet); $i++) {
        if (in_array($char, $alphabet[$i])) {
            $nextI = ($i+1) % count($alphabet);
            return $alphabet[$nextI][0];
        }
    }
    return $char;
}

function prevChar($char, $alphabet) {
    $char = mb_strToUpper($char);
    for ($i = 0; $i < count($alphabet); $i++) {
        if (in_array($char, $alphabet[$i])) {
            $nextI = ($i > 0) ? ($i-1) : (count($alphabet) - 1);
            return $alphabet[$nextI][0];
        }
    }
    return $char;
}

function caesarCz($text, $shift = 1) {
    $alphabet = [
        ["A", "Á"],
        ["B"],
        ["C"],
        ["Č"],
        ["D"],
        ["Ď"],
        ["E", "É"],
        ["F"],
        ["G"],
        ["H"],
        ["I", "Í"],
        ["J"],
        ["K"],
        ["L"],
        ["M"],
        ["N"],
        ["Ň"],
        ["O", "Ó"],
        ["P"],
        ["Q"],
        ["R"],
        ["Ř"],
        ["S"],
        ["Š"],
        ["T"],
        ["Ť"],
        ["U", "Ú", "Ů"],
        ["V"],
        ["W"],
        ["X"],
        ["Y", "Ý"],
        ["Z"],
        ["Ž"]
    ];

    $direction = $shift <=> 0;
    $shift = abs($shift);

    if ($direction === 0)
        return $text;

    for ($j = 0; $j < $shift; $j++) {
        $out = "";
        for ($i = 0; $i < mb_strlen($text); $i++) {
            $char = mb_substr($text, $i, 1);
            $out .= $direction > 0 ? nextChar($char, $alphabet) : prevChar($char, $alphabet);
        }
        $text = $out;
    }

    return $text;
}

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
    $str = "Krupicová kaše";

    $shift = 4;
    echo "$str ($shift): ";
    echo caesarCz($str, $shift);
    echo "<br>";

    $shift = -4;
    echo "$str ($shift): ";
    echo caesarCz($str, $shift);
    echo "<br>";

?>
</body>
</html>
<?php
