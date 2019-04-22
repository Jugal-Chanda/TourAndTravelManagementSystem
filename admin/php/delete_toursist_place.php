<?php
$id = $_GET['id'];
include 'connection.php';

$sql = "SELECT image_name FROM tourist_place WHERE p_id = '$id';";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
unlink("../../tourist_place/".$row['image_name']);
$sql = "DELETE FROM tourist_place WHERE p_id = '$id';";
if ($conn->query($sql) === TRUE) {
    echo "ok";
} else {
    echo "Error deleting record: " . $conn->error;
}
?>