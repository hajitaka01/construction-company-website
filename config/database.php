<?php
// Thông tin kết nối MySQL
define('DB_HOST', 'localhost');
define('DB_USER', 'root');         
define('DB_PASS', '');             
define('DB_NAME', 'hoanggiaxaydung');      

// Tạo kết nối mới
$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
} else {
    echo "Kết nối MySQLi thành công.<br>";
}

// Đặt charset là utf8
$conn->set_charset("utf8");

// Đặt timezone
date_default_timezone_set('Asia/Vung_Tau');

class Database {
    private $host = "localhost";
    private $db_name = "hoanggiaxaydung";
    private $username = "root";
    private $password = "";
    public $conn;

    public function getConnection(){
        $this->conn = null;
        try{
            $this->conn = new PDO("mysql:host={$this->host};dbname={$this->db_name}", 
                                  $this->username, $this->password);
            $this->conn->exec("set names utf8");
            echo "Kết nối PDO thành công.<br>";
        } catch(PDOException $e){
            echo "Lỗi kết nối: " . $e->getMessage();
        }
        return $this->conn;
    }
}