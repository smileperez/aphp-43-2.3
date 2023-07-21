<?php

namespace Objects\Company\Positions;

use Objects\Company\Employee as Employee;
use Interfaces\LeadInterface as LeadInterface;
use Interfaces\WebinarSpeakerInterface as WebinarSpeakerInterface;

class Director extends Employee implements LeadInterface, WebinarSpeakerInterface
{
    protected $name;
    protected $surname;
    protected $salary;

    public function __construct(string $name, string $surname)
    {
        $this->name = $name;
        $this->surname = $surname;
        $this->salary = 0;
    }

    public function doManage() {
        echo 'может управлять командой';
    }

    public function doWebinar() {
        echo 'может читать вебинары';
    }

    public function setSalary(int $salary) : void {
        if ($salary > 0) {
            $this->salary = $salary;
        }
    }

    public function getSalary() : int {
        return $this->salary;
    }
}

?>