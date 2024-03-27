<?php
session_start();
require_once "../functions.php";

$Id_pesanan = $_GET['Id_pesanan'];
$pesanan = query("SELECT * FROM pesanan JOIN produk ON (produk.Id_produk = pesanan.Id_produk) WHERE pesanan.Id_pesanan = '$Id_pesanan';");



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #739072;
            margin: 0;
            padding: 0;
        }

        h1 {
            color: #739072;
            text-align: center;
        }

        a {
            text-decoration: none;
            color: #007BFF;
            text-align: center;
            display: block;
            margin-top: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #739072;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        h1, .form {
            color: white;
        }

        img {
            max-width: 100%;
            height: auto;
        }
        header {
            background-color: #4F6F52;
            color: #fff;
            padding: 1em;
            text-align: center;
        }
        body, header, table {
       margin: 0;
        }
        footer {
            background-color: #4F6F52;
            color: #fff;
            text-align: center;
            padding: 1em;
            bottom: 0;
            width: 100%;
        }
        main {
            margin-top: 20px;
            padding: 20px;
            background-color: #739072; /* Add background color */
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Add box shadow for a subtle effect */
            width: 100%;
            box-sizing: border-box;
            text-align: center;
        }

        a.button {
            background-color: #ffffff; /* Change button background color to white */
            color: #739072; /* Change button text color */
            padding: 10px 20px;
            border-radius: 5px;
            border: none;
            text-decoration: none; /* Remove underline */
            display: inline-block;
            margin-right: 10px; /* Add margin for spacing */
        }
    </style>
</head>

<body>
    <header>
    <h1>Vegan Brownies Bites</h1>
        <p>Temukan keindahan dalam Brownies</p>
    </header>

    
    <main>
        <h1><?= $pesanan[0]['Nama_produk']; ?> </h1>
        <img src="../img/<?= $pesanan[0]['Foto_produk']; ?>" width="200px" height="200px">
        <h4>Rp.<?= $pesanan[0]['Harga_produk']; ?></h4>
    <label for="dropdown">Plih Pembayaran:</label>
    <select name="bank" id="dropdown">
        <option value="tunai">Tunai</option>
        <option value="mandiri">Mandiri</option>
        <option value="BRI">BRI</option>
        <option value="BNI">BNI</option>
        <option value="BPD Bali">BPD Bali</option>
        <option value="Permata Bank">Permata Bank</option>
        <option value="Bank Mega">Bank Mega</option>
    </select>
    <div>
<a href="#" onclick="checkout()" class="button">Bayar</a>
            <a href="katalog.php" onclick="return confirm('yakin?');" class="button">Batal</a>
</div>
<script>
    function checkout() {
        var bank = document.getElementById('dropdown').value;
        window.location.href = "invoice.php?Id_pesanan=<?= $pesanan[0]['Id_pesanan'] ?>&bank=" + bank;
    }
</script>

    </main>

</body>
<footer>
        <a href="../logout.php">Keluar</a>
        <p>Hubungi kami di: info@VeganBrowniesBites.com | Phone: (123) 456-7890</p>
    </footer>

</html>

      