<?php
/**
 * Created by PhpStorm.
 * User: Sumeet
 * Date: 20-07-2017
 * Time: 20:46
 */

include 'db_connect.php';
if(isset($_POST['otp'])){
    $number = $_POST['otp'];
}
//echo $number." ";
$otp = otpGenerate();
//echo $otp;
$valid['success'] = array('success' => false, 'messages' => array());
$query = "INSERT INTO otp(`id`,`otp_number`,`mobile_number`) VALUES ('','$otp','$number')   ";

if($connect->query($query) === TRUE){
    $valid['success'] = true;
    $valid['messages'] = 'Successfully Added';
}else{
    $valid['success'] = false;
    $valid['messages'] = 'Error';
}

if($valid['success'] == true){
    header('location: http://localhost/Make-A-Wish/otp-verify.php');
}

function otpGenerate(){
    $rand = generateRandomNumber(6);
    return $rand;
}

function generateRandomNumber($length)
{
    $characters = '0123456789';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
?>