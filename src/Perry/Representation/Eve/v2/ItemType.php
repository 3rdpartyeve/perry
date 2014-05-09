<?php
namespace Perry\Representation\Eve\v2;

use \Perry\Representation\Reference as Reference;
use \Perry\Representation\Base as Base;

class ItemType extends Base
{
    public $name;

    public $icon64;

    public $extraAttributes;

    public $mShortDescription;

    public $icon32;

    public $attributes;

    public $description;

    // by Warringer\Types\String
    public function setName($name)
    {
        $this->name = $name;
    }

    // by Warringer\Types\Reference
    public function setIcon64($icon64)
    {
        $this->icon64 = new Reference($icon64);
    }

    // by Warringer\Types\Dict
    public function setExtraAttributes($extraAttributes)
    {
        // by Warringer\Types\Dict
        $converters = [];
        $converters['skeletalMeshMale'] = function ($value) { return $value; };
        $converters['modifier'] = function ($values) {
        // by Warringer\Types\Dict
        $converters = [];
        $converters['modifierValue'] = function ($value) { return $value; };
        $converters['attributeName'] = function ($value) { return $value; };
        $converters['modifierType'] = function ($value) { return $value; };

        $func = function ($value) use($converters) {
            $return = new \ArrayObject($value, \ArrayObject::ARRAY_AS_PROPS);
            $return['modifierValue'] = isset($value->{'modifierValue'}) ? $converters['modifierValue']($value->{'modifierValue'}) : null;
            $return['attributeName'] = isset($value->{'attributeName'}) ? $converters['attributeName']($value->{'attributeName'}) : null;
            $return['modifierType'] = isset($value->{'modifierType'}) ? $converters['modifierType']($value->{'modifierType'}) : null;
            return $return;
        };

            foreach ($values as $key => $value) {
                 $values[$key] = $func($value);
            }
           return $values;
        };

        $converters['slotType'] = function ($value) { return $value; };
        $converters['skeletalMeshFemale'] = function ($value) { return $value; };
        $converters['mVICProp'] = function ($value) { return $value; };

        $func = function ($value) use($converters) {
            $return = new \ArrayObject($value, \ArrayObject::ARRAY_AS_PROPS);
            $return['skeletalMeshMale'] = isset($value->{'skeletalMeshMale'}) ? $converters['skeletalMeshMale']($value->{'skeletalMeshMale'}) : null;
            $return['modifier'] = isset($value->{'modifier'}) ? $converters['modifier']($value->{'modifier'}) : null;
            $return['slotType'] = isset($value->{'slotType'}) ? $converters['slotType']($value->{'slotType'}) : null;
            $return['skeletalMeshFemale'] = isset($value->{'skeletalMeshFemale'}) ? $converters['skeletalMeshFemale']($value->{'skeletalMeshFemale'}) : null;
            $return['mVICProp'] = isset($value->{'mVICProp'}) ? $converters['mVICProp']($value->{'mVICProp'}) : null;
            return $return;
        };
        $this->extraAttributes = $func($extraAttributes);
    }

    // by Warringer\Types\String
    public function setMShortDescription($mShortDescription)
    {
        $this->mShortDescription = $mShortDescription;
    }

    // by Warringer\Types\Reference
    public function setIcon32($icon32)
    {
        $this->icon32 = new Reference($icon32);
    }

    // by Warringer\Types\Dict
    public function setAttributes($attributes)
    {
        // by Warringer\Types\Dict
        $converters = [];
        $converters['cpu'] = function ($value) { return $value; };
        $converters['power'] = function ($value) { return $value; };
        $converters['heatDamage'] = function ($value) { return $value; };

        $func = function ($value) use($converters) {
            $return = new \ArrayObject($value, \ArrayObject::ARRAY_AS_PROPS);
            $return['cpu'] = isset($value->{'cpu'}) ? $converters['cpu']($value->{'cpu'}) : null;
            $return['power'] = isset($value->{'power'}) ? $converters['power']($value->{'power'}) : null;
            $return['heatDamage'] = isset($value->{'heatDamage'}) ? $converters['heatDamage']($value->{'heatDamage'}) : null;
            return $return;
        };
        $this->attributes = $func($attributes);
    }

    // by Warringer\Types\String
    public function setDescription($description)
    {
        $this->description = $description;
    }

}
