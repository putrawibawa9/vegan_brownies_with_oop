<?php

namespace Connection{
    use PDO;
    use PDOException;



class Connect {
    protected $host = "localhost";
    protected $port = 3306;
    protected $database = "vegan_brownies";
    protected $username = "root";
    protected $password = "";
    protected $connection;

    public function __construct() {
        try {
            $this->connection = new PDO("mysql:host=$this->host:$this->port;dbname=$this->database", $this->username, $this->password);
            // Optional: Set PDO attributes or perform other initialization if needed
        } catch (PDOException $e) {
            // Handle connection errors here
            die("Connection failed: " . $e->getMessage());
        }
    }

    public function getConnection(): PDO {
        return $this->connection;
    }
} 

}

?>