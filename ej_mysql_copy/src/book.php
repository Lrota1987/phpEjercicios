<?php
namespace Clases;

use Clases\DBConnection;

class Book  extends DBConnection{

    private $isbn;
    private $title;
    private $author;
    private $stock;
    private $price;

    public function __construct($isbn, $title, $author, $stock, $price) {
        $this->isbn;
        $this->title;
        $this->author;
        $this->stock;
        $this->price;
        parent::__construct('./config.json');
    }


}
?>