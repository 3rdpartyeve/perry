<?php

namespace Perry\Cache\NoCache;

use Psr\Cache\PoolInterface;

/**
 * Class will always return non-hits
 *
 * @package Perry\Cache\NoCache
 */
class NoCachePool implements PoolInterface
{
    public function getItem($key)
    {
        return new NoCacheItem($key);
    }

    public function getItems(array $keys)
    {
        $result[] = array();
        foreach ($keys as $key) {
            $result[$key] = $this->getItem($key);
        }
        return $result;
    }

    public function clear()
    {
        return $this;
    }
}
