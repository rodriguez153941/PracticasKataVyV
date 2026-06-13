<?php
namespace App;
use App\Pokedex;

class CentroPokemon{
    private Pokedex $pokedex;    

    public function __construct(Pokedex $pokedex){
        $this->pokedex = $pokedex;
    }

    public function procesarInstruccion(string $instruccion): string{
        $instruccionMinusculas = strtolower($instruccion);
        $partes = explode(" ",$instruccionMinusculas);

        if($partes[0] === "ingresar"){
            $hp = $this->pokedex->obtenerHPBase($partes[1]);
            return "$partes[1] x1 | HP Total: $hp";
        }
    }
}
?>