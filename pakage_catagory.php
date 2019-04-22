<?php  include 'php/connection.php'; 


$sql = "SELECT pakage_id,tourist_place.place_cover_photo,tourist_place.place_name,catagory.catagory_name,pakages.travel_cost FROM tourist_place,catagory,pakages WHERE pakages.place_id = tourist_place.p_id AND pakages.catagory_id = catagory.c_id;";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) { 

?>
   
                     
                    <div class="col-md-6 col-lg-3 col-sm-12 pakage_catagory_img_div" style="height: 400px;padding: 0px;" onclick="pakage_onclick_fun(<?php echo $row['pakage_id']; ?>)">
                        <img src="tourist_place/<?php echo $row['place_cover_photo']; ?>" style="height: 70%;width: 100%; border: 2px solid white;z-index: 1;">

                        <div class="pakage_catagory_place_name">
                            <div style="height: 100%;width: 100%;line-height: inherit;"><?php echo $row['place_name']."<br>"; ?> </div>
                        </div>
                        <div class="pakage_catagory_name">
                            Pakage Catagory : <?php echo $row['catagory_name']; ?>
                        </div>
                        <div class="pakage_cost">
                            Total Cost : <?php echo $row['travel_cost']; ?>tk
                        </div>

                       
                    </div>

               <?php
    }
} else {
    echo "0 results";
}
?> 