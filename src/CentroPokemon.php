<?php
namespace App;
use App\Pokedex;

class CentroPokemon{
    private Pokedex $pokedex;    

    public function __construct(Pokedex $pokedex){
        $this->pokedex = $pokedex;
    }

    public function procesarInstruccion(string $instruccion): string{

    }
}
?>