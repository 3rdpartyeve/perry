<?php
namespace Perry\Representation\Eve\v1;

use Perry\Representation\Base;

class Tournament extends Base
{
    /**
     * @var Reference
     */
    public $series;

    /**
     * @var array
     */
    public $entries = array();

    /**
     * @param array $entries
     */
    public function setEntries($entries)
    {
        foreach ($entries as $entry) {
            $item = new Reference($entry, "vnd.ccp.eve.TournamentTeam-v1");
            $item->teamStats = new Reference($item->teamStats, "vnd.ccp.eve.TournamentTeam-v1");
            $this->entries[] = $item;
        }

    }

    /**
     * @param array $series
     */
    public function setSeries($series)
    {
        $this->series = new Reference($series, "vnd.ccp.eve.TournamentSeriesCollection-v1");
    }
}
