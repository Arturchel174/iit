<?php
echo "Запись в бд и парсинг логов: code.php <br>";
echo "Первое задание: <br>";
require_once "1.php";
echo "Второе задание: <br>";
require_once "2.php";

echo "Третье задание: <br>";
require_once "3.php";

echo "Четвертое задание: <br>";
require_once "4.php";
echo "<br><hr>";
require_once "6_7.php";

// require_once "db.php";
 
// $query = "SELECT ip, url, code FROM logs";

// //Делаем запрос к БД, результат запроса пишем в $result:
// 	$result = mysqli_query($link, $query) or die( mysqli_error($link) );

// //Преобразуем то, что отдала нам база в нормальный массив PHP $data:
// 	for ($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row);
// 	/*
// 	US-9220
// 	CN-2310
// 	GB-784	
// 	JP-739
// 	DE-721
// 	*/


// 	$users= [];

// 	foreach($data as $value)
// 	{
// 		$pos = strripos($value['url'],'success_pay');
// 		// $cart = strripos($value['url'],'cart?goods_id');
// 		// if($cart){$all_cart++;}
// 		if($pos){
// 				$users[] = ['user' => $value['ip']];
// 		}
// 	}

// 	$arr = [];
// 	echo '<pre>';
// 	foreach($users as $value){
// 		$ip = $value['user'];
// 		//echo $ip.'<br>';
// 		$query = "SELECT url, ip FROM logs WHERE ip='$ip'";
// 		$result = mysqli_query($link, $query) or die( mysqli_error($link));
// 		for ($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row);
		
		
// 		// echo $value['country'].'<br>';
		
		
// 	}
// 	array_push($arr, $data);
// 	echo '</pre>';
// 	echo '<pre>';
// 	var_dump($arr);
// 	echo '</pre>';

?>