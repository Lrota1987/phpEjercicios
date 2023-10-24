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

        //date_default_timezone_set("Europe/Madrid");
        echo "<p>".date("h:i:s")."</p>";

        $horaLunes = strtotime("next monday");
        echo "<p>".date("f\\e\c\h\a: d-m-Y", $horaLunes)."</p>";

        
    ?>
</body>
</html>