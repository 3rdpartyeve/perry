<?php
namespace Perry\Representation\Eve\v1;
use PHPUnit_Framework_TestCase;

class IncursionCollectionTest extends PHPUnit_Framework_TestCase {

    private $incursionCollection;

    protected function setUp()
    {
        $this->incursionCollection = new IncursionCollection(
            file_get_contents(__DIR__ . '/../../../../mock/incursions.json')
        );

    }

    public function testSolarSystem()
    {
        $this->assertInstanceOf(
            '\Perry\Representation\Eve\v1\Reference',
            $this->incursionCollection->items[0]->stagingSolarSystem
        );


        $this->assertEquals('Quier', $this->incursionCollection->items[0]->stagingSolarSystem->name);
    }

    public function testConstellation()
    {
        $this->assertInstanceOf(
            '\Perry\Representation\Eve\v1\Reference',
            $this->incursionCollection->items[0]->constellation
        );

        $this->assertEquals('Odilis', $this->incursionCollection->items[0]->constellation->name);
    }

}