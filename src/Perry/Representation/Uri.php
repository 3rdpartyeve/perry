<?php
namespace Perry\Representation;

use Perry\Perry;
use Perry\Representation\Interfaces\CanRefer;

/**
 * Class Uri
 * @property string href
 * @package Perry\Representation\Eve\v1
 */
class Uri extends Base implements CanRefer
{
    /**
     * @var string
     */
    protected $perryReferredType = null;

    /**
     * @param array|null|object|string $inputData
     * @param string $referTo
     */
    public function __construct($inputData, $referTo = null)
    {
        // hack, because uri's look different than other references.
        $this->href = (string) $inputData;
        $this->perryReferredType = $referTo;
    }

    /**
     * call method, allows references to be called
     *
     * @param array $args
     * @return Base
     * @throws \Exception
     */
    public function call($args = array())
    {
        return Perry::fromUrl($this->href, $this->perryReferredType);
    }

    /**
     * magic method to allow calling the object as if it was a function
     *
     * @param array $args
     * @return Base
     */
    public function __invoke($args = array())
    {
        return $this->call($args);
    }

    /**
     * Magic to String
     * @return string
     */
    public function __toString()
    {
        return $this->href;
    }
}
