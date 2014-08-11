<?php
namespace Perry\Representation\Eve\v3;

use \Perry\Representation\Reference as Reference;
use \Perry\Representation\Uri as Uri;
use \Perry\Representation\Base as Base;

class Api extends Base
{
    public $motd;

    public $crestEndpoint;

    public $corporationRoles;

    public $channels;

    public $corporations;

    public $alliances;

    public $authEndpoint;

    public $battleTheatres;

    public $marketPrices;

    public $itemTypes;

    public $decode;

    public $bloodlines;

    public $tournaments;

    public $map;

    public $virtualGoodStore;

    public $serverVersion;

    public $wars;

    public $incursions;

    public $races;

    public $serviceStatus;

    public $userCounts;

    public $industry;

    public $clients;

    public $time;

    public $marketTypes;

    public $serverName;

    // by Warringer\Types\Dict
    public function setMotd($motd)
    {
        // by Warringer\Types\Dict
        $converters = [];
        $converters['dust'] = function ($value) { return new Reference($value); };
        $converters['eve'] = function ($value) { return new Reference($value); };
        $converters['server'] = function ($value) { return new Reference($value); };

        $func = function ($value) use($converters) {
            $return = new \ArrayObject($value, \ArrayObject::ARRAY_AS_PROPS);
            $return['dust'] = isset($value->{'dust'}) ? $converters['dust']($value->{'dust'}) : null;
            $return['eve'] = isset($value->{'eve'}) ? $converters['eve']($value->{'eve'}) : null;
            $return['server'] = isset($value->{'server'}) ? $converters['server']($value->{'server'}) : null;
            return $return;
        };
        $this->motd = $func($motd);
    }

    // by Warringer\Types\Reference
    public function setCrestEndpoint($crestEndpoint)
    {
        $this->crestEndpoint = new Reference($crestEndpoint);
    }

    // by Warringer\Types\Reference
    public function setCorporationRoles($corporationRoles)
    {
        $this->corporationRoles = new Reference($corporationRoles);
    }

    // by Warringer\Types\Reference
    public function setChannels($channels)
    {
        $this->channels = new Reference($channels);
    }

    // by Warringer\Types\Reference
    public function setCorporations($corporations)
    {
        $this->corporations = new Reference($corporations);
    }

    // by Warringer\Types\Reference
    public function setAlliances($alliances)
    {
        $this->alliances = new Reference($alliances);
    }

    // by Warringer\Types\Reference
    public function setAuthEndpoint($authEndpoint)
    {
        $this->authEndpoint = new Reference($authEndpoint);
    }

    // by Warringer\Types\Reference
    public function setBattleTheatres($battleTheatres)
    {
        $this->battleTheatres = new Reference($battleTheatres);
    }

    // by Warringer\Types\Reference
    public function setMarketPrices($marketPrices)
    {
        $this->marketPrices = new Reference($marketPrices);
    }

    // by Warringer\Types\Reference
    public function setItemTypes($itemTypes)
    {
        $this->itemTypes = new Reference($itemTypes);
    }

    // by Warringer\Types\Reference
    public function setDecode($decode)
    {
        $this->decode = new Reference($decode);
    }

    // by Warringer\Types\Reference
    public function setBloodlines($bloodlines)
    {
        $this->bloodlines = new Reference($bloodlines);
    }

    // by Warringer\Types\Reference
    public function setTournaments($tournaments)
    {
        $this->tournaments = new Reference($tournaments);
    }

    // by Warringer\Types\Reference
    public function setMap($map)
    {
        $this->map = new Reference($map);
    }

    // by Warringer\Types\Reference
    public function setVirtualGoodStore($virtualGoodStore)
    {
        $this->virtualGoodStore = new Reference($virtualGoodStore);
    }

    // by Warringer\Types\String
    public function setServerVersion($serverVersion)
    {
        $this->serverVersion = $serverVersion;
    }

    // by Warringer\Types\Reference
    public function setWars($wars)
    {
        $this->wars = new Reference($wars);
    }

    // by Warringer\Types\Reference
    public function setIncursions($incursions)
    {
        $this->incursions = new Reference($incursions);
    }

