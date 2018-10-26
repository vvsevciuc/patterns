<?php
function __autoload($class_name) 
{
    require_once ($class_name . '.php');
};

$db = new Database();
$allusers = $db->getAll();

?>
<!DOCTYPE html>
<html>
<head>
<title>Patterns</title>
<style>
table {
    border-collapse: collapse;
	width: 100%;
}

table, td, th {
    border: 1px solid black;
	text-align: center;
}

th {
    height: 50px;
}

th, td {
    padding: 5px;
}

tr:hover {background-color:#f5f5f5;}
</style>
</head>

<body>
	<table>
		<tr>
			<th>id</th>
			<th>Name</th> 
			<th>Email</th>
			<th></th>
	  </tr>
	<? foreach($allusers as $onerow){ ?>
		<tr>
				<td><?= $onerow['id'] ?></td>
				<td><?= $onerow['user'] ?></td> 
				<td><?= $onerow['email'] ?></td> 
				<td> 
					<a href = '/delete.php?id= <?= $onerow['id'] ?>'>Delete</a>
				</td>
			</tr>
	<? }; ?>
	</table>
	</br>
	<p>Add new user</p>
	<form action="newuser.php" method="post" name="add_form">
		<label>Name</label>
        <input type="text" placeholder="Ex. Vlad Sevciuc" name="name">
		<span>*</span>
		</br></br>
        <label>Email</label>
        <input type="email" placeholder="email@email.com" name="email">
		<span>*</span>
		</br></br>
		<select name="method">
			<option value="database">database</option>
			<option value="file">file</option>
		</select>
		</br></br>
		<input type="submit" name="addButton" value="Add">
		<input type="submit" name="registerButton" value="Register">
    </form>
</body>

</html>






