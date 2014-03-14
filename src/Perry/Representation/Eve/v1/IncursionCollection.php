<?php
namespace Perry\Representation\Eve\v1;

use Perry\Representation\Base;
use Perry\Setup;

class IncursionCollection extends Base
{
    /**
     * @var array
     */
    public $items = array();

    /**
     * @param array $items
     */
    public function setItems($items)
    {
        foreach ($items as $item) {

            $item->stagingSolarSystem = new Reference(
                $item->stagingSolarSystem,
                "Dear CCP please document this representation"
            );

            $item->constellation = new Reference($item->constellation);
            $this->items[] = $item;
        }
    }

    /**
     * @return IncursionCollection
     */
    public static function getInstance()
    {
        return new IncursionCollection(
            self::doGetRequest(Setup::$crestUrl.'/incursions/', "vnd.ccp.eve.IncursionCollection-v1")
        );
    }
}
