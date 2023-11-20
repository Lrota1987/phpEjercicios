<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
<?php
    $json=json_decode('{"result":"success","provider":"","documentation":"","terms_of_use":"","time_last_update_unix":1700092951,"time_last_update_utc":"Thu, 16 Nov 2023 00:02:31 +0000","time_next_update_unix":1700180221,"time_next_update_utc":"Fri, 17 Nov 2023 00:17:01 +0000","time_eol_unix":0,"base_code":"EUR","rates":{"EUR":1,"AED":3.985556,"AFN":79.537009,"ALL":104.908973,"AMD":437.283119,"ANG":1.942586,"AOA":909.587512,"ARS":383.101771,"AUD":1.666721,"AWG":1.942586,"AZN":1.833296,"BAM":1.95583,"BBD":2.170487,"BDT":120.060581,"BGN":1.95583,"BHD":0.408052,"BIF":3090.438948,"BMD":1.085243,"BND":1.464761,"BOB":7.425736,"BRL":5.279884,"BSD":1.085243,"BTN":90.23053,"BWP":14.607273,"BYN":3.495147,"BZD":2.170487,"CAD":1.484538,"CDF":2706.08871,"CHF":0.963591,"CLP":970.282385,"CNY":7.868761,"COP":4364.072431,"CRC":570.634837,"CUP":26.045841,"CVE":110.265,"CZK":24.478214,"DJF":192.870541,"DKK":7.460316,"DOP":60.975428,"DZD":145.491221,"EGP":33.46246,"ERN":16.278651,"ETB":60.680048,"FJD":2.438997,"FKP":0.872678,"FOK":7.460316,"GBP":0.872932,"GEL":2.930358,"GGP":0.872678,"GHS":13.072213,"GIP":0.872678,"GMD":69.724281,"GNF":9340.81662,"GTQ":8.40008,"GYD":227.649254,"HKD":8.472944,"HNL":26.506584,"HRK":7.5345,"HTG":143.64512,"HUF":376.622707,"IDR":16852.754818,"ILS":4.100101,"IMP":0.872678,"INR":90.230612,"IQD":1421.84322,"IRR":46230.501413,"ISK":153.827894,"JEP":0.872678,"JMD":166.28098,"JOD":0.769438,"JPY":163.880393,"KES":165.518309,"KGS":97.03933,"KHR":4474.066667,"KID":1.666718,"KMF":491.96775,"KRW":1412.869861,"KWD":0.333695,"KYD":0.904369,"KZT":502.246218,"LAK":22128.530318,"LBP":16278.65093,"LKR":355.5418,"LRD":204.636558,"LSL":19.739436,"LYD":5.301362,"MAD":10.992218,"MDL":19.37231,"MGA":4776.592712,"MKD":61.495,"MMK":2611.314705,"MNT":3734.131205,"MOP":8.727132,"MRU":42.577719,"MUR":47.621725,"MVR":16.566615,"MWK":1841.496169,"MXN":18.792336,"MYR":5.07333,"MZN":69.4568,"NAD":19.739436,"NGN":866.016356,"NIO":39.472833,"NOK":11.728516,"NPR":144.368848,"NZD":1.800189,"OMR":0.417273,"PAB":1.085243,"PEN":4.107036,"PGK":4.01829,"PHP":60.484591,"PKR":310.315672,"PLN":4.393918,"PYG":8023.550258,"QAR":3.950286,"RON":4.969722,"RSD":117.178058,"RUB":97.222548,"RWF":1376.968739,"SAR":4.069663,"SBD":9.17584,"SCR":14.807644,"SDG":486.311594,"SEK":11.439709,"SGD":1.464747,"SHP":0.872678,"SLE":24.125989,"SLL":24125.316505,"SOS":621.398148,"SRD":41.411206,"SSP":1146.67886,"STN":24.5,"SYP":13861.25353,"SZL":19.739436,"THB":38.553784,"TJS":11.886581,"TMT":3.798294,"TND":3.380847,"TOP":2.53154,"TRY":31.140872,"TTD":7.435805,"TVD":1.666718,"TWD":34.69102,"TZS":2731.032375,"UAH":39.397218,"UGX":4105.235996,"USD":1.085244,"UYU":42.876397,"UZS":13333.808544,"VES":38.48127,"VND":26177.179199,"VUV":131.391134,"WST":2.958571,"XAF":655.957,"XCD":2.930157,"XDR":0.817904,"XOF":655.957,"XPF":119.332,"YER":268.553583,"ZAR":19.73945,"ZMW":25.045698,"ZWL":6260.787}}', true);
    print '<form action="" method="POST">';
        print '<div class="cambio">';
            print '<p>Importe</p>';
            print '<input type="select" name="importe" required/>';
        print '</div>';
        print '<div class="cambio">';
            print '<p>De:</p>';
            print '<select name="importeOr">';
            foreach ($json['rates'] as $moneda => $valor) {
                print '<option>'.$moneda.'</option>';
            }
            print '</select>';
        print '</div>';
        print '<div class="cambio">';
            print '<p>A:</p>';
            print '<select name="importeFinal">';
            foreach ($json['rates'] as $moneda => $valor) {
                print '<option>'.$moneda.'</option>';
            }
            print '</select>';
        print '</div></br>';
        print '<input type="submit" value="cambio">';
    print '</form>';

    if (isset($_POST['importe'])) {
        print "<p>".$_POST['importe']." ".$_POST['importeOr']." =</p>";
        $valorOr=0;
        $valorFinal=0;
        foreach ($json['rates'] as $moneda => $valor) {
            if ($moneda === $_POST['importeOr']) {
                $valorOr=$valor;
            }
            if ($moneda === $_POST['importeFinal']) {
                $valorFinal=$valor;
            }
        }
        
        $valConv=$_POST['importe']*($valorFinal/$valorOr);
        print $valConv." ".$_POST['importeFinal'];

        echo <<< EOT
            <form action="../carpeta_Ejercicio3" method="POST">
            <input type="submit" value="Resultados estadisticos">
            </form>
        EOT;

        file_put_contents("./estadisticas.txt",file_get_contents("./estadisticas.txt").$_POST['importeFinal']."-".$_POST['importeOr']."-");
    } 


?>
</body>
</html>