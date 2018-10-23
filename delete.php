<?php
function __autoload($class_name) 
{
    require_once ($class_name . '.php');
};
$db = new Database();

$id = $_GET['id'];

if($db->getOneUser($id)){
	$result = $db->deleteUser($id);
} else {
	echo 'wrong data';
}

if($result){
	header('Location: index.php');
}

