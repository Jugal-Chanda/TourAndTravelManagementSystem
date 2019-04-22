<?php include 'connection.php';  ?>
<?php 
$str = $_GET['name'];
$str = $str."%";
$sort = $_GET['c'];
if($sort == 0){
    $sql = "SELECT p_id,place_name,place_cover_photo,travel_cost,city_town,country From tourist_place WHERE place_name LIKE '$str';";
}
else if($sort == 1){
    $sql = "SELECT p_id,place_name,place_cover_photo,travel_cost,city_town,country From tourist_place WHERE place_name LIKE '$str' ORDER BY travel_cost ASC;";
}
else{
    $sql = "SELECT p_id,place_name,place_cover_photo,travel_cost,city_town,country From tourist_place WHERE place_name LIKE '$str' ORDER BY travel_cost DESC;";
}
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) { 

 ?>
                     
                    <div class="col-md-6 col-lg-3 col-sm-12 tourist_place_img_div" style="height: 300px;padding: 0px;" onclick="(tourist_place_onclick_fun(<?php echo $row['p_id']; ?>))">
                        <img src="tourist_place/<?php echo $row['place_cover_photo']; ?>" style="height: 90%;width: 100%; border: 2px solid white;z-index: 1;">
                        <div class="tourist_place_name">
                            <div style="height: 100%;width: 100%;line-height: inherit;">
                               <?php

                               echo $row['place_name']."<br>";
                               echo $row['city_town'].", ".$row['country'];

                               ?>
                                    
                                </div>
                        </div>
                        <div class="travel_cost">
                            Two Way Travel Cost : <?php echo $row['travel_cost'] ?>tk
                        </div>
                    </div>

                    <?php
                        }
                    } else {
                        echo "0 results";
                    }
                    ?>