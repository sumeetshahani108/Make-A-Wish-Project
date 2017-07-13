<?php
	include 'conn.php';
	$sql = "select distinct(state) from `address`";
	$allStates = mysqli_query($conn,$sql);

?>