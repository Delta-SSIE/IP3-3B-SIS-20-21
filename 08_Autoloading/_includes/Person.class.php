<?php


class Person
{
    public $name;
    public $surname;

    public function fullName() {
        return "{$this->name} {$this->surname}";
    }
}