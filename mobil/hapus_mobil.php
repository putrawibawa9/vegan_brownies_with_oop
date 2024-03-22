<?php

require_once 'Mobil.php';

$mobil = new Mobil;
$kode_mobil = $_GET['kode_mobil'];

if ($mobil->deleteMobil($kode_mobil)){
    echo "<script>
            alert('data berhasil dihapus');
            document.location.href = 'index.php';
      </script>";
}else{
  echo "  <script>
            alert('data gagal dihapus');
            document.location.href = 'index.php';
            </script>";
}


?>