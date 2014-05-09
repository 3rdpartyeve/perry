<?php
namespace Perry\Representation\Eve\v1;

use \Perry\Representation\Reference as Reference;
use \Perry\Representation\Base as Base;

class TournamentSeriesCollection extends Base
{
    public $pageCount;

    public $items = [];

    public $totalCount;

    public $next;

    public $previous;

    // by Warringer\Types\Long
    public function setPageCount($pageCount)
    {
        $this->pageCount = $pageCount;
    }

    // by Warringer\Types\ArrayType
    public function setItems($items)
    {
        // by Warringer\Types\Base
        $converters = [];
        $converters['matchesInProgress'] = function ($values) {
        // by Warringer\Types\Reference
        $func = function ($value) { return new Reference($value); };

            foreach ($values as $key => $value) {
                 $values[$key] = $func($value);
            }
           return $values;
        };

        $converters['redTeam'] = function ($value) { return $value; };
        $converters['matchesWon'] = function ($value) { return $value; };
        $converters['matches'] = function ($value) { return new Reference($value); };
        $converters['self'] = function ($value) { return new Reference($value); };
        $converters['winner'] = function ($value) { return $value; };
        $converters['loser'] = function ($value) { return $value; };
        $converters['length'] = function ($value) { return $value; };
        $converters['blueTeam'] = function ($value) { return $value; };
        $converters['structure'] = function ($value) { return $value; };

        $func = function ($value) use ($converters) {
            $return = new \ArrayObject($value, \ArrayObject::ARRAY_AS_PROPS);
            $return['matchesInProgress'] = isset($value->{'matchesInProgress'}) ? $converters['matchesInProgress']($value->{'matchesInProgress'}) : null;
            $return['redTeam'] = isset($value->{'redTeam'}) ? $converters['redTeam']($value->{'redTeam'}) : null;
            $return['matchesWon'] = isset($value->{'matchesWon'}) ? $converters['matchesWon']($value->{'matchesWon'}) : null;
            $return['matches'] = isset($value->{'matches'}) ? $converters['matches']($value->{'matches'}) : null;
            $return['self'] = isset($value->{'self'}) ? $converters['self']($value->{'self'}) : null;
            $return['winner'] = isset($value->{'winner'}) ? $converters['winner']($value->{'winner'}) : null;
            $return['loser'] = isset($value->{'loser'}) ? $converters['loser']($value->{'loser'}) : null;
            $return['length'] = isset($value->{'length'}) ? $converters['length']($value->{'length'}) : null;
            $return['blueTeam'] = isset($value->{'blueTeam'}) ? $converters['blueTeam']($value->{'blueTeam'}) : null;
            $return['structure'] = isset($value->{'structure'}) ? $converters['structure']($value->{'structure'}) : null;
            return $return;
        };

        foreach ($items as $key => $value) {
            $this->items[$key] = $func($value);
        }
    }

    // by Warringer\Types\Long
    public function setTotalCount($totalCount)
    {
        $this->totalCount = $totalCount;
    }

    // by Warringer\Types\Reference
    public function setNext($next)
    {
        $this->next = new Reference($next);
    }

    // by Warringer\Types\Reference
    public function setPrevious($previous)
    {
        $this->previous = new Reference($previous);
    }

}
