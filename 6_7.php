<?php
require_once "db.php";
 
$query = "SELECT ip, url, code FROM logs";

//Делаем запрос к БД, результат запроса пишем в $result:
	$result = mysqli_query($link, $query) or die( mysqli_error($link) );

//Преобразуем то, что отдала нам база в нормальный массив PHP $data:
	for ($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row);
	/*
	US-9220
	CN-2310
	GB-784	
	JP-739
	DE-721
	*/


	$users= [];
		
	$cart_a = [];
	$pay_id = [];
	$all_pay = 0;
	$all_cart = 0;
	foreach($data as $value)
	{
		$pos = strripos($value['url'],'success_pay');
		$cart = strripos($value['url'],'cart?goods_id');
		if($cart){
			$value['url'] = trim($value['url']).'/';
			
			if(strlen($value['url']) == 68 ){
				array_push($cart_a, substr(trim($value['url']), 63, -1));
			}
			else if(strlen($value['url']) == 69 ){
				array_push($cart_a, substr(trim($value['url']), 64, -1));
			}

		}
		if($pos){
				array_push($users, trim($value['ip']));
				array_push($pay_id,substr(trim($value['url']), 42, -1));

		}
	}

	//echo count($pay_id) - count(array_unique($pay_id));

	$c_users = count($users);

	$repeat_pay = count($users) - count(array_unique($users));
	echo 'Всего повторных покупок(неправильно похоже) : '.$repeat_pay.'<br>';
	

	$cart_a = count(array_unique($cart_a));

	$a = $cart_a - count($pay_id);

	echo 'Брошенных (не оплаченных) корзин имеется: '.$a;
	

	// foreach($cart_a as $c){
		
	// }
	// echo count($cart_a).'<br>';
	// echo count(array_unique($cart_a)) - count(array_unique($users));

	// $repeat_pay = $all_pay - count(array_unique($users));
	// $no_paid = $all_cart - $all_pay; // 1308 - 
	// echo 'Всего повторных покупок: '.$repeat_pay.'<br>';

	// echo 'Брошенных (не оплаченных) корзин имеется: '.$no_paid;


?>