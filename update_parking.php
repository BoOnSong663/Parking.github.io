<?php
include 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $spot_id = $_POST['spot_id'];
    $status = $_POST['status'];
    
    $stmt = $conn->prepare("UPDATE parking_spots SET status = ?, last_updated = NOW() WHERE spot_id = ?");
    $stmt->bind_param("si", $status, $spot_id);
    
    if ($stmt->execute()) {
        echo json_encode(["success" => true]);
    } else {
        echo json_encode(["success" => false, "error" => $conn->error]);
    }
    
    $stmt->close();
    $conn->close();
}
?>
