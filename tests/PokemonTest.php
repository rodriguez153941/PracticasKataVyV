<?php
namespace Test;

use App\CentroPokemon;
use App\Pokedex;
use PHPUnit\Framework\TestCase;

class PokemonTest extends TestCase{
    private CentroPokemon $centro;
    private Pokedex $pokedex;

    public function setUp():void{
        $this->pokedex = $this->createMock(Pokedex::class);
        $this->centro = new CentroPokemon($this->pokedex);
    }

    public function test_ingresar_pokemon_nuevo_a_centro_sin_especificar_cantidad_vacio_devuelve_centro_actualizado(){
        //arrange
        $this->pokedex->method("obtenerHPBase")->with("pikachu")->willReturn(75);
        //act
        $resultado = $this->centro->procesarInstruccion("ingresar pikachu");
        //assert
        $this->assertEquals("pikachu x1 | HP Total: 75",$resultado);
        
    }
    public function test_ingresar_pokemon_con_cantidad_devuelve_centro_actulizado(){
        //arrange
        $this->pokedex->method("obtenerHPBase")->with("pikachu")->willReturn(75);
        //act
        $resultado = $this->centro->procesarInstruccion("ingresar pikachu 2");
        //assert 
        $this->assertEquals("pikachu x2 | HP Total: 75",$resultado);
    }
}

?>