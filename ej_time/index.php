<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        echo "<p>".date("d-m-Y")."</p>";

        $manana = mktime(0,0,0, date("m"), date("d")+1, date("Y"));
        echo "<p>".date("d-m-Y", $manana)."</p>";

        $hora = setlocale(LC_TIME,"");
        echo "<p>".date("h:i:s", $hora)."</p>";
    ?>
</body>
</html>