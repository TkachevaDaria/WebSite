<div class="container">
  <div class="row row-cols-1">


<div class='orderCard'>
	
<?php

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


$keys_post = array_keys($_POST);
foreach($keys_post as $ks){
	$_SESSION[$ks] = $_POST[$ks];
	 //echo $ks.'<br>';
}


echo "<h3>Ваш заказ:</h3><br>";
$keys_session = array_keys($_SESSION);


foreach($keys_session as $ks){
	
	if($ks!='lang' and $ks!='style' and $ks!='current_role'){
		
		$sql = "SELECT id, id_cat, good_name_rus, good_name_eng, good_about_rus, good_about_eng, price, good_img_path FROM goods where id=".$_SESSION[$ks];
		
		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) > 0) {
		// output data of each row
			while($row = mysqli_fetch_assoc($result)) {
				if(isset($_SESSION['lang'])){
					if($_SESSION['lang']=='eng'){
						echo "<div class='orderCard'>
							<div class='cardBox'>
										<div class='card' >
										<img src='imgDB/".$row["good_img_path"]."' class='card-img-top' alt=''>
											<div class='card-body'>
												<h5 class='card-title'>". $row["good_name_eng"]. "</h5>
												<p class='card-text'>".$row["good_about_eng"]."</p>
												<p class='card-text'>".$row["price"]." BYN</p>

											</div>
										</div>
							</div></div>";
						}else{
						 echo "<div class='col'>
							<div class='orderCard'>
							<div class='cardBox'>
										<div class='card' >
										<img src='imgDB/".$row["good_img_path"]."' class='card-img-top' alt=''>
											<div class='card-body'>
												<h5 class='card-title'>". $row["good_name_rus"]. "</h5>
												<p class='card-text'>".$row["good_about_rus"]."</p>
												<p class='card-text'>".$row["price"]." BYN</p>

											</div>
										</div>
							</div></div></div>";}
					

					
				}
				
				else {echo "0 results";}
			}
			//mysqli_close($conn);
			
		}

	}
}

?>

</div>
</div>
</div>
<div class='infForm'>


<form action='main.php?p=5' method=post>

<div class="mb-3">
    <label for="user" class="form-label">Введите имя:</label>
    <input type="text" class="form-control"  id="user" name="user">
  </div> 
  <div class="mb-3">
    <label for="phoneNumb" class="form-label">Введите номер телефона:</label>
    <input type="text" class="form-control"  id="phoneNumb" name="phoneNumb">
  </div> 
  <div class="mb-3">
    <label for="adress" class="form-label">Введите адрес доставки:</label>
    <input type="text" class="form-control"  id="adress" name="adress">
  </div> 



<h5><?php echo 'Выберите способ оплаты:<br>';?></h5>

<div class="form-check">
  <input class="form-check-input" type="radio" name="payment" id="payment" value="cash" checked>
  <label class="form-check-label" for="payment">
    Наличные
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="radio" name="payment" id="payment" value="card">
  <label class="form-check-label" for="payment">
    Карта
  </label>
</div>



		  
<h5><?php echo 'Выберите способ доставки:<br>';?></h5>

<div class="form-check">
  <input class="form-check-input" type="radio" name="delivery" id="delivery" value="pickup" checked>
  <label class="form-check-label" for="delivery">
    Самовывоз
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="radio" name="delivery" id="delivery" value="delivery">
  <label class="form-check-label" for="delivery">
    Доставка
  </label>
</div>
	<button type='submit' class='btn btn-primary' value='".$order."'><?php echo "Заказать"?></button>


</div>
