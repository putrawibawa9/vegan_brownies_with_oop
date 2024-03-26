<?php

require_once '../classes/classProduk.php';

$burger = new Produk\Produk;
$Id_produk = $_GET['Id_produk'];

if ($burger->deleteProduk($Id_produk)){
    echo "<script>
            alert('data berhasil dihapus');
            document.location.href = 'home.php';
      </script>";
}else{
  echo "  <script>
            alert('data gagal dihapus');
            document.location.href = 'home.php';
            </script>";
}


?>