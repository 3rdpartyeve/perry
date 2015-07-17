<?php
namespace Perry\Representation\Eve\v1;

use \Perry\Representation\Reference as Reference;
use \Perry\Representation\Uri as Uri;
use \Perry\Representation\Base as Base;

class ItemCategory extends Base
{
    public $name;

    public $groups = [];

    public $published;

    // by Warringer\Types\String
    public function setName($name)
    {
        $this->name = $name;
    }

    // by Warringer\Types\ArrayType
    public function setGroups($groups)
    {
        // by Warringer\Types\Reference
        $func = function ($value) { return new Reference($value); };

        foreach ($groups as $key => $value) {
            $this->groups[$key] = $func($value);
        }
    }

    // by Warringer\Types\Base
    public function setPublished($published)
    {
        $this->published = $published;
    }

}
