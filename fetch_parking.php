<?php
include 'db_connect.php';

$query = "SELECT * FROM parking_spots";
$result = $conn->query($query);
$spots = [];

while ($row = $result->fetch_assoc()) {
    $spots[] = $row;
}

echo json_encode($spots);
$conn->close();
?>
