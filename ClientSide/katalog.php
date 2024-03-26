<?php
session_start();
require_once "../functions.php";


$produk = query("SELECT * FROM produk");


if(isset($_POST['submit'])){

    //check the progress
    $hasil_query = tambahPesanan($_POST);
    if ($hasil_query>0){
        echo "
            <script>
            alert('Pesanan berhasil ditambahkan');
            document.location.href = 'order.php?Id_pesanan=$hasil_query';
            </script>
        ";
    }else{
        echo " <script>
        alert('data gagal ditambah');
        document.location.href = 'katalog.php';
        </script>
    ";

    }

}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vegan Brownies Bites</title>
    <style>
        
        body {
            font-family: Arial, sans-serif;
            background-color: white;
            margin: 0;
            padding: 0;
        }

        h1, .form {
            color: white;
        }

        a {
            color: white;
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
            background-color: #4F6F52;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
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

        td:nth-child(5) {
    max-width: 200px; /* Adjust the value according to your design */
    word-wrap: break-word;
    text-overflow: ellipsis;
}

    </style>
</head>
<body>
   
    <header>
        <h1>Vegan Brownies Bites</h1>
        <p>Temukan keindahan dalam Brownies</p>
    </header>
    <table border="1" cellpadding = '10' cellspacing = '0'>
        <tr>
            <th> No </th>
            <th> Id Produk</th>
            <th> Nama Produk</th>
            <th> Foto Produk </th>
            <th> Deskripsi Produk</th>
            <th> Harga Produk</th>
            <th> Aksi</th>
        </tr>
        
        <?php $i =1;?>
        <!-- create the loop -->
        <?php foreach($produk as $row): ?>
        <tr>
            <td><?= $i; ?></td>
            <td><?= $row['Id_produk']; ?></td>
            <td><?= $row['Nama_produk']; ?></td>
            <td><img src="../img/<?= $row['Foto_produk']; ?>" width="100px" height="100px"></td>
            <td><?= $row['Deskripsi_produk']; ?></td>
            <td>Rp.<?= $row['Harga_produk']; ?></td>
            <!-- <td><a href="order.php?Id_produk=<?= $row['Id_produk'];?>">checkout</a></td> -->
            <td>
                <form action=""method="post">
                    <input type="hidden" value="<?=$_SESSION['Id_pelanggan'];?>" name="Id_pelanggan">
                    <input type="hidden" value="<?= $row['Id_produk'];?>" name="Id_produk">
                    <input type="hidden" value="<?=$_SESSION['Alamat_pelanggan'];?>" name="Alamat_pesanan">
                    <input type="hidden" value="<?= $row['Harga_produk'];?>" name="Total_pesanan">
                    <input type="hidden" value="<?= date('Y-m-d');?>" name="Tgl_pesanan">
                    <button name="submit">Pesan</button>
                </form>
            </td>
           
            <?php $i++?>
        </tr>
        <?php endforeach; ?>
        </table>
        <footer>
        <a href="../logout.php">Keluar</a>
        <p>Hubungi kami di: info@VeganBrowniesBites.com | Phone: (123) 456-7890</p>
    </footer>

     </body>