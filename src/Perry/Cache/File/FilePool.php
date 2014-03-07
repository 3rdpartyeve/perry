<?php

namespace Perry\Cache\File;

use Psr\Cache\PoolInterface;

class FilePool implements PoolInterface
{
    /**
     * @var string
     */
    private $path;

    /**
     * @param string $path
     * @throws \Exception
     */
    public function __construct($path)
    {
        if (!file_exists($path) && !mkdir($path)) {
            throw new \Exception("does not exist, and can not be created");
        }

        if (!is_dir($path) || !is_writable($path)) {
            throw new \Exception("$path is no directory, or can't be written to");
        }

        $this->path = $path;
    }


    /**
     * Returns a Cache Item representing the specified key.
     *
     * This method must always return an ItemInterface object, even in case of
     * a cache miss. It MUST NOT return null.
     *
     * @param string $key
     *   The key for which to return the corresponding Cache Item.
     * @return \Psr\Cache\ItemInterface
     *   The corresponding Cache Item.
     * @throws \Psr\Cache\InvalidArgumentException
     *   If the $key string is not a legal value a \Psr\Cache\InvalidArgumentException
     *   MUST be thrown.
     */
    public function getItem($key)
    {
        // no check for legality atm, since we can use everything as a key
        // usually you want that to reflect the limitations put in place by psr-6
        $map = self::mapKey($key);

        if (!file_exists($this->path .'/'. $map['dir'])) {
            mkdir($this->path .'/'. $map['dir']);
        }

        return FileItem::fromFile($this->path .'/'. $map['dir'] . '/' . $map['file'], $key);
    }

    /**
     * Returns a traversable set of cache items.
     *
     * @param array $keys
     *   An indexed array of keys of items to retrieve.
     * @return \Traversable
     *   A traversable collection of Cache Items in the same order as the $keys
     *   parameter, keyed by the cache keys of each item. If no items are found
     *   an empty Traversable collection will be returned.
     */
    public function getItems(array $keys)
    {
        $result = array();

        foreach ($keys as $key) {
            $result[$key] = $this->getItem($key);
        }

        return $result;
    }

    /**
     * Deletes all items in the pool.
     *
     * @return \Psr\Cache\PoolInterface
     *   The current pool.
     */
    public function clear()
    {
        // we don't clear the files atm
        return $this;
    }

    /**
     * @param $key
     * @return string
     */
    public static function mapKey($key)
    {
        $key = sha1($key);

        // we will use the first 4 as directory
        // to prevent issues on some filesystems
        return [
            "file" => substr($key, 4),
            "dir" => substr($key, 0, 4)
        ];
    }
}
