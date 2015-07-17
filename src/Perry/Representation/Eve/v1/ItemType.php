<?php
namespace Perry\Representation\Eve\v1;

use \Perry\Representation\Reference as Reference;
use \Perry\Representation\Uri as Uri;
use \Perry\Representation\Base as Base;

class ItemType extends Base
{
    public $name;

    public $description;

    // by Warringer\Types\String
    public function setName($name)
    {
        $this->name = $name;
    }

    // by Warringer\Types\String
    public function setDescription($description)
    {
        $this->description = $description;
    }

}
