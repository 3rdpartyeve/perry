<?php
namespace Perry\Representation\Eve\v1;

use Perry\Representation\Base;
use Perry\Representation\Reference;

class TournamentPilotStatsCollection extends Base
{
    public $items = array();

    /**
     * @param array|object $items
     */
    public function setItems($items)
    {
        foreach ($items as $item) {
            $item->pilotTournamentStats = new Reference(
                $item->pilotTournamentStats,
                "vnd.ccp.eve.TournamentPilotTournamentStats-v1"
            );
            $item->shipType = new Reference($item->shipType);
            $item->team = new Reference($item->team, "vnd.ccp.eve.TournamentTeam-v1");
            $item->pilot = new Reference($item->pilot, "vnd.ccp.eve.Character-v1");
            $this->items[] = $item;
        }
    }
}
