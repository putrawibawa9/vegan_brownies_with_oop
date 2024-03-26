<?php

use Connection\Connect;

require_once "construct.php";
class Auth extends Connection\Connect{
    public $error =false;
    public $row;

public function register($data){
    $connection = $this->getConnection();

    $Password = $data['password'];
    $Nama_pelanggan = $data['Nama_pelanggan'];
    $No_pelanggan = $data['No_pelanggan'];
    $Alamat_pelanggan = $data['Alamat_pelanggan'];
 
    $query = "INSERT INTO pelanggan
    VALUES ('',?,?,?,?);";

    $stmt = $connection->prepare($query);
    $stmt->bindParam(1,$Password);
    $stmt->bindParam(2,$Nama_pelanggan);
    $stmt->bindParam(3,$No_pelanggan);
    $stmt->bindParam(4,$Alamat_pelanggan);
    $stmt->execute();
    return true;
}
    
public function login ($Nama_pelanggan, $password){

    $connection = $this->getConnection();

    $query = "SELECT * FROM pelanggan WHERE Nama_pelanggan = ? AND password = ?";
    $result = $connection->prepare($query);

    $result->execute([$Nama_pelanggan, $password]);

    if($this->row = $result->fetch()){
        $_SESSION['is_auth'] = true;
        $_SESSION['Nama_pelanggan'] = $this->row['Nama_pelanggan'];
        $_SESSION['Id_pelanggan'] = $this->row['Id_pelanggan'];
        $_SESSION['Alamat_pelanggan'] = $this->row['Alamat_pelanggan'];
        header("Location: ClientSide/index.php");

    }else{
        $this->error = True;
        header("Location: index.php?error=1");
        exit();
    };
   
    }
public function loginAdmin ($Username, $Password){

    $connection = $this->getConnection();

    $query = "SELECT * FROM admin WHERE Username = ? AND Password = ?";
    $result = $connection->prepare($query);

    $result->execute([$Username, $Password]);

    if($this->row = $result->fetch()){
        header("Location: home.php");

    }else{
        $this->error = True;
        header("Location: login.php?error=1");
        exit();
    };
   
    }

    public function registerAdmin($Username, $Password){
        $connection = $this->getConnection();
    
        // Check if the username already exists
        $query = "SELECT COUNT(*) as count FROM admin WHERE Username = ?";
        $stmt = $connection->prepare($query);
        $stmt->execute([$Username]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
    
        // If the count is greater than 0, it means the username already exists
        if($row['count'] > 0) {
            echo "<script>
            alert('Username is already been made');
            document.location.href = 'registrasi.php';
      </script>";
        }
    
        // If username doesn't exist, proceed with insertion
        $query = "INSERT INTO admin (username, password) VALUES (?, ?)";
        $result = $connection->prepare($query);
        $result->execute([$Username, $Password]);
    
        return $result;
    }
    public function registerUser($data){
        $connection = $this->getConnection();

        $Password = $data["Password"];
        $Nama_pelanggan = $data["Nama_pelanggan"];
        $No_pelanggan = $data["No_pelanggan"];
        $Alamat_pelanggan = $data["Alamat_pelanggan"];
    
        // Check if the username already exists
        $query = "SELECT COUNT(*) as count FROM pelanggan WHERE Nama_pelanggan = ?";
        $stmt = $connection->prepare($query);
        $stmt->execute([$Nama_pelanggan]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
    
        // If the count is greater than 0, it means the username already exists
        if($row['count'] > 0) {
            echo "<script>
            alert('Username is already been made');
            document.location.href = 'registrasi.php';
      </script>";
      return false;
        }
    
        // If username doesn't exist, proceed with insertion

        $query = "INSERT INTO pelanggan VALUES ('',?,?,?,?)";
      $stmt = $connection->prepare($query);
        $stmt->bindParam(1,$Password);
        $stmt->bindParam(2,$Nama_pelanggan);
        $stmt->bindParam(3,$No_pelanggan);
        $stmt->bindParam(4,$Alamat_pelanggan);
        $stmt->execute();
        return true;
    }


public function logout(){
    header("Location: ../index.php");
    exit;
}
}
?>