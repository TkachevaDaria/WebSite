<!DOCTYPE html>
<html>

<?php

session_start();
$_SESSION['lang']='rus';

function checker($i){
			
        $keys_session = array_keys($_SESSION);
        if (in_array('good'.$i, $keys_session)){
            return 'checked';
        }
        
}

function checkName($name){
	for($i=0; $i<strlen($name); $i++){
		
		if(ctype_digit($name[$i])){
		return 'Имя не действительно';}
	}
	return $name;
}
	
function checkPhone($phone){
	if(ctype_digit($phone)&& strlen($phone)>=7){
		return $phone;
	}else{return 'Телефон не соответствует формату';}
	
}

function checkEmail($email){
	
	if (filter_var($email, FILTER_VALIDATE_EMAIL)){
		return $email;
	}else{ return 'Неверный Email';}
}

if(isset($_POST['lang'])){$_SESSION['lang']=$_POST['lang'];}
	else{include('rus.php');}
	
	if(isset($_SESSION['lang'])){
		if($_SESSION['lang']=='rus')
		{include('rus.php');}
		else{include('eng.php');}
	}

?>


<head>

	<meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title><?php echo $title;?></title>
	<meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="keywords" content=""/>
	
	<link rel="shortcut icon" type="image/x-icon" href="/imgs/lap.jpg">
		
	<link rel="stylesheet" href="/css/bootstrap/css/bootstrap.min.css">
	<link href="/css/hover.css" rel="stylesheet" media="all">

	<link rel="stylesheet" href="/css/style.css?time=<?php echo time(); ?>">
	
	
	<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<script src="/js/modernizr.custom.js"></script>
	<script src="/js/responsiveslides.min.js"></script>

<script>
    // You can also use "$(window).load(function() {"
    $(function () {
      $("#slider2").responsiveSlides({
        auto: true,
        pager: true,
        speed: 300,
        namespace: "callbacks",
      });
    });
  </script>

</head>

<body>

<div class="header">

	<div class="header-info">
	  <div class="container">
		  <div class="row align-items-start">
			<div class="col">
				<div class="logo">
						<a href="main.php?p=1"><img src="/imgs/logoo.png" alt="" /></a>
				</div>
			</div>
			<div class="col">
			  <div class="contactInform">
				<p>10:00-22:00</br>
				+375298949860</br>
				Kotopes@gmail.ru
				<?php
				echo "
				<div class='search-box'>
					<form method='post' action='main.php?p=8'>
						<input type='text' name='search_txt' class='textbox' placeholder='' required=''>
						<input type='submit' value=''>
					</form>	
				</div>";
				?>
				</p></div>
			</div>
			<div class="col">

		 
				 <?php
				// echo"
				// <div class='language'>
					// <form method='post'>
					// <select name='lang'>
						// <option value='rus'>RUS</option>
						// <option value='eng'>ENG</option>
					// </select>	
				
					// <button type='submit' class='btn btn-outline-light'>".$choose."</button>
					// </form>
				// </div><br><br>";
				
				echo "
				<div class='authReg'>
				<div id='authAndReg'>";
				
				if(isset($_SESSION['current_role'])){
					echo "<button type='submit' class='btn btn-light'><a href='main.php?p=12'>".$exit."</a></button>";

					}

				else{
					echo "<button type='submit' class='btn btn-light'><a href='main.php?p=11'>".$authorization."</a></button>";

				}
				
				echo "</div>
				<div id='authAndReg'>
				<button type='submit' class='btn btn-light'><a href='main.php?p=13'>".$registration."</a></button>
				</div>
				
				</div><br>";
				
				echo"
				<div class='basket'>
									
					<button type='submit' class='btn btn-outline-light'><a href='main.php?p=4'>".$basket."</a></button>
					</form>
				</div>";
			?>
	</div>
		</div>
		         <div class="clearfix"> </div>
	  </div>
	</div>
</div>
<?php 
	echo"
    <div class='container'>
	

						<div class='header-bottom'>
							<div class='menu'>
								<span class='menu-info'> </span>
								<ul class='cl-effect-21'>
									<li><a href='main.php'>".$main."</a></li>
									<li><a href='main.php?p=7&id_cat=1'>".$dogsGoods."</a></li>
									<li><a href='main.php?p=7&id_cat=2'>".$catsGoods."</a></li>
									<li><a href='main.php?p=7&id_cat=3'>".$birdsGoods."</a></li>
									<li><a href='main.php?p=7&id_cat=4'>".$rodentsGoods."</a></li>
								 	<li><a href='main.php?p=15'>".$promotions."</a></li>
									<li><a href='main.php?p=2'>".$contacts."</a></li>";
									
									
									if(isset($_SESSION['current_role'])){
										if($_SESSION['current_role']=='admin'){
											
											echo "
											<li><a href='main.php?p=9'>".$addgood."</a></li>
											<li><a href='main.php?p=10'>".$editgood."</a></li>
											<li><a href='main.php?p=14'>".$editusers."</a></li>";
										}
									}

									
									
									echo"
									
								</ul>
							</div>";
							
?>
					<!--script-nav -->	
			        <script>
					$("span.menu-info").click(function(){
						$("ul.cl-effect-21").slideToggle("slow" , function(){
						});
					});
					</script>
					<!-- /script-nav -->
                    <div class="clearfix"> </div>	
		   </div>
  

<div class="header-banner">
<?php 
if (isset($_GET['p'])){
	
	//echo '<br>';

		if ($_GET['p']==1){include('p1.php');}
		if ($_GET['p']==2){include('p2.php');}
		if ($_GET['p']==3){include('p3.php');}
		if ($_GET['p']==4){include('p4.php');}
		if ($_GET['p']==5){include('p5.php');}
		if ($_GET['p']==6){include('p6.php');}
		if ($_GET['p']==7){include('p7.php');}
		if ($_GET['p']==8){include('p8.php');}
		if ($_GET['p']==9){include('p9.php');}
		if ($_GET['p']==10){include('p10.php');}
		if ($_GET['p']==11){include('p11.php');}
		if ($_GET['p']==12){include('p12.php');}
		if ($_GET['p']==13){include('p13.php');}
		if ($_GET['p']==14){include('p14.php');}
		if ($_GET['p']==15){include('p15.php');}
		if ($_GET['p']==16){include('p16.php');}



}
else {include('p1.php');}
?>

   
</div>


 
<div class="footer">
	<div class="container">
		<div class="copy-rights">
			<p>2021, БГУИР, </br> Группа 90422</p>
		</div>

	</div>
</div>
</div>
</body>
</html>