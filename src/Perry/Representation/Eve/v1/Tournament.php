<?php
namespace Perry\Representation\Eve\v1;

use \Perry\Representation\Reference as Reference;
use \Perry\Representation\Base as Base;

class Tournament extends Base
{
    public $series;

    public $membershipCutoff;

    public $type;

    public $name;

    public $entries = [];

    // by Warringer\Types\Reference
    public function setSeries($series)
    {
        $this->series = new Reference($series);
    }

    // by Warringer\Types\String
    public function setMembershipCutoff($membershipCutoff)
    {
        $this->membershipCutoff = $membershipCutoff;
    }

    // by Warringer\Types\String
    public function setType($type)
    {
        $this->type = $type;
    }

    // by Warringer\Types\String
    public function setName($name)
    {
        $this->name = $name;
    }

    // by Warringer\Types\ArrayType
    public function setEntries($entries)
    {
        // by Warringer\Types\Reference
        $func = function ($value) { return new Reference($value); };

        foreach ($entries as $key => $value) {
            $this->entries[$key] = $func($value);
        }
    }

}
