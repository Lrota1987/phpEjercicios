<?php
namespace Clases;

/* recordar incluirlo en el index.php require '../vendor/autoload.php';*/
use \PDO;
use \PDOException;

class DBconnection {
    private $host;
    private $db;
    private $user;
    private $pass;
    private $dsn;
    protected $connect;
    private $dbname;

    public function __construct($configFile) {
        $config = json_decode(file_get_contents($configFile), true);
        $this->host = $config['Host'];
        $this->db = "{$config['DBType']}:host={$config['Host']}";
        $this->user = $config['User'];
        $this->pass = $config['Password'];
        $this->dbname = $config['DBName'];
        $this->dsn = "{$config['DBType']}:host={$this->host};dbname={$this->dbname};charset=utf8mb4";
        $this->connect = DBconnection::crearConect($config);
    }

    public function getConnect() {
        return $this->connect;
    }



    private function crearConect($config) {
        try {
            $connect = new PDO($this->dsn, $this->user, $this->pass);
        }
        catch(PDOException $e) {
            var_dump($e->getCode());
            
            if ($e->getCode() === 1049) { // Database no existe
                $connect = new PDO($this->db, $this->user, $this->pass);
                var_dump($e->getCode());
                $sqlFile = file_get_contents('./libreria.sql');
                $stm = $connect->prepare("CREATE DATABASE IF NOT EXISTS $this->dbname COLLATE utf8_spanish_ci");
                $stm->execute();
                $dbUse = $connect->prepare("USE $this->dbname");
                $dbUse->execute();
                $stmt=file_get_contents("./libreria.sql");
                $use_table=$connect->prepare($stmt);
                $use_table->execute();
            }

            $connect = new PDO($this->dsn, $this->user, $this->pass, array(PDO::ATTR_PERSISTENT => true));
            }
       /* $tableExists = $connect->query("SELECT * FROM table"); // Comprobar si existen las tablas pero no es necesario
        if (!$tableExists) { 
            $sqlFile = file_get_contents("../sql/{$this->db}.sql");
            $stm = $connect->prepare($sqlFile);
            $stm->execute();
        }*/
        return $connect;
    }
}
?>