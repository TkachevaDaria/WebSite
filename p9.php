<div class='addGood'>
<h2><?php echo $addgood; ?></h2>

<form method="post" action='main.php?p=9' enctype='multipart/form-data'>
  <div class="mb-3">
    <label for="good_name_rus" class="form-label"><?php echo $enternamerus ?></label>
    <input type="text" class="form-control" name='good_name_rus' >
  </div> 
   <div class="mb-3">
    <label for="good_name_eng" class="form-label"><?php echo $enternameeng ?></label>
    <input type="text" class="form-control" name='good_name_eng'>
  </div> 
   <div class="mb-3">
    <label for="good_about_rus" class="form-label"><?php echo $enteraboutrus ?></label>
    <input type="text" class="form-control" name='good_about_rus'>
  </div> 
   <div class="mb-3">
    <label for="good_about_eng" class="form-label"><?php echo $enterabouteng ?></label>
    <input type="text" class="form-control" name='good_about_eng'>
  </div> 
  <div class="mb-3">
    <label for="price" class="form-label"><?php echo $entervalue ?></label>
    <input type="text" class="form-control" name='price'>
  </div>
  <div class="mb-3">
    <label for="uploadfile" class="form-label"></label><br>
    <input type="file" class='form-control' name='uploadfile'>
  </div>

  
  <select class="form-select" name='id_cat' aria-label="Default select example">
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

		$sql = "SELECT id_cat, cat_name_rus, cat_name_eng  FROM categories";

		$result = mysqli_query($conn, $sql);
		echo "<option selected>Выберите категорию</option>";
		if (mysqli_num_rows($result) > 0) {
		  // output data of each row
			while($row = mysqli_fetch_assoc($result)) {
			  
				if($_SESSION['lang']=='eng')
				{echo "<option value=".$row["id_cat"].">".$row["cat_name_eng"]."</option>";} 
			
				else{echo "<option value=".$row["id_cat"].">".$row["cat_name_rus"]."</option>";} 
			} 
		}
		else { echo "0 results";}
		mysqli_close($conn);
  
 ?>  
  

</select>
    
  <button type="submit" class="btn btn-primary" value='<?php echo $addgood; ?>'><?php echo $addgood; ?></button>
</form>
</div>



<?php
echo "<div>";
if(isset($_POST['good_name_rus'])){echo "<h3>".$checkData."</h3><br>"; echo $enternamerus.":<br>".$_POST['good_name_rus'].'<br>';}
if(isset($_POST['good_name_eng'])){echo $enternameeng.":<br>"; echo $_POST['good_name_eng'].'<br>';}
if(isset($_POST['good_about_rus'])){echo $enteraboutrus.":<br>"; echo $_POST['good_about_rus'].'<br>';}
if(isset($_POST['good_about_eng'])){echo $enterabouteng.":<br>"; echo $_POST['good_about_eng'].'<br>';}
if(isset($_POST['price'])){echo $entervalue.": "; echo $_POST['price'].'<br>';}
if(isset($_POST['id_cat'])){echo $category.": "; echo $_POST['id_cat'].'<br>';}
if(isset($_POST['id_cat'])){
	
echo"</div>";	
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

$sql = "insert into goods (id_cat, good_name_rus, good_name_eng, good_about_rus, good_about_eng, price, good_img_path) 
				values(".$_POST['id_cat'].",'".$_POST['good_name_rus']."','".$_POST['good_name_eng']."','".$_POST['good_about_rus']."','".$_POST['good_about_eng']."', '".$_POST['price']."','".basename($_FILES['uploadfile']['name'])."')";
copy($_FILES['uploadfile']['tmp_name'], "imgDB/".basename($_FILES['uploadfile']['name']));

mysqli_query($conn, $sql);



mysqli_close($conn);
}
?>
</div>