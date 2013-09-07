<?php
namespace Perry\Representation\Eve\v1;

use Perry\Representation\Base;

class TournamentSeriesCollection extends Base
{
    public $items = array();

    public function setItems($items)
    {
        foreach ($items as $item) {
            $item = new TournamentSeries($item);
            $this->items[] = $item;
        }
    }
}
