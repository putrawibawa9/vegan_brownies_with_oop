<?php
namespace Produk{
    use Connection\Connect;
    require_once "construct.php";
    

class Produk extends Connect{
    
    public function readProduk(){
        $conn = $this->getConnection();
        $query = "SELECT * FROM produk";  
        $result = $conn->query($query);
        $burger = $result->fetchAll();
        return $burger;
        }

    public function readPesanan(){
        $conn = $this->getConnection();
        $query = "SELECT * FROM produk JOIN kategori ON produk.id_kategori = kategori.id_kategori";  
        $result = $conn->query($query);
        $burger = $result->fetchAll();
        return $burger;
        }

        public function viewEachProduk($Id_produk){
            $conn = $this->getConnection();
            $query = "SELECT * FROM produk WHERE Id_produk= $Id_produk";
            $result = $conn->query($query);
            $kategori = $result->fetch();
            return $kategori;
        }

    public function readTwoTable(){
        $conn = $this->getConnection();
        $queryKat = "SELECT * FROM kategori";
        $resultKat = $conn->query($queryKat);

        $queryBin = "SELECT * FROM produk";
        $resultBin = $conn->query($queryBin);


        if($resultKat && $resultBin){
            $dataKat = $resultKat->fetchAll();
            $dataBin = $resultBin->fetchAll();
            return array('tableKat'=>$dataKat, 'tableBin'=>$dataBin);
        }else{
            return false;
        }
    }
    public function readTwoTablepart2($id_produk){
        $conn = $this->getConnection();
        $queryKat = "SELECT * FROM kategori JOIN produk ON kategori.id_kategori = produk.id_kategori WHERE id_produk = $id_produk";
        $resultKat = $conn->query($queryKat);

        $queryBin = "SELECT * FROM produk WHERE id_produk= $id_produk";
        $resultBin = $conn->query($queryBin);



        if($resultKat && $resultBin){
            $dataKat = $resultKat->fetch();
            $dataBin = $resultBin->fetch();
            return array('tableKat'=>$dataKat, 'tableBin'=>$dataBin);
        }else{
            return false;
        }
    }

    public function readTwoTablepart3($id_kategori){
        $conn = $this->getConnection();
        $queryKat = "SELECT nama_kategori FROM kategori WHERE id_kategori = $id_kategori";
        $resultKat = $conn->query($queryKat);

        $queryBin = "SELECT * FROM produk JOIN kategori ON produk.id_kategori = kategori.id_kategori WHERE kategori.id_kategori = $id_kategori";
        $resultBin = $conn->query($queryBin);

        if($resultKat && $resultBin){
            $dataKat = $resultKat->fetch();
            $dataBin = $resultBin->fetchall();
            return array('tableKat'=>$dataKat, 'tableBin'=>$dataBin);
        }else{
            return false;
    }
}

    public function addProduk($data){
        $conn = $this->getConnection();
        $Nama_produk = $data['Nama_produk'];
        $Stok_produk = $data['Stok_produk'];
        $Deskripsi_produk = $data['Deskripsi_produk'];
        $Harga_produk = $data['Harga_produk'];
        $Foto_produk = $this->uploadGambar();
        if (!$Foto_produk) {
            return false;
        }
        $query = "INSERT INTO produk VALUES 
        ('',?,?,?,?,?)";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(1,$Nama_produk);
        $stmt->bindParam(2,$Foto_produk);
        $stmt->bindParam(3,$Stok_produk);
        $stmt->bindParam(4,$Deskripsi_produk);
        $stmt->bindParam(5,$Harga_produk);
        $stmt->execute();
        return true;
    }


    public function editProduk($data){
        $conn = $this->getConnection();
        $Nama_produk = $data['Nama_produk'];
        $Stok_produk = $data['Stok_produk'];
        $Deskripsi_produk = $data['Deskripsi_produk'];
        $Harga_produk = $data['Harga_produk'];
        $Gambar_lama = $data['Gambar_lama'];
        $Id_produk = $data['Id_produk'];

          //check whether user pick a new image or not
        if($_FILES['Foto_produk']['error']===4){
            $Foto_produk = $Gambar_lama;
        }else{
            $Foto_produk = $this->uploadGambar();
        }
        $query = "UPDATE produk SET
        Nama_produk = ?,
        Foto_produk = ?,
        Stok_produk = ?,
        Deskripsi_produk = ?,
        Harga_produk = ?
        WHERE Id_produk = ?
        ";
             $stmt = $conn->prepare($query);
                $stmt->bindParam(1,$Nama_produk);
                $stmt->bindParam(2,$Foto_produk);
                $stmt->bindParam(3,$Stok_produk);
                $stmt->bindParam(4,$Deskripsi_produk);
                $stmt->bindParam(5,$Harga_produk);
                $stmt->bindParam(6,$Id_produk);
                $stmt->execute();
                return true;
    }


    public function uploadGambar(){
        $namaFile = $_FILES['Foto_produk']['name'];
        $ukuranFile =  $_FILES['Foto_produk']['size'];
        $error =  $_FILES['Foto_produk']['error'];  
        $tmp =  $_FILES['Foto_produk']['tmp_name'];  
      
        //cek apakah user sudah menambah gambar
      
        if($error ===4){
          echo "<script>
              alert ('Silahkan pilih gambar');
                </script>";
                return false;
        }
      
        //cek apakah yang diupload adalah gambar
        $ekstensiGambarValid =['jpg','jpeg', 'png'];
        $ekstensiGambar = explode('.', $namaFile); 
        $ekstensiGambar = strtolower(end($ekstensiGambar)); 
        if(!in_array($ekstensiGambar,$ekstensiGambarValid)){
          echo "<script>
              alert ('format gambar salah!');
                </script>";
                return false;
        }
      
        //cek jika ukurannya terlalu besar
        if ($ukuranFile > 1000000){
          echo "<script>
              alert ('Ukuran terlalu besar');
                </script>";
        }
      
        //generate nama file random
        $namaFileBaru = uniqid();
        $namaFileBaru .= '.';
        $namaFileBaru .= $ekstensiGambar;
      
      
        //lolos semua hasil cek, lalu dijalankan
        move_uploaded_file($tmp, '../img/'.$namaFileBaru);
      
        return $namaFileBaru;
    }


    public function deleteProduk($Id_produk){
        $conn = $this->getConnection();
        $query = "DELETE FROM produk WHERE Id_produk = $Id_produk";
        $result = $conn->exec($query);
        return $result;
}

    public function viewEachCategory($id_kategori){
        $conn = $this->getConnection();
        $query = "SELECT * FROM kategori WHERE id_kategori= $id_kategori";
        $result = $conn->query($query);
        $kategori = $result->fetch();
        return $kategori;
    }

    public function editKategori($nama_kategori,$id_kategori){
        $conn = $this->getConnection();
        $query = "UPDATE kategori SET
        nama_kategori = ?
        WHERE id_kategori = ?";

        $stmt = $conn->prepare($query);
        $stmt->bindParam(1,$nama_kategori);
         $stmt->bindParam(2,$id_kategori);

          //check the progress
    if ($stmt->execute()) {
        echo "
            <script>
            alert('Data berhasil diupdate');
            document.location.href = 'kategori.php';
            </script>
        ";
    } else {
        echo "
            <script>
            alert('Data gagal diupdate');
            document.location.href = 'kategori.php';
            </script>
        ";
    }
    }

}
}
?>