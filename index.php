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
	<form action="add.php" method="post" name="add_form">
		<label>Name</label>
        <input type="text" name="name">
		</br></br>
        <label>Email</label>
        <input type="text" name="email">
		</br></br>
		<select name="method">
			<option value="database">database</option>
			<option value="file">file</option>
		</select>
		</br></br>
		<input type="submit" name="Submit" value="Add">
    </form>
</body>

</html>






