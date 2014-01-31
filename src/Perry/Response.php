<?php
namespace Perry;

class Response
{
    /**
     * @var string the serialized data of the response
     */
    public $data;

    /**
     * @var string the representation to be used
     */
    public $representation;

    /**
     * @param string $data
     * @param string $representation
     */
    public function __construct($data, $representation)
    {
        $this->data = $data;
        $this->representation = $representation;
    }

    /**
     * convert object to string (return the data)
     * @return string
     */
    public function __toString()
    {
        return $this->data;
    }
}
