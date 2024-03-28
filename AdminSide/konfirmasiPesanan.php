<?php

require_once '../classes/classPesanan.php';

$pesanan = new Pesanan;
$Id_pesanan = $_GET['Id_pesanan'];
$Id_produk = $_GET['Id_produk'];


if ($pesanan->konfirmasiPesanan($Id_pesanan)){
    echo "<script>
            alert('Berhasil Dikonfirmasi');
            document.location.href = 'order.php';
      </script>";
}else{
  echo "  <script>
            alert('Gagal Dikonfirmasi');
            document.location.href = 'order.php';
            </script>";
}


?>