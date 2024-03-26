<?php

require_once '../classes/classPesanan.php';

$pesanan = new Pesanan;
$Id_pesanan = $_GET['Id_pesanan'];

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