<?php
namespace Test;

use App\ListaCompra;
use PHPUnit\Framework\TestCase;

class ListaCompraTest extends TestCase{
    private ListaCompra $lista;
    public function setUp(): void{
        $this->lista = new ListaCompra();
    }

    public function test_añadir_producto_sin_indicar_cantidad(){
        //arange
        
        //act
        $resultado = $this->lista->procesarInstruccion("añadir pan");
        //assert
        $this->assertEquals("pan x1",$resultado);
    }
    public function test_añadir_producto_sin_indicar_cantidad_producto_en_mayusculas(){
        //arrange
        //act
        $resultado = $this->lista->procesarInstruccion("Añadir Pan");
        //assert
        $this->assertEquals("pan x1",$resultado);
    }
}

?>