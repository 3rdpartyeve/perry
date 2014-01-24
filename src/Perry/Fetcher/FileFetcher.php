<?php
namespace Perry\Fetcher;

use Perry\Setup;

class FileFetcher implements CanFetch
{

    /**
     * form the opts array
     *
     * @param string $representation
     * @return array
     */
    private function getOpts($representation)
    {
        return array(
            'http' => array(
                'method' => "GET",
                'header' => "Accept-language: en\r\n".
                    "Accept: application/$representation+json\r\n",
            ),
            'socket' => [
                'bindto' => Setup::$bindToIp
            ]
        );

    }

    /**
     * @param string $url
     * @param string $representation
     * @throws \Exception
     * @return string
     */
    public function doGetRequest($url, $representation)
    {

        $context = stream_context_create($this->getOpts($representation));

        if (false === ($data = @file_get_contents($url, false, $context))) {

            if (false === $headers = (@get_headers($url, 1))) {
                throw new \Exception("could not connect to api");
            }

            throw new \Exception("an error occured with the http request: ".$headers[0]);
        }

        return $data;
    }
}
