<?php
$id = $_GET['id'];
include 'connection.php';

$sql = "SELECT image_name FROM galary_images WHERE g_i_id = '$id';";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
unlink("../../galary_images/".$row['image_name']);
$sql = "DELETE FROM galary_images WHERE g_i_id = '$id';";
if ($conn->query($sql) === TRUE) {
    echo "ok";
} else {
    echo "Error deleting record: " . $conn->error;
}
?>