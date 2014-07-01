<?php
namespace Perry\Representation\Eve\v1;

use \Perry\Representation\Reference as Reference;
use \Perry\Representation\Uri as Uri;
use \Perry\Representation\Base as Base;

class Map extends Base
{
    public $regions;

    public $search;

    // by Warringer\Types\Reference
    public function setRegions($regions)
    {
        $this->regions = new Reference($regions);
    }

    // by Warringer\Types\Reference
    public function setSearch($search)
    {
        $this->search = new Reference($search);
    }

}
