<?php
namespace Perry\Representation\Eve\v1;

use \Perry\Representation\Reference as Reference;
use \Perry\Representation\Base as Base;

class Alliance extends Base
{
    public $startDate;

    public $corporationsCount;

    public $description;

    public $executorCorporation;

    public $deleted;

    public $creatorCorporation;

    public $url;

    public $creatorCharacter;

    public $corporations = [];

    public $shortName;

    public $id;

    public $name;

    // by Warringer\Types\String
    public function setStartDate($startDate)
    {
        $this->startDate = $startDate;
    }

    // by Warringer\Types\Long
    public function setCorporationsCount($corporationsCount)
    {
        $this->corporationsCount = $corporationsCount;
    }

    // by Warringer\Types\String
    public function setDescription($description)
    {
        $this->description = $description;
    }

    // by Warringer\Types\Reference
    public function setExecutorCorporation($executorCorporation)
    {
        $this->executorCorporation = new Reference($executorCorporation);
    }

    // by Warringer\Types\Base
    public function setDeleted($deleted)
    {
        $this->deleted = $deleted;
    }

    // by Warringer\Types\Reference
    public function setCreatorCorporation($creatorCorporation)
    {
        $this->creatorCorporation = new Reference($creatorCorporation);
    }

    // by Warringer\Types\String
    public function setUrl($url)
    {
        $this->url = $url;
    }

    // by Warringer\Types\Reference
    public function setCreatorCharacter($creatorCharacter)
    {
        $this->creatorCharacter = new Reference($creatorCharacter);
    }

    // by Warringer\Types\ArrayType
    public function setCorporations($corporations)
    {
        // by Warringer\Types\Reference
        $func = function($value) { return new Reference($value); };

        foreach ($corporations as $key => $value) {
            $this->corporations[$key] = $func($value);
        }
    }

    // by Warringer\Types\String
    public function setShortName($shortName)
    {
        $this->shortName = $shortName;
    }

    // by Warringer\Types\Long
    public function setId($id)
    {
        $this->id = $id;
    }

    // by Warringer\Types\String
    public function setName($name)
    {
        $this->name = $name;
    }

}
