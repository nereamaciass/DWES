<?php

class Moto extends Vehiculo {
    private int $cilindrada;

    public function __construct($marca, $modelo, $color, $cilindrada) {
        parent::__construct($marca, $modelo, $color);
        $this->cilindrada = $cilindrada;
    }

    public function getCilindrada(): int{
        return $this->cilindrada;
    }

    public function setCilindrada(int $cilindrada): void{
        $this->cilindrada = $cilindrada;
    }

    public function mover(){
        echo"La moto {$this->marca} {$this->modelo} se está en movimiento.";
    }

    public function detener(): string {
        return "La moto {$this->marca} {$this->modelo} se ha detenido.";
    }

    public function obtenerInformacion(): string { 
        return parent::obtenerInformacion() . ", Cilindrada: {$this->cilindrada}cc"; 
    }
}
?>