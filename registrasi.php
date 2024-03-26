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
            background-color: #4F6F52;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        li {
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            color: #333;
        }

        input {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            background-color: #4caf50;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
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
                <label for="Username">No Pelanggan :</label>
                <input type="text" name="No_pelanggan" id="Username" required>
            </li>
            <li>
                <label for="Username">Alamat Pelanggan :</label>
                <input type="text" name="Alamat_pelanggan" id="Username" required>
            </li>
            <li>
                <label for="password">Password :</label>
                <input type="password" name="Password" id="password" required>
            </li>
            <li>
                <button type="submit" name="register">Register</button>
            </li>
        </ul>
    </form>

</body>
</html>
