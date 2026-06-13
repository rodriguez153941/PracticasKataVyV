<?php
namespace App;
use App\Pokedex;

class CentroPokemon{
    private Pokedex $pokedex;    
    private array $pokemons;
    
    public function __construct(Pokedex $pokedex){
        $this->pokedex = $pokedex;
        $this->pokemons = [];
    }

    private function ingresarPokemon(string $nombre, int $cantidad = 1){
        if($this->pokedex->obtenerHPBase($nombre)===null){
            return "La especie seleccionada no está registrada";
        }
        if(isset($this->pokemons[$nombre])){
            $this->pokemons[$nombre] += $cantidad;
        }    
        else{
            $this->pokemons[$nombre] = $cantidad;
        }
        
        
        return $this->devolverListaActualizada() . $this->calcularHP();
    }

    private function devolverListaActualizada(){
        
        ksort($this->pokemons);
        $pokemonsActualizados = [];
        foreach($this->pokemons as $pokemon => $cantidad){
            
            $pokemonsActualizados[] = $pokemon . " x" . $cantidad;
        }
        return implode(", ",$pokemonsActualizados);
    }
    
    private function calcularHP(){
        $hp = 0;
        foreach($this->pokemons as $pokemon => $cantidad){
            $hp += $this->pokedex->obtenerHPBase($pokemon)*$cantidad;
        }
        return " | HP Total: $hp";
    }

    public function procesarInstruccion(string $instruccion): string{
        $instruccionMinusculas = strtolower($instruccion);
        $partes = explode(" ",$instruccionMinusculas);

        if($partes[0] === "ingresar"){
            if(count($partes)===3){
                return $this->ingresarPokemon($partes[1],$partes[2]);
            }
            return $this->ingresarPokemon($partes[1]);
        }
        if($partes[0]==="dar_alta"){
            if(!isset($this->pokemons[$partes[1]])){
                return "El pokemon seleccionado no está ingresado";
            }
        }
    }
}
?>