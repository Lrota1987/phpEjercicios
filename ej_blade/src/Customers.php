<?php


namespace Clases;



use \PDO;
use \PDOException;

use Clases\DBConnection;

class Customers extends DBConnection {


    public function __construct() {

        parent::__construct('../config.json');
    }

    public function anadirCust($firstname, $surname, $email, $typee) {
        $stmt = parent::getConnect()->prepare('INSERT INTO customer (firstname, surname, email, typee) VALUES (?, ?, ?, ?)');
        $stmt->bindValue(1, $firstname,PDO::PARAM_STR);
        $stmt->bindValue(2, $surname,PDO::PARAM_STR);
        $stmt->bindValue(3, $email,PDO::PARAM_STR);
        $stmt->bindValue(4, $typee,PDO::PARAM_INT);
        $stmt->execute();
    }


    public function recuperarCustomer() {
        $sql = 'SELECT *  FROM customer ';
        $stmt = parent::getConnect()->prepare($sql);
        $stmt->execute();
        $array = [];
        while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
            array_push($array, $fila);
        }

        return $array;
    }


public function actualizar($id, $firstname, $surname, $email, $type) {
    $stmt = parent::getConnect()->prepare('UPDATE customer SET firstname = ?, surname = ?, email = ?, typee = ? WHERE id=?');
    $stmt->bindValue(1, $firstname,PDO::PARAM_STR);
    $stmt->bindValue(2, $surname,PDO::PARAM_STR);
    $stmt->bindValue(3, $email,PDO::PARAM_STR);
    $stmt->bindValue(4, $type,PDO::PARAM_STR);
    $stmt->bindValue(5, $id,PDO::PARAM_STR);
    $stmt->execute();
}

public function selectCust($id) {
    $sql = 'SELECT * FROM customer WHERE id =:id';
    $stmt = parent::getConnect()->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    foreach ($result as $row) {
        $array = ['firstname' => $row['firstname'],'surname' => $row['surname'],'email' => $row['email']];
    }
    return $array;
}

public function deleteCust ($id) {
    $stmt2 = parent::getConnect()->prepare('DELETE FROM customer WHERE id = '.$id);
    $stmt2->execute();
    header('Location:./cust_viewer.php');
}
}

?>