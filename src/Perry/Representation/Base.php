<?php
namespace Perry\Representation;

class Base
{
    protected static $_type = null;
    protected $_members = array();

    /**
     * @param $data
     */
    public function __construct($data)
    {
        if (!is_array($data)) {
            $data = json_decode($data, true);
        }

        foreach ($data as $key => $value) {
            $method = 'set'.ucfirst($key);
            // if there is a setter method for this call the setter
            if (method_exists($this, $method)) {
                $this->{$method}($value);
            } else // otherwise we assume its primitive data
            {
                $this->_members[$key] = $value;
            }
        }
    }

    public function __get($key)
    {
        if (isset($this->_members[$key])) {
            return $this->_members[$key];
        }
        // return null (could do exception here, but that wouldn't cover for optionals
        return null;
    }


    public function getType()
    {
        if (is_null(self::$_type)) {
            throw new \Exception("Representation with unknown Name used");
        }
        return self::$_type;
    }

    public function __call($method, $args)
    {
        if (isset($this->{$method}) && $this->{$method} instanceof Interfaces\CanRefer) {
            /**
             * @var Interfaces\CanRefer $reference
             */
            $reference = $this->{$method};
            return $reference->call($args);
        } else {
            throw new \Exception("$method does not exist with this object");
        }
    }

    protected static function doGetRequest($url, $representation)
    {
        $opts = array(
            'http' => array(
                'method' => "GET",
                'header' => "Accept-language: en\r\n".
                "Accept: application/$representation+json\r\n",
            ),
        );

        $context = stream_context_create($opts);

        // error suppresion since warnings / errors can not be prevented (stupid php)
        $data = @file_get_contents($url, false, $context);
        if (false === $data) {

            // this will make a secondary request!
            $headers = @get_headers($url, 1);
            if(false === $headers) {
                throw new \Exception("could not connect to api");
            }
            throw new \Exception("an error occured with the http request: " . $headers[0]);
        }
        return $data;
    }
}