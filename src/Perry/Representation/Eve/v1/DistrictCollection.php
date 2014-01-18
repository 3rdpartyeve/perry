<?php
namespace Perry\Representation\Eve\v1;

use Perry\Representation\Base;
use Perry\Setup;

class DistrictCollection extends Base
{
    public $items = array();

    /**
     * @param array $items
     */
    public function setItems($items)
    {
        foreach ($items as $item) {
            $this->items[] = new District($item);
        }
    }

    /**
     * @return DistrictCollection
     */
    public static function getInstance()
    {
        return new DistrictCollection(
            self::doGetRequest(Setup::$CREST_URL.'/districts/', "vnd.ccp.eve.DistrictCollection-v1")
        );
    }
}
