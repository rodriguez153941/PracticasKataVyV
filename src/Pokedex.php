<?php
namespace App;
interface Pokedex {
    public function obtenerHPBase(string $pokemon): ?int;
}
?>