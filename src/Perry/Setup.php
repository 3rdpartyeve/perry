<?php
namespace Perry;

class Setup
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
    private function __construct() {
        $this->fetcher = new Fetcher\FileFetcher();
    }

    public static $crestUrl = "http://public-crest.eveonline.com";
    public static $thoraUrl = "http://thora.3rdpartyeve.net";
    public static $bindToIp = "0.0.0.0:0";

}
