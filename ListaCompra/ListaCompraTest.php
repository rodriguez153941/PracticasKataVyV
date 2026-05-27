<?php
require_once 'vendor/autoload.php';
require_once 'ListaCompra.php';
use PHPUnit\Framework\TestCase;

class ListaCompraTest extends TestCase{
    private ListaCompra $Lista;
    
    protected function setup(): void{
        $this->Lista = new ListaCompra();
    }

    public function test_añadir_elemento_devuelve_lista_actuaizada(){
        $resultado = $this->lista->procesarInstruccion("añadir pan 2");

        asset($resultado, "pan x2");
    }

}


?>