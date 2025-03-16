<?php
include '/xampp/htdocs/techspec/db.php';

// Fetch the data from the database
$sql = "SELECT * FROM Apple_data WHERE model_name='iPhone 15'";
$result = $conn->query($sql);
$device = $result->fetch_assoc();

// ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TechSpec - Compare Devices</title>
    <link rel="stylesheet" href="/techspec/running code/css/styles.css">
    <link rel="stylesheet" href="/techspec/running code/css/cards.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #14213d;
        }
        h2{
            color:white;
        }

        .navbar {
            background-color: #14213d;
            padding: 10px;
        }

        .navbar a {
            color: white;
            text-decoration: none;
            margin: 0 15px;
            padding: 10px 20px;
            display: inline-block;
        }



       
        .footer_box1{
            position: absolute;
            margin-top: 20px; /* Adjust spacing from content above */
            padding: 10px;
            background-color: #f1f1f1;
            text-align: center;
            height: 25rem;
            width: 95.6rem;
            top: 70rem;
            z-index: 2;
            background-color: black;
            font-family: 'dubai',sans-serif;
        }
        
        .footer_box1 .f_1{
            position: absolute;
            height: 16rem;
            top: 2rem;
            left: 5rem;
            border-radius: 30px;
        }
        
        .footer_box1 .f_logo{
            position: absolute;
            top: 13rem;
            left: 6.5rem;
            text-align: center;
            font-size: 10px;
            color: white;
        }
        
                                                                /*company box!!*/
        .footer_box1 .company_links{
            position: absolute;
            top: 8rem;
            left: 30rem;
            color: white;
        }
        
        .footer_box1 .company_links .abt_btn{
            position: absolute;
            border-radius: 15px;
            left: 0.7rem;
            width: 5rem;
            height: 20px;
            font-size: small;
            background-color: black;
            color: #023e8a;
            border-color: transparent;
            align-content: space-between;
            transition: border-color 0.5s ease;
        }
        
        .footer_box1 .company_links .abt_btn:hover{
            border-color: rgb(123, 121, 121);
            color: white;
        }
        
        
        .footer_box1 .company_links .contact_btn2{
            position: absolute;
            border-radius: 15px;
            left: 0.7rem;
            width: 5rem;
            height: 20px;
            font-size: small;
            background-color: black;
            color: #023e8a;
            border-color: transparent;
            align-content: space-between;
            transition: border-color 0.5s ease;
        }
        
        
        .footer_box1 .company_links .contact_btn2:hover{
            border-color: rgb(123, 121, 121);
            color: white;
        }
        
                                                               /* services links box*/
        .footer_box1 .services_link{
            position: absolute;
            top: 8rem;
            left: 50rem;
            color: white;
        }
        
        .footer_box1 .services_link .devlopment_btn{
            position: absolute;
            border-radius: 15px;
            left: 0.1rem;
            width: 6rem;
            height: 30px;
            font-size: small;
            background-color: black;
            color: #023e8a;
            border-color: transparent;
            align-content: space-between;
            transition: border-color 0.5s ease;
        }
        
        
        .footer_box1 .services_link .devlopment_btn:hover{
            border-color: rgb(123, 121, 121);
            color: white;
        }
        
        
                                                               /* social links*/
        .footer_box1 .social_links{
            position: absolute;
            top: 8rem;
            left: 70rem;
            color: white;
        
        }
        
        
        .footer_box1 .social_links .insta_btn{
            position: absolute;
            border-radius: 15px;
            width: 5rem;
            height: 30px;
            font-size: small;
            background-color: black;
            color: #023e8a;
            border-color: transparent;
            align-content: space-between;
            transition: border-color 0.5s ease;
        }
        
        
        .footer_box1 .social_links .insta_btn:hover{
            border-color: rgb(123, 121, 121);
            color: white;
        }
        
        .footer_box1 .social_links .facebook_btn{
            position: absolute;
            border-radius: 15px;
            width: 5rem;
            height: 30px;
            font-size: small;
            background-color: black;
            color: #023e8a;
            border-color: transparent;
            align-content: space-between;
            transition: border-color 0.5s ease;
        }
        
        
        .footer_box1 .social_links .facebook_btn:hover{
            border-color: rgb(123, 121, 121);
            color: white;
        }
        
        .instagram_icon{
            position: fixed;
            bottom: 5rem;
            left: 0.5rem;
            height: 25px;
            z-index: 3;
        }
        .support_icon{
            position: fixed;
            height: 29px;
            bottom: 2rem;
            z-index: 3;
            left: 0.5rem;
        
        }
        
        @keyframes appear{
            from{
            opacity: 0;
            scale: 0.4;
            }
            
            to{
            opacity: 1;
            scale: 1;
            }
            }
        
        */
        
        
            /*under maintainence prompt*/
            
            .warning-prompt-overlay {
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background-color: rgba(0, 0, 0, 0.5);
                display: none; /* Hidden by default */
                justify-content: center;
                align-items: center;
                z-index: 3;
              }
          
              .warning-prompt {
                background-color: #fff;
                border: 2px solid #e74c3c;
                border-radius: 8px;
                padding: 20px;
                width: 400px;
                box-shadow: 0px 4px 20px rgba(0, 0, 0, 0.1);
                text-align: center;
              }
          
              .warning-prompt .icon {
                font-size: 50px;
                color: #e74c3c;
                margin-bottom: 20px;
              }
          
              .warning-prompt .message {
                font-size: 18px;
                color: #333;
                margin-bottom: 20px;
              }
          
              .warning-prompt .buttons {
                display: flex;
                justify-content: space-around;
                margin-top: 20px;
              }
          
              .warning-prompt button {
                padding: 10px 20px;
                font-size: 16px;
                border: none;
                border-radius: 5px;
                cursor: pointer;
                outline: none;
                transition: background-color 0.3s;
              }
          
              .warning-prompt .cancel-btn {
                background-color: #95a5a6;
                color: #fff;
              }
          
              .warning-prompt .cancel-btn:hover {
                background-color: #7f8c8d;
              }
          
              .warning-prompt .proceed-btn {
                background-color: #e74c3c;
                color: #fff;
              }
          
              .warning-prompt .proceed-btn:hover {
                background-color: #c0392b;
              }
          
              /* Button to trigger warning */
              .trigger-btn {
                padding: 10px 20px;
                font-size: 18px;
                background-color: #3498db;
                color: #fff;
                border: none;
                border-radius: 5px;
                cursor: pointer;
                outline: none;
                transition: background-color 0.3s;
              }
          
              .trigger-btn:hover {
                background-color: #2980b9;
              }


              .cont_1{
                position: absolute;
                top: 10rem;
                left: 20rem;
                height: 50rem;
                width: 70rem;
                border-radius: 20px;
                background-color: #8da2ca;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 5);
              }

              .cont_1 .product_1{
                position: absolute;
                background-color: white;
                height: 20rem;
                width: 30rem;
                top: 5rem;
                left: 2rem;
                border-radius: 20px;
                box-shadow: 0 4px 8px rgba(5, 0, 0, 5);
                color: grey;
              }

              .cont_1 .product_2{
                position: absolute;
                background-color: white;
                height: 20rem;
                width: 30rem;
                top: 5rem;
                left: 38rem;
                border-radius: 20px;
                box-shadow: 0 4px 8px rgba(5, 0, 0, 5);
                color: grey;
              }

              .title {
            position: absolute;
            top: -20px;
            right: 20px;
            background-color: #fff;
            padding: 5px 15px;
            font-size: 24px;
            font-weight: bold;
            color: #333;
            border: 2px solid #ddd;
            border-radius: 8px;
        }

        .grid_box {
        display: grid;
        grid-template-columns: 1fr 1fr 1fr;
        gap: 40px;
        justify-items: center;
        align-items: center;
        padding: 50px;
        margin: 50px;
        border: 2px solid black;
        border-radius: 8px;
      }


    </style>
