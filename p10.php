<div><div class='editGood'>
<h3><?php echo $editgood; ?></h3>

<?php
//Ввывод списка товаров
$servername = "localhost"; //адрес, где находится сервер
$username = "root"; //имя базы данных
$password = "44tib47A"; //пароль базы данных
$dbname = "shop";


//редактирование

 if(isset($_POST['id_good'])){
	 if($_SESSION['lang']=='eng'){
		 // Create connection
		$conn = mysqli_connect($servername, $username, $password, $dbname);
		// Check connection
		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}	
		//выборка данных
		$sql3 = "UPDATE goods set good_name_eng='".$_POST['good_name_eng']."', good_about_eng='".$_POST['good_about_eng']."', price='".$_POST['price']."', id_cat=".$_POST['id_cat']." WHERE id=".$_POST['id_good'];
	}else{
		
		$conn = mysqli_connect($servername, $username, $password, $dbname);
		// Check connection
		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}	
		//выборка данных
		$sql3 = "UPDATE goods set good_name_rus='".$_POST['good_name_rus']."', good_about_rus='".$_POST['good_about_rus']."', price='".$_POST['price']."', id_cat=".$_POST['id_cat']." WHERE id=".$_POST['id_good'];	
		}
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
			
		$sql2 = "SELECT id, id_cat, good_name_rus, good_name_eng, good_about_rus, good_about_eng, price, good_img_path FROM goods  WHERE id=".$_GET['id_good'];
		mysqli_query($conn, $sql2);
		$result = mysqli_query($conn, $sql2);

		if (mysqli_num_rows($result) > 0) {
	  // output data of each row
	  while($row = mysqli_fetch_assoc($result)) {
		  if($_SESSION['lang']=='eng'){
			  echo "
			<form method='post' action='main.php?p=10' enctype='multipart/form-data'>
				<div class='mb-3'>
				<label for='id_good' class='form-label'></label>
				<input type='hidden' class='form-control' name='id_good' value='".$_GET['id_good']."'>
				</div> 
				<div class='mb-3'>
				<label for='good_name_eng' class='form-label'>Name:</label>
				<input type='text' class='form-control' name='good_name_eng' value='".$row['good_name_eng']."'>
				</div> 
				<div class='mb-3'>
				<label for='good_about_eng' class='form-label'>Description:</label>
				<input type='text' class='form-control' name='good_about_eng' value='".$row['good_about_eng']."'>
				</div> 
				<div class='mb-3'>
				<label for='price' class='form-label'>Price:</label>
				<input type='text' class='form-control' name='price' value='".$row['price']."'>
				</div> 
				<div class='mb-3'>
				<label for='id_cat' class='form-label'>Категория:</label>
				<input type='text' class='form-control' name='id_cat' value='".$row['id_cat']."'>
				</div> 
				<div class='mb-3'>
				<label for='uploadfile' class='form-label'>Файл:</label>
				<input type='file' class='form-control' name='uploadfile'>
				</div> 
				 <button type='submit' class='btn btn-primary' value='".$edit."'>".$edit."</button>	
			</form>";

		  }else{
		echo "
					<form method='post' action='main.php?p=10' enctype='multipart/form-data'>
				<div class='mb-3'>
				<label for='id_good' class='form-label'></label>
				<input type='hidden' class='form-control' name='id_good' value='".$_GET['id_good']."'>
				</div> 
				<div class='mb-3'>
				<label for='good_name_eng' class='form-label'>Name:</label>
				<input type='text' class='form-control' name='good_name_eng' value='".$row['good_name_eng']."'>
				</div> 
				<div class='mb-3'>
				<label for='good_about_eng' class='form-label'>Description:</label>
				<input type='text' class='form-control' name='good_about_eng' value='".$row['good_about_eng']."'>
				</div> 
				<div class='mb-3'>
				<label for='price' class='form-label'>Price:</label>
				<input type='text' class='form-control' name='price' value='".$row['price']."'>
				</div> 
				<div class='mb-3'>
				<label for='id_cat' class='form-label'>Категория:</label>
				<input type='text' class='form-control' name='id_cat' value='".$row['id_cat']."'>
				</div> 
				<div class='mb-3'>
				<label for='uploadfile' class='form-label'>Файл:</label>
				<input type='file' class='form-control' name='uploadfile'>
				</div> 
				 <button type='submit' class='btn btn-primary' value='".$edit."'>".$edit."</button>			
			</form>";
		}
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

		$sql4 = "DELETE from goods WHERE id=".$_GET['id_good'];
		mysqli_query($conn, $sql4);
		
		mysqli_close($conn);
	}
}
?>
</div>
<div class='editCards'>
<?php

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$sql1 = "SELECT * FROM goods JOIN categories ON goods.id_cat = categories.id_cat";
	
	mysqli_query($conn, $sql1);

	$result = mysqli_query($conn, $sql1);

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
	 if(isset($_SESSION['lang'])){
	  if($_SESSION['lang']=='eng'){

			  echo "
				
				<div class='cardBox'>
				<div class='card' >
				<img src='imgDB/".$row["good_img_path"]."' class='card-img-top' alt=''>
					<div class='card-body'>
						<h5 class='card-title'>". $row["good_name_eng"]. "</h5>
						<p class='card-text'>".$row["good_about_eng"]."</p>
						<p class='card-text'>Category: ".$row["cat_name_eng"]."</p>
						<p class='card-text'>".$row["price"]."BYN</p>
						<a href='main.php?p=10&action=edit&id_good=".$row["id"]."'><br>".$edit." </a><a href='main.php?p=10&action=del&id_good=".$row["id"]."'>".$delete." <br></a>
					</div>
				</div>
				</div>";
	  }else{
		  
		  echo "
				
				<div class='cardBox'>
					<div class='card' >
						<img src='imgDB/".$row["good_img_path"]."' class='card-img-top' alt=''>
							<div class='card-body'>
								<h5 class='card-title'>". $row["good_name_rus"]. "</h5>
								<p class='card-text'>Id: ".$row["id"]. "</p>
								<p class='card-text'>".$row["good_about_rus"]."</p>
								<p class='card-text'>Категория: ".$row["cat_name_rus"]."</p>
								<p class='card-text'>".$row["price"]." BYN</p>
							</div>
					</div>
				</div>
				<p><a href='main.php?p=10&action=edit&id_good=".$row["id"]."'><br>".$edit." </a><a href='main.php?p=10&action=del&id_good=".$row["id"]."'>".$delete." <br></a></p>";}
   }
  }
} else {
  echo "0 results";
}
mysqli_close($conn);

?>

	</div>
</div>











