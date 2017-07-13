<?php
/**
 * Created by PhpStorm.
 * User: Sumeet
 * Date: 11-07-2017
 * Time: 19:05
 */
include '../php_action/db_connect.php';
$sql = "SELECT id, first_name, last_name,documents, verified FROM doctor" ;

$result = $connect->query($sql);

$output = array('data' => array());

if( $result->num_rows > 0){
    $status = "";

    while ($row = $result->fetch_array()) {
        $id = $row[0];

        if($row[4] == 1){
            $status = "<label class='label label-success'> Verified </label>";
        }else{
            $status = "<label class='label label-danger'> Not Verified</label>";
        }

        $docs = '<button class="btn btn-default button1" data-toggle="modal" data-target="#viewDocs" onclick="viewDocs('.$id.')" style="margin-left: 5%">Documents</button>';

        $button = '
         <button class="btn btn-default button1" data-toggle="modal" data-target="#editDoctor" onclick="editDoctor('.$id.')">Edit</button>
         <button class="btn btn-default button1" data-toggle="modal" data-target="#deleteDoctor" onclick="deleteDoctor('.$id.')" style="margin-top: 5%">Delete</button>
         ';


        $output['data'][] = array(
          $row[1],
          $row[2],
          $docs,
          $status,
            $button
        );
    }
}
$connect->close();

echo json_encode($output);

?>