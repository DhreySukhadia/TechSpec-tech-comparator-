<?php
include '/xampp/htdocs/techspec/db.php';

// Fetch the data from the database
$sql = "SELECT * FROM Apple_data WHERE model_name='iPhone 16'";
$result = $conn->query($sql);
$device = $result->fetch_assoc();

// Fetch the scores data from the database
$sql = "SELECT Design, Display, Performance, Cameras, OS, Battery, Audio, Features FROM apple_data_score WHERE model_name='iPhone 16'";
$result = $conn->query($sql);
$data = $result->fetch_assoc();

$conn->close();

// Outputting JavaScript to the browser
echo "<script>
    const data = {
        features: {
            Design: {$data['Design']},
            Display: {$data['Display']},
            Performance: {$data['Performance']},
            Cameras: {$data['Cameras']},
            OS: {$data['OS']},
            Battery: {$data['Battery']},
            Audio: {$data['Audio']},
            Features: {$data['Features']}
        }
    };
</script>";
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Page - <?php echo $device['model_name']; ?></title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="style.css">
</head>
<style>
/* General Styles */
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f4f4f4;
    color: #333;
}

/* Header Styles */
.header {
    background-color: #14213d;
    color: #fff;
    text-align: center;
    padding: 20px;
}

.header h1 {
    font-size: 2.5em;
    margin: 0;
}

.header p {
    font-size: 1.2em;
    margin-top: 10px;
}

/* Main Content Styles */
.main-content {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(320px, 1fr)); /* Responsive grid */
    gap: 20px;
    padding: 20px;
    position: absolute;
}

/* img slider */

.image_container {
      position: absolute;
      height: 30rem;
      width: 30rem;
      overflow: hidden;
      top: 5rem;
      left: 4rem;
      border-radius: 50px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }

    .intro_png {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      object-fit: contain;
      opacity: 0;
      z-index: 1;
      animation-timing-function: ease-in-out;
    }

    .intro_png:nth-child(1) {
      animation: slideFade1 12s infinite;
    }

    .intro_png:nth-child(2) {
      animation: slideFade2 12s infinite;
    }

    .intro_png:nth-child(3) {
      animation: slideFade3 12s infinite;
    }

    .image_container:hover .intro_png {
      animation-play-state: paused;
    }

    @keyframes slideFade1 {
      0%, 28% {
        opacity: 0;
        transform: translateX(100%);
      }
      33%, 61% {
        opacity: 1;
        transform: translateX(0);
      }
      66%, 100% {
        opacity: 0;
        transform: translateX(-100%);
      }
    }

    @keyframes slideFade2 {
      33%, 61% {
        opacity: 0;
        transform: translateX(100%);
      }
      66%, 94% {
        opacity: 1;
        transform: translateX(0);
      }
      100%, 100% {
        opacity: 0;
        transform: translateX(-100%);
      }
    }

    @keyframes slideFade3 {
      66%, 94% {
        opacity: 0;
        transform: translateX(100%);
      }
      100%, 28% {
        opacity: 1;
        transform: translateX(0);
      }
      33%, 100% {
        opacity: 0;
        transform: translateX(-100%);
      }
    }

.product-gallery {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 10px;
}

.product-gallery img {
    max-width: 100%;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
}

.product-details {
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    position: absolute;
    left: 45rem;
    top: 2rem;
    width: 40rem;
}

.highlights ul {
    list-style: none;
    padding: 0;
}

.highlights ul li {
    background-color: #eaf7f6;
    margin: 5px 0;
    padding: 10px;
    border-radius: 4px;
}

.pricing p {
    font-size: 1.5em;
    margin: 10px 0;
    color: #14213d;
}

.btn {
    display: inline-block;
    background-color: #004c48;
    color: #fff;
    padding: 10px 20px;
    margin: 5px 0;
    text-decoration: none;
    border-radius: 5px;
    text-align: center;
    cursor: pointer;
    transition: background-color 0.3s;
}

.btn:hover {
    background-color: #14213d;
}

/* Specifications Table */
.specifications table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

.specifications th, .specifications td {
    text-align: left;
    padding: 10px;
    border-bottom: 1px solid #ddd;
}

.specifications th {
    background-color: #eaf7f6;
}

.canvas {
        position: absolute;
        top: 2rem;
            max-width: 40rem;
            max-height: 40rem;
        }

/* Rating Bar Chart */
.rating-container {
    grid-column: 1 / -1; /* Span both columns */
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
    margin-top: 20px;
    position: absolute;
    top: 60rem;
    left: 12rem;
    width: 65rem;
}

.feature-box {
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
    flex: 1 1 calc(33.333% - 20px); /* 3-column layout */
    box-sizing: border-box;
}

