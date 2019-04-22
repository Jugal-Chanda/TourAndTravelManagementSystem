<?php include 'php/connection.php';  ?>
<?php 

$sql = "SELECT h_id,cover_photo,hotel_name,city_town,country from hotels";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
?>
                     
                    <div class="col-md-6 col-lg-3 col-sm-12 hotel_img_div" style="height: 300px;padding: 0px;" onclick="hotels_onclick_fun(<?php echo $row['h_id']; ?>)">
                        <img src="../hotel_images/<?php echo $row['cover_photo']; ?>" style="height: 90%;width: 100%; border: 2px solid white;z-index: 1;">
                        <div class="hotel_name_place" style="vertical-align: middle;">
                            <?php
                            echo $row['hotel_name']."<br>";
                            echo $row['city_town'].",".$row['country'];
                            ?>
                        </div>
                        <div class="rating">
                            <?php for ($j=0; $j < 5 ; $j++) { ?>
                               <i class="fa fa-star"></i>
                             <?php }  ?>
                        </div>
                    </div>

<?php
    }
} else {
    echo "0 results";
}
?>