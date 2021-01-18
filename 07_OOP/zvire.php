<?php
abstract class Zvire {

    protected static $pocet = 0;

    private $barva;
    protected $zvuk;

    protected function __construct($barva) {
        $this->nastavBarvu($barva);
        self::$pocet++;
    }

    public function nastavBarvu($barva) {
        $this->barva = $barva;
    }

    public function zadupej() {
        return "Dupy dup";
    }

    public abstract function ozviSe();

    public function predstavSe() {
        echo "Moje barva je {$this->barva}, dělám {$this->ozviSe()} a umím dupat: {$this->zadupej()}.<br />";
    }

    public static function pocetZvirat() {
        return parent::$pocet;
    }

}

class Slon extends Zvire {

    public function __construct($zvuk = "Bůůůů", $barva = "šedá") {
        $this->zvuk = $zvuk;
        parent::__construct($barva);
    }

    public function ozviSe() {
        return $this->zvuk;
    }
}

final class Krava extends Zvire {
    public function __construct($zvuk = "Tůůůů", $barva = "hnědá") {
        $this->zvuk = $zvuk;
        parent::__construct($barva);
    }

    public function ozviSe() {
        return $this->zvuk;
    }
}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>OOP - Zvíře - demo</title>
</head>
<body>
<?php

echo "Počet zvířat: " . Zvire::pocetZvirat() . "<br>";

$stracena = new Krava();
//$milka->nastavBarvu("fialová");
$stracena->predstavSe();

echo "<br>";
echo "Počet zvířat: " . Zvire::pocetZvirat() . "<br>";

$milka = new Krava("mňam", "fialová");
//$milka->nastavBarvu("fialová");
$milka->predstavSe();

echo "<br>";
echo "Počet zvířat: " . Zvire::pocetZvirat() . "<br>";

$bimbo = new Slon();
//$bimbo->nastavBarvu("šedá");
$bimbo->predstavSe();

echo "<br>";
echo "Počet zvířat: " . Zvire::pocetZvirat() . "<br>";

$albin = new Slon( "Aůůůů", "bílá");
//$albin->nastavBarvu("bílá");
$albin->predstavSe();

echo "Počet zvířat: " . Zvire::pocetZvirat() . "<br>";
?>
</body>
</html>