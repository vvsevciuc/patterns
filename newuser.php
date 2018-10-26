<?

//print_r($_POST['addButton']);
//die();

if($_POST['addButton']){
	require_once('add.php');
} else {
	require_once('register.php');
}