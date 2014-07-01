<?php
namespace Perry\Representation\Eve\v1;

use \Perry\Representation\Reference as Reference;
use \Perry\Representation\Uri as Uri;
use \Perry\Representation\Base as Base;

class Time extends Base
{
    public $time;

    // by Warringer\Types\String
    public function setTime($time)
    {
        $this->time = $time;
    }

}
