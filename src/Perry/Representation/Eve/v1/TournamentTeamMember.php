<?php
namespace Perry\Representation\Eve\v1;

use Perry\Representation\Base;

class TournamentTeamMember extends Base
{
    public $self;

    public $alliance;

    public function setSelf($self)
    {
        $this->self = new Reference($self, "vnd.ccp.eve.TournamentTeamMember-v1");
    }

    public function setAlliance($alliance)
    {
        $this->alliance = new Reference($alliance, "Dear CCP please document this representation");
    }
}