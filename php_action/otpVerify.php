<?php
/**
 * Created by PhpStorm.
 * User: Sumeet
 * Date: 20-07-2017
 * Time: 22:33
 */
include "db_connect.php";
global $m_number;
$otp = $_POST['verify_otp'];
$query_1 = "SELECT * FROM otp WHERE otp_number = '$otp'";
$result_1 = $connect->query($query_1);

if($result_1->num_rows > 0){
    while ($row = $result_1->fetch_array()){
        $m_number = $row['mobile_number'];
    }
}

$query = "UPDATE doctor SET verified = '1' WHERE contact_no='$m_number'";
if($connect->query($query) === TRUE){
    header('location:  http://localhost/Make-A-Wish/index.php');
}



?>