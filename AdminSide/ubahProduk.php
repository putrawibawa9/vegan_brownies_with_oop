<?php 
    require_once '../classes/classProduk.php';
?>

<?php
$Id_produk = $_GET['Id_produk'];


$data = new Produk\Produk;

$pdk = $data->viewEachProduk($Id_produk);

// var_dump($pdk);
if(isset($_POST['submit'])){

    $edit = new Produk\Produk;
    $result = $edit->editProduk($_POST);
    
    //check the progress
    if ($result){
        echo "
            <script>
            alert('data berhasil diubah');
            document.location.href = 'home.php';
            </script>
        ";
    }else{
        echo " <script>
        alert('data gagal diubah');
        document.location.href = 'home.php';
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
    <title>Ubah data Produk</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        h1 {
            color: #333;
            text-align: center;
        }

        form {
            max-width: 400px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        li {
            margin-bottom: 10px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            color: #333;
        }

        input {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            background-color: #007BFF;
            color: #fff;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }

        a {
            display: block;
            margin-top: 10px;
            color: #007BFF;
            text-decoration: none;
        }
    </style>
</head>
<body>
    
<h1>Ubah Data Produk</h1>

<form action="" method="post" enctype="multipart/form-data">
<input type="hidden" name="Id_produk" value="<?= $pdk['Id_produk']?>">
<input type="hidden" name="Gambar_lama" value="<?= $pdk['Foto_produk']?>">
<ul>
    <li>
        <label for="Nama_produk">Nama Produk :</label>
        <input type="text" name="Nama_produk" id="Nama_produk" required value="<?= $pdk['Nama_produk']; ?>">
    </li>
    <li>
        <label for="Foto_produk">Foto Produk :</label>
        <input type="file" name="Foto_produk" id="nama">

        <img src="../img/<?= $pdk['Foto_produk'] ?>" width="100px" height="100px">
    </li>
    <li>
        <label for="Stok_produk">Stok Produk :</label>
        <input type="number" name="Stok_produk" id="Stok_produk" required value="<?= $pdk['Stok_produk']; ?>" >
    </li>
    <li>
        <label for="Deskripsi_produk">Deskripsi Produk :</label>
        <input type="text" name="Deskripsi_produk" id="Deskripsi_produk" required value="<?= $pdk['Deskripsi_produk']; ?>" >
    </li>
    <li>
        <label for="Harga_produk">Harga Produk :</label>
        <input type="number" name="Harga_produk" id="Harga_produk" required value="<?= $pdk['Harga_produk']; ?>" >
    </li>
    <button type="submit" name="submit">Post</button>
</ul>

<a href="home.php">back</a>
</form>


</body>
</html>