<?php
    namespace App;

    use App\Catalogo;
    
    class Tombola{
        private Catalogo $catalogo;

        public function __construct(Catalogo $catalogo){
            $this->catalogo = $catalogo;
        }

        public function procesarInstruccion(string $instruccion){
            $instruccionMinusculas = strtoLower($instruccion);
            $partes = explode(" ",$instruccionMinusculas);
            $precio = $this->catalogo->obtenerPuntos($partes[1]) * (int)$partes[2];

            if($partes[0] == "añadir"){
                return("$partes[1] x$partes[2] | Puntos: $precio");
            }
        }
    }
?>