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

}



?>