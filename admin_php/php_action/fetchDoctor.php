<?php
/**
 * Created by PhpStorm.
 * User: Sumeet
 * Date: 12-07-2017
 * Time: 01:30
 */
include '../../php_action/db_connect.php';
$id = $_POST['doctorId'];
$sql = "SELECT first_name, last_name FROM doctor WHERE id = $id";
$result = $connect->query($sql);

if($result->num_rows > 0) {
    $row = $result->fetch_array();
} // if num_rows

$connect->close();

echo json_encode($row);
?>