<?php

class Cislo {
    protected $hodnota = 2;

    public function vypis() { //metoda
        echo $this->hodnota;
    }

    public function uloz($novaHodnota) {
        $this->hodnota = $novaHodnota;
    }

    public function pricti($kolik) {
        $this->hodnota += $kolik;
    }
}

class CeleCislo extends Cislo {
    public function uloz($novaHodnota) {
        $this->hodnota = floor($novaHodnota);
    }
    public function pricti($kolik) {
        $this->hodnota += floor($kolik);
    }
}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>OOP Demo</title>
</head>
<body>
<?php
$mojeCislo = new CeleCislo();
$mojeCislo->vypis();

echo "<br><br>";

$mojeCislo->uloz(5.5);
$mojeCislo->vypis();

echo "<br><br>";


$mojeCislo->pricti(2);
$mojeCislo->vypis();

?>
</body>
</html>
