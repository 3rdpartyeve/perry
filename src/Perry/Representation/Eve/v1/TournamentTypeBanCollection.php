<?php
namespace Perry\Representation\Eve\v1;

use Perry\Representation\Base;

class TournamentTypeBanCollection extends Base
{
    public $items = array();

    /**
     * @param array|object $items
     */
    public function setItems($items)
    {
        foreach ($items as $item) {
            $item->bannedBy = new Reference($item->bannedBy, "vnd.ccp.eve.TournamentTeam-v1");
            $this->items[] = $item;
        }
    }
}
