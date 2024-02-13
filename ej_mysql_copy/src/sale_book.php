<?php


namespace Clases;

use \PDO;
use \PDOException;

use Clases\DBConnection;

class Sale_book extends DBConnection {

    private $book_id;

    private $sale_id;

    private $amount;

    public function __construct($book_id, $sale_id, $amount) {
        $this->book_id = $book_id;
        $this->sale_id = $sale_id;
        $this->amount = $amount;
        parent::__construct('./config.json');
    }

    public function anadirSaleBook($book_id, $sale_id, $amount, $stock, $objBook) {
        $stmt = parent::getConnect()->prepare('INSERT INTO sale_book (book_id, sale_id, amount) VALUES (?, ?, ?)');
        $stmt->bindValue(1, $book_id,PDO::PARAM_STR);
        $stmt->bindValue(2, $sale_id,PDO::PARAM_STR);
        $stmt->bindValue(3, $amount,PDO::PARAM_STR);
        $stmt->execute();

        $objBook->actualizarStock($book_id, $stock);
    }

}
?>