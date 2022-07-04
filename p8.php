
<?php

if(isset($_POST['search_txt'])){echo "<div><p> ".$searchresult.": ".$_POST['search_txt']."</p>";}
if(isset($_POST['search_txt'])){

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


$sql = "SELECT id, id_cat, good_name_rus, good_name_eng, good_about_rus, good_about_eng, price, good_img_path FROM goods where good_name_rus LIKE '%".$_POST['search_txt']."%'";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
  // output data of each row
    
  $i=1;
	while($row = mysqli_fetch_assoc($result)) {
	  if(isset($_SESSION['lang'])){
	  if($_SESSION['lang']=='eng')
		{echo "
		<form method='post' action='main.php?p=4'>
		<div class='cardBox'>
			<div class='card' >
			<img src='imgDB/".$row["good_img_path"]."' class='card-img-top' alt=''>
				<div class='card-body'>
					<h5 class='card-title'>". $row["good_name_eng"]. "</h5>
					<p class='card-text'>".$row["good_about_eng"]."</p>
					<p class='card-text'>".$row["price"]."BYN</p>
					<input type=checkbox name='good".$row["id"]."' value='".$row["id"]."' ".checker($row["id"]).">

				</div>
			</div>
		</div>";}
		else{echo "
		<form method='post' action='main.php?p=4'>
		<div class='cardBox'>
		
			<div class='card' >
			<img src='imgDB/".$row["good_img_path"]."' class='card-img-top' alt=''>
				<div class='card-body'>
					<h5 class='card-title'>". $row["good_name_rus"]. "</h5>
					<p class='card-text'>".$row["good_about_rus"]."</p>
					<p class='card-text'>".$row["price"]." BYN</p>
					<p><button type='submit' name='".$row["good_name_rus"]."' class='btn btn-primary' value='".$row["id"]."' ".checker($row["id"]).">".$order."</button></p>

				</div>
			</div>
		</div>";}
	 }
	}
	$i++;
  
	echo "</form></div>";
} else {
	echo "<div><p> ".$searchresult.": ".$_POST['search_txt']."</p>";
	echo "0 results</div></div>";
}

mysqli_close($conn);
}
?>
