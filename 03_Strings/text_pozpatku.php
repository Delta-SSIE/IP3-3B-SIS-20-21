<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php

        $english = "The quick brown fox jumped over the lazy dog.";
        $cesky =   "Příliš žluťoučký kůň úpěl ďábelské ódy.";

        function reverseString($string){
            $reversed = "";
            for ($i = mb_strlen($string) - 1; $i >= 0; $i--){
                $reversed .= mb_substr($string, $i, 1); //vezme i-tý znak
            }
            return $reversed;
        }

        var_dump(reverseString($cesky));
        var_dump(reverseString($english));

        ?>
    </body>
</html>