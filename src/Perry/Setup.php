<?php
namespace Perry;

use Perry\Cache\NoCache\NoCachePool;
use Perry\Fetcher\GuzzleFetcher;

final class Setup
{
    /**
     * @var Setup
     */
    private static $myInstance;

    /**
     * @var \Perry\Fetcher\CanFetch
     */
    public $fetcher;

    /**
     * @var \Psr\Cache\PoolInterface
     */
    public $cacheImplementation;

    /**
     * singleton implementation
     * @return Setup
     */
    public static function getInstance()
    {
        if (!isset(self::$myInstance)) {
            self::$myInstance = new Setup();
        }
        return self::$myInstance;
    }

    /**
     * private constructor (singleton, creates defaults)
     */
    private function __construct()
    {
        $this->fetcher = new GuzzleFetcher();
        $this->cacheImplementation = new NoCachePool();
    }

    public static $crestUrl = "http://public-crest.eveonline.com";
    public static $thoraUrl = "http://thora.3rdpartyeve.net";
    public static $bindToIp = "0.0.0.0:0";
    public static $cacheTTL = 300; // 5 minutes default
    public static $userAgent = "Unknown Application  (Using 3rdpartyeve/perry PHP lib)";
}
