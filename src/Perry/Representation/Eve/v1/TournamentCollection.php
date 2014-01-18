<?php
namespace Perry\Representation\Eve\v1;

use Perry\Representation\Base;
use Perry\Setup;

class TournamentCollection extends Base
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

            $item->href = new Reference($item->href, "vnd.ccp.eve.Tournament-v1");
            $this->items[] = $item;
        }
    }

    /**
     * @return TournamentCollection
     */
    public static function getInstance()
    {
        return new TournamentCollection(
            self::doGetRequest(Setup::$CREST_URL.'/tournaments/', "vnd.ccp.eve.TournamentCollection-v1")
        );
    }
}
