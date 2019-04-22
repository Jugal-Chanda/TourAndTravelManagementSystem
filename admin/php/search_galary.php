<?php include 'connection.php';  ?>
<?php
$str = $_GET['name'];
$str = $str."%";
                    $sql = "SELECT g_i_id,image_name,place from galary_images WHERE place LIKE '$str';";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) { 
                            $id = $row['g_i_id'];
                        ?>                   
                     
                    <div class="col-md-6 col-lg-3 col-sm-12 galary_img_div" style="height: 250px;padding: 0px;">
                        <img src="../galary_images/<?php echo $row['image_name']; ?>" style="height: 90%;width: 100%; border: 2px solid white;z-index: 1;">
                        <div class="galary_img_place">
                            <div style="height: 100%;width: 100%;line-height: inherit;"><?php  echo $row['place'];   ?></div>
                        </div>
                        <div style="height: 10%;width: 100%;background-color: red;color: white;font-weight: bolder;text-align: center;" class="galary_delete" onclick="delete_galary(<?php echo $id; ?>)">Delete</div>
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