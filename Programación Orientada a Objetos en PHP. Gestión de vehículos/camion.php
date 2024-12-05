<?php
class Camion extends Vehiculo {
    private float $capacidadCarga;
    
    public function __construct($marca, $modelo, $color, $capacidadCarga) {
        parent::__construct($marca, $modelo, $color);
        $this->capacidadCarga = $capacidadCarga;
    }

    public function getCapacidadCarga(): float {
        return $this->capacidadCarga;
    }

    public function setCapacidadCarga(float $capacidadCarga): void {
        $this->capacidadCarga = $capacidadCarga;
    }

    public function mover(){
        echo "El camión {$this->marca} {$this->modelo} se está moviendo.";
    }

    public function detener(){
        echo "El camión {$this->marca} {$this->modelo} se ha detenido.";
    }

    public function obtenerInformacion(): string {
        return parent::obtenerInformacion() . ", La capacidad de carga es de {$this->capacidadCarga} toneladas"; 
    }
}
?>