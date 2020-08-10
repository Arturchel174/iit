<?
require_once "db.php";
require_once "vendor/autoload.php";


//$file_name = "log1.txt"; 
$array=file($file_name); 

$arr = [];
//echo '<pre>';
foreach ($array as $stroka) { 
	$slovo = explode(" ",$stroka);

	$country = TabGeo\country($slovo[11]);
	//var_dump($slovo[0]);
	$newtime = $slovo[7].' '.$slovo[8];
	$query = "INSERT INTO logs (`ip`, `country`, `url`, `code`, `date`) VALUES (
	'$slovo[11]',
	'$country',
	'$slovo[12]',
	'$slovo[9]',
	'$newtime'
	)";
	 mysqli_query($link, $query) or die( mysqli_error($link) );
  
	//}
	//array_push($arr, $slovo[11]);
	

	}
// echo '</pre>';
//var_dump($arr);
// $result = [];
// foreach ($arr as $ip) {
	
 
// $ip_data = @json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=".$ip));    
// if($ip_data && $ip_data->geoplugin_countryName != null)
// {
//     array_push($result,$ip_data->geoplugin_countryName);
// }
 

// }
// var_dump($result);
// $filename = 'code.txt';
// file_put_contents($filename, $result);
//var_dump($result) ;