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

        print "<tr COLSPAN='7'>";
        print "<form action='./anadirBook.php' method='POST'>";
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
            </style>
            EOT;
        

}
}

?>