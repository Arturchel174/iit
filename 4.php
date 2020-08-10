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

	$array = [];
	foreach($data as $value)
	{
		$all_time = substr($value['date'], 0, 13);
		array_push($array,$all_time);
	}
	
	$counter_arr = [];
    
    foreach($array as $value){
        if(!array_key_exists($value, $counter_arr)){
            $counter_arr[$value] = 0;
        }else{
            $counter_arr[$value]++;
        }
    }
    
    $temp = [];
    $result_arr = [];
    foreach($counter_arr as $key => $value){
        if($value > 0){
            for($i = 0; $i <= $value; $i++){
                $temp[] = $key;
                
            }
            $result_arr[] = $temp;
            $temp = [];
        }
    }
	$arr1 = [];
	foreach($result_arr as $arr){
		array_push($arr1,count($arr));
	}

	echo 'Максимальное число запросов на сайт за астрономический час: '.max($arr1);


?>