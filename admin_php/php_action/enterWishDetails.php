<?php
/**
 * Created by PhpStorm.
 * User: Sumeet
 * Date: 12-07-2017
 * Time: 18:19
 */
include '../../php_action/db_connect.php';
$wish_id = $_POST['wishId'];
$date_time = $_POST['wish_date_time'];

$valid['success'] = array('success' => false, 'messages' => array());

$sql = "INSERT INTO selected_wish(wish_id,date_time) VALUES ('$wish_id','$date_time')";
$result = $connect->query($sql);

if($result == TRUE){
    $valid['success'] = true;
    $valid['messages'] = "Successfully Updated";
}else{
    $valid['success'] = false;
    $valid['messages'] = "Error while adding the members";
}
$connect->close();

echo json_encode($valid);

?>