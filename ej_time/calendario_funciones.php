<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./style.css">
</head>
<body>

<?php

function calendario_mensual ($anno, $mes) {
    $numberM=0;
    $mes=strtolower($mes);
    $meses = ["enero", "febrero", "marzo", "abril", "mayo", "junio", "julio", "agosto", "septiembre", "octubre", "noviembre", "diciembre"];
    setlocale(LC_ALL,"es_ES");
    foreach($meses as $key => $valor) {
        if ($valor === $mes) {
            $numberM = $key+1;
        }
    }
    
    $number = cal_days_in_month(CAL_GREGORIAN, $numberM, $anno);
    $h = 0;
    $numberA = [];
    for ($i = 1 ; $i<=$number ; $i++){
        array_push($numberA, $i);
    }
    $diasSem = ["L", "M", "X", "J", "V", "S", "D"];
    $diaS = date("N", strtotime("$anno-$numberM-1"))-1;

    print "<div>";
        print "<table>";
        echo <<< EOT
            <tr>
                <th colspan = "7">$mes</th>
            </tr>
            <tr>
            EOT;
            for ($i = 0 ; $i<sizeof($diasSem) ; $i++) {
                print "<td>".$diasSem[$i]."</td>";
            }
            print "</tr>";
        for ($i = 0 ; $i<=5 ; $i++) {
            print "<tr>";
            if ($h === $number) {
                break;
            }
            
            for ($j = 0 ; $j < sizeof($diasSem) ; $j++) {
                if ( $i === 0 && $j < $diaS) {
                    print "<td></td>";
                }
                else {
                    print "<td>".$numberA[$h]."</td>";
                $h++;
                if ($h === $number) {
                    break;
                }
                }
                
                
            }
            print "</tr>";
        }
    
        print "</table>";
        print "</div>";
}



function construir_calendario ($anno) {
    $cont = 0;
    $meses = ["enero", "febrero", "marzo", "abril", "mayo", "junio", "julio", "agosto", "septiembre", "octubre", "noviembre", "diciembre"];
    print "<div id='calendario'>";
        print "<h1 id='titulo'>".$anno."</h1>";
        print "<table id='Tcalendario'>";
        for ($i = 0 ; $i <= sizeof($meses) ; $i++) {
            print "<tr class='columna'>";
            for ($j = 0 ; $j<=3 ; $j++) {
                if ($cont < 12) {
                    print "<td>";
                    calendario_mensual($anno, $meses[$cont]);
                    print "</td>";
                    $cont++;
                } 
            }   
            print "</tr>";
        }
        print "</table>";
    print "</div>";
}

construir_calendario(2023);
?>

</body>
</html>