<?php
class Database {
    public $connect;

    public function __construct() {
        $init = parse_ini_file("config.ini");
        $servername = $init["servername"];
        $dbname = $init["dbname"];
        $username = $init["username"];
        $password = $init["pass"];

        $opt = array(
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC 
        );

        try {
            $this->connect = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password, $opt);
        } catch (PDOException $e) {
            die("Connection failed: " . $e->getMessage());
        }
    }

    public function prepare($query) {
        return $this->connect->prepare($query);
    }
}


?>
