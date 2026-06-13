<?php
namespace Tests;

use App\Catalogo;
use App\Tombola;

use PHPUnit\Framework\TestCase;

class TombolaTest extends TestCase{

    private Tombola $tombola;
    private Catalogo $catalogo;

    protected function setUp(): void{
        $this->catalogo = $this->createMock(Catalogo::class);
        $this->tombola = new Tombola($this->catalogo);
    }

    public function test_añadir_boletos_existente_devuelve_boletos_actualizados(){
        //arrange
        $this->catalogo->method('obtenerPuntos')->willReturn(5);

        //act
        $resultado = $this->tombola->procesarInstruccion('añadir estrella 2');

        //assert
        $this->assertEquals("estrella x2 | Puntos: 10",$resultado);
    }
    public function test_añadir_boleto_no_existente_devuelve_mensaje_no_existe(){
        //arrange
        $this->catalogo->method("obtenerPuntos")->with("pizza")->willReturn(null);
        //act
        $resultado = $this->tombola->procesarInstruccion("añadir pizza 3");
        //asser
        $this->assertEquals("El boleto seleccionado no es válido",$resultado);
    }
    public function test_añadir_varios_boletos_existente_aumentar_cantidada_devuelve_lista_actualizada(){
        //arrange
        $this->catalogo->method("obtenerPuntos")->with("estrella")->willReturn(5);
        //Act
        $resultado1 = $this->tombola->procesarInstruccion("añadir estrella 2");
        $resultado2 = $this->tombola->procesarInstruccion("añadir estrella 3");
        //assert
        $this->assertEquals("estrella x2 | Puntos: 10",$resultado1);
        $this->assertEquals("estrella x5 | Puntos: 25",$resultado2);
    }



}

?>