<?php

session_start();
//mengarahkan ke halaman login

if (isset($_SESSION['login'])){
    header("Location: login.php");
    exit;
}
include_once "../functions.php";

if(isset($_POST['login'])){

    $Username = $_POST['Username'];
    $password = $_POST['password'];

   $result = mysqli_query($conn,"SELECT * FROM admin WHERE Username = '$Username';");

   //cek username
   if(mysqli_num_rows($result)===1){

    //cek password
    $row = mysqli_fetch_assoc($result);
   if($password == $row['Password']){


    $_SESSION['is_auth'] = true;
    $_SESSION['Nama_pelanggan'] = $row['Nama_pelanggan'];
    $_SESSION['Id_pelanggan'] = $row['Id_pelanggan'];
    $_SESSION['Alamat_pelanggan'] = $row['Alamat_pelanggan'];
    header("Location: home.php");
    exit;
   }
   }


   $error = true;
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
            width: 100%;
        }

        button:hover {
            background-color: #45a049;
        }
  
    </style>
</head>
<body>
    <h1>Login</h1>

    <?php if(isset($error)): ?>
        <p style="color : red">Username / Password salah</p>
        <?php endif; ?>

    <form action="" method="post">
        <ul>
            <li>
                <label for="Username">Username:</label>
                <input type="text" name="Username" id="Username">
            </li>
            <li>
                <label for="password">Password :</label>
                <input type="password" name="password" id="password">
            </li>
            <li>
                <button type="submit" name="login">Login</button>
            </li>
            <li>
                <a href="registrasi.php">Klik untuk buat akun</a>
            </li>
        </ul>
    </form>
