<?php 
$servername = "localhost";
$username = "phuonglc";
$password = "1111";

// Create connection
$conn = new mysqli($servername, $username, $password);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Create database
$sql = "CREATE DATABASE php_project_test";
if ($conn->query($sql) === TRUE) {
//   echo "Database created successfully";
    $dbname = "php_project";
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    // sql to create table
    $sql = "CREATE TABLE post (
        id int UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        title VARCHAR(25),
        description VARCHAR(255),
        status int,
        created_at datetime,
        updated_at datetime
        )";
        
    if ($conn->query($sql) === TRUE) {
        // echo "Table MyGuests created successfully";
    
    }

} 
class Db {
    public $conn;
    public $host = 'localhost';
    public $username = 'phuonglc';
    public $password = '1111';
    public $dbname = 'php_project';

    public function __construct(){
        $this->conn = mysqli_connect($this->host, $this->username, $this->password);
        mysqli_select_db($this->conn, $this->dbname);
    }
}
?>