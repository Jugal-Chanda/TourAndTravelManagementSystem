<?php include 'connection.php';  ?>
<?php
$place_name = $_POST['place_name'];
$hotel_name = $_POST['hotel_name'];
$catagory_name = $_POST['catagory_name'];
$no_of_person = $_POST['no_of_person'];
$no_of_days = $_POST['no_of_days'];
$travel_cost = $_POST['travel_cost'];
$pakage_name = $_POST['pakage_name'];

$place_name_id = 0;
$hotel_name_id = 0;
$catagory_name_id = 0;

$place_city_town = '';

$sql = "SELECT p_id FROM tourist_place WHERE place_name = '$place_name';";
$result = $conn->query($sql);


if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
    	
        echo "<br>".$row['p_id'];
        $place_name_id = $row['p_id'];
    }
} else {
    echo "0 results";
}


if($place_name_id!=0){
	$sql = "SELECT 	h_id from hotels WHERE hotel_name = '$hotel_name';";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		$row = $result->fetch_assoc();
		$hotel_name_id = $row['h_id'];
		echo "hotel found";
	}else{
		echo "hotel name not found<br>";
	}
}


if($place_name_id!=0 && $hotel_name_id!=0){
	$sql = "SELECT 	c_id from catagory WHERE catagory_name = '$catagory_name'";
	$result = $conn->query($sql);
	$rows = $result->num_rows;
	if ($rows > 0) {
		$row = $result->fetch_assoc();
		$catagory_name_id = $row['c_id'];
	}else{
		$sql = "INSERT INTO catagory (catagory_name) VALUES ('$catagory_name');";
		$insert =$conn->query($sql);
		echo $insert?'new catagory add ':'Insert error';
		$sql = "SELECT 	c_id from catagory WHERE catagory_name = '$catagory_name'";
		$result = $conn->query($sql);
		$row = $result->fetch_assoc();
		$catagory_name_id = $row['c_id'];
	}
}

if($place_name_id!=0 && $hotel_name_id!=0 && $catagory_name_id!=0){
	$sql = "SELECT pakage_id FROM pakages WHERE pakage_name = '$pakage_name';";
	$result = $conn->query($sql);
	$rows = $result->num_rows;
	if ( $rows > 0) {
		echo "pakage name already entered ";
	}else {
		$sql = "INSERT INTO `pakages` (`pakage_name`, `place_id`, `hotel_id`, `catagory_id`, `person`, `duration`, `travel_cost`) VALUES ('$pakage_name', '$place_name_id', '$hotel_name_id', '$catagory_name_id', '$no_of_person', '$no_of_days', '$travel_cost');";
			if ($conn->query($sql) === TRUE) {
				echo "New record created successfully";
			} else {
				echo "Error: " . $sql . "<br>" . $conn->error;
			}

	}

	
}


?>