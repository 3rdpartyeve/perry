<?php
namespace Perry\Representation\Eve\v1;

use Perry\Representation\Base;
use Perry\Setup;

class AllianceCollection extends Base
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

            $item->href = new Reference($item->href, "vnd.ccp.eve.Alliance-v1");
            $this->items[] = $item;
        }
    }

    /**
     * @return AllianceCollection
     */
    public static function getInstance()
    {
        return new AllianceCollection(
            self::doGetRequest(Setup::$crestUrl.'/alliances/', "vnd.ccp.eve.AllianceCollection-v1")
        );
    }
}
