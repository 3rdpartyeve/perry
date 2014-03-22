<?php
namespace Perry\Fetcher;

use GuzzleHttp\Client;
use Perry\Cache\CacheManager;
use Perry\Response;
use Perry\Setup;
use Perry\Tool;

class GuzzleFetcher implements CanFetch
{

    /**
     * form the opts array
     *
     * @param string $representation
     * @return array
     */
    private function getOpts($representation)
    {
        $headers = [
            "Accept-language" => "en"
        ];

        if (!is_null($representation)) {
            $headers["Accept"] = "application/$representation+json";
        }

        $config =[];

        if ("0.0.0.0:0" != Setup::$bindToIp) {
            $config['curl'] = [CURLOPT_INTERFACE => Setup::$bindToIp];
        }

        return [
            "headers" => $headers,
            "config" => $config
        ];
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

        $guzzle = new Client();
        $response = $guzzle->get($url, $this->getOpts($representation));

        $data = $response->getBody();
        $data = (String) $data;

        if ($response->hasHeader("Content-Type")) {
            if (false !== ($retrep = Tool::parseContentTypeToRepresentation($response->getHeader("Content-Type")))) {
                $representation = $retrep;
            }
        }

        CacheManager::getInstance()->save($url, ["representation" => $representation, "value" => $data]);

        return new Response($data, $representation);
    }
}
