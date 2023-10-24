<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div>
    <table>
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
}


calendario_mensual(2023, "octubre");
?>
    </table> 
</div>

</body>
</html>