<?php
namespace Perry\Representation\Eve\v1;

use \Perry\Representation\Reference as Reference;
use \Perry\Representation\Uri as Uri;
use \Perry\Representation\Base as Base;

class MarketGroup extends Base
{
    public $parentGroup;

    public $href;

    public $name;

    public $types;

    public $description;

    // by Warringer\Types\Reference
    public function setParentGroup($parentGroup)
    {
        $this->parentGroup = new Reference($parentGroup);
    }

    // by Warringer\Types\Uri
    public function setHref($href)
    {
        $this->href = new Uri($href);
    }

    // by Warringer\Types\String
    public function setName($name)
    {
        $this->name = $name;
    }

    // by Warringer\Types\Reference
    public function setTypes($types)
    {
        $this->types = new Reference($types);
    }

    // by Warringer\Types\String
    public function setDescription($description)
    {
        $this->description = $description;
    }

}
