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

    public function test_añadir_boletos_devuelve_boletos_actualizados(){
        //arrange
        $this->catalogo->method('obtenerPuntos')->willReturn(5);

        //act
        $resultado = $this->tombola->procesarInstruccion('añadir estrella 2');

        //assert
        $this->assertEquals($resultado, "estrella x2 | Puntos: 10");
    }

}

?>