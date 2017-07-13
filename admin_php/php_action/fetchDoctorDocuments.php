<?php
/**
 * Created by PhpStorm.
 * User: Sumeet
 * Date: 11-07-2017
 * Time: 21:26
 */
include '../../php_action/db_connect.php';
$id = $_POST['doctorId'];
$sql = "SELECT documents FROM doctor WHERE id = $id";
$result = $connect->query($sql);

if($result->num_rows > 0) {
    $row = $result->fetch_array();
} // if num_rows

$connect->close();

echo json_encode($row);

?>