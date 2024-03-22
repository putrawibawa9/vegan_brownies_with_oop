<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vegan Brownies Bites</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        header {
            background-color: #4F6F52;
            color: #fff;
            padding: 1em;
            text-align: center;
        }

        section {
            margin: 20px;
            text-align: center; /* Center the content */
        }

        h2 {
            color: #333;
        }

        .product {
            border: 1px solid #ccc;
            padding: 10px;
            margin: 10px;
            background-color: #fff;
            border-radius: 5px;
            text-align: center;
        }

        .catalog-link {
            margin-bottom: 40px; /* Increased margin for more space */
            display: inline-block; /* Allows setting width and height */
            padding: 15px 30px; /* Adjust padding for better appearance */
            background-color: #4F6F52; /* Background color for a classy look */
            color: white; /* Text color */
            font-size: 18px; /* Font size for better visibility */
            text-decoration: none;
            border-radius: 5px;
        }
        .catalog-link a {
            /* Your styles for the text go here */
            color: white; /* Example: red text color */
            text-decoration: none;
            font-size: 18px; /* Example: 18px font size */
            /* Add any other styles you want to apply to the text */
        }


        .image-grid {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-wrap: wrap;
        }

        .card {
            border: 1px solid #ccc;
            border-radius: 5px;
            margin: 10px;
            overflow: hidden;
            width: calc(33.33% - 20px); /* 33.33% to fit 3 cards in a row, subtracting margin */
            box-sizing: border-box;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            height: 200px;
            height: 100%;
            object-fit: cover;
        }

        .card img {
            max-width: 100%;
            height: auto;
            border-bottom: 1px solid #ccc;
        }

        footer {
            background-color: #4F6F52;
            color: #fff;
            text-align: center;
            padding: 1em;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>

<body>
    <header>
        <h1>Vegan Brownies Bites</h1>
        <p>Temukan keindahan dalam Brownies</p>
    </header>

    <section>
        
        <div class="image-grid">
            <div class="card">
                <img src="../img/15.jpg" alt="">
            </div>
            <div class="card">
                <img src="../img/13.jpg" alt="">
            </div>
            <div class="card">
                <img src="../img/15.jpg" alt="">
            </div>
            <div class="catalog-link">
            <a href="katalog.php">Telurusi Katalog</a>
        </div>
        </div>
    </section>

    <footer>
        <p>Hubungi kami di: info@VeganBrowniesBites.com | Phone: (123) 456-7890</p>
    </footer>
</body>

</html>
