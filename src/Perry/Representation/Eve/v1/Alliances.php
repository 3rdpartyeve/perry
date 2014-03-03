<?php
namespace Perry\Representation\Eve\v1;

use Perry\Representation\Base;
use Perry\Setup;

/**
 * Deprecated, only here for compatibility with current CCPs SISI Build
 * this is just so the lib works before it is renamed.
 *
 * @package Perry\Representation\Eve\v1
 * @deprecated
 */
class Alliances extends Base
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
     * @return Alliances
     */
    public static function getInstance()
    {
        return new Alliances(
            self::doGetRequest(Setup::$crestUrl.'/alliances/', "vnd.ccp.eve.Alliances-v1")
        );
    }
}
