<?php


namespace Clases;

use \PDO;
use \PDOException;

use Clases\DBConnection;

class Sale extends DBConnection {

    private $customerId;
    private $date;

    public function __construct($customerId) {
        $this->customerId = $customerId;
        parent::__construct('./config.json');
    }

    public function anadirSale($customerId) {
        $stmt = parent::getConnect()->prepare('INSERT INTO sale (customer_id, datee) VALUES (?, ?)');
        $stmt->bindValue(1, $customerId,PDO::PARAM_STR);
        $stmt->bindValue(2, date("Y-m-d h:i:s"),PDO::PARAM_STR);
        $stmt->execute();
    }

    public function selectSaleMaxId() {
        $sql = 'SELECT MAX(id) FROM sale;';
        $stmt = parent::getConnect()->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $id=$result;
        return $id;
    }

}
?>