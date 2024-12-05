<?php

class Bicicleta extends Vehiculo{
    public function __construc(string $marca, string $modelo, string $color){
        parent::__construct($marca, $modelo, $color);
    }

    public function mover(){
        echo "La bicicleta {$this->marca} {$this->modelo} se está moviendo";
    }

    public function detener(){
        echo "La bicicleta {$this->marca} {$this->modelo} se ha detenido";
    }

    public function pedalear(){
        echo "La bicicleta {$this->marca} {$this->modelo} se está pedaleando";
    }

    public function obtenerInformacion(): string{
        return parent ::obtenerInformacion();
    }
}
?>