</head>
<body>
    
    <header>
        <div class="navbar">
            <div class="logo">
                <a href="/techspec/main website code/main_page.html"><h1>TechSpec</h1></a>
            </div>
            <nav>
                <ul>
                    <li><a href="index.html">Home</a></li>
                    <li><a href="laptop.html">Laptops</a></li>
                    <li><a href="smartwatch.html">Smartwatches</a></li>
                    <li><a href="headphones.html">Headphones</a></li>
                </ul>
            </nav>
        </div>

        
    </header>


    <div class="grid_box">


        <div class="card_1">
            <a href="/techspec/running code/product_page/iphone_16.php">
            <h2 class="name">iphone 16</h2>
        
            <img class="product_img" src="/techspec/product_imgs/apple/16_back.png">
        
            <div class="features">
              <div class="features_icon">
                <img class="battery" src="/techspec/icons/battery.png">
                <img class="camera" src="/techspec/icons/camera.png">
                <img class="ram" src="/techspec/icons/ram-memory.png">
                <img class="sr" src="/techspec/icons/maximize.png">
              </div>
            <h3 class="cam">Camera: 48mp</h3>
            <h3 class="bat">battery: 4000mah</h3>
            <h3 class="ra">RAM: 8GB</h3>
            <h3 class="screen">Screen: 6.1"</h3>
        </div>
        </div></a>

        <div class="card_1">
            <a href="/techspec/running code/product_page/iphone_16pro.php">
            <h2 class="name">iphone 16 pro</h2>
        
            <img class="product_img" src="/techspec/product_imgs/apple/16_pro.png">
        
            <div class="features">
              <div class="features_icon">
                <img class="battery" src="/techspec/icons/battery.png">
                <img class="camera" src="/techspec/icons/camera.png">
                <img class="ram" src="/techspec/icons/ram-memory.png">
                <img class="sr" src="/techspec/icons/maximize.png">
              </div>
                    

                    <h3 class="cam">Camera: 48mp </h3>
                    <h3 class="bat">Battery: 4000mah </h3>
                    <h3 class="ra">RAM: 8gb </h3>
                    <h3 class="screen">Screen: 6.7" </h3>
        </div></a>
        </div>

        <div class="card_1">
            <a href="/techspec/running code/product_page/iphone_15.php">
            <h2 class="name">iphone 15</h2>
        
            <img class="product_img" src="/techspec/product_imgs/apple/15_front_back.png">
        
            <div class="features">
              <div class="features_icon">
                <img class="battery" src="/techspec/icons/battery.png">
                <img class="camera" src="/techspec/icons/camera.png">
                <img class="ram" src="/techspec/icons/ram-memory.png">
                <img class="sr" src="/techspec/icons/maximize.png">
              </div>
            <h3 class="cam">Camera: 48mp</h3>
            <h3 class="bat">battery: 3500mah</h3>
            <h3 class="ra">RAM: 8GB</h3>
            <h3 class="screen">Screen: 6.1"</h3>
        </div></a>
        </div>

        <div class="card_1">
            <a href="/techspec/running code/product_page/iphone_15pro.php">
            <h2 class="name">iphone 15 pro</h2>
        
            <img class="product_img" src="/techspec/product_imgs/apple/15_pro-removebg-preview.png">
        
            <div class="features">
              <div class="features_icon">
                <img class="battery" src="/techspec/icons/battery.png">
                <img class="camera" src="/techspec/icons/camera.png">
                <img class="ram" src="/techspec/icons/ram-memory.png">
                <img class="sr" src="/techspec/icons/maximize.png">
              </div>
            <h3 class="cam">Camera: 48mp</h3>
            <h3 class="bat">battery: 4000mah</h3>
            <h3 class="ra">RAM: 8GB</h3>
            <h3 class="screen">Screen: 6.1"</h3>
        </div>
        </div></a>

        <div class="card_1">
            <a href="/techspec/running code/product_page/iphone_16_plus.php">
            <h2 class="name">iphone 16 plus</h2>
        
            <img class="product_img" src="/techspec/product_imgs/apple/16_back.png">
        
            <div class="features">
              <div class="features_icon">
                <img class="battery" src="/techspec/icons/battery.png">
                <img class="camera" src="/techspec/icons/camera.png">
                <img class="ram" src="/techspec/icons/ram-memory.png">
                <img class="sr" src="/techspec/icons/maximize.png">
              </div>
            <h3 class="cam">Camera: 48mp</h3>
            <h3 class="bat">battery: 4600mah</h3>
            <h3 class="ra">RAM: 8GB</h3>
            <h3 class="screen">Screen: 6.7"</h3>
        </div>
        </div></a>


        <div class="card_1">
            <a href="/techspec/running code/product_page/iphone_12.php">
            <h2 class="name">iphone 12</h2>
        
            <img class="product_img" src="/techspec/product_imgs/apple/12_2.png">
        
            <div class="features">
              <div class="features_icon">
                <img class="battery" src="/techspec/icons/battery.png">
                <img class="camera" src="/techspec/icons/camera.png">
                <img class="ram" src="/techspec/icons/ram-memory.png">
                <img class="sr" src="/techspec/icons/maximize.png">
              </div>
            <h3 class="cam">Camera: 12mp</h3>
            <h3 class="bat">battery: 2800mah</h3>
            <h3 class="ra">RAM: 4GB</h3>
            <h3 class="screen">Screen: 6.1"</h3>
        </div>
        </div></a>

    </div>

    
    <!--
    <section class="comparison-table" id="comparisonTable">
         Dynamic device comparison will appear here
    </section>
    -->
    

 <!--8th section footer-->

 <div class="footer_box1">
    <img class="f_1" src="/techspec/graphics/logo.png">
    <div class="f_logo">
        <h2>TechSpec(technical comparator)</h2>
        <br>
        <h4>estd 2024</h4>
    </div>

    <!--company links part footer!!!-->

    <!--company section-->
    <div class="company_links">
        <h2>Company</h2>
        <br>
        <button class="abt_btn" onclick="window.location.href='about_us.html'">About Us</button>
        <br>
        <br>
        <button class="contact_btn2" onclick="window.location.href='mailto:aryandeshmukh2345@gmail.com'">Contact Us</button>
    </div>

    <!--services section-->
    <div class="services_link">
        <h2>Services</h2>
        <br>
        <button class="devlopment_btn" onclick="window.location.href='https://drive.google.com/drive/folders/1j3TzNaFbRSb61lTCIU6pBq0MA7Ynz9rS?usp=sharing'">Devlopment</button>

    </div>

    <!--social section-->
    <div class="social_links">
        <h2>Socials</h2>
        <br>
        <button class="insta_btn" onclick="window.location.href='https://www.instagram.com/techspec_ind/'">instagram</button>
        <br>
        <br>
        <button class="facebook_btn"> <a href=""></a>Facebook</button>
    </div>
   </div>

    <script>
        // Sample device data for demonstration
        const devicesData = [
            {
                name: "Apple iPhone 13 Pro",
                company: "Apple",
                category: "Camera",
                price: "$999",
                ram: "6GB",
                storage: "128GB",
                battery: "3100mAh"
            },
            {
                name: "Samsung Galaxy S22",
                company: "Samsung",
                category: "Gaming",
                price: "$799",
                ram: "8GB",
                storage: "256GB",
                battery: "3700mAh"
            },
            {
                name: "Redmi Note 10",
                company: "Xiaomi",
                category: "Battery",
                price: "$199",
                ram: "4GB",
                storage: "64GB",
                battery: "5000mAh"
            }
        ];

        // Populate dropdowns with device options
        function populateDropdowns() {
            const device1Dropdown = document.getElementById('device1');
            const device2Dropdown = document.getElementById('device2');
            
            devicesData.forEach(device => {
                const option1 = document.createElement('option');
                option1.value = device.name;
                option1.text = device.name;
                device1Dropdown.add(option1);

                const option2 = document.createElement('option');
                option2.value = device.name;
                option2.text = device.name;
                device2Dropdown.add(option2);
            });
        }

        // Function to display comparison
        function displayComparison() {
            const selectedDevice1 = document.getElementById('device1').value;
            const selectedDevice2 = document.getElementById('device2').value;

            // Find the selected devices in data
            const device1 = devicesData.find(device => device.name === selectedDevice1);
            const device2 = devicesData.find(device => device.name === selectedDevice2);

            // Clear previous comparison results
            const comparisonTable = document.getElementById('comparisonTable');
            comparisonTable.innerHTML = '';

            // Display the two selected devices
            if (device1 && device2) {
                const device1Card = `
                    <div class="device-card">
                        <h3>${device1.name}</h3>
                        <p>Company: ${device1.company}</p>
                        <p>Category: ${device1.category}</p>
                        <p>Price: ${device1.price}</p>
                        <p>RAM: ${device1.ram}</p>
                        <p>Storage: ${device1.storage}</p>
                        <p>Battery: ${device1.battery}</p>
                    </div>
                `;

                const device2Card = `
                    <div class="device-card">
                        <h3>${device2.name}</h3>
                        <p>Company: ${device2.company}</p>
                        <p>Category: ${device2.category}</p>
                        <p>Price: ${device2.price}</p>
                        <p>RAM: ${device2.ram}</p>
                        <p>Storage: ${device2.storage}</p>
                        <p>Battery: ${device2.battery}</p>
                    </div>
                `;

                comparisonTable.innerHTML = device1Card + device2Card;
            } else {
                comparisonTable.innerHTML = '<p>Please select two valid devices to compare.</p>';
            }
        }

        // Attach event listener to the Compare button
        document.getElementById('compareBtn').addEventListener('click', displayComparison);

        // Populate dropdowns on page load
        window.onload = populateDropdowns;

        // JavaScript to move the slider when arrows are clicked
let currentIndex = 0;
const mobiles = document.querySelectorAll('.mobile');
const mobileSlider = document.querySelector('.mobile-slider');
const leftArrow = document.querySelector('.left-arrow');
const rightArrow = document.querySelector('.right-arrow');

const moveSlider = () => {
  mobileSlider.style.transform = `translateX(-${currentIndex * (mobiles[0].offsetWidth + 20)}px)`; 
}

leftArrow.addEventListener('click', () => {
  if (currentIndex > 0) {
    currentIndex--;
    moveSlider();
  }
});

rightArrow.addEventListener('click', () => {
  if (currentIndex < mobiles.length - 1) {
    currentIndex++;
    moveSlider();
  }
});









    </script>
</body>
</html>
