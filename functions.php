<?php

// baris koneksi ke database MySQL 
$conn =mysqli_connect("localhost","root","","vegan_brownies");

//Fungsi untuk menjalankan query database, mengambil data, dan mengembalikannya sebagai array 
function query($query){
    global $conn;
    $result =mysqli_query($conn, $query);
    
    //make an empty array
    //Variabel $rows merupakan sebuah array yang menyimpan hasil setiap baris data yang diambil dari hasil kueri.
    // Data ini kemudian dikembalikan oleh fungsi query()
    $rows = [];
    //loop the $result

    // setiap baris data yang diambil dari hasil kueri disimpan dalam variabel $row, dan kemudian ditambahkan ke dalam array $rows.
    // Proses ini diulang terus menerus sampai tidak ada lagi baris data yang dapat diambil dari hasil kueri
    while( $row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
    }
    return $rows;
}

//Menambahkan produk ke database
function tambahProduk__($data) {
    global $conn;
  
    $Nama_produk = $data['Nama_produk'];
    $Foto_produk = $data['Foto_produk'];
    $Stok_produk = $data['Stok_produk'];
    $Deskripsi_produk = $data['Deskripsi_produk'];
    $Harga_produk = $data['Harga_produk'];
  

//make the insert syntax
$query = "INSERT INTO produk VALUES 
            ('','$Nama_produk','$Foto_produk','$Stok_produk','$Deskripsi_produk','$Harga_produk')";

mysqli_query($conn,$query);
return mysqli_affected_rows($conn);
}


function tambahProduk($data) {
  global $conn;
  $Nama_produk = $data['Nama_produk'];
  $Stok_produk = $data['Stok_produk'];
  $Deskripsi_produk = $data['Deskripsi_produk'];
  $Harga_produk = $data['Harga_produk'];

  //upload gambar
  $Foto_produk = upload();
  if(!$Foto_produk){
    return false;
  }

//make the insert syntax
$query = "INSERT INTO produk VALUES 
          ('','$Nama_produk','$Foto_produk','$Stok_produk',' $Deskripsi_produk','$Harga_produk')";

mysqli_query($conn,$query);
return mysqli_affected_rows($conn);
}

