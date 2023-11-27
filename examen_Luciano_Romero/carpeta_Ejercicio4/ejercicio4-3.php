<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        session_start();
        $total=0;
        $nombre_compl=$_SESSION['nombre-completo'];
        $direccion=$_SESSION['direccion'];
        $dni=$_SESSION['dni'];
        if (isset($_POST['general'])) {
            $total=$_SESSION['total']*20;
            var_dump($total);
            $total=$total*0.75;
            pintarFactura($total, $nombre_compl, $direccion, $dni, $_SESSION['modulos_aux']);
        }
        elseif (isset($_POST['especial'])) {
            $total=0;
            pintarFactura($total, $nombre_compl, $direccion, $dni, $_SESSION['modulos_aux']);
        }
        else {
            $total=$_SESSION['total']*20;
            pintarFactura($total, $nombre_compl, $direccion, $dni, $_SESSION['modulos_aux']);
        }

        function pintarFactura($total, $nombre, $direccion, $dni, $array) {
            echo <<< EOT
            <div class="cont-tabla">
                <h2>Factura de matriculación del curso.</h2>
                <table>
                    <tr>
                        <th>Asignaturas</th>
                        <th>Créditos</th>
                    </tr>
            
            EOT;
                    foreach ($array as $modulos => $creditos) {
                        print "<tr>";
                            print "<td>$modulos</td>";
                            print "<td>$creditos</td>";
                        print "</tr>";
                    }
                print "</table>";
                echo <<< EOT
                <p>El alumno $nombre</p>
                <p>Con dirección $direccion</p>
                <p>Y DNI: $dni</p>
                <p>Tiene que pagar en total por las asignaturas matriculadas: $total</p>
                EOT;
            print "</div>";
        }
    ?>



</body>
</html>