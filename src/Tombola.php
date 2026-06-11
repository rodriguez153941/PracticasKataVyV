<?php
    namespace AppTombola;

    use AppTombola\Catalogo;
    
    class Tombola{
        private Catalogo $catalogo;

        public function __construct(Catalogo $catalogo){
            $this->catalogo = $catalogo;
        }
    }
?>