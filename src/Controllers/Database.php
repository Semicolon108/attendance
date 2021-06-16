<?php
    namespace App\Controllers;

    session_start();
    use PDO,PDOException;

    class Database{
        private $host = "127.0.0.1";
        private $password = "";
        private $user = "root";
        private $db = "college_attendance";

        protected $DBHandler;

        public function connectDB()
        {
            $this->DBHandler = null;
            $dsn = "mysql:host=".$this->host.";dbname=".$this->db;
            try{
                $this->DBHandler = new PDO($dsn,$this->user,$this->password);
                $this->DBHandler->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            }catch(PDOException $e){
                die("Database connection failed : ".$e->getMessage());
            }
            return $this->DBHandler;
        }
    }
?>