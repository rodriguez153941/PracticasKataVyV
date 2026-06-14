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
    public function test_añadir_producto_indicando_cantidad(){
        //arrange
        //act
        $resultado = $this->lista->procesarInstruccion("añadir pan 3");
        //assert
        $this->assertEquals("pan x3",$resultado);
    }
    public function test_añadir_varios_productos_devuelve_lista_actualizada(){
        //arrange
        $this->lista->procesarInstruccion("añadir pan 3");
        //act
        $resultado = $this->lista->procesarInstruccion("añadir leche 2");
        //assert
        $this->assertEquals("leche x2, pan x3",$resultado);
    }
    public function test_aumentar_cantidad_producto_existente(){
        //arrange
        $this->lista->procesarInstruccion("añadir pan 3");
        //act
        $resultado = $this->lista->procesarInstruccion("añadir pan 2");
        //assert
        $this->assertEquals("pan x5",$resultado);
    }
    public function test_eliminar_prodcuto_existente_en_lista(){
        //arrange
        $this->lista->procesarInstruccion("añadir pan 3");
        $this->lista->procesarInstruccion("añadir leche 2");
        //act
        $resultado = $this->lista->procesarInstruccion("eliminar pan");
        //assert
        $this->assertEquals("leche x2",$resultado);
    }
}

?>