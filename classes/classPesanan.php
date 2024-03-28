<?php

use Connection\Connect;

    require_once "construct.php";


class Pesanan extends Connection\Connect{
    public function viewPesanan(){
        $conn = $this->getConnection();
        $query = "SELECT *
        FROM pesanan
        JOIN produk ON pesanan.Id_produk = produk.Id_produk
        JOIN pelanggan ON pesanan.Id_pelanggan = pelanggan.Id_pelanggan;";  
        $result = $conn->query($query);
        $pesanan = $result->fetchAll();
        return $pesanan;
        }

        public function konfirmasiPesanan($Id_pesanan){
            $conn = $this->getConnection();
            $query = "DELETE FROM pesanan WHERE Id_pesanan = $Id_pesanan";
            $result = $conn->exec($query);
            return $result;
        }

        function minStock( $Id_produk, $Jumlah_pesanan ){
            $conn = $this->getConnection();
            $query    = "UPDATE produk SET Stok_produk = Stok_produk - $Jumlah_pesanan WHERE Id_produk = '$Id_produk'";
            $result = $conn->exec($query);
        }
}





?>