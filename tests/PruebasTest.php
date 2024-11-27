<?php declare(strict_types=1);
require_once'../backend/Pruebas.php';

use PHPUnit\Framework\TestCase;

final class PruebasTest extends TestCase
{
    public function testPruebasTest(): void
    {
        $pruebas = new Pruebas();

        $greeting = $pruebas->test("SAMUEL");

        $this->assertSame('Hello, SAMUEL!', $greeting);
    }
}

?>