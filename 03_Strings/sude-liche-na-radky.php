<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
<?php
        
        function sudeLiche($string){
            $sudeZnaky = "";
            $licheZnaky = "";
            for ($i = 0; $i < mb_strlen($string); $i++){
                $char = mb_substr($string, $i, 1); //vezme i-tý znak
                if ($i % 2 === 0) 
                    $licheZnaky .= $char;
                else
                    $sudeZnaky .= $char;
            }
            echo $licheZnaky;
            echo "<br />";
            echo $sudeZnaky;
        }


        $cesky =   "Příliš žluťoučký kůň úpěl ďábelské ódy.";
        
        echo "<pre>";
        sudeLiche($cesky);
        echo "</pre>";

        ?>
</body>
</html>