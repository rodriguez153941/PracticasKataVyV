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
        $this->tombola->procesarInstruccion("añadir estrella 2");
        //Act
        $resultado2 = $this->tombola->procesarInstruccion("añadir estrella 3");
        //assert
        $this->assertEquals("estrella x5 | Puntos: 25",$resultado2);
    }
    public function test_añadir_varios_boletos_disstintos_devuelve_lista_actualizada(){
        //arrange
        $this->catalogo->method("obtenerPuntos")->willReturnMap([
            ["estrellita",5],
            ["farolillo",5]
        ]);
        $this->tombola->procesarInstruccion("añadir estrellita 2");
        //act
        $resultado = $this->tombola->procesarInstruccion("añadir farolillo");
        //assert
        $this->assertEquals("estrellita x2, farolillo x1 | Puntos: 15",$resultado);
    }
    public function test_devolver_boleto_que_no_esta_en_lista_mostrar_mensaje_no_esta_lista(){
        //arrange
        $this->catalogo->method("obtenerPuntos")->with("estrella")->willReturn(5);
        $this->tombola->procesarInstruccion("añadir estrella 2");
        //act
        $resultado = $this->tombola->procesarInstruccion("devolver farolillo");
        //assert
        $this->assertEquals("El boleto seleccionado no está en la lista",$resultado);
    }





}

?>