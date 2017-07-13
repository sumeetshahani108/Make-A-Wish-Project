<?php
/**
 * Created by PhpStorm.
 * User: Sumeet
 * Date: 12-07-2017
 * Time: 17:04
 */

include '../../php_action/db_connect.php';
$id = $_GET['child_id'];


//var_dump($id);
//die();
$sql = "SELECT id,wish FROM wish WHERE child_id = $id";
//echo $sql;
$result = $connect->query($sql);

if($result->num_rows > 0){
    $response = "[" ;
    while ($row = $result->fetch_array()){
        $response .= "{" ;
        $response .= '"id": '.$row[0].',' ;
        $response .= '"wish": "'.$row[1].'"' ;
        $response .= "}," ;
    }
    $response = substr($response, 0, strlen($response)-1);
    $response .= "]";

    http_response_code(200);
    echo $response;
}

?>