<div class="regForm">
	
<form method="post" action='main.php?p=13'>
  <div class="mb-3">
    <label for="name" class="form-label">Введите имя:</label>
    <input type="text" class="form-control" name=newuser id="name" name="name">
  </div> 
  
  <div class="mb-3">
    <label for="password" class="form-label">Введите пароль:</label>
    <input type="password" class="form-control" id="password" name=newpass required name="password">
  </div> 
  <div class="mb-3">
    <label for="password" class="form-label">Повторите пароль:</label>
    <input type="password" class="form-control" id="password" name=reppass required name="password">
  </div>
  <div class="mb-3">
    <label for="email" class="form-label">Email address</label>
    <input type="email" class="form-control" id="email" required aria-describedby="emailHelp" name="email">
  </div>
  <button type="submit" class="btn btn-primary"><?php echo $registration; ?></button>
</form>
</div>
<?php
//Ввывод списка товаров
$servername = "localhost"; //адрес, где находится сервер
$username = "root"; //имя базы данных
$password = "44tib47A"; //пароль базы данных
$dbname = "shop";


//проверка пользователя

 if(isset($_POST['newuser'])){
	 // Create connection
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	// Check connection
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}	
	//проверка существования имени пользователя в БД
	$sql = "SELECT user_name FROM users where user_name = '".$_POST['newuser']."'";
	
	$result = mysqli_query($conn, $sql);
	if (mysqli_num_rows($result) == 0) {
		if($_POST['newpass']==$_POST['reppass']){
			
			$sql1 = "INSERT INTO users(user_name, user_pass, role_id) 
			values('".$_POST['newuser']."', '".$_POST['newpass']."', 2)";
			mysqli_query($conn, $sql1);
			echo "Пользователь ".$_POST['newuser']." зарегистрирован!<br>Пройдите авторизацию<a href='main.php?p=11'>Авторизация</a> ";
		}
		else{
			echo '<h3>Ошибка регистрации, пароли не совпадают!</h3>';
		}
	}
	else{
		echo '<h3>Ошибка регистрации, пользователь с таким именем уже существует!</h3>';
	}

//mysqli_close($conn);
 }

?>



