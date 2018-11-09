<?php
function __autoload($class_name) 
{
    require_once ($class_name . '.php');
};

$db = new Database();
$allusers = $db->getAll();
//print_r($_GET);
//die();
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

div.wrapper {
    width:600px;
}
div.left_block {
    float:left;
    width:300px;
}
div.right_block {
    float:right;
    width:300px;
}
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
    <div class="wrapper">
        <div class="left_block">
            <p>Add new user</p>
            <form action="newuser.php" method="post" name="add_form">
                <label>Name</label>
                <input type="text" required placeholder="Ex. Vlad Sevciuc" name="name">
                <span>* <?if($_GET['err'] == 1)
                            echo "Requires first and last name";?>
                </span>
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
        </div>
        <div class="right_block">
            <form action="decorator.php" method="post" name="showSalary_form">
                <label>Name</label>
                <input type="text" required placeholder="Ex. Vlad Sevciuc" name="name"><br>
                <input type="checkbox" checked disabled name="simpleSalary" value="simpleSalary">Simple salary<br>
                <input type="checkbox" name="holidaySalary" value="holidaySalary">Worked at holidays<br>
                <input type="checkbox" name="plusOneHourSalary" value="plusOneHourSalary">Worked plus one hour<br>
                </br>
                <input type="submit" name="showSalary" value="Show">
            </form>
        </div>
    </div>
</body>

</html>