function upload(){
  $namaFile = $_FILES['Foto_produk']['name'];
  $ukuranFile =  $_FILES['Foto_produk']['size'];
  $error =  $_FILES['Foto_produk']['error'];  
  $tmp =  $_FILES['Foto_produk']['tmp_name'];  

  //cek apakah user sudah menambah gambar

  if($error ===4){
    echo "<script>
        alert ('pilih gambar dulu');
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

function hapusProduk($Id_produk){
  global $conn;
  mysqli_query($conn,"DELETE FROM produk WHERE Id_produk = $Id_produk");
  return mysqli_affected_rows($conn);
}




function ubahProduk__($data){
  global $conn;
  $Id_produk = $data['Id_produk'];
  $Nama_produk = $data['Nama_produk'];
  $Foto_produk = $data['Foto_produk'];
  $Stok_produk = $data['Stok_produk'];
  $Deskripsi_produk = $data['Deskripsi_produk'];
  $Harga_produk = $data['Harga_produk'];

//make the insert syntax
$query = "UPDATE produk SET
        Nama_produk = '$Nama_produk',
        Foto_produk = '$Foto_produk',
        Stok_produk = $Stok_produk,
        Deskripsi_produk = '$Deskripsi_produk',
        Harga_produk = $Harga_produk
        WHERE Id_produk =$Id_produk
        ";

mysqli_query($conn,$query);
return mysqli_affected_rows($conn);
}


function ubahProduk($data){
  global $conn;
  $Id_produk = $data['Id_produk'];
  $Nama_produk = $data['Nama_produk'];
  $Stok_produk = $data['Stok_produk'];
  $Deskripsi_produk = $data['Deskripsi_produk'];
  $Harga_produk = $data['Harga_produk'];
  $gambarLama = $data['gambarLama'];


  //check whether user pick a new image or not
  if($_FILES['Foto_produk']['error']===4){
    $Foto_produk = $gambarLama;
  }else{
    $Foto_produk = upload();
  }


//make the insert syntax
$query = "UPDATE produk SET
        Nama_produk = '$Nama_produk',
        Foto_produk = '$Foto_produk',
        Stok_produk = '$Stok_produk',
        Deskripsi_produk = '$Deskripsi_produk',
        Harga_produk = $Harga_produk
        WHERE  Id_produk = $Id_produk
        ";

mysqli_query($conn,$query);
return mysqli_affected_rows($conn);
}








function regristrasiPelanggan($data){
  global $conn;
  $Nama_pelanggan = strtolower(stripslashes($data['Nama_pelanggan'])); 
  $Alamat_pelanggan = $data['Alamat_pelanggan']; 
  $password = $data['password']; 
  $password2 = $data['password2']; 

  //cek username udah ada atau belum
  $result =mysqli_query($conn,"SELECT Nama_pelanggan FROM pelanggan WHERE Nama_pelanggan = '$Nama_pelanggan';");
  if(mysqli_fetch_assoc($result)){
  echo "<script>
  alert('user sudah ada');
  </script>";
  return false;
}

  //cek  konfirmasi password
  if($password != $password2){
    echo "<script>
        alert('konfirmasi password tidak sesuai');
          </script>";
          return false;
  }

  //enkripsi passrod
  // $password = password_hash($password, PASSWORD_DEFAULT);

  //tambah user baru ke database
  mysqli_query($conn,"INSERT INTO pelanggan VALUES('','$password','$Nama_pelanggan','', '$Alamat_pelanggan')");
  return mysqli_affected_rows($conn);
}

function regristrasiAdmin($data){
  global $conn;
  $Username = strtolower(stripslashes($data['Username'])); 
  $password = $data['password']; 
  $password2 = $data['password2']; 

  //cek username udah ada atau belum
  $result =mysqli_query($conn,"SELECT Username FROM admin WHERE Username = '$Username';");
  if(mysqli_fetch_assoc($result)){
  echo "<script>
  alert('user sudah ada');
  </script>";
  return false;
}

  //cek  konfirmasi password
  if($password != $password2){
    echo "<script>
        alert('konfirmasi password tidak sesuai');
          </script>";
          return false;
  }

  //enkripsi passrod
  // $password = password_hash($password, PASSWORD_DEFAULT);

  //tambah user baru ke database
  mysqli_query($conn,"INSERT INTO admin VALUES('','$Username','$password')");
  return mysqli_affected_rows($conn);
}


function tambahPesanan($data) {
  global $conn;
  $Id_pelanggan = $data['Id_pelanggan'];
  $Id_produk = $data['Id_produk'];
  $Alamat_pesanan = $data['Alamat_pesanan'];
  $Total_pesanan = $data['Total_pesanan'];
  $Tgl_pesanan = $data['Tgl_pesanan'];
  $Jumlah_pesanan = $data['Jumlah_pesanan'];

  $cekStok = mysqli_query($conn,"SELECT Stok_produk FROM produk WHERE Id_produk = $Id_produk;");
  $rw = mysqli_fetch_assoc($cekStok);
  $Stok_produk = $rw ["Stok_produk"];

  if ($Jumlah_pesanan > $Stok_produk) {
    echo "
    <script>
    alert('pesanan melebihi stok');
    document.location.href = 'katalog.php';
    </script>
";
exit;
}


$result = mysqli_query($conn, 
    "SELECT AUTO_INCREMENT
    FROM information_schema.TABLES
    WHERE TABLE_SCHEMA = 'vegan_brownies' AND TABLE_NAME = 'pesanan';"
);
$row = mysqli_fetch_assoc($result);
$id = $row["AUTO_INCREMENT"];
$query = "INSERT INTO pesanan VALUES 
          ('$id','$Id_pelanggan','$Id_produk','$Alamat_pesanan',' $Total_pesanan','$Tgl_pesanan')";

mysqli_query($conn,$query);
if (mysqli_affected_rows($conn)) {
  return $id;
} else {
  return 0;
}
}


function detail_query($query){
  global $conn;
  $result =mysqli_query($conn, $query);
  $data = mysqli_fetch_assoc($result);

  return $data;
}


function konfirmasiPesanan($Id_pesanan){
  global $conn;
  mysqli_query($conn,"DELETE FROM pesanan WHERE Id_pesanan = $Id_pesanan");
  return mysqli_affected_rows($conn);
}