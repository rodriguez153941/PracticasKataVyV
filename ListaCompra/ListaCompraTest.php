<?php
require_once 'vendor/autoload.php';
require_once 'ListaCompra.php';
use PHPUnit\Framework\TestCase;

class ListaCompraTest extends TestCase{
    private ListaCompra $Lista;
    
    protected function setUp(): void{
        $this->Lista = new ListaCompra();
    }

    public function test_añadir_elemento_devuelve_lista_actuaizada(){
        $resultado = $this->Lista->procesarInstruccion("añadir pan 2");

        $this->assertEquals("pan x2",$resultado);
        
        $resultado2 = $this->Lista->procesarInstruccion("añadir leche 2");

        $this->assertEquals("pan x2, leche x2",$resultado2);
    }
    public function test_eliminar_elemento_devuelve_lista_actualizada(){
        $resultado = $this->Lista->procesarInstruccion("añadir pan 2");

        $this->asserEquals("pan x2",$resultado);

        $resultado2 = $this->Lista->procesarIntruccion("eliminar pan");

        $this->assertEquals("",$resultado2);
    }

}


?>