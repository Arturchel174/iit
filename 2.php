<?php
require_once "db.php";
 
$query = "SELECT country, url FROM logs";

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


	$fresh_fish = ['US' => 0, 'CN' => 0, 'GB' => 0, 'JP' => 0, 'DE' => 0];
	foreach($data as $value)
	{
		$pos = strripos($value['url'],'fresh_fish');
		if($pos){
			switch ($value['country']) {
				case 'US':
				  	$fresh_fish['US'] += 1;
				  	break;
				case 'CN':
					$fresh_fish['CN'] += 1;
				  	break;
				case 'GB':
					$fresh_fish['GB'] += 1;
				 	break;
				case 'JP':
					$fresh_fish['JP'] += 1;
					break;
				case 'DE':
					$fresh_fish['DE'] += 1;
					break;
			  }
			//echo $value['country'].'<br>';
		}
	}
	
	foreach($fresh_fish as $key => $elem){
		echo $key.' '.$elem.'<br>';
	}


?>