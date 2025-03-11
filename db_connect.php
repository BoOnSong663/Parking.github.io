<?php
$host = 'localhost';
$username = 's66160405';
$password = 'Ne4CC5bs';
$dbname = 's66160405';

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

-- PHP Script to Fetch Parking Data (fetch_parking.php)
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

-- PHP Script to Update Parking Status (update_parking.php)
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
