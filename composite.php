<?php
function __autoload($class_name) 
{
    require_once ($class_name . '.php');
};

$db = new Database();
$alldesigneremployees = $db->getDesignerEmployees();
$alldeveloperemployees = $db->getDeveloperEmployees();
//print_r($allemployees);
//die();


interface Employee
{
    public function __construct($name, $salary);
    public function getName();
    public function setSalary(float $salary);
    public function getSalary();
    public function getRoles();
}

class Developer implements Employee
{
    protected $salary;
    protected $name;

    public function __construct($name, $salary)
    {
        $this->name = $name;
        $this->salary = $salary;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setSalary(float $salary)
    {
        $this->salary = $salary;
    }

    public function getSalary()
    {
        return $this->salary;
    }

    public function getRoles()
    {
        return $this->roles;
    }
}

class Designer implements Employee
{
    protected $salary;
    protected $name;

    public function __construct($name, $salary)
    {
        $this->name = $name;
        $this->salary = $salary;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setSalary(float $salary)
    {
        $this->salary = $salary;
    }

    public function getSalary()
    {
        return $this->salary;
    }

    public function getRoles()
    {
        return $this->roles;
    }
}

class Organization
{
    protected $employees;

    public function addEmployee(Employee $employee)
    {
        $this->employees[] = $employee;
    }

    public function getNetSalaries()
    {
        $netSalary = 0;

        foreach ($this->employees as $employee) {
            $netSalary += $employee->getSalary();
        }

        return $netSalary;
    }
}

// Подготовка сотрудников
foreach($alldesigneremployees as $onerow){ 
    $employees[$onerow['id']] = new Designer($onerow['name'], $onerow['salary']);
}

foreach($alldeveloperemployees as $onerow){ 
    $employees[$onerow['id']] = new Developer($onerow['name'], $onerow['salary']);
}

//print_r($employees);
//echo'<br><br>';
//die();


//$john = new Developer('name', 12000);
//$jane = new Designer('Джейн', 15000);

// adaugam in organiaties
$organization = new Organization();

foreach($employees as $onerow){ 
    $organization->addEmployee($onerow);
}

echo "salary of all users: " . $organization->getNetSalaries(); //