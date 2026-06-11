<?php
namespace Test;

use AppTombola\Catalogo;

use PHPUnit\Framework\TestCase;

class TombolaTest extends TestCase{

    private Tombola $tombola;
    private Catalogo $catalogo;

    protected function setUp(): void{
        $this->catalogo = createMock(Menu::class);
        $this->tombola = new Tombola($this->catalogo);
    }

    public function test_añadir_boletos_devuelve_boletos_actualizados(){
        //arrange
        $this->catalogo->method('obtenerPuntos')->willReturn(5.0);

        //act
        $resultado = $this->tombola->procesarInstruccion('añadir');

        //assert
        $this->assertEquals($resultado, "estrella x2 | Puntos: 10");
    }

}

?>