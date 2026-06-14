<?php
namespace App;

class ListaCompra{
    private array $lista;
    public function __construct(){
        $this->lista = [];
    }
    public function añadirProducto($nombre,$cantidad = 1){
        $this->lista[$nombre] = $cantidad;
        return $this->devolverListaActualizada();
    }
    private function devolverListaActualizada(){
        ksort($this->lista);
        $listaActualizada = [];
        foreach($this->lista as $producto => $cantidad){
            $listaActualizada[] = $producto . " x" . $cantidad;
        }
        return implode(", ",$listaActualizada);
    }

    public function procesarInstruccion(string $instruccion): string{
        $instruccionMinus = strtolower($instruccion);
        $partes = explode(" ",$instruccionMinus);

        if($partes[0]==="añadir"){
            if(count($partes)===3){
                return $this->añadirProducto($partes[1],$partes[2]);
            }
            return $this->añadirProducto($partes[1]); 
        }

        return "";
    }
}

?>