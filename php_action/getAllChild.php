<?php
	include 'conn.php';
	$sql = "SELECT * FROM `address`";
	$where_conditions = array();
	if(isset($_POST["state"])){
		array_push($where_conditions, "state='".$_POST["state"]."'");
	}
	if(isset($_POST["city"]) ){
		if($_POST["city"] != "null")
			array_push($where_conditions, "city='".$_POST["city"]."'");
	}
	$sql = $sql." WHERE ".implode(" AND ",$where_conditions);
	$allRegions = mysqli_query($conn,$sql);
	$StatesOrCity = array();
	if(mysqli_num_rows($allRegions) > 0){
		while($row = mysqli_fetch_assoc($allRegions)){
			array_push($StatesOrCity,$row["id"]);
		}
	}
	$specificRegions = "(".implode(',',$StatesOrCity).")";
	//var_dump($specificRegions);
	$sql_get_all_child = "SELECT * FROM `child` WHERE `address_id` IN ".$specificRegions;
	$result_get_all_child = mysqli_query($conn,$sql_get_all_child);
	$names = array();
	$address = array();
	$disease = array();
	$images = array();
	$ids = array();
	//var_dump($result_get_all_child);
	if(mysqli_num_rows($result_get_all_child) > 0){
		while($row_get_names = mysqli_fetch_assoc($result_get_all_child)){
			array_push($ids, $row_get_names["id"]);

			array_push($names, $row_get_names["first_name"]." ".$row_get_names["last_name"]);

			array_push($images, $row_get_names["image"]);

			$sql_get_address = "SELECT * FROM `address` WHERE id=".$row_get_names['address_id'];
			$result_get_address = mysqli_query($conn,$sql_get_address);
			$actual_address = mysqli_fetch_assoc($result_get_address);
			array_push($address, $actual_address["street"].", ".$actual_address["city"]);

			$sql_get_disease = "SELECT * FROM `disease` WHERE id=".$row_get_names['disease_id'];
			$result_get_disease = mysqli_query($conn,$sql_get_disease);
			$actual_disease = mysqli_fetch_assoc($result_get_disease);
			array_push($disease, $actual_disease["type"]);
		}
	}
	echo json_encode($childDetails = array('ids'=>$ids,'names' =>$names ,'address'=>$address,'disease'=>$disease,'images'=>$images ));

?>