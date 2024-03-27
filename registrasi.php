<?php

include_once "classes/auth.php";

if(isset($_POST['register'])){

    $register = new Auth;
    if ($register->registerUser($_POST)) {
        echo "<script>
                alert('user baru berhasil ditambahkan');
                document.location.href = 'index.php';
              </script>";
           
    } else {
        echo "<script>
                alert('user gagal ditambahkan');
              </script>";
    }
    
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Page</title>
    <style>
       body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
}

.container {
    max-width: 400px;
    margin: 50px auto;
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    padding: 20px;
}

h1 {
    text-align: center;
    color: #739072;
}

form ul {
    list-style: none;
    padding: 0;
}

form ul li {
    margin-bottom: 20px;
}

label {
    display: block;
    margin-bottom: 5px;
    color: #333;
}

input[type="text"],
input[type="password"] {
    width: calc(100% - 10px);
    padding: 10px;
    border: 1px solid #ddd;
    border-radius: 4px;
}

button[type="submit"],
button[type="button"] {
    background-color: #739072;
    color: #fff;
    padding: 10px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 16px;
}

button[type="submit"]:hover,
button[type="button"]:hover {
    background-color: #5d7e61;
}

a {
    text-decoration: none;
}
    </style>
</head>
<body>

    <h1>Registration Page</h1>

    <form action="" method="post">
        <ul>
            <li>
                <label for="Username">Nama Pelanggan :</label>
                <input type="text" name="Nama_pelanggan" id="Username" required>
            </li>

            <li>
                <label for="Username">No Telepon Pelanggan :</label>
                <input type="text" name="No_pelanggan" id="Username" required>
            </li>
            <li>
                <label for="Username">Alamat Pelanggan :</label>
                <input type="text" name="Alamat_pelanggan" id="Username" required>
            </li>
            <li>
                <label for="password">Password :</label>
                <input type="password" name="Password" id="password" required minlength="8">
            </li>
            <li>
                <button type="submit" name="register">Register</button>
                <a href="index.php">
                <button type="button">Back</button>
                </a>
            </li>
        </ul>
    </form>

</body>
</html>
