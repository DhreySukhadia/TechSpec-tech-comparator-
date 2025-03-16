<?php
    // PHP: Connect to the database and fetch data
    $host = "localhost"; // Replace with your DB host
    $username = "root"; // Replace with your DB username
    $password = ""; // Replace with your DB password
    $dbname = "techspec"; // Replace with your DB name

    // Establish database connection
    $conn = new mysqli($host, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Fetch data from the table
    $sql = "SELECT Design, Display, Performance, Cameras, Battery, Audio, Features FROM apple_data_score WHERE Model_name = 'iphone 12' LIMIT 1";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $data = $result->fetch_assoc(); // Fetch the first record
    } else {
        $data = [
            "design" => 0,
            "display" => 0,
            "performance" => 0,
            "cameras" => 0,
            "battery" => 0,
            "audio" => 0,
            "features" => 0
        ];
    }

    $conn->close();
    ?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Radar Chart with Database</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f4f4f9;
        }
        #chart-container {
            width: 400px;
            height: 400px;
        }
        .rader_cont{
            /* background-color: lightblue; */
            border-radius: 30px;
            border-color: black;
            border: 2px solid;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.5);
        }
    </style>
</head>
<body>
    <div class="rader_cont">
    <div id="chart-container">
        <canvas id="radarChart"></canvas>
    </div>
    </div>



    <script>
        // Pass PHP data to JavaScript
        const data = <?php echo json_encode($data); ?>;

        // Radar Chart Config
        const ctx = document.getElementById('radarChart').getContext('2d');
        new Chart(ctx, {
            type: 'radar',
            data: {
                labels: ['Design', 'Display', 'Performance', 'Cameras', 'Battery', 'Audio', 'Features'],
                datasets: [{
                    label: 'Product Score',
                    data: Object.values(data), // Use PHP data here
                    backgroundColor: 'rgba(255, 99, 132, 0.2)', // Transparent fill
                    borderColor: '#65d491', // Border color
                    borderWidth: 2, // Border width
                    pointBackgroundColor: 'rgba(54, 162, 235, 1)', // Points color
                    pointBorderColor: 'rgba(255, 159, 64, 1)', // Points border color
                    pointHoverBackgroundColor: 'rgba(255, 206, 86, 1)', // Hover effect on points
                }]
            },
            options: {
                responsive: true,
                
                scales: {
                    r: {
                        angleLines: { color: '#3a3f3c' },
                        grid: { color: 'grey' },
                        suggestedMin: 0,
                        suggestedMax: 10
                    }
                },
                plugins: {
                    legend: { display: true, position: 'top' }
                }
                
            }
        });
    </script>
</body>
</html>
