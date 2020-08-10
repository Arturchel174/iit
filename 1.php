<?php
require_once "db.php";
 
$query = "SELECT DISTINCT (country) FROM logs";

//Делаем запрос к БД, результат запроса пишем в $result:
	$result = mysqli_query($link, $query) or die( mysqli_error($link) );

//Преобразуем то, что отдала нам база в нормальный массив PHP $data:
	for ($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row);

//Массив результата лежит в $data, выведем его на экран:
	// echo '<pre>';
	// var_dump($data);
	// echo '</pre>';
	$arr = [];
	foreach($data as $value){
		$code = $value["country"];
		//echo 1;
		$query = "SELECT COUNT(country) as country_count FROM logs WHERE country='$code'";
		$result = mysqli_query($link, $query) or die( mysqli_error($link));
		
		$count = mysqli_fetch_assoc($result);

		$arr[] = ['code' => $code, 'count' => $count['country_count']];
		// array_push($arr,intval($count['country_count']));
		// echo $value['country'].'<br>';
		
		
	}
	
	function cmp($a, $b)
	{
   		if ($a['count'] == $b['count']) return 0;
    	return $a['count'] > $b['count'] ? 1 : -1;
	}

	uasort($arr, 'cmp');
	$arr = array_reverse($arr);
	// foreach($arr as $value){
	// 	echo $value['code'].'-'.$value['count'].'</br>';
	// }
	
	for($i=0; $i < 5;$i++){

		echo $arr[$i]['code'].'-'.$arr[$i]['count'].'</br>';	
	}
	// echo '<pre>';
	// var_dump($arr);
	// echo '</pre>';

?>