<?php
    namespace App;

    use App\Catalogo;
    
    class Tombola{
        private  array $boletos;
        private Catalogo $catalogo;

        public function __construct(Catalogo $catalogo){
            $this->catalogo = $catalogo;
            $this->boletos = [];
        }

        private function devolverListaActualizada(): String {
            if(empty($this->boletos)){
                return " ";
            }
            ksort($this->boletos);
            $listaActualizada = [];
            foreach($this->boletos as $boleto => $cantidad){              
                $listaActualizada[] = $boleto . " x" . $cantidad ;
            }
            
            return implode(", ",$listaActualizada) ;
        }

        private function añadirBoleto(String $nombre, $cantidad = 1){
            $puntos = $this->catalogo->obtenerPuntos($nombre);
            if($puntos === null){
                return "El boleto seleccionado no es válido";
            }
            if(isset($this->boletos[$nombre])){
                $this->boletos[$nombre] += $cantidad;
            }
            else{
                $this->boletos[$nombre] = $cantidad;
            }
            return $this->devolverListaActualizada() . $this->calcularPuntos();
        }

        private function calcularPuntos(){
            $puntos = 0;
            foreach ($this->boletos as $boleto => $cantidad){
                $puntos += $this->catalogo->obtenerPuntos($boleto) * $cantidad;
            }
            return " | Puntos: $puntos";
        }

        public function procesarInstruccion(string $instruccion){
            $instruccionMinusculas = strtoLower($instruccion);
            $partes = explode(" ",$instruccionMinusculas);

            if($partes[0] === "añadir"){

                if(count($partes)==3){
                    return $this->añadirBoleto($partes[1],$partes[2]);
                }
                return $this->añadirBoleto($partes[1]);
            }
            if($partes[0] === "devolver"){
                if(!isset($this->boletos[$partes[1]])){
                    return "El boleto seleccionado no está en la lista";
                }
            }
        }
    }
?>