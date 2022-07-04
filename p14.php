<div class='editUser'>
<h3><?php echo $editusers; ?></h3>
<?php
//Ввывод списка товаров
$servername = "localhost"; //адрес, где находится сервер
$username = "root"; //имя базы данных
$password = "44tib47A"; //пароль базы данных
$dbname = "shop";


//редактирование

 if(isset($_POST['id_user'])){
	 // Create connection
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	// Check connection
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}	
	//выборка данных
	$sql3 = "UPDATE users set user_name='".$_POST['user_name']."', role_id='".$_POST['role_id']."' WHERE id=".$_POST['id_user'];
	
	mysqli_query($conn, $sql3);
	mysqli_close($conn);
 }


if(isset($_GET['action'])){
	if($_GET['action']=='edit'){
	
		// Create connection
		$conn = mysqli_connect($servername, $username, $password, $dbname);
		// Check connection
		if (!$conn) {
		  die("Connection failed: " . mysqli_connect_error());
		}
			
		$sql2 = "SELECT user_name, user_pass, role_id FROM users  WHERE id=".$_GET['id_user'];
		mysqli_query($conn, $sql2);
		$result = mysqli_query($conn, $sql2);

		if (mysqli_num_rows($result) > 0) {
	  // output data of each row
	  while($row = mysqli_fetch_assoc($result)) {
		echo "
		<form method='post' action='main.php?p=14' enctype='multipart/form-data'>
			<div class='mb-3'>
				<label for='id_user' class='form-label'></label>
				<input type='hidden' class='form-control' name='id_user' value='".$_GET['id_user']."'>
			</div> 
			<div class='mb-3'>
				".$usernamereg.":<label for='user_name' class='form-label'></label>
				<input type='text' class='form-control' name='user_name' value='".$row['user_name']."'>
			</div> 
			<div class='mb-3'>
				".$userpasswordreg.":<label for='user_pass' class='form-label'></label>
				<input type='text' class='form-control' name='user_pass' value='".$row['user_pass']."'>
			</div>
		
		".$role.":		
		
		<select class='form-select' name='role_id' aria-label='Default select example' >";

	
		$servername = "localhost"; //адрес, где находится сервер
		$username = "root"; //имя базы данных
		$password = "44tib47A"; //пароль базы данных
		$dbname = "shop";


		// Create connection
		$conn = mysqli_connect($servername, $username, $password, $dbname);
		// Check connection
		if (!$conn) {
		  die("Connection failed: " . mysqli_connect_error());
		}

		$sql5 = "SELECT distinct roles.id, roles.role_name, users.role_id FROM users
		JOIN roles ON roles.id = users.role_id;";
		//$sql5 = "SELECT id, role_name FROM roles";
		//$sql5 = "SELECT role_id FROM users";

		$result = mysqli_query($conn, $sql5);

		if (mysqli_num_rows($result) > 0) {
		  // output data of each row
		  while($row = mysqli_fetch_assoc($result)) {
			echo "<option value=".$row["role_id"].">".$row["role_name"]."</option>";} 
		}
		else { echo "0 results";}
		//mysqli_close($conn);
	        
		echo" 
			</select>
			  <button type='submit' class='btn btn-primary' value='".$edit."'>".$edit."</button>

			</form>";
	  }
		} else {echo "0 results";}

		mysqli_close($conn);
	}
	if($_GET['action']=='del'){
		
		// Create connection
		$conn = mysqli_connect($servername, $username, $password, $dbname);
		// Check connection
		if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
		}

		$sql4 = "DELETE from users WHERE id=".$_GET['id_user'];
		mysqli_query($conn, $sql4);
		
		mysqli_close($conn);
	}
}

echo"</div>
<div class='editUsersCards'><h3>".$userslist."</h3>
<table>
<thead>
<tr>
	<th>ID</th>
	<th>User name</th>
	<th>User password</th>
	<th>User role</th>
	<th>Action</th>
</tr>
</thead>";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$sql1 = "SELECT users.id, users.user_name, users.user_pass, users.role_id, roles.role_name  FROM users
		JOIN roles ON roles.id = users.role_id";
		
mysqli_query($conn, $sql1);

$result = mysqli_query($conn, $sql1);

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
    echo "<tr><td> " . $row["id"]. "</td> <td>".$row["user_name"]. "</td><td>".$row["user_pass"]."</td><td>".$row["role_name"]."</td><td><a href='main.php?p=14&action=edit&id_user=".$row["id"]."'> ".$edit." </a><a href='main.php?p=14&action=del&id_user=".$row["id"]."'> ".$delete." </a></td></tr>";
	
  }
} else {
  echo "0 results";
}
mysqli_close($conn);
echo"
</table></div>";
?>



