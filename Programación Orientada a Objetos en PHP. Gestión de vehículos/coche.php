<?php

class Coche extends Vehiculo {
    private int $numeroPuertas;
    public function __construct(string $marca, string $modelo, int $numeroPuertas, string $color = "Negro") {
        parent::__construct($marca, $modelo, $color);
        $this->numeroPuertas = $numeroPuertas;
    }

    public function getNumeroPuertas(): int {
        return $this->numeroPuertas;
    }

    public function setNumeroPuertas(int $numeroPuertas): void{
        $this->numeroPuertas = $numeroPuertas;
    }

    public function mover(): string {
        return "El coche {$this->marca} {$this->modelo} está en movimiento.";
    }

    public function detener(): string {
        return "El coche {$this->marca} {$this->modelo} se ha detenido.";
    }

    public function obtenerInformacion(): string {
        return parent::obtenerInformacion(). ", Número de puertas: {$this->numeroPuertas}";
    }
}
?>