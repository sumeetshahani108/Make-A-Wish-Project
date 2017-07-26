<?php
/**
 * Created by PhpStorm.
 * User: Sumeet
 * Date: 20-07-2017
 * Time: 00:30
 */
include 'db_connect.php';

$bhk = json_decode($_POST['bhk']);
$my_bhk = array();
foreach ($bhk as $b){
    array_push($my_bhk, $b);
}
$city = $_POST['city'];
$type = json_decode($_POST['type']);
//var_dump($type);
$my_type = array();
foreach ($type as $t){
    array_push($my_type, $t);
}
$min = $_POST['min'];
$max = $_POST['max'];

$bhks = "(".implode(',', $my_bhk).")";

$types = "('".implode(',',$my_type)."')";

$query = "SELECT * FROM apartment_data";
$conditions = array();

if(!empty($city)){
    $conditions[] = "city = '$city'";
}
if(!empty($bhks)){
    $conditions[] = "bhk IN $bhks";
}
if(!empty($types)){
    $conditions[] = "type_of_apartment IN $types";
}

if(!empty($min)){
    $conditions[] = "price >= $min";
}
if(!empty($max)){
    $conditions[] = "price <= $max";
}
$sql = $query;
//var_dump($conditions);

if(count($conditions) > 0){
    $sql .= " WHERE ".implode(' AND ',$conditions);
}
echo $sql;
?>
