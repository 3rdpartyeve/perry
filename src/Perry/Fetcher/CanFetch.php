<?php
namespace Perry\Fetcher;

interface CanFetch
{
    /**
     * @param string $url
     * @param string $representation
     * @return string
     */
    public function doGetRequest($url, $representation);
}