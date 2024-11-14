<?php
namespace app\Models;

include(__DIR__ . "/../Config/DatabaseConfig.php");

use app\Config\DatabaseConfig;
use mysqli;

class Product extends DatabaseConfig
{
    public $conn;

    public function __construct()
    {
        $this->conn = new mysqli($this->host, $this->user, $this->password, $this->database_name, $this->port);
        if ($this->conn->connect_error) {
            die("Connection Failed: " . $this->conn->connect_error);
        }

        //return "server is running";
    }

    public function __destruct()
    {
        $this->conn->close();
    }

    public function findAll()
    {
        $sql = "SELECT * FROM products";
        $result = $this->conn->query($sql);
        if (!$result) {
            error_log("FindAll error: " . $this->conn->error);
            return [];
        }

        $data = [];
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        return $data;
    }

    public function findById($id)
    {
        $sql = "SELECT * FROM products WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);
        if (!$stmt->execute()) {
            error_log("FindById error: " . $stmt->error);
            return null;
        }
        
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    public function create($data)
    {
        $productName = $data["product_name"];
        $query = "INSERT INTO products (product_name) VALUES (?)";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("s", $productName);

        if ($stmt->execute()) {
            return $this->conn->insert_id;
        } else {
            error_log("Create error: " . $stmt->error);
            return null;
        }
    }

    public function update($data, $id)
    {
        $productName = $data["product_name"];
        $query = "UPDATE products SET product_name = ? WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("si", $productName, $id);

        if ($stmt->execute()) {
            return $stmt->affected_rows;
        } else {
            error_log("Update error: " . $stmt->error);
            return null;
        }
    }

    public function delete($id)
    {
        $query = "DELETE FROM products WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $id);

        if ($stmt->execute()) {
            return $stmt->affected_rows;
        } else {
            error_log("Delete error: " . $stmt->error);
            return null;
        }
    }
}
