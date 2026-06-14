<?php
namespace App;

class ListaCompra{
    private array $lista;
    public function __construct(){
        $this->lista = [];
    }
    public function añadirProducto($nombre,$cantidad = 1){
        if(isset($this->lista[$nombre])){
            $this->lista[$nombre] += $cantidad;
        }
        else{   
            $this->lista[$nombre] = $cantidad;
        }
        return $this->devolverListaActualizada();
    }
    private function eliminarProducto($nombre){
        unset($this->lista[$nombre]);
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
        if($partes[0]==="eliminar"){
            return $this->eliminarProducto($partes[1]);
        }

        return "";
    }
}

?>