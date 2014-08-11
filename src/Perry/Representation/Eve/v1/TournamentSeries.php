<?php
namespace Perry\Representation\Eve\v1;

use \Perry\Representation\Reference as Reference;
use \Perry\Representation\Uri as Uri;
use \Perry\Representation\Base as Base;

class TournamentSeries extends Base
{
    public $matchesInProgress = [];

    public $redTeam;

    public $matchesWon;

    public $matches;

    public $self;

    public $winner;

    public $loser;

    public $length;

    public $blueTeam;

    public $structure;

    // by Warringer\Types\ArrayType
    public function setMatchesInProgress($matchesInProgress)
    {
        // by Warringer\Types\Reference
        $func = function ($value) { return new Reference($value); };

        foreach ($matchesInProgress as $key => $value) {
            $this->matchesInProgress[$key] = $func($value);
        }
    }

    // by Warringer\Types\Dict
    public function setRedTeam($redTeam)
    {
        // by Warringer\Types\Dict
        $converters = [];
        $converters['team'] = function ($value) { return new Reference($value); };
        $converters['isDecided'] = function ($value) { return $value; };
        $converters['isBye'] = function ($value) { return $value; };

        $func = function ($value) use($converters) {
            $return = new \ArrayObject($value, \ArrayObject::ARRAY_AS_PROPS);
            $return['team'] = isset($value->{'team'}) ? $converters['team']($value->{'team'}) : null;
            $return['isDecided'] = isset($value->{'isDecided'}) ? $converters['isDecided']($value->{'isDecided'}) : null;
            $return['isBye'] = isset($value->{'isBye'}) ? $converters['isBye']($value->{'isBye'}) : null;
            return $return;
        };
        $this->redTeam = $func($redTeam);
    }

    // by Warringer\Types\Dict
    public function setMatchesWon($matchesWon)
    {
        // by Warringer\Types\Dict
        $converters = [];
        $converters['redTeam'] = function ($value) { return $value; };
        $converters['blueTeam'] = function ($value) { return $value; };

        $func = function ($value) use($converters) {
            $return = new \ArrayObject($value, \ArrayObject::ARRAY_AS_PROPS);
            $return['redTeam'] = isset($value->{'redTeam'}) ? $converters['redTeam']($value->{'redTeam'}) : null;
            $return['blueTeam'] = isset($value->{'blueTeam'}) ? $converters['blueTeam']($value->{'blueTeam'}) : null;
            return $return;
        };
        $this->matchesWon = $func($matchesWon);
    }

    // by Warringer\Types\Reference
    public function setMatches($matches)
    {
        $this->matches = new Reference($matches);
    }

    // by Warringer\Types\Reference
    public function setSelf($self)
    {
        $this->self = new Reference($self);
    }

    // by Warringer\Types\Dict
    public function setWinner($winner)
    {
        // by Warringer\Types\Dict
        $converters = [];
        $converters['team'] = function ($value) { return new Reference($value); };
        $converters['isDecided'] = function ($value) { return $value; };
        $converters['isBye'] = function ($value) { return $value; };

        $func = function ($value) use($converters) {
            $return = new \ArrayObject($value, \ArrayObject::ARRAY_AS_PROPS);
            $return['team'] = isset($value->{'team'}) ? $converters['team']($value->{'team'}) : null;
            $return['isDecided'] = isset($value->{'isDecided'}) ? $converters['isDecided']($value->{'isDecided'}) : null;
            $return['isBye'] = isset($value->{'isBye'}) ? $converters['isBye']($value->{'isBye'}) : null;
            return $return;
        };
        $this->winner = $func($winner);
    }

    // by Warringer\Types\Dict
    public function setLoser($loser)
    {
        // by Warringer\Types\Dict
        $converters = [];
        $converters['team'] = function ($value) { return new Reference($value); };
        $converters['isDecided'] = function ($value) { return $value; };
        $converters['isBye'] = function ($value) { return $value; };

        $func = function ($value) use($converters) {
            $return = new \ArrayObject($value, \ArrayObject::ARRAY_AS_PROPS);
            $return['team'] = isset($value->{'team'}) ? $converters['team']($value->{'team'}) : null;
            $return['isDecided'] = isset($value->{'isDecided'}) ? $converters['isDecided']($value->{'isDecided'}) : null;
            $return['isBye'] = isset($value->{'isBye'}) ? $converters['isBye']($value->{'isBye'}) : null;
            return $return;
        };
        $this->loser = $func($loser);
    }

    // by Warringer\Types\Long
    public function setLength($length)
    {
        $this->length = $length;
    }

    // by Warringer\Types\Dict
    public function setBlueTeam($blueTeam)
    {
        // by Warringer\Types\Dict
        $converters = [];
        $converters['team'] = function ($value) { return new Reference($value); };
        $converters['isDecided'] = function ($value) { return $value; };
        $converters['isBye'] = function ($value) { return $value; };

        $func = function ($value) use($converters) {
            $return = new \ArrayObject($value, \ArrayObject::ARRAY_AS_PROPS);
            $return['team'] = isset($value->{'team'}) ? $converters['team']($value->{'team'}) : null;
            $return['isDecided'] = isset($value->{'isDecided'}) ? $converters['isDecided']($value->{'isDecided'}) : null;
            $return['isBye'] = isset($value->{'isBye'}) ? $converters['isBye']($value->{'isBye'}) : null;
            return $return;
        };
        $this->blueTeam = $func($blueTeam);
    }

    // by Warringer\Types\Dict
    public function setStructure($structure)
    {
        // by Warringer\Types\Dict
        $converters = [];
        $converters['outgoingLoser'] = function ($value) { return new Reference($value); };
        $converters['outgoingWinner'] = function ($value) { return new Reference($value); };
        $converters['incomingRed'] = function ($value) { return new Reference($value); };
        $converters['incomingBlue'] = function ($value) { return new Reference($value); };

        $func = function ($value) use($converters) {
            $return = new \ArrayObject($value, \ArrayObject::ARRAY_AS_PROPS);
            $return['outgoingLoser'] = isset($value->{'outgoingLoser'}) ? $converters['outgoingLoser']($value->{'outgoingLoser'}) : null;
            $return['outgoingWinner'] = isset($value->{'outgoingWinner'}) ? $converters['outgoingWinner']($value->{'outgoingWinner'}) : null;
            $return['incomingRed'] = isset($value->{'incomingRed'}) ? $converters['incomingRed']($value->{'incomingRed'}) : null;
            $return['incomingBlue'] = isset($value->{'incomingBlue'}) ? $converters['incomingBlue']($value->{'incomingBlue'}) : null;
            return $return;
        };
        $this->structure = $func($structure);
    }

}
