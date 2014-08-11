<?php
namespace Perry\Representation\Eve\v1;

use \Perry\Representation\Reference as Reference;
use \Perry\Representation\Uri as Uri;
use \Perry\Representation\Base as Base;

class DistrictInfrastructure extends Base
{
    public $description;

    public $price;

    public $name;

    public $href;

    public $id;

    public $icon;

    // by Warringer\Types\String
    public function setDescription($description)
    {
        $this->description = $description;
    }

    // by Warringer\Types\Long
    public function setPrice($price)
    {
        $this->price = $price;
    }

    // by Warringer\Types\String
    public function setName($name)
    {
        $this->name = $name;
    }

    // by Warringer\Types\Uri
    public function setHref($href)
    {
        $this->href = new Uri($href);
    }

    // by Warringer\Types\Long
    public function setId($id)
    {
        $this->id = $id;
    }

    // by Warringer\Types\Reference
    public function setIcon($icon)
    {
        $this->icon = new Reference($icon);
    }

}
