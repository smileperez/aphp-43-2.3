<?php
declare(strict_types=1);

require_once __DIR__ . '.\autoload.php';
Autoload::initial();

use Objects\Company\Positions\Director as Director;
use Objects\Company\Positions\Programmer as Programmer;
use Objects\Company\Positions\Manager as Manager;
use Objects\Company\Positions\Tester as Tester;

$person[] = new Director('Андрей', 'Ефименко');
$person[] = new Programmer('Иван', 'Виноградов');
$person[] = new Manager('Любовь', 'Белова');
$person[] = new Tester('Иван', 'Токарев');
echo PHP_EOL;
$person[0]->setSalary(250000);
$person[1]->setSalary(300000);
$person[2]->setSalary(120000);
$person[3]->setSalary(90000);

// Проходим циклом по каждому сотруднику
foreach ($person as $element) {

    // Выводим имя сотрудника
    echo $element->getFullname();

    // Выводим должность сотрудника
    echo ', позиция ';
    try {
        echo getPosition($element);
    } catch (\Exception $e) {
        echo $e->getMessage();
    die();
    }

    // Выводим ЗП сотрудника
    echo ', зарпалата ';
    try {
        echo $element->getSalary();
    } catch (\Exception $e) {
        echo $e->getMessage();
    die();
    }
    echo ' рублей, ';

    // Выводим все подключенные к сотруднику интерфейсы
    echo 'сотрудник ';
    try {
        echo getInterfaces($element);
    } catch (\Exception $e) {
        echo $e->getMessage();
    die();
    }
}

// Выводим общее количество сотрудников
echo "Общее количество сотрудников: ";
echo count($person);
echo " шт.";
echo PHP_EOL;

// Выводим общую сумму зарплат отдела
echo 'Общая сумма зарплат отдела: ';
echo getSummSalary($person);
echo ' рублей.';
echo PHP_EOL;

// Выводим общую сумму зарплат отдела за ГОД
echo 'Общая сумма зарплат отдела в год: ';
$summYear = getSummSalary($person) * 12;
echo $summYear;
echo ' рублей.';

// Функция получения должности сотрудника
function getPosition(object $element): void {
    if ($element instanceof Programmer) {
        echo 'программист';
    } else if ($element instanceof Tester) {
        echo 'тестер';
    } else if ($element instanceof Manager) {
        echo 'менеджер';
    } else if ($element instanceof Director) {
        echo 'директор';
    } else {
        throw new \Exception('Непредвиденная ошибка в поиске классов у сотрудника!');
    }
}

// Функция получения суммы ЗП всего отдела
function getSummSalary(array $person): int {
    $summ = 0;
    foreach ($person as $element) {
        $summ += $element->getSalary();
    }
    return $summ;
}

// Функция получения всех интерфейсов у каждого сотрудника
function getInterfaces(object $element): void {
    $implements = class_implements($element);
    $i = 0;
    foreach($implements as $key) {     
        switch ($key) {
            case 'Interfaces\LeadInterface':
                $element->doManage();
                break;
            case 'Interfaces\ApplicationCreatorInterface':
                $element->doCode();
                break;
            case 'Interfaces\WebinarSpeakerInterface':
                $element->doWebinar();
                break;
            default:
                throw new \Exception('Ошибка в поиске интерфейсов');
        }
        
        if ($i == count($implements) - 1) {
            echo '.';
        } else {
            echo ', ';
        }

        $i++;
    }
    echo PHP_EOL;
}