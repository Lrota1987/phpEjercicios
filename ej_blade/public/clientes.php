<?php

require '../vendor/autoload.php';


use Windwalker\Edge\Loader\EdgeFileLoader;
use Windwalker\Edge\Edge;
use Philo\Blade\Blade;
use Clases\Customers;

$edge = new Edge(new EdgeFileLoader(array('../views/plantillas', '../views')));
$titulo='Clientes';
$faker = Faker\Factory::create('es_ES'); 
$encabezado='Listado de Clientes';
$customers=new Customers();
$nombre="";
if (isset($_POST['actCust'])) {
    for ($i=0;$i<$_POST['numCust'];$i++) {
        $num = random_int(0,1);
        if ($num===0) {
            $nombre = $faker->firstNameMale;
        }
        else {
            $nombre = $faker->firstNameFemale;
        }
        $apellido = $faker->lastName;
        $email = $faker->email;
        $typee="basic";
        $customers->anadirCust($nombre, $apellido, $email, $typee);
    }
}

$customers = $customers->recuperarCustomer();
echo $edge->render('vistaClientes', array('titulo'=>$titulo, 'encabezado'=>$encabezado, 'customers'=>$customers, 'nombre'=>$nombre));
?>