<div class='orderResult'>
<?php

echo '<h4>Заказ оформлен!<h4>
		<h5>В ближайшее время наш оператор свяжется с вами для подтверждения заказа</h5>';
echo '<br>';
echo '<h5>Вы заказали:</h5>';

$keys_session = array_keys($_SESSION);
foreach($keys_session as $ks){
	if($ks!='lang' and $ks!='style' and $ks!='current_role' and $ks!='sum'){
	echo $ks.'<br>';
	}
}

echo '<br>';

echo '<h5>Данные доставки и оплаты:</h5>';
echo 'Ваше имя: '.checkName($_POST['user']).'<br>';
echo 'Ваш телефон: '.checkPhone($_POST['phoneNumb']).'<br>';
if(isset($_POST['adress'])){echo 'Ваш адрес: '.$_POST['adress'].'<br>';}



echo 'Способ оплаты: ';
if($_POST['payment']=='cash'){echo 'Наличными<br>';
}else{echo 'Карта<br>';}

echo 'Способ доставки:';
if($_POST['delivery']=='pickup'){echo ' Самовывоз<br>';
}else{echo ' Доставка<br>';}

echo "
<br><a href='main.php?p=1'> Вернуться на главную</a>
</div>";
session_destroy();

?>