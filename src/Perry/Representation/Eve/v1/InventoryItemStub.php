<?php
namespace Perry\Representation\Eve\v1;

use \Perry\Representation\Reference as Reference;
use \Perry\Representation\Base as Base;

class InventoryItemStub extends Base
{
    public $href;

    public $id;

    // by Warringer\Types\Base
    public function setHref($href)
    {
        $this->href = $href;
    }

    // by Warringer\Types\Long
    public function setId($id)
    {
        $this->id = $id;
    }

}
