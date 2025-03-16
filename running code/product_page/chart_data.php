<?php
// Database connection
$host = 'localhost';
$user = 'root';
$password = '';
$db_name = 'techspec';

$conn = new mysqli($host, $user, $password, $db_name);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch the latest scores from the database
$sql = "SELECT Design, Display, Performance, Cameras, OS, Battery, Audio, Features FROM apple_data_score WHERE model_name = 'iPhone 15' LIMIT 1";
$result = $conn->query($sql);

$data = [];
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $data['scores'] = [
        (int)$row['Design'],
        (int)$row['Display'],
        (int)$row['Performance'],
        (int)$row['Cameras'],
        (int)$row['OS'],
        (int)$row['Battery'],
        (int)$row['Audio'],
        (int)$row['Features']
    ];
} else {
    $data['scores'] = [0, 0, 0, 0, 0, 0, 0, 0]; // Default scores if no data is found
}

$conn->close();

// Send JSON response
header('Content-Type: application/json');
echo json_encode($data);
