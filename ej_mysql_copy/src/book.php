<?php


namespace Clases;

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

    public function selectBook($id) {
        $sql = 'SELECT isbn, title, author, stock, price  FROM book WHERE id =:id';
        $stmt = parent::getConnect()->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($result as $row) {
            $array = ['isbn' => $row['isbn'],'title' => $row['title'],'author' => $row['author'],'stock' => $row['stock'],'price' => $row['price']];
        }
        return $array;
    }


    public function visualizarBooks() {
        $stmt = parent::getConnect()->prepare('SELECT * FROM book');
        $stmt->execute();
        
        print "<table>
                <tr>
                    <td>DETALLES</td>
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
            $id=$fila['id'];
            print "<tr>";
            print "<form action='./details.php' method='POST'>";
            print "<td><button type='submit' name='details' class='details' value='$id'>DETALLES</button></td>";
            print "</form>";
            foreach ($fila as $key => $item) {
                print "<td>".$item."</td>";
            }
            print "<form action='./update.php' method='POST'>";
            print "<td><button type='submit' name='actualizar' class='actualizar' value='$id'>ACTUALIZAR</button></td>";
            print "</form>";
            print "<form action='./delete.php' method='POST'>";
            print "<td><button type='submit' class='eliminar' name='eliminar' value='$id'>ELIMINAR</button></td>";
            print "</form>";
            print "</tr>";
        }

        print "<tr COLSPAN='9'>";
        print "<form action='./anadirBook.php' method='POST'>";
        print "<td COLSPAN='5' class='last-file'><button type='submit' name='anadirB' class='botonInf' value=true>AÑADIR LIBRO</button></td>";
        print "</form>";
        print "<form action='./cust_viewer.php' method='POST'>";
        print "<td COLSPAN='4' class='last-file'><button type='submit' name='clientes' class='botonInf' value=true>CLIENTES</button></td>";
        print "</form>";
        print "</tr>";

        print "</table>";

        echo <<< EOT
        <style>
            table {
                font-size: 10px;
                border: 4px solid;
                background-color: lightyellow;
            }
            .actualizar {
                background-color: lightgreen;
            }
            td {
                border: 1px solid;
            }
            .eliminar {
                background-color: lightcoral;
            }
            .last-file {
                text-align: center;
            }
            .details {
                background-color: skyblue;
            }
            .botonInf {
                background-color: thistle;
            }
        </style>
        EOT;

    }

    public function visualizarBooks2($custId) {
        $stmt = parent::getConnect()->prepare('SELECT * FROM book');
        $stmt->execute();
        
        print "<table>
                <tr>
                    <td>ID</td>
                    <td>ISBN</td>
                    <td>TITLE</td>
                    <td>AUTHOR</td>
                    <td>STOCK</td>
                    <td>PRICE</td>
                    <td>COMPRAR</td>
                </tr>";
        while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $id=$fila['id'];
            print "<tr>";
            print "<form action='./zonaVenta.php' method='POST'>";
            print '<input id="custId" name="custId" type="hidden" value="'.$custId.'" />';

            foreach ($fila as $key => $item) {
                print "<td>".$item."</td>";
            }
            print "<td><input type='checkbox' name='libro[]' value='".$id."' /></td>";
        }

        print "<tr COLSPAN='9'>";
        print "<td COLSPAN='4' class='last-file'><button type='submit' name='comprar' class='botonInf'>COMPRAR</button></td>";
        print "</form>";
        print "<form action='./index.php' method='POST'>";
        print "<td COLSPAN='4' class='last-file'><button type='submit' name='volver' class='botonInf' value=true>VOLVER</button></td>";
        print "</form>";
        print "</tr>";

        print "</table>";

        echo <<< EOT
        <style>
            table {
                font-size: 10px;
                border: 4px solid;
                background-color: lightyellow;
            }
            .actualizar {
                background-color: lightgreen;
            }
            td {
                border: 1px solid;
            }
            .eliminar {
                background-color: lightcoral;
            }
            .last-file {
                text-align: center;
            }
            .details {
                background-color: skyblue;
            }
            .botonInf {
                background-color: thistle;
            }
        </style>
        EOT;

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

    public function actualizar($id, $isbn, $title, $author, $stock, $price) {
        $stmt = parent::getConnect()->prepare('UPDATE book SET isbn = ?, title = ?, author = ?, stock = ?, price =? WHERE id=?');
        $stmt->bindValue(1, $isbn,PDO::PARAM_STR);
        $stmt->bindValue(2, $title,PDO::PARAM_STR);
        $stmt->bindValue(3, $author,PDO::PARAM_STR);
        $stmt->bindValue(4, $stock,PDO::PARAM_INT);
        $stmt->bindValue(5, $price,PDO::PARAM_STR);
        $stmt->bindValue(6, $id,PDO::PARAM_STR);
        $stmt->execute();
        header('Location:./db_viewer.php');
    }

    public function anadirLibro($isbn, $title, $author, $stock, $price) {
        $stmt = parent::getConnect()->prepare('INSERT INTO book (isbn, title, author, stock, price) VALUES (?, ?, ?, ?, ?)');
        $stmt->bindValue(1, $isbn,PDO::PARAM_STR);
        $stmt->bindValue(2, $title,PDO::PARAM_STR);
        $stmt->bindValue(3, $author,PDO::PARAM_STR);
        $stmt->bindValue(4, $stock,PDO::PARAM_INT);
        $stmt->bindValue(5, $price,PDO::PARAM_STR);
        $stmt->execute();
        header('Location:./db_viewer.php');
    }

    public function deleteBook ($id) {
        $stmt2 = parent::getConnect()->prepare('DELETE FROM book WHERE id = '.$id);
        $stmt2->execute();
        header('Location:./db_viewer.php');
    }

    public function showDetails($id) {
        $stmt = parent::getConnect()->prepare('SELECT * from book WHERE id=?');
        $stmt->bindValue(1, $id,PDO::PARAM_STR);
        $stmt->execute();
        while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
            print '<div class="container">';
                print '<table>';
                    print '<tr COLSPAN="2">
                        <th COLSPAN="2">Título: '.$fila['title'].'</th>
                    </tr>
                    <tr>
                        <td>Autor: '.$fila['author'].'</td>
                        <td>Isbn: '.$fila['isbn'].'</td>
                    </tr>
                    <tr>
                        <td>Stock: '.$fila['stock'].'</td>
                        <td>Precio: '.$fila['price'].'</td>
                    </tr>
                    <tr COLSPAN="2" class="submit">
                        <form action="" method="POST">
                        <td COLSPAN="2" class="last-file"><button type="submit" name="salir" class="salir" value=true>VOLVER</button></td>
                        </form>
                    </tr>
                </table>
            </div>
            
            <style>
            table {
                border: 4px solid;
                background-color: lightyellow;
            }
            td {
                padding: 10px;
            }
            .submit {
                text-align: center;
            }
            </style>';
        }

        if (isset($_POST['salir'])) {
            header('Location:./db_viewer.php');       
         }
    }

    public function actualizarStock($id, $stock) {
        $stock = $stock -1;
        $stmt = parent::getConnect()->prepare('UPDATE book SET stock = ? WHERE id=?');
        $stmt->bindValue(1, $stock,PDO::PARAM_STR);
        $stmt->bindValue(2, $id,PDO::PARAM_STR);
        $stmt->execute();
    }


}
?>        


