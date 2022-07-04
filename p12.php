<?php 
	unset($_SESSION['current_role']);
?>
<div>
<h2><?php echo "Сеанс завершен!<br>"; ?></h2>
<?php 
	echo "<a href='main.php?p=1'>".$main."</a><br>"; 

?>
</div>