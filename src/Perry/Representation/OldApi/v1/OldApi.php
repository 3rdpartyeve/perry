<?php
namespace Perry\Representation\OldApi\v1;

use Perry\Representation\Base;
use Perry\Representation\Eve\v1\Reference;
use Perry\Setup;

class OldApi extends Base
{
    /**
     * @param array $ref
     */
    protected function setCharacter($ref)
    {
        $this->character = new Reference($ref, "net.3rdpartyeve.thora.Character-v1");
    }

    /**
     * @param array $account
     */
    public function setAccount($account)
    {
        $this->account = new Reference($account, "net.3rdpartyeve.thora.Account-v1");
    }

    /**
     * @param array $api
     */
    public function setApi($api)
    {
        $this->api = new Reference($api, "net.3rdpartyeve.thora.Api-v1");
    }

    /**
     * @param array $corporation
     */
    public function setCorporation($corporation)
    {
        $this->corporation = new Reference($corporation, "net.3rdpartyeve.thora.Corporation-v1");
    }

    /**
     * @param array $eve
     */
    public function setEve($eve)
    {
        $this->eve = new Reference($eve, "net.3rdpartyeve.thora.Eve-v1");
    }

    /**
     * @param array $map
     */
    public function setMap($map)
    {
        $this->map = new Reference($map, "net.3rdpartyeve.thora.Map-v1");
    }

    /**
     * @param array $server
     */
    public function setServer($server)
    {
        $this->server = new Reference($server, "net.3rdpartyeve.thora.Server-v1");
    }

    /**
     * @var Reference
     */
    public $account;

    /**
     * @var Reference
     */
    public $character;

    /**
     * @var Reference
     */
    public $corporation;

    /**
     * @var Reference
     */
    public $eve;

    /**
     * @var Reference
     */
    public $map;

    /**
     * @var Reference
     */
    public $server;

    /**
     * @var Reference
     */
    public $api;

    /**
     * @return OldApi
     */
    public static function getInstance()
    {
        return new OldApi(self::doGetRequest(Setup::$thoraUrl.'/', "net.3rdpartyeve.thora.OldApi-v1"));
    }
}
