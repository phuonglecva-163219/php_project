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
$sql = "CREATE DATABASE php_project_TEST_1";
if ($conn->query($sql) === TRUE) {
//   echo "Database created successfully";
    $dbname = "php_project_TEST_1";
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
        image VARCHAR(255),
        created_at datetime,
        updated_at datetime
        )";
        
    if ($conn->query($sql) === TRUE) {
        // echo "Table MyGuests created successfully";
        $i = 0;
        while ($i < 50) {
            $title = 'Title'. $i;
            $description= 'Description' .$i;
            $status= $i % 2 ;
            $image = '1.jpg';
            $query = 'INSERT INTO post (title, description, image, status, created_at, updated_at) VALUES ("'.$title.'","'.$description.'", "'.$image.'",'.$status.',"'.date_create()->format('Y-m-d H:i:s').'", "'.date_create()->format('Y-m-d H:i:s').'")';
            mysqli_query($conn, $query);
            $i++;
        }
    }
    // echo 'ok';

} 
class Db {
    public $conn;
    public $host = 'localhost';
    public $username = 'phuonglc';
    public $password = '1111';
    public $dbname = 'php_project_TEST_1';

    public function __construct(){
        $this->conn = mysqli_connect($this->host, $this->username, $this->password);
        mysqli_select_db($this->conn, $this->dbname);
    }
}
?>