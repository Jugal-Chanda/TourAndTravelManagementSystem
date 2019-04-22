<tr style="width: 100%;border:1px solid black;">
    <th style="width: 11.11%;border:1px solid black;">Serial No</th>
    <th style="width: 11.11%;border:1px solid black;">User Name</th>
    <th style="width: 11.11%;border:1px solid black;">Place Name</th>
    <th style="width: 11.11%;border:1px solid black;">Hotel Name</th>
    <th style="width: 11.11%;border:1px solid black;">Starting Date</th>
    <th style="width: 11.11%;border:1px solid black;">Ending Date</th>
    <th style="width: 11.11%;border:1px solid black;">Duration</th>
    <th style="width: 11.11%;border:1px solid black;">Cost</th>
    <th style="width: 11.11%;border:1px solid black;">Status</th>                        
</tr>

<?php
include 'php/connection.php';
$cookie_name = "user";
if(!isset($_COOKIE[$cookie_name])){
    header("Location: login.php");
}
$user_id = $_COOKIE[$cookie_name];

$sql = "SELECT  user_name,booking_id,booking_hotel_id,user_id,place_name,starting_date,ending_date,no_of_days,approve,booking.travel_cost FROM booking natural join information,tourist_place WHERE booking.user_id = '$user_id' AND tourist_place.p_id = booking.booking_place_id ORDER BY booking_id DESC";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $sl = $result->num_rows;
    while($row = $result->fetch_assoc()) { 
 ?>
 <tr style="width: 100%;border:1px solid black;">
     <td style="width: 11.11%;border:1px solid black;"><?php echo $sl; ?></td>
     <td style="width: 11.11%;border:1px solid black;"><?php echo $row['user_name']; ?></td>
     <td style="width: 11.11%;border:1px solid black;"><?php echo $row['place_name']; ?></td>
     <td style="width: 11.11%;border:1px solid black;">
         <?php

         if($row['booking_hotel_id']==0){
            echo "-";
         }else{
            $y = $row['booking_hotel_id'];
            $sql1 = "SELECT hotel_name FROM hotels WHERE h_id='$y';";
            $result1 = $conn->query($sql1);
            $row1 = $result1->fetch_assoc();
            echo $row1['hotel_name'];
         }

         ?>
     </td>
     <td style="width: 11.11%;border:1px solid black;"><?php echo $row['starting_date']; ?></td>
     <td style="width: 11.11%;border:1px solid black;"><?php echo $row['ending_date']; ?></td>
     <td style="width: 11.11%;border:1px solid black;"><?php echo $row['no_of_days']; ?></td>
     <td style="width: 11.11%;border:1px solid black;"><?php echo $row['travel_cost']; ?></td>
     <td style="width: 11.11%;border:1px solid black;"><?php
     if($row['approve'] == 0){
        echo "<b>Pending</b>";
     }
     else{
        echo "<b>aproved</b>";
     }
     ?></td>
     <?php $b_id =  $row['booking_id'] ?>
 </tr>
  <?php
  $sl-=1;
    }
} else {
    echo "0 results";
}
?>