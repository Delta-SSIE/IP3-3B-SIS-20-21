<?php


class ArrayPerson {
    private $storage = [
        "name" => "",
        "surname" => "",
        "in_ca" => true,
        "value" => 0,
    ];

    public function __get($propName) {
        if (array_key_exists($propName, $this->storage)){
            return $this->storage[$propName];
        }
    }

    public function __set($propName, $value) {
        if (array_key_exists($propName, $this->storage)){
            $this->storage[$propName] = $value;
        }
    }

    public function __isset($propName) {
        return array_key_exists($propName, $this->storage);
    }

    public function taxed_value() {
        return $this->value - ($this->value * 0.4);
    }
}