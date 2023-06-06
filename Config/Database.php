<?php
include_once('Contants.php');

class Database
{
    public $conn = NULL;

    // Hàm kết nối CSDL
    public function connect()
    {
        $this->conn = new mysqli(SERVER, USER, PASSWORD, DB);

        return $this->conn;
    }
    
    // Hàm đóng kết nối CSDL
    public function closeDatabase()
    {
        if ($this->conn) {
            $this->conn->close();
        }
    }
}
