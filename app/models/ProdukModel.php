<?php
require_once __DIR__ . '/../config/database.php';

class ProdukModel {
    private $conn;
    private $table = 'produk';

    public function __construct() {
        $db = new Database();
        $this->conn = $db->connect();
    }

    public function getAll() {
        $query = "SELECT * FROM " . $this->table . " ORDER BY id DESC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id) {
        $query = "SELECT * FROM " . $this->table . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($data) {
        $query = "INSERT INTO " . $this->table . " (kode_barang, nama_produk, harga, stok) VALUES (:kode, :nama, :harga, :stok)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':kode', $data['kode_barang']);
        $stmt->bindParam(':nama', $data['nama_produk']);
        $stmt->bindParam(':harga', $data['harga']);
        $stmt->bindParam(':stok', $data['stok']);
        return $stmt->execute();
    }

    public function update($id, $data) {
        $query = "UPDATE " . $this->table . " SET kode_barang = :kode, nama_produk = :nama, harga = :harga, stok = :stok WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':kode', $data['kode_barang']);
        $stmt->bindParam(':nama', $data['nama_produk']);
        $stmt->bindParam(':harga', $data['harga']);
        $stmt->bindParam(':stok', $data['stok']);
        return $stmt->execute();
    }

    public function delete($id) {
        $query = "DELETE FROM " . $this->table . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}