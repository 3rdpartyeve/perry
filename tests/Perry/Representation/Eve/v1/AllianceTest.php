<?php
namespace Perry\Representation\Eve\v1;
use PHPUnit_Framework_TestCase;

/**
 * @deprecated
 */
class AllianceTest extends PHPUnit_Framework_TestCase {

    private $alliance;

    protected function setUp()
    {
        $this->alliance = new Alliance(
            file_get_contents(__DIR__ . '/../../../../mock/alliances_id.json')
        );

    }

    public function testAllianceReferences()
    {
        $this->assertInstanceOf(
            '\Perry\Representation\Reference',
            $this->alliance->corporations[0]
        );

        $this->assertInstanceOf(
            '\Perry\Representation\Reference',
            $this->alliance->creatorCorporation
        );

        $this->assertInstanceOf(
            '\Perry\Representation\Reference',
            $this->alliance->creatorCharacter
        );

        $this->assertInstanceOf(
            '\Perry\Representation\Reference',
            $this->alliance->executorCorporation
        );

        $this->assertEquals('Russian Cosmonautics I', $this->alliance->corporations[0]->name);

        $this->assertEquals('Rousen', $this->alliance->creatorCharacter->name);

        $this->assertEquals('Russian Cosmonautics', $this->alliance->creatorCorporation->name);

        $this->assertEquals('Russian Cosmonautics', $this->alliance->executorCorporation->name);
    }

    public function testAllianceValues()
    {
        // a hand full of checks, if those values work the others should as well
        $this->assertEquals('2010-11-26T16:40:00', $this->alliance->startDate);
        $this->assertEquals('U C', $this->alliance->shortName);
        $this->assertEquals('99000073', $this->alliance->id_str);
    }
}