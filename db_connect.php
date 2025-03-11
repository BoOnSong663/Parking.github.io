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
