<?php
namespace Perry\Representation\Eve\v1;

use Perry\Representation\Base;
use Perry\Setup;

class Killmail extends Base
{
    public $solarSystem;
    public $attackers = array();
    public $victim;
    public $moon;

    /**
     * get an instance for a specific killmail id+hash combination
     *
     * @param  int $killid
     * @param  string $hash
     * @return Killmail
     */
    public static function getInstanceByKillAndHash($killid, $hash)
    {
        return new Killmail(
            self::doGetRequest(
                Setup::$crestUrl.'/killmail/'.$killid.'/'.$hash.'/',
                "vnd.ccp.eve.TournamentCollection-v1"
            )
        );
    }

    /**
     * @param array|object $solarSystem
     */
    public function setSolarSystem($solarSystem)
    {
        $this->solarSystem = new Reference($solarSystem, "Dear CCP please document this representation");
    }

    /**
     * @param array|object $attackers
     */
    public function setAttackers($attackers)
    {
        foreach ($attackers as $attacker) {
            $this->attackers[] = new KillmailAttacker($attacker);
        }
    }

    /**
     * @param array|object $victim
     */
    public function setVictim($victim)
    {
        if (isset($victim->character)) {
            $victim->character = new Reference($victim->character, "vnd.ccp.eve.Character-v1");
        }

        $victim->corporation = new Reference($victim->corporation, "vnd.ccp.eve.Corporation-v1");

        if (isset($victim->alliance)) {
            $victim->alliance = new Reference($victim->alliance, "Dear CCP please document this representation");
        }

        if (isset($victim->faction)) {
            $victim->faction = new Reference($victim->faction, "Dear CCP please document this representation");
        }

        $victim->shipType = new Reference($victim->shipType, "Dear CCP please document this representation");

        $victim->items = $this->parseItems($victim->items);

        $this->victim = $victim;
    }

    /**
     * @param array|object $moon
     */
    public function setMoon($moon)
    {
        $this->moon = new Reference($moon, "Dear CCP please document this representation");
    }

    /**
     * @param array|object $items
     * @return array
     */
    private function parseItems($items)
    {
        $returnItems = array();
        foreach ($items as $item) {
            $item->itemType = new Reference($item->itemType, "Dear CCP please document this representation");

            if (isset($item->items)) {
                $item->items = $this->parseItems($item->items);
            }
            $returnItems[] = $item;
        }

        return $returnItems;
    }
}
