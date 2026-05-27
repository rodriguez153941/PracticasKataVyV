<?php
    class ListaCompra{
        private array $lista;

        public function __construct(){
            $this->lista = [];
        }
        
        private function añadirElemento(string $elemento,int $cantidad = 1){
            $elementoMinus = strtolower($elemento);
            if(isset($this->lista[$elementoMinus])){
                $this->lista[$elementoMinus] += $cantidad;
            }
            else{
                $this->lista[$elementoMinus] = $cantidad;
            }
        }

        private function mostrarResultado(): string{
            if(empty($this->lista)){
                return "";
            }
            $listaElementos = [];
            ksort($this->lista);
            foreach($this->lista as $elemento => $cantidad){
                $listaElementos[] =  $elemento . " x" . $cantidad;
            }
            $resultado = implode(", ",$listaElementos);
            return $resultado;
        }

        public function procesarInstruccion(string $instruccion): string
        {
            $instruccionesMinus = strtolower($instruccion);
            $partes = explode(" ",$instruccionesMinus);

            if($partes[0] == "añadir"){
                if(count($partes) == 2){
                    $this->añadirElemento($partes[1]);
                }
                else{
                    $this->añadirElemento($partes[1],$partes[2]);
                }
                
            }
            
            return $this->mostrarResultado();
        }
    }


?>