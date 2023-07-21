<?php

namespace Objects\Company\Positions;

use Objects\Company\Employee as Employee;
use Interfaces\ApplicationCreatorInterface as ApplicationCreatorInterface;
use Interfaces\WebinarSpeakerInterface as WebinarSpeakerInterface;

class Programmer extends Employee implements ApplicationCreatorInterface, WebinarSpeakerInterface
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

    public function doCode() {
        echo 'может заниматься разработкой приложения';
    }

    public function doWebinar() {
        echo 'может читать вебинары';
    }

    public function setSalary(int $salary) : void {
        if ($salary < 0) {
            throw new \Exception('ЗП не может быть меньше нуля');
        } else if ($salary == 0) {
            throw new \Exception('ЗП не быть нулевая');
        } else if ($salary < 17930) {
            throw new \Exception('ЗП не быть меньше чем МРОТ');
        }
        $this->salary = $salary;
    }

    public function getSalary() : int {
        return $this->salary;
    }
}

?>