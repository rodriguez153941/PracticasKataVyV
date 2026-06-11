<?php

namespace App;

interface Catalogo {
    public function obtenerPuntos(string $ticket): ?int;
}

?>