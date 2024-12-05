<?php

require_once 'bicicleta.php';
require_once 'camion.php';
require_once 'coche.php';
require_once 'concesionario.php';
require_once 'moto.php';
require_once 'tesla.php';

$bicicleta = new Bicicleta("Giant", "Anthem Advanced 29", "Negro");
echo $bicicleta->obtenerInformacion() . "\n";

$camion = new Camion("Chevrolet", "Spark", "Blanco", "100");
$concesionario = new Concesionario();
$concesionario->mostrarVehiculo($camion);

$coche = new Coche("Cupra", "Fornmentor", 5, "Gris");
$coche -> mover();
echo $coche->obtenerInformacion() . "\n";

$moto = new Moto("Yamaha", "R3", "Blanco", 321);
echo $moto->obtenerInformacion() . "\n";

$tesla = new Tesla("Tesla", "Model S", "Negro", 5, 100);
$tesla->mover();
$tesla->estadoBateria() . "\n";
$tesla->cargarBateria();

?>