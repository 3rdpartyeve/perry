<?php
namespace Perry\Representation\Eve\v1;

use Perry\Representation\Base;
use Perry\Setup;

class DistrictCollection extends Base
{
    protected static $_type = "vnd.ccp.eve.DistrictCollection-v1";

    public $items = array();

    /**
     * @param array $items
     */
    public function setItems(array $items)
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
        return new DistrictCollection(self::doGetRequest(Setup::CREST_URL .'/districts/', self::$_type));
    }

}
