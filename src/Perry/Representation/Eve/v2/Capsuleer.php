<?php
namespace Perry\Representation\Eve\v2;

use \Perry\Representation\Reference as Reference;
use \Perry\Representation\Uri as Uri;
use \Perry\Representation\Base as Base;

class Capsuleer extends Base
{
    public $portrait;

    public $private;

    // by Warringer\Types\Dict
    public function setPortrait($portrait)
    {
        // by Warringer\Types\Dict
        $converters = [];
        $converters['pattern'] = function ($value) { return $value; };

        $func = function ($value) use($converters) {
            $return = new \ArrayObject($value, \ArrayObject::ARRAY_AS_PROPS);
            $return['pattern'] = isset($value->{'pattern'}) ? $converters['pattern']($value->{'pattern'}) : null;
            return $return;
        };
        $this->portrait = $func($portrait);
    }

    // by Warringer\Types\Reference
    public function setPrivate($private)
    {
        $this->private = new Reference($private);
    }

}
