<?php
namespace Test;

use AppTombola\Catalogo;

use PHPUnit\Framework\TestCase;

class TombolaTest extends TestCase{

    private Tombola $tombola;
    private Catalogo $catalogo;

    protected function setUp(): void{
        $this->catalogo = createMock(Menu::class);
        $this->tombola = new Tombola($this->catalogo);
    }

}

?>