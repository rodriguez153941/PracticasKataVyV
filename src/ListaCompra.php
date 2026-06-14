<?php
namespace App;

class ListaCompra{
    public function __construct(){

    }
    public function procesarInstruccion(string $instruccion): string{
        $instruccionMinus = strtolower($instruccion);
        $partes = explode(" ",$instruccionMinus);

        if($partes[0]==="añadir"){
            return $partes[1] . " x1"; 
        }

        return "";
    }
}

?>