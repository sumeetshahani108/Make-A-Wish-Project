<?php
/**
 * Created by PhpStorm.
 * User: Sumeet
 * Date: 12-07-2017
 * Time: 01:24
 */
include '../../php_action/db_connect.php';
$valid['success'] = array('success' => false, 'messages' => array());
if($_POST) {
    $status = $_POST['editDoctorStatus'];
    $id = $_POST['doctorId'];

    $sql = "UPDATE doctor SET verified = '$status' WHERE id = '$id'";

    if($connect->query($sql) === TRUE) {

        $valid['success'] = true;
        $valid['messages'] = "Successfully Updated";
    } else {
        $valid['success'] = false;
        $valid['messages'] = "Error while adding the members";
    }

    $connect->close();

    echo json_encode($valid);

}

?>