<?php

namespace AppTombola;

interface Catalogo {
    public function obtenerPuntos(string $ticket): ?int;
}

?>