<?php

class DB{
    private $host;
    private $db;
    private $user;
    private $password;
    private $charset;

    public function __construct(){
        $this->host     = 'sql105.epizy.com';
        $this->db       = 'epiz_31674001_bd_abarrotes';
        $this->user     = 'epiz_31674001';
        $this->password = 'mFv7rdYndplQ2W';
        $this->charset  = 'utf8mb4';
    }

    function connect(){
    
        try{  
            $connection = "mysql:host=".$this->host.";dbname=" . $this->db . ";charset=" . $this->charset;
            $options = [
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_EMULATE_PREPARES   => false,
            ];
    
            $pdo = new PDO($connection,$this->user,$this->password);
        
            return $pdo;

        }catch(PDOException $e){
            print_r('Error connection: ' . $e->getMessage());
        }   
    }
}

?>
