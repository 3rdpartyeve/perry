<?php
namespace Perry\Representation\Eve\v1;

use \Perry\Representation\Reference as Reference;
use \Perry\Representation\Uri as Uri;
use \Perry\Representation\Base as Base;

class ItemGroup extends Base
{
    public $category;

    public $description;

    public $name;

    public $types = [];

    public $published;

    // by Warringer\Types\Reference
    public function setCategory($category)
    {
        $this->category = new Reference($category);
    }

    // by Warringer\Types\String
    public function setDescription($description)
    {
        $this->description = $description;
    }

    // by Warringer\Types\String
    public function setName($name)
    {
        $this->name = $name;
    }

    // by Warringer\Types\ArrayType
    public function setTypes($types)
    {
        // by Warringer\Types\Reference
        $func = function ($value) { return new Reference($value); };

        foreach ($types as $key => $value) {
            $this->types[$key] = $func($value);
        }
    }

    // by Warringer\Types\Base
    public function setPublished($published)
    {
        $this->published = $published;
    }

}
