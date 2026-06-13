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
        $this->assertEquals("pikachu x2 | HP Total: 150",$resultado);
    }
    public function test_ingresar_varios_pokemon_devuelve_centro_actualizado(){
        //arrange
        $this->pokedex->method("obtenerHPBase")->willReturnMap([
            ["pikachu",75],
            ["squirtle",80]
        ]);
        $this->centro->procesarInstruccion("ingresar pikachu 1");
        //act
        $resultado = $this->centro->procesarInstruccion("ingresar squirtle");
        //assert
        $this->assertEquals("pikachu x1, squirtle x1 | HP Total: 155",$resultado);
    }
    public function test_ingresar_pokemon_no_resgistrado_pokedex_devolver_mensaje_error() {
        //arrange
        $this->pokedex->method("obtenerHPBase")->with("charmander")->willReturn(null);
        //act
        $resultado = $this->centro->procesarInstruccion("ingresar charmander");
        //assert
        $this->assertEquals("La especie seleccionada no está registrada",$resultado);
    }
    public function test_ingresar_pokemon_existete_aumenta_cantidad_devuelve_lista_actualizada(){
        //arrange
        $this->pokedex->method("obtenerHPBase")->with("pikachu")->willReturn(75);
        $resultado = $this->centro->procesarInstruccion("ingresar pikachu");
        //act
        $resultado = $this->centro->procesarInstruccion("ingresar pikachu 2");
        //assert
        $this->assertEquals("pikachu x3 | HP Total: 150",$resultado);
    }
}

?>