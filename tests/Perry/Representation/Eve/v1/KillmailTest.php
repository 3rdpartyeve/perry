<?php
namespace Perry\Representation\Eve\v1;
use PHPUnit_Framework_TestCase;

class KillmailTest extends PHPUnit_Framework_TestCase {

    private $killmail;
    private $killmail_with_moon;
    private $killmail_with_weapontype;

    protected function setUp()
    {
        $this->killmail = new Killmail(
            file_get_contents(__DIR__ . '/../../../../mock/kill.json')
        );

        $this->killmail_with_moon = new Killmail(
            file_get_contents(__DIR__ . '/../../../../mock/kill_with_moon.json')
        );

        $this->killmail_with_weapontype = new Killmail(
            file_get_contents(__DIR__ . '/../../../../mock/kill_with_weapontype.json')
        );
        //var_dump($this->killmail);die();
    }

    public function testKillID()
    {
        $this->assertEquals(2, $this->killmail->killID);

        $this->assertEquals(3, $this->killmail_with_moon->killID);
    }

    public function testKillTime()
    {
        $this->assertEquals('2013.12.23 16:21:00', $this->killmail->killTime);
        $this->assertEquals('2014.01.16 08:13:00', $this->killmail_with_moon->killTime);
    }

    public function testAttackerCount()
    {
        $this->assertEquals(2, $this->killmail->attackerCount);

        $this->assertEquals(1, $this->killmail_with_moon->attackerCount);

    }

    public function testSolarSystem()
    {
        $this->assertInstanceOf('\Perry\Representation\Reference', $this->killmail->solarSystem);

        $this->assertEquals(30005305, $this->killmail->solarSystem->id);

        $this->assertEquals("http://regner1-ws:26004/solarsystems/30005305/", $this->killmail->solarSystem->href);
        $this->assertEquals("Cistuvaert", $this->killmail->solarSystem->name);

        $this->assertInstanceOf('\Perry\Representation\Reference', $this->killmail_with_moon->solarSystem);

        $this->assertEquals(30003343, $this->killmail_with_moon->solarSystem->id);


        $this->assertEquals("http://regner1-ws:26004/solarsystems/30003343/", $this->killmail_with_moon->solarSystem->href);
        $this->assertEquals("KFR-ZE", $this->killmail_with_moon->solarSystem->name);

    }

    public function testAttackers()
    {
        $this->assertEquals(2, count($this->killmail->attackers));
        foreach ($this->killmail->attackers as $attacker) {
            //$this->assertInstanceOf('\Perry\Representation\Eve\v1\KillmailAttacker', $attacker);

            // in this mail we only have npc attackers, so we don't check for character
            $this->assertInstanceOf('\Perry\Representation\Reference', $attacker->corporation);
            $this->assertInstanceOf('\Perry\Representation\Reference', $attacker->shipType);
        }

        $this->assertEquals(1, count($this->killmail_with_moon->attackers));
        foreach ($this->killmail_with_moon->attackers as $attacker) {
            //$this->assertInstanceOf('\Perry\Representation\Eve\v1\KillmailAttacker', $attacker);

            $this->assertInstanceOf('\Perry\Representation\Reference', $attacker->character);
            $this->assertInstanceOf('\Perry\Representation\Reference', $attacker->corporation);
            $this->assertInstanceOf('\Perry\Representation\Reference', $attacker->shipType);
        }
    }

    public function testVictim()
    {
        $this->assertEquals(79705, $this->killmail->victim->damageTaken);

        $this->assertInstanceOf('\Perry\Representation\Reference', $this->killmail->victim->corporation);
        $this->assertInstanceOf('\Perry\Representation\Reference', $this->killmail->victim->character);
        $this->assertInstanceOf('\Perry\Representation\Reference', $this->killmail->victim->shipType);
    }

    public function testVictimItems()
    {
        $item = $this->killmail->victim->items[0];

        $this->assertEquals(0, $item->singleton);

        $this->assertInstanceOf('\Perry\Representation\Reference', $item->itemType);

        $this->assertEquals(3995, $item->itemType->id);
        $this->assertEquals('http://image.eveonline.com/Type/3995_64.png', $item->itemType->icon->href);

        $this->assertEquals(1, $item->quantityDropped);

        $this->assertEquals(27, $item->flag);


        $item = $this->killmail->victim->items[1];

        $this->assertEquals(1, $item->quantityDestroyed);


        $item = $this->killmail->victim->items[4];
        $this->assertEquals(1, count($item->items));
        $this->assertEquals("Tritanium", $item->items[0]->itemType->name);
    }

    public function testMoon()
    {
        $moon = $this->killmail_with_moon->moon;
        $this->assertInstanceOf('\Perry\Representation\Reference', $moon);
        $this->assertEquals(40211968, $moon->id);
        $this->assertEquals('KFR-ZE V - Moon 4', $moon->name);
    }

    public function testWeaponType()
    {
        $this->assertEquals(2185, $this->killmail_with_weapontype->attackers[0]->weaponType->id);
        $this->assertInstanceOf('\Perry\Representation\Reference', $this->killmail_with_weapontype->attackers[0]->weaponType);
    }
}