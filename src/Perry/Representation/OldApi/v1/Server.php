<?php
namespace Perry\Representation\OldApi\v1;

use Perry\Representation\Base;
use Perry\Representation\Eve\v1\Reference;

class Server extends Base
{

    protected static $_type = "net.3rdpartyeve.thora.Server-v1";

    /**
     * @param array $ref
     */
    protected function setServerStatus(array $ref)
    {
        $this->ServerStatus = new Reference($ref, "net.3rdpartyeve.thora.server.ServerStatus-v1");
    }


    /**
     * @var Reference
     */
    protected $ServerStatus;

}