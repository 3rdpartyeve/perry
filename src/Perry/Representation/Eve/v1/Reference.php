<?php
namespace Perry\Representation\Eve\v1;

use Perry\Representation\Base;
use Perry\Representation\Interfaces\CanRefer;

class Reference extends Base implements CanRefer
{
    protected $_referedType;

    public function __construct($data, $referTo)
    {
        parent::__construct($data);
        $this->_referedType = $referTo;
    }

    /**
     * call method, allows references to be called
     * @param array $args
     * @return mixed
     * @throws \Exception
     */
    public function call($args = array())
    {
        $version = substr($this->_referedType, -2);
        $representation = substr($this->_referedType, 0, -3);

        $apiType = substr($representation, 0, 7) == "vnd.ccp" ? "Eve" : "OldApi";

        switch ($apiType) {
            case "Eve":
                $data = explode(".", $representation);
                array_shift($data);
                array_shift($data);
                array_shift($data);
                $classname = '\Perry\Representation\Eve\\'.$version.'\\'.$data[0];
                break;
            case "OldApi":
                $data = explode(".", $representation);
                array_shift($data);
                array_shift($data);
                array_shift($data);

                $classname = '\Perry\Representation\OldApi\\'.$version.'\\'.$data[0];
                if (count($data) > 1) {
                    $classname .= '\\'.$data[1];
                }
                break;
            default:
                throw new \Exception("wtf, what representation is this?".$this->_referedType);
        }
        return new $classname($this->doGetRequest($this->href, $this->_referedType));
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
