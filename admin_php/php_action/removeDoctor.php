<?php
/**
 * Created by PhpStorm.
 * User: Sumeet
 * Date: 12-07-2017
 * Time: 02:27
 */
include '../../php_action/db_connect.php';
$valid['success'] = array('success' => false, 'messages' => array());

$id = $_POST['doctorId'];

if($id) {

    $sql = "DELETE FROM doctor WHERE id = $id";

    if ($connect->query($sql) === TRUE) {
        $valid['success'] = true;
        $valid['messages'] = "Successfully Removed";
    } else {
        $valid['success'] = false;
        $valid['messages'] = "Error while remove the brand";
    }

    $connect->close();

    echo json_encode($valid);

}
?>