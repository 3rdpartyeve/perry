<?php
namespace Perry\Representation\Eve\v1;

use Perry\Representation\Base;
use Perry\Representation\Reference;

class TournamentSeriesCollection extends Base
{
    public $items = array();

    /**
     * @param array|object $items
     */
    public function setItems($items)
    {
        foreach ($items as $item) {
            $item = new TournamentSeries($item);
            $this->items[] = $item;
        }
    }
}
