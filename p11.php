<div class="authForm">
	
<form method="post" action='main.php?p=11'>
  <div class="mb-3">
    <label for="name" class="form-label">Имя пользователя:</label>
    <input type="text" class="form-control"  name=user id="name" name="name">
  </div> 
   <div class="mb-3">
    <label for="password" class="form-label">Пароль:</label>
    <input type="password" class="form-control" id="password" name=pass required name="password">
  </div> 
  <button type="submit" class="btn btn-primary" value='<?php echo $enter; ?>'><?php echo $enter; ?></button>
</form>
</div>

<?php
//Ввывод списка товаров
$servername = "localhost"; //адрес, где находится сервер
$username = "root"; //имя базы данных
$password = "44tib47A"; //пароль базы данных
$dbname = "shop";


//проверка пользователя

 if(isset($_POST['user'])){
	 // Create connection
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	// Check connection
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}	
	//выборка данных
	$sql = "SELECT user_name, user_pass, role_name FROM users
			JOIN roles ON roles.id = users.role_id
			where user_name = '".$_POST['user']."' and user_pass = '".$_POST['pass']."'";
	
	$result = mysqli_query($conn, $sql);
	if (mysqli_num_rows($result) == 1) {
		// output data of each row
		while($row = mysqli_fetch_assoc($result)) {
			echo "<h4>Вы авторизовались как ".$row['role_name']." <a href='main.php?p=1'> <br>OK</a></h4>" ;
			$_SESSION['current_role'] = $row['role_name'];
		}
	}
	else{
		echo '<h3>Ошибка авторизации</h3>';
	}
}
//mysqli_close($conn);


?>