.feature {
    display: flex;
    align-items: center;
}

.bar {
    flex: 1;
    height: 20px;
    background-color: #e0e0e0;
    border-radius: 10px;
    margin: 0 10px;
    position: relative;
}

.fill {
    height: 100%;
    background: linear-gradient(to right, rgb(0, 251, 255), rgb(69, 248, 33));
    border-radius: 10px;
    width: 0;
}

.score {
    font-weight: bold;
}

/* Footer Styles */
.footer {
    text-align: center;
    background-color: #004c48;
    color: #fff;
    padding: 10px;
    position: relative;
    bottom: 0;
    width: 100%;
}

/* Responsive Adjustments */
@media (max-width: 768px) {
    .main-content {
        grid-template-columns: 1fr; /* Single column for smaller screens */
    }

    .feature-box {
        flex: 1 1 100%; /* Full width for feature boxes */
    }
}

</style>
<body>

    <header class="header">
        <h1><?php echo $device['model_name']; ?></h1>
        <!-- <p><?php echo $device['description']; ?></p> -->
    </header>

    <main class="main-content">
        <div class="image_container">
        <img class="intro_png" src="/techspec/product_imgs/apple/15_front_back.png" alt="16 Plus">
        <img class="intro_png" src="/techspec/product_imgs/apple/15_cameramodule.png" alt="12 Pro 5G">
        <img class="intro_png" src="/techspec/product_imgs/apple/feature_list16.png" alt="Galaxy A54">
         </div>

        <section class="product-details">
            <div class="highlights">
                <h2>Highlights</h2>
                <ul>
                    <li>Processor: <?php echo $device['Processor']; ?></li>
                    <li>Display: <?php echo $device['Display']; ?></li>
                    <li>Storage: <?php echo $device['Storage']; ?></li>
                    <li>Camera: <?php echo $device['Rear_Camera']; ?> Rear | <?php echo $device['Front_Camera']; ?> Front</li>
                </ul>
            </div>

            <div class="pricing">
                <h2>Price</h2>
                <p><strong>₹<?php echo $device['price']; ?></strong></p>
                <!-- <p>EMI starting from ₹<?php echo $device['EMI']; ?>/month</p> -->
                <button class="btn buy-now">Buy Now</button>
                <button class="btn emi">Pay with EMI</button>
            </div>

            <section class="specifications">
                <h2>Specifications</h2>
                <table>
                    <tr>
                        <th>Model</th>
                        <td><?php echo $device['model_name']; ?></td>
                    </tr>
                    <tr>
                        <th>Color</th>
                        <td><?php echo $device['Colours']; ?></td>
                    </tr>
                    <tr>
                        <th>Display</th>
                        <td><?php echo $device['Display']; ?></td>
                    </tr>
                    <tr>
                        <th>Processor</th>
                        <td><?php echo $device['Processor']; ?></td>
                    </tr>
                    <tr>
                        <th>Camera</th>
                        <td><?php echo $device['Rear_Camera']; ?> Rear | <?php echo $device['Front_Camera']; ?> Front</td>
                    </tr>
                    <tr>
                        <th>Battery</th>
                        <td><?php echo $device['Battery']; ?></td>
                    </tr>
                    <tr>
                        <th>OS</th>
                        <td><?php echo $device['OS']; ?></td>
                    </tr>
                </table>
            </section>
        </section>

             <div class="rating-container">

            <?php
            $features = ['Design', 'Display', 'Performance', 'Cameras', 'OS', 'Battery', 'Audio', 'Features'];
            foreach ($features as $feature) {
                echo "
                <div class='feature-box' id='{$feature}'>
                    <div class='feature'>
                        <span>{$feature}</span>
                        <div class='bar'>
                            <div class='fill'></div>
                        </div>
                        <span class='score'></span>
                    </div>
                </div>";
            }
            ?>
             </div>
        </div>
    </main>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Using the data defined by the PHP block
        document.querySelectorAll('.feature-box').forEach((box) => {
            const featureName = box.id;
            const featureFill = box.querySelector('.fill');
            const featureScore = box.querySelector('.score');
            const featureData = data.features[featureName];

            if (featureData !== undefined) {
                featureFill.style.width = `${featureData * 10}%`;
                featureScore.textContent = `${featureData}/10`;
            }
            });
        });


        const imageContainer = document.querySelector('.image_container');
    const images = document.querySelectorAll('.intro_png');

    imageContainer.addEventListener('mouseenter', () => {
      images.forEach(image => {
        image.style.animationPlayState = 'paused';
      });
    });

    imageContainer.addEventListener('mouseleave', () => {
      images.forEach(image => {
        image.style.animationPlayState = 'running';
      });
    });

 
    </script>
</body>
</html>

<?php
?>