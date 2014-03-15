<?php
namespace Perry\Representation;

use Perry\Perry;
use Perry\Representation\Interfaces\CanRefer;

/**
 * Class Reference
 * @property string href
 * @package Perry\Representation\Eve\v1
 */
class Reference extends Base implements CanRefer
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
        parent::__construct($inputData);
        $this->perryReferredType = $referTo;
    }

    /**
     * call method, allows references to be called
     *
     * @param array $args
     * @return mixed
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
     * @return mixed
     */
    public function __invoke($args = array())
    {
        return $this->call($args);
    }
}
