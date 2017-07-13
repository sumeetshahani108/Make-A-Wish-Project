<?php
	include 'conn.php';

	$sql = "SELECT distinct(city) from `address` where state='".$_POST['state']."'";
	
	$allCities = mysqli_query($conn,$sql);
	$cities = array();
	if(mysqli_num_rows($allCities) > 0){
		while($row = mysqli_fetch_assoc($allCities)){
			array_push($cities, $row['city']);
		}
	}
	echo json_encode($cities);
?>