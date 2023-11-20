<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        function pintarForm($tipo, $mal, $mensaje) {
            $smsDefault="";
            $tipoDatos= ["nombre", "nombre2","apellidos","edad","dni","ciudad","cp","clave","clave2"];
            if ($mal) {
                for ($i = 0 ; $i<sizeof($tipoDatos) ; $i++) {
                    $cogerDato=$tipoDatos[$i];
                    if ($tipoDatos[$i] === $tipo) {
                        $$cogerDato = "2px solid red";
                    }
                    else {
                        $$cogerDato = "";
                    }
                }
            }
            else {
                for ($i = 0 ; $i<sizeof($tipoDatos) ; $i++) {
                    $cogerDato=$tipoDatos[$i];
                    $$cogerDato = "";

                    }
                }

            print <<< EOT

            <form action="" method="POST">;
            <label for="id_nombre">Nombre:</label>;
            <input type="text" id="id_nombre" name="nombre" placeholder=$nombre border=$nombre required>;
            <br />;
            <label for="id_apellidos">Apellidos:</label>;
            <input type="text" id="id_apellidos" name="apellidos" .$apellidos["value"]. border=$apellidos["border"]. required/>;
            <br />;
            <label for="id_edad">Edad:</label>;
            <input type="number" id="id_edad" name="edad" .$edad["value"]. border=$edad["border"]. required/>;
            <br />;
            <label for="id_dni">DNI:</label>;
            <input type="text" id="id_dni" name="dni" .$dni["value"]. border=$dni["border"]. required/>;
            <br />;
            <label for="id_ciudad">Ciudad:</label>;
            <input type="text" id="id_ciudad" name="ciudad" .$ciudad["value"]. border=$ciudad["border"]. required/>;
            <br />;
            <label for="id_cp">Código Postal:</label>;
            <input type="number" id="id_cp" name="cp" .$cp["value"]. border=$cp["border"]. required/>;
            <br />;
            <label for="id_clave">Clave:</label>;
            <input type="password" id="id_clave" name="clave" .$clave["value"]. border=$clave["border"]. required/>;
            <br />;
            <label for="id_clave2">Repita la clave:</label>;
            <input type="password" id="id_clave2" name="clave2" .$clave2["value"]. border=$clave2["border"]. required/>;
            <br />;
            <input type="submit" value="Registrar"/>;
            </form>;

            EOT;
            /*
            print '<form action="" method="POST">';
            print '<label for="id_nombre">Nombre:</label>';
            print '<input type="text" id="id_nombre" name="nombre" placeholder=$nombre border=$nombre[border] required/>';
            print '<br />';
            print '<label for="id_apellidos">Apellidos:</label>';
            print '<input type="text" id="id_apellidos" name="apellidos" '.$apellidos["value"].' border='$apellidos["border"].' required/>';
            print '<br />';
            print '<label for="id_edad">Edad:</label>';
            print '<input type="number" id="id_edad" name="edad" '.$edad["value"].' border='$edad["border"].' required/>';
            print '<br />';
            print '<label for="id_dni">DNI:</label>';
            print '<input type="text" id="id_dni" name="dni" '.$dni["value"].' border='$dni["border"].' required/>';
            print '<br />';
            print '<label for="id_ciudad">Ciudad:</label>';
            print '<input type="text" id="id_ciudad" name="ciudad" '.$ciudad["value"].' border='$ciudad["border"].' required/>';
            print '<br />';
            print '<label for="id_cp">Código Postal:</label>';
            print '<input type="number" id="id_cp" name="cp" '.$cp["value"].' border='$cp["border"].' required/>';
            print '<br />';
            print '<label for="id_clave">Clave:</label>';
            print '<input type="password" id="id_clave" name="clave" '.$clave["value"].' border='$clave["border"].' required/>';
            print '<br />';
            print '<label for="id_clave2">Repita la clave:</label>';
            print '<input type="password" id="id_clave2" name="clave2" '.$clave2["value"].' border='$clave2["border"].' required/>';
            print '<br />';
            print '<input type="submit" value="Registrar"/>';
            print '</form>';
            */

        }
    ?>
</body>
</html>