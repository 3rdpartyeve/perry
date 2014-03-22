<?php
namespace Perry\Representation\Eve\v1;

use \Perry\Representation\Reference as Reference;
use \Perry\Representation\Base as Base;

class TournamentMatchCollection extends Base
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
        $converters['winner'] = function($value) { return new Reference($value); };
        $converters['stats'] = function($value) { return $value; };
        $converters['redTeam'] = function($value) { return new Reference($value); };
        $converters['bans'] = function($value) { return $value; };
        $converters['finalized'] = function($value) { return $value; };
        $converters['series'] = function($value) { return new Reference($value); };
        $converters['tournament'] = function($value) { return new Reference($value); };
        $converters['staticSceneData'] = function($value) { return new Reference($value); };
        $converters['firstReplayFrame'] = function($value) { return new Reference($value); };
        $converters['lastReplayFrame'] = function($value) { return new Reference($value); };
        $converters['blueTeam'] = function($value) { return new Reference($value); };
        $converters['inProgress'] = function($value) { return $value; };
        $converters['score'] = function($value) { return $value; };

        $func = function($value) use($converters) {
            $return = new \ArrayObject($value, \ArrayObject::ARRAY_AS_PROPS);
            $return['winner'] = isset($value->{'winner'}) ? $converters['winner']($value->{'winner'}) : null;
            $return['stats'] = isset($value->{'stats'}) ? $converters['stats']($value->{'stats'}) : null;
            $return['redTeam'] = isset($value->{'redTeam'}) ? $converters['redTeam']($value->{'redTeam'}) : null;
            $return['bans'] = isset($value->{'bans'}) ? $converters['bans']($value->{'bans'}) : null;
            $return['finalized'] = isset($value->{'finalized'}) ? $converters['finalized']($value->{'finalized'}) : null;
            $return['series'] = isset($value->{'series'}) ? $converters['series']($value->{'series'}) : null;
            $return['tournament'] = isset($value->{'tournament'}) ? $converters['tournament']($value->{'tournament'}) : null;
            $return['staticSceneData'] = isset($value->{'staticSceneData'}) ? $converters['staticSceneData']($value->{'staticSceneData'}) : null;
            $return['firstReplayFrame'] = isset($value->{'firstReplayFrame'}) ? $converters['firstReplayFrame']($value->{'firstReplayFrame'}) : null;
            $return['lastReplayFrame'] = isset($value->{'lastReplayFrame'}) ? $converters['lastReplayFrame']($value->{'lastReplayFrame'}) : null;
            $return['blueTeam'] = isset($value->{'blueTeam'}) ? $converters['blueTeam']($value->{'blueTeam'}) : null;
            $return['inProgress'] = isset($value->{'inProgress'}) ? $converters['inProgress']($value->{'inProgress'}) : null;
            $return['score'] = isset($value->{'score'}) ? $converters['score']($value->{'score'}) : null;
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
