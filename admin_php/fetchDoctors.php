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

        $docs = '<button class="btn btn-default button1" data-toggle="modal" data-target="#viewDocs" style="margin-left: 5%">Documents</button>';

        $button = '
         <div class="btn-group">
         <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
	        Action <span class="caret"></span>
	     </button>
	     <ul class="dropdown-menu">
            <li><a type="button" data-toggle="modal" data-target="#editDoctorModal" onclick="editDoctor('.$id.')"> <i class="glyphicon glyphicon-edit"></i> Edit</a></li>
            <li><a type="button" data-toggle="modal" data-target="#removeDoctorModal" onclick="removeDoctor('.$id.')"> <i class="glyphicon glyphicon-trash"></i> Remove</a></li>
         </ul>
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