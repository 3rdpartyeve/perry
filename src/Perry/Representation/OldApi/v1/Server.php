<?php
namespace Perry\Representation\OldApi\v1;

use Perry\Representation\Base;
use Perry\Representation\Reference;

class Server extends Base
{
    /**
     * @param array $ref
     */
    protected function setServerStatus($ref)
    {
        $this->ServerStatus = new Reference($ref, "net.3rdpartyeve.thora.server.ServerStatus-v1");
    }

    /**
     * @var Reference
     */
    public $ServerStatus;
}
