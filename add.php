<?
function __autoload($class_name) 
{
    require_once ($class_name . '.php');
};

interface saveStrategy
{
    public function save($params);
}

class saveInDatabase implements saveStrategy
{

    public function save($params = '')
    {		
		$db = new Database();
		
		if (empty($_POST["name"])) {
			echo "Name is required";
			die();
		}
		
		$name = test_input($_POST["name"]);
		$email = test_input($_POST["email"]);
		
		$data = [
			'name' => $name,
			'email' => $email,
		]; 

        $insert = $db->insertUser($data);
		if($insert){
			echo 'Added with success';
		} else {
			echo 'Failed (((';
		}
    }
}

class saveInFile implements saveStrategy
{
    private $txt = '';

    public function save($params = '')
    {
		$fileName = $_POST['name'] . '.txt';
		$txt = $_POST['name'] . ', ' . $_POST['email'] . ', method is ' . $_POST['method'];
        $myfile = fopen('public/' . $fileName, "w") or die("Unable to open file!");
		fwrite($myfile, $txt);
		fclose($myfile);
		echo "<br>Check file";
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

function test_input($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}

$saveGateway = new SaveGateway();

$cart = new Strategy($_POST['method']);
$cart->saveMethod($saveGateway);
