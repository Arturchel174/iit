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
    $all_pay = 0;
    $all_cart = 0;
    foreach($data as $value)
    {
        $pos = strripos($value['url'],'pay');
        $cart = strripos($value['url'],'cart?goods_id');
        if($cart){
            // $all_cart++; 
            // array_push($cart_a, $value['ip']);
           // echo $value['url'].'<br>';
        }
        if($pos){
                // $all_pay++;
                array_push($users, trim($value['ip']));
            //    echo $value['ip'].' '.$value['url'].'<br>';
        }
	}
	
	$c_users = count($users);

	echo '<pre>';
	//var_dump(array_unique($users));//737
	echo '</pre>';

	echo $c_users - count(array_unique($users));
    // echo count($cart_a).'<br>';
    // echo count(array_unique($cart_a)) - count(array_unique($users));

    $repeat_pay = $all_pay - count(array_unique($users));
    // $no_paid = $all_cart - $all_pay; // 1308 - 
    // echo 'Всего повторных покупок: '.$repeat_pay.'<br>';

    // echo 'Брошенных (не оплаченных) корзин имеется: '.$no_paid;


?>