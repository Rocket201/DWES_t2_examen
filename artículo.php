<!-- git hub: https://github.com/Rocket201/DWES_t2_examen.git -->

<?php

require_once 'pizza.php';
require_once 'bebida.php';
class Articulo {
    private $nombre;
    private $coste;
    private $precio;
    private $contador;

    public function __construct($nombre, $coste, $precio) {
        $this->nombre = $nombre;
        $this->coste = $coste;
        $this->precio = $precio;
        $this->contador = 0;
    }

    public function vender() {
        $this->contador++;
    }

    public function getBeneficioTotal() {
        return $this->contador * ($this->precio - $this->coste);
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getContador() {
        return $this->contador;
    }
}


// Inicialización de los artículos
$articulos = [
    new Articulo("Lasagna", 3.50, 7.00),
    new Articulo("Pan de ajo y mozzarella", 2.00, 4.50),
    new Pizza("Pizza Margarita", 4.00, 8.00, ["Tomate", "Mozzarella", "Albahaca"]),
    new Pizza("Pizza Pepperoni", 5.00, 10.00, ["Tomate", "Mozzarella", "Pepperoni"]),
    new Pizza("Pizza Vegetal", 4.50, 9.00, ["Tomate", "Mozzarella", "Verduras Variadas"]),
    new Pizza("Pizza 4 quesos", 5.50, 11.00, ["Mozzarella", "Gorgonzola", "Parmesano", "Fontina"]),
    new Bebida("Refresco", 1.00, 2.00, false),
    new Bebida("Cerveza", 1.50, 3.00, true)
];


// Ejemplo de uso
mostrarMenu($articulos);
mostrarMasVendidos($articulos);
mostrarMasLucrativos($articulos);


function mostrarMenu($articulos) {
    $pizzas = array_filter($articulos, function($articulo) {
        return $articulo instanceof Pizza;
    });
    $bebidas = array_filter($articulos, function($articulo) {
        return $articulo instanceof Bebida;
    });
    $otros = array_filter($articulos, function($articulo) {
        return !($articulo instanceof Pizza) && !($articulo instanceof Bebida);
    });

    echo "<h1>Nuestro menú</h1>";
        echo "<h2>Pizzas</h2>";
    foreach ($pizzas as $item) {
            echo $item->getNombre();
                    echo "<br>";
    }
    echo "<h2>Bebidas</h2>";
    foreach ($bebidas as $item) {
        echo $item->getNombre();
                echo "<br>";
    }
    echo "<h2>Otros</h2>";
    foreach ($otros as $item) {
        echo $item->getNombre();
                echo "<br>";
    }
   
};

function mostrarMasVendidos($articulos) {
    usort($articulos, function($a, $b) {
        return $b->getContador() - $a->getContador();
    });

    echo "<h1>Los más vendidos</h1>";
    for ($i = 0; $i < min(3, count($articulos)); $i++) {
        echo $articulos[$i]->getNombre() . ": " . $articulos[$i]->getContador() . " unidades<br>";
    }
}

function mostrarMasLucrativos($articulos) {
    usort($articulos, function($a, $b) {
        return $b->getBeneficioTotal() - $a->getBeneficioTotal();
    });

    echo "<h1>¡Los más lucrativos!</h1>";
    for ($i = 0; $i < min(3, count($articulos)); $i++) {
        echo $articulos[$i]->getNombre() . ": " . $articulos[$i]->getBeneficioTotal() . " beneficio total<br>";
    }
}
?> 