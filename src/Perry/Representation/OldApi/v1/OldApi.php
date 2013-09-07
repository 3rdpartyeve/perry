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
    protected function setCharacter(array $ref)
    {
        $this->character = new Reference($ref, "net.3rdpartyeve.thora.Character-v1");
    }

    /**
     * @param array
     */
    public function setAccount(array $account)
    {
        $this->account = new Reference($account, "net.3rdpartyeve.thora.Account-v1");
    }

    /**
     * @param array $api
     */
    public function setApi(array $api)
    {
        $this->api = new Reference($api, "net.3rdpartyeve.thora.Api-v1");
    }

    /**
     * @param array
     */
    public function setCorporation(array $corporation)
    {
        $this->corporation = new Reference($corporation, "net.3rdpartyeve.thora.Corporation-v1");
    }

    /**
     * @param array $eve
     */
    public function setEve(array $eve)
    {
        $this->eve = new Reference($eve, "net.3rdpartyeve.thora.Eve-v1");
    }

    /**
     * @param array $map
     */
    public function setMap(array $map)
    {
        $this->map = new Reference($map, "net.3rdpartyeve.thora.Map-v1");
    }

    /**
     * @param array $server
     */
    public function setServer(array $server)
    {
        $this->server = new Reference($server, "net.3rdpartyeve.thora.Server-v1");
    }

    protected static $_type = "net.3rdpartyeve.thora.OldApi-v1";

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
        return new OldApi(self::doGetRequest(Setup::THORA_URL .'/', self::$_type));
    }

}