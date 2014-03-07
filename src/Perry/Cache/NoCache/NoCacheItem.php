<?php

namespace Perry\Cache\NoCache;

use Psr\Cache\ItemInterface;

/**
 * Class NoCacheItem, a cache that doesn't.
 *
 * @package Perry\Cache\NoCache
 */
class NoCacheItem implements ItemInterface
{

    /**
     * @var string
     */
    private $key;

    /**
     * @param string $key
     */
    public function __construct($key)
    {
        $this->key = $key;
    }

    /**
     * @return string
     */
    public function getKey()
    {
        return $this->key;
    }

    /**
     * always null since we don't cache
     * @return \Serializable|mixed
     */
    public function get()
    {
        return null;
    }

    /**
     * as if..
     *
     * @param \Serializable $value
     * @param int $ttl
     * @returns boolean
     */
    public function set($value = null, $ttl = null)
    {
        return true;
    }

    /**
     * we never hit the cache since we dont cache
     * @return bool
     */
    public function isHit()
    {
        return false;
    }

    /**
     * Removes the current key from the cache.
     *
     * @return \Psr\Cache\ItemInterface
     *   The current item.
     */
    public function delete()
    {
        return $this;
    }

    /**
     * nope doesnt exist. ever
     * @return bool
     */
    public function exists()
    {
        return false;
    }
}