    // by Warringer\Types\Reference
    public function setRaces($races)
    {
        $this->races = new Reference($races);
    }

    // by Warringer\Types\Dict
    public function setServiceStatus($serviceStatus)
    {
        // by Warringer\Types\Dict
        $converters = [];
        $converters['dust'] = function ($value) { return $value; };
        $converters['eve'] = function ($value) { return $value; };
        $converters['server'] = function ($value) { return $value; };

        $func = function ($value) use($converters) {
            $return = new \ArrayObject($value, \ArrayObject::ARRAY_AS_PROPS);
            $return['dust'] = isset($value->{'dust'}) ? $converters['dust']($value->{'dust'}) : null;
            $return['eve'] = isset($value->{'eve'}) ? $converters['eve']($value->{'eve'}) : null;
            $return['server'] = isset($value->{'server'}) ? $converters['server']($value->{'server'}) : null;
            return $return;
        };
        $this->serviceStatus = $func($serviceStatus);
    }

    // by Warringer\Types\Dict
    public function setUserCounts($userCounts)
    {
        // by Warringer\Types\Dict
        $converters = [];
        $converters['dust'] = function ($value) { return $value; };
        $converters['eve'] = function ($value) { return $value; };

        $func = function ($value) use($converters) {
            $return = new \ArrayObject($value, \ArrayObject::ARRAY_AS_PROPS);
            $return['dust'] = isset($value->{'dust'}) ? $converters['dust']($value->{'dust'}) : null;
            $return['eve'] = isset($value->{'eve'}) ? $converters['eve']($value->{'eve'}) : null;
            return $return;
        };
        $this->userCounts = $func($userCounts);
    }

    // by Warringer\Types\Dict
    public function setIndustry($industry)
    {
        // by Warringer\Types\Dict
        $converters = [];
        $converters['facilities'] = function ($value) { return new Reference($value); };
        $converters['specialities'] = function ($value) { return new Reference($value); };
        $converters['teamsInAuction'] = function ($value) { return new Reference($value); };
        $converters['systems'] = function ($value) { return new Reference($value); };
        $converters['teams'] = function ($value) { return new Reference($value); };

        $func = function ($value) use($converters) {
            $return = new \ArrayObject($value, \ArrayObject::ARRAY_AS_PROPS);
            $return['facilities'] = isset($value->{'facilities'}) ? $converters['facilities']($value->{'facilities'}) : null;
            $return['specialities'] = isset($value->{'specialities'}) ? $converters['specialities']($value->{'specialities'}) : null;
            $return['teamsInAuction'] = isset($value->{'teamsInAuction'}) ? $converters['teamsInAuction']($value->{'teamsInAuction'}) : null;
            $return['systems'] = isset($value->{'systems'}) ? $converters['systems']($value->{'systems'}) : null;
            $return['teams'] = isset($value->{'teams'}) ? $converters['teams']($value->{'teams'}) : null;
            return $return;
        };
        $this->industry = $func($industry);
    }

    // by Warringer\Types\Dict
    public function setClients($clients)
    {
        // by Warringer\Types\Dict
        $converters = [];
        $converters['dust'] = function ($value) { return new Reference($value); };
        $converters['eve'] = function ($value) { return new Reference($value); };

        $func = function ($value) use($converters) {
            $return = new \ArrayObject($value, \ArrayObject::ARRAY_AS_PROPS);
            $return['dust'] = isset($value->{'dust'}) ? $converters['dust']($value->{'dust'}) : null;
            $return['eve'] = isset($value->{'eve'}) ? $converters['eve']($value->{'eve'}) : null;
            return $return;
        };
        $this->clients = $func($clients);
    }

    // by Warringer\Types\Reference
    public function setTime($time)
    {
        $this->time = new Reference($time);
    }

    // by Warringer\Types\Reference
    public function setMarketTypes($marketTypes)
    {
        $this->marketTypes = new Reference($marketTypes);
    }

    // by Warringer\Types\String
    public function setServerName($serverName)
    {
        $this->serverName = $serverName;
    }

}
