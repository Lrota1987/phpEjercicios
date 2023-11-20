<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
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