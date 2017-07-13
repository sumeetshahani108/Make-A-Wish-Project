<?php
/**
 * Created by PhpStorm.
 * User: Sumeet
 * Date: 12-07-2017
 * Time: 14:17
 */

include '../../php_action/db_connect.php';
$sql = "SELECT child.first_name, child.last_name, address.street, address.city, address.state, address.country, doctor.first_name,doctor.last_name,
        volunteer.first_name, volunteer.last_name,child.id FROM child,address,doctor,volunteer
        WHERE child.address_id=address.id
        AND child.doctor_verified=doctor.id
        AND child.volunteer_verified=volunteer.id";

$result = $connect->query($sql);
$response = "[" ;
if($result->num_rows > 0){
    while ($row = $result->fetch_array()){
        $response .= "{" ;
        $response .= '"child_first_name": "'.$row[0].'",' ;
        $response .= '"child_last_name": "'.$row[1].'",' ;
        $response .= '"street": "'.$row[2].'",' ;
        $response .= '"city": "'.$row[3].'",' ;
        $response .= '"state": "'.$row[4].'",' ;
        $response .= '"country": "'.$row[5].'",' ;
        $response .= '"doctor_first_name": "'.$row[6].'",' ;
        $response .= '"doctor_last_name": "'.$row[7].'",' ;
        $response .= '"volunteer_first_name": "'.$row[8].'",' ;
        $response .= '"volunteer_last_name": "'.$row[9].'",' ;
        $response .= '"child_id": '.$row[10] ;
        $response .= "}," ;
    }
    $response = substr($response, 0, strlen($response)-1);
    $response .= "]";

    http_response_code(200);
    echo $response;
}
?>