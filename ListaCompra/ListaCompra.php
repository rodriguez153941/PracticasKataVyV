<?php
    class ListaCompra{
        private array $lista;

        public function __construct(){
            $this->lista = [];
        }

        public function procesarInstruccion(string $instruccion): string
        {
            $instruccionesMinus = strtolower($instruccion);
            $partes = explode($instruccionesMinus);

            $resultadoLista = "";
            return $resultadoLista;
        }
    }


?>