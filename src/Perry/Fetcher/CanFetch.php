<?php
namespace Perry\Fetcher;

interface CanFetch
{
    /**
     * @param string $url
     * @param string $representation
     * @return \Perry\Response
     */
    public function doGetRequest($url, $representation);
}
