<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        print '<form action="./ejercicio4-2.php" method="POST">';
        print '<input type="hidden" name="ciclos[]" value="'.$_POST['ciclos'].'">';
        echo <<< EOT
        
            <input type="radio" name="curso" id="primero" value="primero" />
            <label for="primero">Primero</label>
            </br>
            <input type="radio" name="curso" id="segundo" value="segundo" />
            <label for="segundo">Segundo</label>
            </br>
            <input type="submit" value="Siguiente">
        </form>
        EOT;
    ?>
</body>
</html>