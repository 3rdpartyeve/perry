<?php
namespace Perry\Representation\Eve\v1;

use \Perry\Representation\Reference as Reference;
use \Perry\Representation\Uri as Uri;
use \Perry\Representation\Base as Base;

class Killmail extends Base
{
    public $solarSystem;

    public $killID;

    public $killTime;

    public $moon;

    public $attackers = [];

    public $attackerCount;

    public $victim;

    public $war;

    // by Warringer\Types\Reference
    public function setSolarSystem($solarSystem)
    {
        $this->solarSystem = new Reference($solarSystem);
    }

    // by Warringer\Types\Long
    public function setKillID($killID)
    {
        $this->killID = $killID;
    }

    // by Warringer\Types\String
    public function setKillTime($killTime)
    {
        $this->killTime = $killTime;
    }

    // by Warringer\Types\Reference
    public function setMoon($moon)
    {
        $this->moon = new Reference($moon);
    }

    // by Warringer\Types\ArrayType
    public function setAttackers($attackers)
    {
        // by Warringer\Types\Base
        $converters = [];
        $converters['alliance'] = function ($value) { return new Reference($value); };
        $converters['shipType'] = function ($value) { return new Reference($value); };
        $converters['faction'] = function ($value) { return new Reference($value); };
        $converters['corporation'] = function ($value) { return new Reference($value); };
        $converters['character'] = function ($value) { return new Reference($value); };
        $converters['weaponType'] = function ($value) { return new Reference($value); };
        $converters['finalBlow'] = function ($value) { return $value; };
        $converters['securityStatus'] = function ($value) { return $value; };
        $converters['damageDone'] = function ($value) { return $value; };

        $func = function ($value) use($converters) {
            $return = new \ArrayObject($value, \ArrayObject::ARRAY_AS_PROPS);
            $return['alliance'] = isset($value->{'alliance'}) ? $converters['alliance']($value->{'alliance'}) : null;
            $return['shipType'] = isset($value->{'shipType'}) ? $converters['shipType']($value->{'shipType'}) : null;
            $return['faction'] = isset($value->{'faction'}) ? $converters['faction']($value->{'faction'}) : null;
            $return['corporation'] = isset($value->{'corporation'}) ? $converters['corporation']($value->{'corporation'}) : null;
            $return['character'] = isset($value->{'character'}) ? $converters['character']($value->{'character'}) : null;
            $return['weaponType'] = isset($value->{'weaponType'}) ? $converters['weaponType']($value->{'weaponType'}) : null;
            $return['finalBlow'] = isset($value->{'finalBlow'}) ? $converters['finalBlow']($value->{'finalBlow'}) : null;
            $return['securityStatus'] = isset($value->{'securityStatus'}) ? $converters['securityStatus']($value->{'securityStatus'}) : null;
            $return['damageDone'] = isset($value->{'damageDone'}) ? $converters['damageDone']($value->{'damageDone'}) : null;
            return $return;
        };

        foreach ($attackers as $key => $value) {
            $this->attackers[$key] = $func($value);
        }
    }

    // by Warringer\Types\Long
    public function setAttackerCount($attackerCount)
    {
        $this->attackerCount = $attackerCount;
    }

    // by Warringer\Types\Dict
    public function setVictim($victim)
    {
        // by Warringer\Types\Dict
        $converters = [];
        $converters['alliance'] = function ($value) { return new Reference($value); };
        $converters['faction'] = function ($value) { return new Reference($value); };
        $converters['corporation'] = function ($value) { return new Reference($value); };
        $converters['damageTaken'] = function ($value) { return $value; };
        $converters['character'] = function ($value) { return new Reference($value); };
        $converters['shipType'] = function ($value) { return new Reference($value); };
        $converters['items'] = function ($values) {
        // by Warringer\Types\Base
        $converters = [];
        $converters['singleton'] = function ($value) { return $value; };
        $converters['itemType'] = function ($value) { return new Reference($value); };
        $converters['items'] = function ($values) {
        // by Warringer\Types\Dict
        $converters = [];
        $converters['quantityDropped'] = function ($value) { return $value; };
        $converters['singleton'] = function ($value) { return $value; };
        $converters['quantityDestroyed'] = function ($value) { return $value; };
        $converters['flag'] = function ($value) { return $value; };
        $converters['itemType'] = function ($value) { return new Reference($value); };

        $func = function ($value) use($converters) {
            $return = new \ArrayObject($value, \ArrayObject::ARRAY_AS_PROPS);
            $return['quantityDropped'] = isset($value->{'quantityDropped'}) ? $converters['quantityDropped']($value->{'quantityDropped'}) : null;
            $return['singleton'] = isset($value->{'singleton'}) ? $converters['singleton']($value->{'singleton'}) : null;
            $return['quantityDestroyed'] = isset($value->{'quantityDestroyed'}) ? $converters['quantityDestroyed']($value->{'quantityDestroyed'}) : null;
            $return['flag'] = isset($value->{'flag'}) ? $converters['flag']($value->{'flag'}) : null;
            $return['itemType'] = isset($value->{'itemType'}) ? $converters['itemType']($value->{'itemType'}) : null;
            return $return;
        };

            foreach ($values as $key => $value) {
                 $values[$key] = $func($value);
            }
           return $values;
        };

        $converters['flag'] = function ($value) { return $value; };
        $converters['quantityDropped'] = function ($value) { return $value; };
        $converters['quantityDestroyed'] = function ($value) { return $value; };

        $func = function ($value) use($converters) {
            $return = new \ArrayObject($value, \ArrayObject::ARRAY_AS_PROPS);
            $return['singleton'] = isset($value->{'singleton'}) ? $converters['singleton']($value->{'singleton'}) : null;
            $return['itemType'] = isset($value->{'itemType'}) ? $converters['itemType']($value->{'itemType'}) : null;
            $return['items'] = isset($value->{'items'}) ? $converters['items']($value->{'items'}) : null;
            $return['flag'] = isset($value->{'flag'}) ? $converters['flag']($value->{'flag'}) : null;
            $return['quantityDropped'] = isset($value->{'quantityDropped'}) ? $converters['quantityDropped']($value->{'quantityDropped'}) : null;
            $return['quantityDestroyed'] = isset($value->{'quantityDestroyed'}) ? $converters['quantityDestroyed']($value->{'quantityDestroyed'}) : null;
            return $return;
        };

            foreach ($values as $key => $value) {
                 $values[$key] = $func($value);
            }
           return $values;
        };


        $func = function ($value) use($converters) {
            $return = new \ArrayObject($value, \ArrayObject::ARRAY_AS_PROPS);
            $return['alliance'] = isset($value->{'alliance'}) ? $converters['alliance']($value->{'alliance'}) : null;
            $return['faction'] = isset($value->{'faction'}) ? $converters['faction']($value->{'faction'}) : null;
            $return['corporation'] = isset($value->{'corporation'}) ? $converters['corporation']($value->{'corporation'}) : null;
            $return['damageTaken'] = isset($value->{'damageTaken'}) ? $converters['damageTaken']($value->{'damageTaken'}) : null;
            $return['character'] = isset($value->{'character'}) ? $converters['character']($value->{'character'}) : null;
            $return['shipType'] = isset($value->{'shipType'}) ? $converters['shipType']($value->{'shipType'}) : null;
            $return['items'] = isset($value->{'items'}) ? $converters['items']($value->{'items'}) : null;
            return $return;
        };
        $this->victim = $func($victim);
    }

    // by Warringer\Types\Reference
    public function setWar($war)
    {
        $this->war = new Reference($war);
    }

}
