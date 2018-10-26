<?
class UserRegister {
	private $firstName;
	private $lastName;
	private $email;
	
	function __construct($name,$email) {
		$this->name = $name;
		$this->email = $email;
	}
	
	public function register($firstName, $lastName, $email){
		$fileName = $lastName . '.json';
		$content = 	'first name is ' . $firstName . 
					', last name is ' . $lastName . 
					' and email: ' . $email;
		if (file_put_contents($fileName, json_encode($content))){
			return 'success';
		}
		return 'failed';
	}
	
	function getName() {
		return $this->name;
	}
	
	function getEmail() {
		return $this->email;
	}
}

class UserRegisterAdapter {
	private $aUserRegister;
	
	function __construct(UserRegister $aUserRegister) {
		$this->aUserRegister = $aUserRegister;
	}
	
	public function explodeName(){
		$name = $this->aUserRegister->getName();
		$arrayOfName = explode(' ', $name);
		return $arrayOfName;
	}
	//print_r($this->aUserRegister->getName());
	//die();

	public function register() {
		$name = $this->explodeName();
		$firstName = $name[0];
		$lastName = $name[1];
		$email = $this->aUserRegister->getEmail();
		return $this->aUserRegister->register($firstName, $lastName, $email);
	}
}

function test_input($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}

if (empty($_POST["name"])) {
	echo "Name is required";
	die();
	} else {
		$name = test_input($_POST["name"]);
		if (str_word_count($name, 0) <= 1) {
			echo "Requires first and last name"; 
			die();
		}
}


$email = test_input($_POST["email"]);

$search = new UserRegister($name, $email);
$searchAdapter = new UserRegisterAdapter($search);
echo $searchAdapter->register();


