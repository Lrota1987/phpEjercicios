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
        $ciclos=["asir", "smr", "daw", "dam"];

        $ciclos["asir"]=["primero"=>["Gestión de Bases de datos" => 6, "Lenguajes de marcas y sistemas de gestión de información" =>4, "Planificación y administración de redes" =>6], "segundo"=>["Implantación de aplicaciones"=>3, "Seguridad y alta disponibilidad" => 5,"Servicios de red e internet" => 6, "FCT ASIR" => 5, "Administración de gestores de base datos " =>3] ];
        $ciclos["smr"]=["primero"=>["Redes Locales"=>5, "Aplicaciones ofimáticas"=>6], "segundo"=>["Seguridad informática"=>5, "Servicios en red"=>6, "Aplicaciones web"=>8, "FCT SMR"=>5]];
        $ciclos["dam"]=["primero"=>["Bases de datos"=>6,"Entornos de desarrollo"=>3,"Lenguaje de marcas y sistemas de gestión"=>4, "Programación"=>8], "segundo"=>["Acceso a datos"=>5, "Programación de servicios y procesos"=>6, "FCT DAM" =>5, "Programación multimedia y disp. móviles"=> 4]];
        $ciclos["daw"]=["primero"=>["Bases de datos "=>6, "Entornos de desarrollo"=>3, "Lenguaje de marcas y sistemas de gestión"=>4,"programación"=>8], "segundo"=>["Desarrollo Web en entorno servidor"=>9,"Despliegue de aplicaciones Web"=>4]];

        $_SESSION['ciclos']=$ciclos;

        if (!isset($_POST['ciclos'])) {
            echo <<< EOT

            <form action="./ejercicio4.php" method="POST">
                <input type="checkbox" name="ciclos[]" id="daw" value="daw" />
                <label for="daw">Ciclo DAW</label>
                </br>
                <input type="checkbox" name="ciclos[]" id="dam" value="dam" />
                <label for="dam">Ciclo DAM</label>
                </br>
                <input type="checkbox" name="ciclos[]" id="smr" value="smr" />
                <label for="smr">Ciclo SMR</label>
                </br>
                <input type="checkbox" name="ciclos[]" id="asir" value="asir" />
                <label for="asir">Ciclo ASIR</label>
                </br>
                <input type="submit" value="Siguiente">
            </form>
    
            EOT;
            
        }

    ?>


</body>
</html>