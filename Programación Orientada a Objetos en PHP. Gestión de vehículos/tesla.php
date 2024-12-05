<?php

require_once 'vehiculo.php';
require_once 'vehiculoElectrico.php';

class Tesla extends Coche implements VehiculoElectrico{
    private int $nivelBateria;

    public function __construct(string $marca, string $modelo, string $color, int $numeroPuertas, int $nivelBateria){
        parent::__construct($marca, $modelo, $color, $numeroPuertas);
        $this->nivelBateria = $nivelBateria;
    }

    public function cargarBateria(){
        echo "Se está cargando la bateria del Tesla";
    }

    public function estadoBateria(){
        echo "El nivel de bateria del Tesla es: {$this->nivelBateria}%";
    }

    public function obtenerInformacion(): string{
        return parent:: obtenerInformacion() . ", Nivel de bateria del Tesla: {$this->nivelBateria}%";
    }
}