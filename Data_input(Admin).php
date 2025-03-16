<?php
// insert_data.php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $conn = new mysqli('localhost', 'root', '', 'techspec'); // Replace with your database details

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $stmt = $conn->prepare("INSERT INTO apple_data (model_name, display, screen_size, processor, ram, storage, storage_type, network, battery, bluetooth, sensors, Rear_camera, Front_camera, OS, Height, Width, colours, features) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param(
        "ssssssssssssssssss",
        $_POST['model_name'],
        $_POST['display'],
        $_POST['screen_size'],
        $_POST['processor'],
        $_POST['ram'],
        $_POST['storage'],
        $_POST['storage_type'],
        $_POST['network'],
        $_POST['battery'],
        $_POST['bluetooth'],
        $_POST['sensors'],
        $_POST['rear_camera'],
        $_POST['front_camera'],
        $_POST['os'],
        $_POST['height'],
        $_POST['width'],
        $_POST['colours'],
        $_POST['features']
    );

    if ($stmt->execute()) {
        echo "Data inserted successfully!";

         // Redirect back to the form after 2 seconds
    echo '<meta http-equiv="refresh" content="2;url=Data_input(HTML).html">';
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>