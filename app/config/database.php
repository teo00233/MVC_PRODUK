<?php
class Database {
    private $host = "localhost";
    private $user = "root";
    private $pass = "";
    private $db_name = "toko_db";
    private $conn;

    public function connect() {
        $this->conn = null;
        try {
            $this->conn = new PDO(
                "mysql:host=" . $this->host . ";dbname=" . $this->db_name,
                $this->user,
                $this->pass
            );
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            echo "Koneksi Database Gagal: " . $e->getMessage();
        }
        return $this->conn;
    }
}