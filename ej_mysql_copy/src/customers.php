<?php


namespace Clases;

use \PDO;
use \PDOException;

use Clases\DBConnection;

class Customers extends DBConnection {

    private $firstname;
    private $surname;
    private $email;
    private $type;

    public function __construct($firstname, $surname, $email, $type) {
        $this->firstname = $firstname;
        $this->surname = $surname;
        $this->email = $email;
        $this->type = $type;
        parent::__construct('./config.json');
    }

    public function visualizarCustomers() {
        $stmt = parent::getConnect()->prepare('SELECT * FROM customer');
        $stmt->execute();
        
        print "<table>
                <tr>
<<<<<<< HEAD
                    <td>COMPRA</td>
=======
>>>>>>> 740696b99b8acfc6d8c29ee13818acc843b6f160
                    <td>ID</td>
                    <td>FIRSTNAME</td>
                    <td>SURNAME</td>
                    <td>EMAIL</td>
                    <td>TYPE</td>
                    <td>ACTUALIZAR</td>
                    <td>ELIMINAR</td>
                </tr>";
        while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $id=$fila['id'];
            print "<tr>";
<<<<<<< HEAD
            print "<form action='./compraBook.php' method='POST'>";
            print "<td><button type='submit' class='compraBook' name='compraBook' value='$id'>COMPRA</button></td>";
            print "</form>";
            foreach ($fila as $key => $item) {
                print "<td>".$item."</td>";
            }
            print "<form action='./updateCustomers.php' method='POST'>";
            print "<td><button type='submit' name='actualizar' class='actualizar' value='$id'>ACTUALIZAR</button></td>";
            print "</form>";
            print "<form action='./deleteCust.php' method='POST'>";
=======
            foreach ($fila as $key => $item) {
                print "<td>".$item."</td>";
            }
            print "<form action='./update.php' method='POST'>";
            print "<td><button type='submit' name='actualizar' class='actualizar' value='$id'>ACTUALIZAR</button></td>";
            print "</form>";
            print "<form action='./delete.php' method='POST'>";
>>>>>>> 740696b99b8acfc6d8c29ee13818acc843b6f160
            print "<td><button type='submit' class='eliminar' name='eliminar' value='$id'>ELIMINAR</button></td>";
            print "</form>";
            print "</tr>";

        }

        print "<tr COLSPAN='7'>";
<<<<<<< HEAD
        print "<form action='./anadirCust.php' method='POST'>";
=======
        print "<form action='./anadirBook.php' method='POST'>";
>>>>>>> 740696b99b8acfc6d8c29ee13818acc843b6f160
        print "<td COLSPAN='4' class='last-file'><button type='submit' name='anadirB' class='botonInf' value=true>AÑADIR CLIENTE</button></td>";
        print "</form>";
        print "<form action='./index.php' method='POST'>";
        print "<td COLSPAN='3' class='last-file'><button type='submit' name='clientes' class='botonInf' value=true>VOLVER</button></td>";
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
<<<<<<< HEAD
                .compraBook {
                    background-color: gold;
                }
=======
>>>>>>> 740696b99b8acfc6d8c29ee13818acc843b6f160
            </style>
            EOT;
        

}
<<<<<<< HEAD

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
=======
>>>>>>> 740696b99b8acfc6d8c29ee13818acc843b6f160
}

?>