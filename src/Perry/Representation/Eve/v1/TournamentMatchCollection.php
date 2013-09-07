<?php
namespace Perry\Representation\Eve\v1;

use Perry\Representation\Base;

class TournamentMatchCollection extends Base
{
    public $items = array();

    public function setItems($items)
    {
        foreach ($items as $item) {
            $this->items[] = new TournamentMatch($item);
        }
    }
}