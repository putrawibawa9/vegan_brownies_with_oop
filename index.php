<?php

session_start();


if (isset($_SESSION['login'])){
    header("Location: login.php");
    exit;
}

if(isset($_POST['login'])){

    include_once "classes/construct.php";
    include_once "classes/auth.php";

    $Nama_pelanggan = $_POST['Nama_pelanggan'];
    $password = $_POST['password'];

    $auth = new Auth;

    $result = $auth->login($Nama_pelanggan, $password);

}

if (isset($_GET['error']) && $_GET['error'] == 1) {
    $error = $_GET["error"];
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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

        .login-container {
            text-align: center;
        }

        h1 {
            color: white;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
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
            width: 100%;
        }

        button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>


<div class="login-container">
    <h1>Login Pembeli</h1>

    <?php if(isset($error)): ?>
        <p style="color : red">Username / Password salah</p>
    <?php endif; ?>
    
 <form action="" method="post">
        <ul>
            <li>
                <label for="Nama_pelanggan">Nama Pelanggan :</label>
                <input type="text" name="Nama_pelanggan" id="Nama_pelanggan" required>
            </li>
            <li>
                <label for="password">Password :</label>
                <input type="password" name="password" id="password" required>
            </li>
            <li>
                <button type="submit" name="login">Login</button>
            </li>
            <li>
                <a href="registrasi.php">Klik untuk buat akun</a>
            </li>
            <li>
                <a href="AdminSide/login.php">Login untuk penjual</a>
            </li>
        </ul>
    </form>
</div>




</body>
</html>
