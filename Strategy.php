<?php

interface saveStrategy
{

    public function save($params);
}

class saveInDatabase implements saveStrategy
{
    private $ccNum      = '';
    private $ccType     = '';
    private $cvvNum     = '';
    private $ccExpMonth = '';
    private $ccExpYear  = '';

    public function save($params = '')
    {
        echo "<br>Paying ".$params." using Database";
    }
}

class saveInFile implements saveStrategy
{
    private $payPalEmail = '';

    public function save($params = '')
    {
        echo "<br>Paying ".$params." using File";
    }
}

class SaveGateway
{

    public function save($params)
    {
        if ($params == 'database') {
            $saveMethod = new saveInDatabase();
        } else if($params == 'file'){
            $saveMethod = new saveInFile();
        }
        $saveMethod->save($params);
    }
}

class Strategy
{
    public $params = '';

    public function __construct($params = '')
    {
        $this->params = $params;
    }

    public function getMethod()
    {
        return $this->params;
    }

    public function saveMethod(SaveGateway $saveGateway)
    {
        $saveGateway->save($this->params);
    }
}
/**
 * Client usage
 */
$saveGateway = new SaveGateway();

$cart = new Strategy('file');
$cart->saveMethod($saveGateway);

// Output
//Paying 499 using PayPal

$cart2 = new Strategy('database');
$cart2->saveMethod($saveGateway);

//Output
//Paying 501 using Money Booker

$cart3 = new Strategy('file');
$cart3->saveMethod($saveGateway);

//Output
//Paying 1001 using Credit Card