<?php
abstract class Zvire {

    private $barva;
    protected $zvuk;

    protected function __construct($barva) {
        $this->nastavBarvu($barva);
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

$stracena = new Krava();
//$milka->nastavBarvu("fialová");
$stracena->predstavSe();

echo "<br>";

$milka = new Krava("mňam", "fialová");
//$milka->nastavBarvu("fialová");
$milka->predstavSe();

echo "<br>";

$bimbo = new Slon();
//$bimbo->nastavBarvu("šedá");
$bimbo->predstavSe();

echo "<br>";

$albin = new Slon( "Aůůůů", "bílá");
//$albin->nastavBarvu("bílá");
$albin->predstavSe();


?>
</body>
</html>