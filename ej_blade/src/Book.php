<?php


namespace Clases;



use \PDO;
use \PDOException;


use Clases\DBConnection;

class Book  extends DBConnection{




    public function __construct() {

        parent::__construct('../config.json');
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

    public function recuperarBook() {
        $sql = 'SELECT *  FROM book ';
        $stmt = parent::getConnect()->prepare($sql);
        $stmt->execute();
        $array = [];
        while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
            array_push($array, $fila);
        }

        return $array;
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


