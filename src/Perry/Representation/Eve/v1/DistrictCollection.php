<?php
namespace Perry\Representation\Eve\v1;

use \Perry\Representation\Reference as Reference;
use \Perry\Representation\Uri as Uri;
use \Perry\Representation\Base as Base;

class DistrictCollection extends Base
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
        $converters['startDate'] = function ($value) { return $value; };
        $converters['updateClonesQuote'] = function ($value) { return new Reference($value); };
        $converters['owner'] = function ($value) { return new Reference($value); };
        $converters['reinforce'] = function ($value) { return $value; };
        $converters['href'] = function ($value) { return new Uri($value); };
        $converters['conquerable'] = function ($value) { return $value; };
        $converters['constellation'] = function ($value) { return new Reference($value); };
        $converters['id'] = function ($value) { return $value; };
        $converters['nextReinforce'] = function ($value) { return $value; };
        $converters['index'] = function ($value) { return $value; };
        $converters['system'] = function ($value) { return new Reference($value); };
        $converters['cloneCapacity'] = function ($value) { return $value; };
        $converters['latitude'] = function ($value) { return $value; };
        $converters['generating'] = function ($value) { return $value; };
        $converters['infrastructure'] = function ($value) { return new Reference($value); };
        $converters['attacked'] = function ($value) { return $value; };
        $converters['updateClones'] = function ($value) { return new Reference($value); };
        $converters['cloneRate'] = function ($value) { return $value; };
        $converters['clones'] = function ($value) { return $value; };
        $converters['locked'] = function ($value) { return $value; };
        $converters['name'] = function ($value) { return $value; };
        $converters['region'] = function ($value) { return new Reference($value); };
        $converters['longitude'] = function ($value) { return $value; };
        $converters['planet'] = function ($value) { return new Reference($value); };
        $converters['updateInfrastructure'] = function ($value) { return new Reference($value); };
        $converters['updateReinforce'] = function ($value) { return new Reference($value); };

        $func = function ($value) use($converters) {
            $return = new \ArrayObject($value, \ArrayObject::ARRAY_AS_PROPS);
            $return['startDate'] = isset($value->{'startDate'}) ? $converters['startDate']($value->{'startDate'}) : null;
            $return['updateClonesQuote'] = isset($value->{'updateClonesQuote'}) ? $converters['updateClonesQuote']($value->{'updateClonesQuote'}) : null;
            $return['owner'] = isset($value->{'owner'}) ? $converters['owner']($value->{'owner'}) : null;
            $return['reinforce'] = isset($value->{'reinforce'}) ? $converters['reinforce']($value->{'reinforce'}) : null;
            $return['href'] = isset($value->{'href'}) ? $converters['href']($value->{'href'}) : null;
            $return['conquerable'] = isset($value->{'conquerable'}) ? $converters['conquerable']($value->{'conquerable'}) : null;
            $return['constellation'] = isset($value->{'constellation'}) ? $converters['constellation']($value->{'constellation'}) : null;
            $return['id'] = isset($value->{'id'}) ? $converters['id']($value->{'id'}) : null;
            $return['nextReinforce'] = isset($value->{'nextReinforce'}) ? $converters['nextReinforce']($value->{'nextReinforce'}) : null;
            $return['index'] = isset($value->{'index'}) ? $converters['index']($value->{'index'}) : null;
            $return['system'] = isset($value->{'system'}) ? $converters['system']($value->{'system'}) : null;
            $return['cloneCapacity'] = isset($value->{'cloneCapacity'}) ? $converters['cloneCapacity']($value->{'cloneCapacity'}) : null;
            $return['latitude'] = isset($value->{'latitude'}) ? $converters['latitude']($value->{'latitude'}) : null;
            $return['generating'] = isset($value->{'generating'}) ? $converters['generating']($value->{'generating'}) : null;
            $return['infrastructure'] = isset($value->{'infrastructure'}) ? $converters['infrastructure']($value->{'infrastructure'}) : null;
            $return['attacked'] = isset($value->{'attacked'}) ? $converters['attacked']($value->{'attacked'}) : null;
            $return['updateClones'] = isset($value->{'updateClones'}) ? $converters['updateClones']($value->{'updateClones'}) : null;
            $return['cloneRate'] = isset($value->{'cloneRate'}) ? $converters['cloneRate']($value->{'cloneRate'}) : null;
            $return['clones'] = isset($value->{'clones'}) ? $converters['clones']($value->{'clones'}) : null;
            $return['locked'] = isset($value->{'locked'}) ? $converters['locked']($value->{'locked'}) : null;
            $return['name'] = isset($value->{'name'}) ? $converters['name']($value->{'name'}) : null;
            $return['region'] = isset($value->{'region'}) ? $converters['region']($value->{'region'}) : null;
            $return['longitude'] = isset($value->{'longitude'}) ? $converters['longitude']($value->{'longitude'}) : null;
            $return['planet'] = isset($value->{'planet'}) ? $converters['planet']($value->{'planet'}) : null;
            $return['updateInfrastructure'] = isset($value->{'updateInfrastructure'}) ? $converters['updateInfrastructure']($value->{'updateInfrastructure'}) : null;
            $return['updateReinforce'] = isset($value->{'updateReinforce'}) ? $converters['updateReinforce']($value->{'updateReinforce'}) : null;
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
