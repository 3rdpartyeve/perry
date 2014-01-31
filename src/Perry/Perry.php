<?php
namespace Perry;

class Perry
{
    /**
     * @param $url
     * @param null $representation
     * @return \Perry\Representation\Base
     */
    public static function fromUrl($url, $representation = null)
    {
        $data = Setup::getInstance()->fetcher->doGetRequest($url, $representation);
        $classname = Tool::parseRepresentationToClass($data->representation);

        return new $classname($data);
    }
}
