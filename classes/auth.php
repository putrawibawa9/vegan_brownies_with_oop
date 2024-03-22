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
        header("Location: ../index.php?error=1");
        exit();
    };
   
    }

public function logout(){
    header("Location: ../index.php");
    exit;
}
}
?>