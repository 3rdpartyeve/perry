<?php
namespace Perry\Representation\Eve\v1;

use \Perry\Representation\Reference as Reference;
use \Perry\Representation\Uri as Uri;
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

    // by Warringer\Types\Dict
    public function setExecutorCorporation($executorCorporation)
    {
        // by Warringer\Types\Dict
        $converters = [];
        $converters['isNPC'] = function ($value) { return $value; };
        $converters['logo'] = function ($value) { return $value; };
        $converters['href'] = function ($value) { return new Uri($value); };
        $converters['id'] = function ($value) { return $value; };
        $converters['name'] = function ($value) { return $value; };

        $func = function ($value) use($converters) {
            $return = new \ArrayObject($value, \ArrayObject::ARRAY_AS_PROPS);
            $return['isNPC'] = isset($value->{'isNPC'}) ? $converters['isNPC']($value->{'isNPC'}) : null;
            $return['logo'] = isset($value->{'logo'}) ? $converters['logo']($value->{'logo'}) : null;
            $return['href'] = isset($value->{'href'}) ? $converters['href']($value->{'href'}) : null;
            $return['id'] = isset($value->{'id'}) ? $converters['id']($value->{'id'}) : null;
            $return['name'] = isset($value->{'name'}) ? $converters['name']($value->{'name'}) : null;
            return $return;
        };
        $this->executorCorporation = $func($executorCorporation);
    }

    // by Warringer\Types\Base
    public function setDeleted($deleted)
    {
        $this->deleted = $deleted;
    }

    // by Warringer\Types\Dict
    public function setCreatorCorporation($creatorCorporation)
    {
        // by Warringer\Types\Dict
        $converters = [];
        $converters['isNPC'] = function ($value) { return $value; };
        $converters['logo'] = function ($value) { return $value; };
        $converters['href'] = function ($value) { return new Uri($value); };
        $converters['id'] = function ($value) { return $value; };
        $converters['name'] = function ($value) { return $value; };

        $func = function ($value) use($converters) {
            $return = new \ArrayObject($value, \ArrayObject::ARRAY_AS_PROPS);
            $return['isNPC'] = isset($value->{'isNPC'}) ? $converters['isNPC']($value->{'isNPC'}) : null;
            $return['logo'] = isset($value->{'logo'}) ? $converters['logo']($value->{'logo'}) : null;
            $return['href'] = isset($value->{'href'}) ? $converters['href']($value->{'href'}) : null;
            $return['id'] = isset($value->{'id'}) ? $converters['id']($value->{'id'}) : null;
            $return['name'] = isset($value->{'name'}) ? $converters['name']($value->{'name'}) : null;
            return $return;
        };
        $this->creatorCorporation = $func($creatorCorporation);
    }

    // by Warringer\Types\String
    public function setUrl($url)
    {
        $this->url = $url;
    }

    // by Warringer\Types\Dict
    public function setCreatorCharacter($creatorCharacter)
    {
        // by Warringer\Types\Dict
        $converters = [];
        $converters['name'] = function ($value) { return $value; };
        $converters['isNPC'] = function ($value) { return $value; };
        $converters['mercenary'] = function ($value) { return new Reference($value); };
        $converters['href'] = function ($value) { return new Uri($value); };
        $converters['capsuleer'] = function ($value) { return new Reference($value); };
        $converters['portrait'] = function ($value) { return $value; };
        $converters['id'] = function ($value) { return $value; };

        $func = function ($value) use($converters) {
            $return = new \ArrayObject($value, \ArrayObject::ARRAY_AS_PROPS);
            $return['name'] = isset($value->{'name'}) ? $converters['name']($value->{'name'}) : null;
            $return['isNPC'] = isset($value->{'isNPC'}) ? $converters['isNPC']($value->{'isNPC'}) : null;
            $return['mercenary'] = isset($value->{'mercenary'}) ? $converters['mercenary']($value->{'mercenary'}) : null;
            $return['href'] = isset($value->{'href'}) ? $converters['href']($value->{'href'}) : null;
            $return['capsuleer'] = isset($value->{'capsuleer'}) ? $converters['capsuleer']($value->{'capsuleer'}) : null;
            $return['portrait'] = isset($value->{'portrait'}) ? $converters['portrait']($value->{'portrait'}) : null;
            $return['id'] = isset($value->{'id'}) ? $converters['id']($value->{'id'}) : null;
            return $return;
        };
        $this->creatorCharacter = $func($creatorCharacter);
    }

    // by Warringer\Types\ArrayType
    public function setCorporations($corporations)
    {
        // by Warringer\Types\Dict
        $converters = [];
        $converters['isNPC'] = function ($value) { return $value; };
        $converters['logo'] = function ($value) { return $value; };
        $converters['href'] = function ($value) { return new Uri($value); };
        $converters['id'] = function ($value) { return $value; };
        $converters['name'] = function ($value) { return $value; };

        $func = function ($value) use($converters) {
            $return = new \ArrayObject($value, \ArrayObject::ARRAY_AS_PROPS);
            $return['isNPC'] = isset($value->{'isNPC'}) ? $converters['isNPC']($value->{'isNPC'}) : null;
            $return['logo'] = isset($value->{'logo'}) ? $converters['logo']($value->{'logo'}) : null;
            $return['href'] = isset($value->{'href'}) ? $converters['href']($value->{'href'}) : null;
            $return['id'] = isset($value->{'id'}) ? $converters['id']($value->{'id'}) : null;
            $return['name'] = isset($value->{'name'}) ? $converters['name']($value->{'name'}) : null;
            return $return;
        };

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
