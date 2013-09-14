<?php
namespace Perry\Representation\OldApi\v1;

use Perry\Representation\Base;
use Perry\Representation\Eve\v1\Reference;

class Api extends Base
{
    /**
     * @param array $ref
     */
    protected function setCallList($ref)
    {
        $this->CallList = new Reference($ref, "net.3rdpartyeve.thora.api.CallList-v1");
    }

    /**
     * @var Reference
     */
    public $CallList;
}
