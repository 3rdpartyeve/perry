<?php
namespace Perry\Representation\Eve\v1;

use Perry\Representation\Base;

class TournamentTeamMemberCollection extends Base
{
    public $items = array();

    public function setItems($items)
    {
        foreach ($items as $item) {
            $item = new TournamentTeamMember($item);
            $this->items[] = $item;
        }
    }
}
