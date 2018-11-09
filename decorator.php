<?php 
function __autoload($class_name) 
{
    require_once ($class_name . '.php');
};
//exemplu: https://habr.com/company/mailru/blog/325492/#strukturnye-shablony-proektirovaniya
/*
| Шаблон «Декоратор» позволяет подключать к объекту дополнительное поведение (статически или
| динамически), не влияя на поведение других объектов того же класса.
*/

interface Salary
{
    public function getCost();
    public function getDescription();
}

class SimpleSalary implements Salary
{
    public function getCost()
    {
        return 1000;
    }

    public function getDescription()
    {
        return 'Simple salary';
    }
}

#Adaugam Decoratori

class holidaySalary implements Salary
{
    protected $salary;

    public function __construct(Salary $salary)
    {
        $this->salary = $salary;
    }

    public function getCost()
    {
        return $this->salary->getCost() + 1000;
    }

    public function getDescription()
    {
        return $this->salary->getDescription() . ', holidays';
    }
}

class plusOneHourSalary implements Salary
{
    protected $salary;

    public function __construct(Salary $salary)
    {
        $this->salary = $salary;
    }

    public function getCost()
    {
        return $this->salary->getCost() + 100;
    }

    public function getDescription()
    {
        return $this->salary->getDescription() . ', plus one hour';
    }
}
//print_r($_POST);
//die();

$someSalary = new SimpleSalary();
//echo $someSalary->getCost(); 
//echo $someSalary->getDescription();

if($_POST['holidaySalary']){
    $someSalary = new holidaySalary($someSalary);
    //echo $someSalary->getCost(); 
    //echo $someSalary->getDescription();
}

if($_POST['plusOneHourSalary']){
    $someSalary = new plusOneHourSalary($someSalary);
    //echo $someSalary->getCost(); 
    //echo $someSalary->getDescription();
}


echo $someSalary->getCost(); 
echo $someSalary->getDescription();