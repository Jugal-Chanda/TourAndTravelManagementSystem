<?php include 'php/connection.php';  ?>
<?php

                    $sql = "SELECT image_name,place from galary_images";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) { ?> 

                    <div class="col-md-6 col-lg-3 col-sm-12 galary_img_div" style="height: 250px;padding: 0px;">
                        <img src="galary_images/<?php echo $row['image_name']; ?>" style="height: 100%;width: 100%; border: 2px solid white;z-index: 1;">
                        <div class="galary_img_place">
                            <div style="height: 100%;width: 100%;line-height: inherit;"><?php  echo $row['place'];   ?></div>
                        </div>
                    </div>

                     <?php
                        }
                    } else {
                        echo "0 results";
                    }
                    ?>


<!-- <li onclick="contant_index('hotel')">
                    <a href="#">Hotels</a>
                </li> -->