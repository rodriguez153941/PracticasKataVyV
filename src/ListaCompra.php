<?php
namespace App;

class ListaCompra{
    public function __construct(){

    }
    public function añadirProducto($nombre,$cantidad = 1){
        return $nombre . " x" . $cantidad;
    }

    public function procesarInstruccion(string $instruccion): string{
        $instruccionMinus = strtolower($instruccion);
        $partes = explode(" ",$instruccionMinus);

        if($partes[0]==="añadir"){
            return $this->añadirProducto($partes[1]); 
        }

        return "";
    }
}

?>