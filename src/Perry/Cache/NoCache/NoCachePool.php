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
    /**
     * @param string $key
     * @return NoCacheItem|\Psr\Cache\ItemInterface
     */
    public function getItem($key)
    {
        return new NoCacheItem($key);
    }

    /**
     * @param array $keys
     * @return array|\Traversable
     */
    public function getItems(array $keys)
    {
        $result = [];
        foreach ($keys as $key) {
            $result[$key] = $this->getItem($key);
        }
        return $result;
    }

    /**
     * @return $this|PoolInterface
     */
    public function clear()
    {
        return $this;
    }
}
