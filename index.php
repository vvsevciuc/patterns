<?php
function __autoload($class_name) 
{
    require_once ($class_name . '.php');
};

$db = new Database();

if($_GET['id']){
	$db->deleteUser($_GET['id']); 
}

$allusers = $db->getAll();

echo "<table>
	  <tr>
		<th>id</th>
		<th>Name</th> 
		<th>Email</th>
		<th>Delete</th>
	  </tr>"; 
foreach($allusers as $onerow){  
	echo "<tr>
			<td>" . $onerow['id'] . "</td>
			<td>" . $onerow['user'] . "</td> 
			<td>" .  $onerow['email'] . "</td>
			<td> <a href='/?id=" . $onerow['id'] . "'>X</a> </td>
		</tr>";
}; 
echo "</table>";


	

