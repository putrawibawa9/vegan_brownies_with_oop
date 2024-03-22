<?php
require_once "connect.php";
class Mobil extends Connect{
    
    public function readMobil(){
        $conn = $this->getConnection();
        $query = "SELECT * FROM tb_mobil";  
        $result = $conn->query($query);
        $mobil = $result->fetchAll();
        return $mobil;
        }

        public function viewEachMobil($kode_mobil){
            $conn = $this->getConnection();
            $query = "SELECT * FROM tb_mobil WHERE kode_mobil= $kode_mobil";
            $result = $conn->query($query);
            $kategori = $result->fetch();
            return $kategori;
        }

    public function readTwoTable(){
        $conn = $this->getConnection();
        $queryKat = "SELECT * FROM kategori";
        $resultKat = $conn->query($queryKat);

        $queryBin = "SELECT * FROM binatang";
        $resultBin = $conn->query($queryBin);


        if($resultKat && $resultBin){
            $dataKat = $resultKat->fetchAll();
            $dataBin = $resultBin->fetchAll();
            return array('tableKat'=>$dataKat, 'tableBin'=>$dataBin);
        }else{
            return false;
        }
    }
    
    public function readTwoTablepart2($id_binatang){
        $conn = $this->getConnection();
        $queryKat = "SELECT * FROM kategori JOIN binatang ON kategori.id_kategori = binatang.id_kategori WHERE id_binatang = $id_binatang";
        $resultKat = $conn->query($queryKat);

        $queryBin = "SELECT * FROM binatang WHERE id_binatang= $id_binatang";
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

        $queryBin = "SELECT * FROM binatang JOIN kategori ON binatang.id_kategori = kategori.id_kategori WHERE kategori.id_kategori = $id_kategori";
        $resultBin = $conn->query($queryBin);

        if($resultKat && $resultBin){
            $dataKat = $resultKat->fetch();
            $dataBin = $resultBin->fetchall();
            return array('tableKat'=>$dataKat, 'tableBin'=>$dataBin);
        }else{
            return false;
    }
}

    public function addMobil($data){
        $conn = $this->getConnection();
        $nama_mobil = $data['nama_mobil'];
        $merk_mobil = $data['merk_mobil'];
        $cc_mobil = $data['cc_mobil'];
        $warna_mobil = $data['warna_mobil'];
        $harga_mobil = $data['harga_mobil'];
        $tanggal_launching_mobil = $data['tanggal_launching_mobil'];
    


        $query = "INSERT INTO tb_mobil VALUES 
        ('',?,?,?,?,?,?)";
    
        $stmt = $conn->prepare($query);
    
        $stmt->bindParam(1,$nama_mobil);
        $stmt->bindParam(2,$merk_mobil);
        $stmt->bindParam(3,$cc_mobil);
        $stmt->bindParam(4,$warna_mobil);
        $stmt->bindParam(5,$harga_mobil);
        $stmt->bindParam(6,$tanggal_launching_mobil);
        $stmt->execute();
        return true;
    }


    public function editMobil($data){
        $conn = $this->getConnection();
        $kode_mobil = $data['kode_mobil'];
        $nama_mobil = $data['nama_mobil'];
        $merk_mobil = $data['merk_mobil'];
        $cc_mobil = $data['cc_mobil'];
        $warna_mobil = $data['warna_mobil'];
        $harga_mobil = $data['harga_mobil'];
        $tanggal_launching_mobil = $data['tanggal_launching_mobil'];

        $query = "UPDATE tb_mobil SET
        nama_mobil = ?,
        merk_mobil = ?,
        cc_mobil = ?,
        warna_mobil = ?,
        harga_mobil = ?,
        tanggal_launching_mobil = ?
        WHERE kode_mobil = ?
        ";
             $stmt = $conn->prepare($query);
             $stmt->bindParam(1,$nama_mobil);
             $stmt->bindParam(2,$merk_mobil);
             $stmt->bindParam(3,$cc_mobil);
             $stmt->bindParam(4,$warna_mobil);
             $stmt->bindParam(5,$harga_mobil);
             $stmt->bindParam(6,$tanggal_launching_mobil);
             $stmt->bindParam(7,$kode_mobil);
                $stmt->execute();
                return true;
    }


    public function uploadGambar(){
        $namaFile = $_FILES['gambar']['name'];
        $ukuranFile =  $_FILES['gambar']['size'];
        $error =  $_FILES['gambar']['error'];  
        $tmp =  $_FILES['gambar']['tmp_name'];  
      
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


    public function deleteMobil($kode_mobil){
        $conn = $this->getConnection();
        $query = "DELETE FROM tb_mobil WHERE kode_mobil = $kode_mobil";
        $result = $conn->exec($query);
        return $result;
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
?>