<?php
namespace Perry\Fetcher;

use Perry\Cache\CacheManager;
use Perry\Response;
use Perry\Setup;
use Perry\Tool;

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
        $opts = array(
            'http' => array(
                'method' => "GET",
            ),
            'socket' => array(
                'bindto' => Setup::$bindToIp,
            ),
        );

        if (is_null($representation)) {
            $header = "Accept-language: en\r\n";
        } else {
            $header = "Accept-language: en\r\nAccept: application/$representation+json\r\n";
        }

        $opts['http']['header'] = $header;
        return $opts;
    }

    /**
     * @param string $url
     * @param string $representation
     * @throws \Exception
     * @return \Perry\Response
     */
    public function doGetRequest($url, $representation)
    {

        if ($data = CacheManager::getInstance()->load($url)) {
            return new Response($data['value'], $data['representation']);
        }

        $context = stream_context_create($this->getOpts($representation));

        if (false === ($data = @file_get_contents($url, false, $context))) {

            if (false === $headers = (@get_headers($url, 1))) {
                throw new \Exception("could not connect to api");
            }

            throw new \Exception("an error occured with the http request: ".$headers[0]);
        } else {
            $headers = @get_headers($url, 1);
            if (isset($headers['Content-Type'])) {
                if (false !== ($retrep = Tool::parseContentTypeToRepresentation($headers['Content-Type']))) {
                    $representation = $retrep;
                }
            }

        }

        CacheManager::getInstance()->save($url, ["representation" => $representation, "value" => $data]);

        return new Response($data, $representation);
    }
}
