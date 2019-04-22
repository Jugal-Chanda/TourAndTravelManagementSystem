
<tr style="width: 100%;border:1px solid black;text-align: center;">
	<th colspan="4">Place Information</th>
</tr>
<tr style="width: 100%;border:1px solid black;">
	<th style="width: 25%;border:1px solid black;">Place Name</th>
	<th style="width: 25%;border:1px solid black;">City/Town</th>
	<th style="width: 25%;border:1px solid black;">Country</th>
	<th style="width: 25%;border:1px solid black;"> No Of Tourist</th>
</tr>

<?php

include "connection.php";

$sql = "SELECT COUNT(user_id) AS no_of_tour,booking_place_id FROM booking group by booking_place_id;";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
    	$id = $row['booking_place_id'];
    	$sql1 = "SELECT place_name,city_town,country FROM tourist_place where p_id='$id';";
    	$result1=$conn->query($sql1);
    	$row1 = $result1->fetch_assoc();
?>
<tr style="width: 100%;border:1px solid black;">
	<td style="width: 25%;border:1px solid black;"><?php echo $row1['place_name']; ?></td>
	<td style="width: 25%;border:1px solid black;"><?php echo $row1['city_town']; ?></td>
	<td style="width: 25%;border:1px solid black;"><?php echo $row1['country']; ?></td>
	<td style="width: 25%;border:1px solid black;"><?php echo $row['no_of_tour']; ?></td>
</tr>

<?php }
}

?>