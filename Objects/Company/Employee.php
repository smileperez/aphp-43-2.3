<?php

namespace Objects\Company;

use Objects\Person as Person;

abstract class Employee extends Person
{
    protected $name;
    protected $surname;
    protected $salary;

    public function __construct(string $name, string $surname)
    {
        $this->name = $name;
        $this->surname = $surname;
    }  
    
    public function setSalary(int $salary) : void {
        if ($salary > 0) {
            $this->salary = $salary;
        }
    }

    public function getSalary() : int {
        return $this->salary;
    }

    public function getFullname(): void {
        echo $this->name . ' ' . $this->surname;
    }
}
?>