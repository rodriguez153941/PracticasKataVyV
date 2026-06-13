<?php
namespace App;
use App\Pokedex;

class CentroPokemon{
    private Pokedex $pokedex;    

    public function __construct(Pokedex $pokedex){
        $this->pokedex = $pokedex;
    }

    private function ingresarPokemon(string $nombre, int $cantidad = 1){
        $hp = $this->pokedex->obtenerHPBase($nombre);
        return "$nombre x$cantidad | HP Total: $hp";
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
    }
}
?>