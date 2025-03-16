<!-- process_form.php -->
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Database connection
    $host = 'localhost';
    $user = 'root';
    $pass = '';
    $db_name = 'techspec';

    $conn = new mysqli($host, $user, $pass, $db_name);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Retrieve and sanitize inputs
    $model_name = $conn->real_escape_string($_POST['model_name']);
    $design = intval($_POST['design']);
    $performance = intval($_POST['performance']);
    $display = intval($_POST['display']);
    $cameras = intval($_POST['cameras']);
    $os = intval($_POST['os']);
    $battery = intval($_POST['battery']);
    $audio = intval($_POST['audio']);
    $features = intval($_POST['features']);

    // Insert data into the database
    $sql = "INSERT INTO apple_data_score (model_name, Design, Performance, Display, Cameras, OS, Battery, Audio, Features) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("siiiiiiii", $model_name, $design, $performance, $display, $cameras, $os, $battery, $audio, $features);

    if ($stmt->execute()) {
        echo "Data successfully submitted!";
                 // Redirect back to the form after 2 seconds
    echo '<meta http-equiv="refresh" content="2;url=scores_input.php">';

    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>