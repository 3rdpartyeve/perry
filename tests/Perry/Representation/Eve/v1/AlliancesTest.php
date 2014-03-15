<?php
namespace Perry\Representation\Eve\v1;
use PHPUnit_Framework_TestCase;

class AlliancesTest extends PHPUnit_Framework_TestCase {

    private $alliances;

    protected function setUp()
    {
        $this->alliances = new Alliances(
            file_get_contents(__DIR__ . '/../../../../mock/alliances.json')
        );

    }

    public function testAllianceLink()
    {
        $this->assertInstanceOf(
            '\Perry\Representation\Reference',
            $this->alliances->items[0]->href
        );


        $this->assertEquals('666', $this->alliances->items[0]->href->shortName);
    }
}