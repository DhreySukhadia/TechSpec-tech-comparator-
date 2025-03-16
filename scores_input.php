<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TechSpec Scores Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #14213d;
            margin: 0;
            padding: 0;
            color: #ffffff;
        }

        .container {
            max-width: 500px;
            margin: 50px auto;
            padding: 20px;
            background-color: #ffffff;
            color: #000;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        h1 {
            text-align: center;
            color: #14213d;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        label {
            font-weight: bold;
        }

        input[type="text"], input[type="number"] {
            width: 90%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        button {
            background-color: #14213d;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }

        button:hover {
            background-color: #1f2b50;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>TechSpec Scores Form</h1>
        <form action="scores_form.php" method="POST">
            <label for="model_name">Model Name:</label>
            <input type="text" id="model_name" name="model_name" required>

            <label for="design">Design Score:</label>
            <input type="number" id="design" name="design" required min="1" max="10">

            <label for="performance">Performance Score:</label>
            <input type="number" id="performance" name="performance" required min="1" max="10">

            <label for="display">Display Score:</label>
            <input type="number" id="display" name="display" required min="1" max="10">

            <label for="cameras">Cameras Score:</label>
            <input type="number" id="cameras" name="cameras" required min="1" max="10">

            <label for="os">OS Score:</label>
            <input type="number" id="os" name="os" required min="1" max="10">

            <label for="battery">Battery Score:</label>
            <input type="number" id="battery" name="battery" required min="1" max="10">

            <label for="audio">Audio Score:</label>
            <input type="number" id="audio" name="audio" required min="1" max="10">

            <label for="features">Features Score:</label>
            <input type="number" id="features" name="features" required min="1" max="10">

            <button type="submit">Submit</button>
        </form>
    </div>
</body>
</html>
