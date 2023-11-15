<?php

class Bebida extends Articulo {
    protected $alcoholica;

    public function __construct($nombre, $coste, $precio, $alcoholica) {
        parent::__construct($nombre, $coste, $precio);
        $this->alcoholica = $alcoholica;
    }
}

?>
