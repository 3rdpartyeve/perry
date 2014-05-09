<?php

namespace Perry\Cache;

use Perry\Setup;

class CacheManager
{
    /**
     * @var CacheManager
     */
    private static $myInstance = null;

    /**
     * @return CacheManager
     */
    public static function getInstance()
    {
        if (is_null(self::$myInstance)) {
            self::$myInstance = new CacheManager();
        }

        return self::$myInstance;
    }

    /**
     * @param string $url
     * @param array $data
     * @return bool
     */
    public function save($url, $data)
    {
        return Setup::getInstance()
            ->cacheImplementation
            ->getItem($this->urlToKey($url))
            ->set($data, Setup::$cacheTTL);
    }

    /**
     * @param string $url
     * @return array|false
     */
    public function load($url)
    {
        $data = Setup::getInstance()
            ->cacheImplementation
            ->getItem($this->urlToKey($url));


        if ($data->isHit()) {
            return $data->get();
        }

        return false;
    }

    /**
     * make sure the key is in a format that complies with PSR-6
     * @param string $url
     * @return string
     */
    private function urlToKey($url)
    {
        return sha1($url);
    }
}
