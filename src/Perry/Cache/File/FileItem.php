<?php
namespace Perry\Cache\File;

use \DateTime;
use Psr\Cache\ItemInterface;

class FileItem implements ItemInterface
{
    /**
     * @var string
     */
    private $key;

    /**
     * @var \Serializable
     */
    private $value = null;

    /**
     * @var int
     */
    private $ttl = 0;

    /**
     * @var \DateTime
     */
    private $updated;

    /**
     * @var bool
     */
    private $hit = false;

    /**
     * @var string
     */
    private $filename;


    /**
     * Returns the key for the current cache item.
     *
     * The key is loaded by the Implementing Library, but should be available to
     * the higher level callers when needed.
     *
     * @return string
     *   The key string for this cache item.
     */
    public function getKey()
    {
        return $this->key;
    }

    /**
     * Retrieves the value of the item from the cache associated with this objects key.
     *
     * The value returned must be identical to the value original stored by set().
     *
     * if isHit() returns false, this method MUST return null. Note that null
     * is a legitimate cached value, so the isHit() method SHOULD be used to
     * differentiate between "null value was found" and "no value was found."
     *
     * @return mixed
     *   The value corresponding to this cache item's key, or null if not found.
     */
    public function get()
    {
        // we hit the cache when we get the item.. so we allways return the value
        return $this->value;
    }

    /**
     * Stores a value into the cache.
     *
     * The $value argument may be any item that can be serialized by PHP,
     * although the method of serialization is left up to the Implementing
     * Library.
     *
     * Implementing Libraries MAY provide a default TTL if one is not specified.
     * If no TTL is specified and no default TTL has been set, the TTL MUST
     * be set to the maximum possible duration of the underlying storage
     * mechanism, or permanent if possible.
     *
     * @param mixed $value
     *   The serializable value to be stored.
     * @param int|DateTime $ttl
     *   - If an integer is passed, it is interpreted as the number of seconds
     *     after which the item MUST be considered expired.
     *   - If a DateTime object is passed, it is interpreted as the point in
     *     time after which the the item MUST be considered expired.
     *   - If no value is passed, a default value MAY be used. If none is set,
     *     the value should be stored permanently or for as long as the
     *     implementation allows.
     * @return bool
     *   Returns true if the item was successfully saved, or false if there was
     *   an error.
     */
    public function set($value = null, $ttl = null)
    {
        $now = new DateTime();

        // whoever came up with the idea of allowing int AND datetime...
        // so lets convert this to an int (its a time to live, not a date to delete ffs)
        if ($ttl instanceof DateTime) {
            $ttl = $ttl->getTimestamp() - $now->getTimestamp();
        }

        $data = [
            "updated" => $now,
            "value" => $value,
            "key" => $this->key,
            "ttl" => $ttl
        ];

        return false !== file_put_contents($this->filename, serialize($data));
    }

    /**
     * Confirms if the cache item lookup resulted in a cache hit.
     *
     * Note: This method MUST NOT have a race condition between calling isHit()
     * and calling get().
     *
     * @return bool
     *   True if the request resulted in a cache hit.  False otherwise.
     */
    public function isHit()
    {
        return $this->hit;
    }

    /**
     * Removes the current key from the cache.
     *
     * @return \Psr\Cache\ItemInterface
     *   The current item.
     */
    public function delete()
    {
        if (file_exists($this->filename)) {
            unlink($this->filename);
        }
        $this->hit = false;
        $this->value = null;
        return $this;
    }

    /**
     * Confirms if the cache item exists in the cache.
     *
     * Note: This method MAY avoid retrieving the cached value for performance
     * reasons, which could result in a race condition between exists() and get().
     *
     * @return bool
     *  True if item exists in the cache, false otherwise.
     */
    public function exists()
    {
        // for us its the same
        return $this->isHit();
    }

    /**
     * @param string $filename
     * @param string $key
     * @return FileItem
     */
    public static function fromFile($filename, $key)
    {
        $instance = new self();

        // those are values we already know
        $instance->filename = $filename;
        $instance->key = $key;

        if (file_exists($filename)) {

            // fopen/fread/fclose since file_get_contents seems to not close the files properly
            $fp = fopen($filename, "r");

            // if we for whatever reason can't open this file,
            // we have a cache miss
            if (false === $fp) {
                $instance->hit =false;
                return $instance;
            }

            $contents ="";
            while (!feof($fp)) {
              $contents .= fread($fp, 8192);
            }
            fclose($fp);

            $data = unserialize($contents);

            $now = new \DateTime();

            /**
             * @var \DateTime $updated
             */
            $updated = $data['updated'];

            if ($updated->getTimestamp() + $data['ttl'] >= $now->getTimestamp()) {
                $instance->value = $data['value'];
                $instance->ttl = $data['ttl'];
                $instance->updated = $data['updated'];
                $instance->hit = true;
            }
        }
        return $instance;
    }
}
