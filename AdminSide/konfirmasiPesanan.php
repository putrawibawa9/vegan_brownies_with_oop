<?php

require_once "../functions.php";
$Id_pesanan = $_GET['Id_pesanan'];

if (konfirmasiPesanan($Id_pesanan)>0){
    echo "<script>
            alert('Pesanan telah dikirim ');
            document.location.href = 'order.php';
      </script>";
}else{
  echo "  <script>
            alert('Pesanan gagal dikirim');
            document.location.href = 'order.php';
            </script>";
}


?>