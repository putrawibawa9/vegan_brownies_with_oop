<?php
require_once "../classes/construct.php";
require_once "../classes/classPesanan.php";

$pesanans = new Pesanan;

$pesanan = $pesanans->viewPesanan();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        h1, .form {
            color: #333;
        }

        a {
            text-decoration: none;
            color: #007BFF;
            margin-right: 10px;
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #333;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        footer {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 1em;
            position: fixed;
            bottom: 0;
            width: 100%;
        }
        header {
            background-color: #4F6F52;
            color: #fff;
            padding: 1em;
            text-align: center;
        }
    </style>
</head>
<body>
    <header>
    <h1>Vegan Brownies Bites</h1>
        <p>Temukan keindahan dalam Brownies</p>
        <h1 style="color: white;">DAFTAR PESANAN</h1>
    </header>

    <table border="1" cellpadding = '10' cellspacing = '0'>
        <tr>
            <th> No </th>
            <th> Id Pesanan</th>
            <th> Nama Pelanggan</th>
            <th> Nama Produk </th>
            <th> Stok Produk</th>
            <th> Harga Produk</th>
            <th> Actions</th>
        </tr>
        
        <?php $i =1;?>
        <!-- create the loop -->
        <?php foreach($pesanan as $row): ?>
        <tr>
            <td><?= $i; ?></td>
            <td><?= $row['Id_pesanan']; ?></td>
            <td><?= $row['Nama_pelanggan']; ?></td>
            <td><?= $row['Nama_produk']; ?></td>
            <td><?= $row['Stok_produk']; ?></td>
            <td><?= $row['Harga_produk']; ?></td>
            <td>
               <a href="konfirmasiPesanan.php?Id_pesanan=<?=$row['Id_pesanan'];?>" onclick="return confirm('yakin?');">Konfirmasi Pemesanan</a>
            </td>
            <?php $i++?>
        </tr>
        <?php endforeach; ?>
    </table>

    <footer>
        <a href="../logout.php">Keluar</a>
        <p>Hubungi kami di: info@veganbrownies.com | Phone: (081) 555-3004</p>
    </footer>

      