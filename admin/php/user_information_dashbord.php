
<tr style="width: 100%;border:1px solid black;text-align: center;">
	<th colspan="3">user Information</th>
</tr>
<tr style="width: 100%;border:1px solid black;">
	<th style="width: 30%;border:1px solid black;">User Name</th>
	<th style="width: 40%;border:1px solid black;">Email</th>
	<th style="width: 30%;border:1px solid black;">No of Tour</th>
</tr>

<?php

include "connection.php";

$sql = "SELECT COUNT(booking_id) AS no_of_tour,user_id FROM booking group by user_id;";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
    	$id = $row['user_id'];
    	$sql1 = "SELECT user_name,email FROM information where user_id='$id';";
    	$result1=$conn->query($sql1);
    	$row1 = $result1->fetch_assoc();
?>
<tr style="width: 100%;border:1px solid black;">
	<td style="width: 30%;border:1px solid black;"><?php echo $row1['user_name']; ?></td>
	<td style="width: 30%;border:1px solid black;"><?php echo $row1['email']; ?></td>
	<td style="width: 30%;border:1px solid black;"><?php echo $row['no_of_tour']; ?></td>
</tr>

<?php }
}

?>