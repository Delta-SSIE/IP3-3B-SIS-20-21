<?php
class Data {
    private $informace = "";

    /**
     * @return string zapsaná informace
     */
    public function getInformace(): string
    {
        return $this->informace;
    }

    /**
     * @param string $informace informace k zapsaání
     */
    public function setInformace(string $informace): void
    {
        $this->informace = $informace;
    }

//    public function getInformace() {
//        return $this->informace;
//    }
//
//    public function  setInformace($value) {
//        if (!is_string($value) || mb_strlen($value) < 1 ) {
//            throw new Exception("Not a string");
//        }
//        $this->informace = $value;
//    }
}

class ArrayData {
    private $storage = [
        "count" => 0,
        "length" => 0
    ];

    public function __get($propName) {
        if (array_key_exists($propName, $this->storage)){
            return $this->storage[$propName];
        }
        if ($propName == "product")
            return $this->storage["count"] * $this->storage["length"];
    }

    public function __set($propName, $value) {
        if (array_key_exists($propName, $this->storage)){
            $this->storage[$propName] = $value;
        }
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
    <title>Getter-Setter demo</title>
</head>
<body>
<?php
$data = new Data();

echo "{$data->getInformace()} <br>";
$data->setInformace("tajné");
echo $data->getInformace();

echo "<br>";
echo "<br>";

$arrData = new ArrayData();
$arrData->count = 5;
$arrData->length = 3;

echo "$arrData->count : $arrData->length : $arrData->product";
?>
</body>
</html>

