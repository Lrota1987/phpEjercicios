<?php


namespace Clases;

session_start();
use \PDO;
use \PDOException;

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

    public function visualizarBooks() {
        $stmt = parent::getConnect()->prepare('SELECT * FROM book');
        $stmt->execute();
        print "<form action='' method='POST'>";
        print "<table>
                <tr>
                    <td>ID</td>
                    <td>ISBN</td>
                    <td>TITLE</td>
                    <td>AUTHOR</td>
                    <td>STOCK</td>
                    <td>PRICE</td>
                    <td>ACTUALIZAR</td>
                    <td>ELIMINAR</td>
                </tr>";
        while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
            print "<tr>";
            foreach ($fila as $key => $item) {
                print "<td>".$item."</td>";
            }
            $id=$fila['id'];
            print "<td><button type='submit' name='actualizar' value='$id'>ACTUALIZAR</button></td>";
            print "<td><button type='submit' name='eliminar' value='$id'>ELIMINAR</button></td>";
            print "</tr>";
        }

        print "</table></form>";

        if (isset($_POST['eliminar'])) {
            $id = $_POST['eliminar'];
            $stmt2 = parent::getConnect()->prepare('DELETE FROM book WHERE id = '.$id);
            $stmt2->execute();
            header('Location:./db_viewer.php');
        }
        if (isset($_POST['actualizar'])) {
            $_SESSION['actualizar'] = $_POST['actualizar'];
            header('Location:./update.php');
        }




    }

    public function rellenarBook() {
        try {
            $delete=parent::getConnect()->prepare('DELETE FROM book');
            $delete->execute();
            $stmt=file_get_contents("./datosBook.sql");
            $stmt2 = parent::getConnect()->prepare($stmt);
            $stmt2->execute();
            return true;
        }
        catch (PDOException $e) {
            var_dump($e);
            echo "Algo ha ido mal!!";
        }
    }

    public function actualizar() {
        
    }

}
?>