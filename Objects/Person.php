<?php

namespace Objects;

abstract class Person 
{
    protected $name;
    protected $surname;

    public function __construct(string $name, string $surname)
    {
        $this->name = $name;
        $this->surname = $surname;
    }   

    public function getFullname(): void {
        echo $this->name . ' ' . $this->surname;
    }
}
?>