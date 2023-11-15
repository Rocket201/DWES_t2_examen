<?php

class Pizza extends Articulo {
    protected $ingredientes;

    public function __construct($nombre, $coste, $precio, $ingredientes) {
        parent::__construct($nombre, $coste, $precio);
        $this->ingredientes = $ingredientes;
    }
}


?>
