<?php
require_once "db.php";
 
$query = "SELECT date, url, code FROM logs";

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


	$frozen_fish= [];
	foreach($data as $value)
	{
		$pos = strripos($value['url'],'frozen_fish');
		if($pos){
			$time = substr($value['date'], -8 , -3);
			//echo $time.'<br>';
				if($time >= '00:00' && $time <= '06:00'){
					$frozen_fish['00:00-06:00'] += 1;
					
				}else if($time >= '06:00' && $time <= '12:00'){
					$frozen_fish['06:00-12:00'] += 1;
					
				}else if($time >= '12:00' && $time <= '18:00'){
					$frozen_fish['12:00-18:00'] += 1;
					
				}
				else if($time >= '18:00' && $time <= '24:00'){
					$frozen_fish['18:00-0:00'] += 1;
					
				}
			//echo substr($value['date'], -9 , -3).'<br>';
			//echo $value['code'].' '.$value['url'].'<br>';
		}
	}
	
	foreach($frozen_fish as $key => $elem){
		if($elem == max($frozen_fish)){
			echo $key.' '.$elem.'<br>';
		}
	}

	// echo '<pre>';
	// var_dump($frozen_fish);
	// echo '</pre>';


?>