<?php
class Connect {
    protected $host = "localhost";
    protected $port = 3306;
    protected $database = "vegan_brownies";
    protected $username = "root";
    protected $password = "";
    protected $connection;

    public function __construct() {
        try {
            $dsn = "mysql:host={$this->host};port={$this->port};dbname={$this->database}";
            $this->connection = new PDO($dsn, $this->username, $this->password);
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
?>
