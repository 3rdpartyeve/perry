<?php
namespace Perry\Representation\Eve\v1;

use \Perry\Representation\Reference as Reference;
use \Perry\Representation\Uri as Uri;
use \Perry\Representation\Base as Base;

class IndustrySpeciality extends Base
{
    public $id;

    public $groups = [];

    public $name;

    // by Warringer\Types\Long
    public function setId($id)
    {
        $this->id = $id;
    }

    // by Warringer\Types\ArrayType
    public function setGroups($groups)
    {
        // by Warringer\Types\Dict
        $converters = [];
        $converters['id'] = function ($value) { return $value; };

        $func = function ($value) use($converters) {
            $return = new \ArrayObject($value, \ArrayObject::ARRAY_AS_PROPS);
            $return['id'] = isset($value->{'id'}) ? $converters['id']($value->{'id'}) : null;
            return $return;
        };

        foreach ($groups as $key => $value) {
            $this->groups[$key] = $func($value);
        }
    }

    // by Warringer\Types\String
    public function setName($name)
    {
        $this->name = $name;
    }

}
