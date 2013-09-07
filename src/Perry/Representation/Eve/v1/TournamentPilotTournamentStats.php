<?php
namespace Perry\Representation\Eve\v1;

use Perry\Representation\Base;

class TournamentPilotTournamentStats extends Base
{
    public $alliance;
    public $corporation;
    public $character;
    public $matchesParticipatedIn = array();
    public $recentShips = array();

    public function setAlliance($alliance)
    {
        $this->alliance = new Reference($alliance, "Dear CCP please document this representation");
    }

    public function setCorporation($corporation)
    {
        $this->corporation = new Reference($corporation, "vnd.ccp.eve.Corporation-v1");
    }

    public function setCharacter($character)
    {
        $this->character = new Reference($character, "vnd.ccp.eve.Character-v1");
    }

    public function setMatchesParticipatedIn($matchesParticipatedIn)
    {
        foreach ($matchesParticipatedIn as $matchParticipatedIn) {
            $this->matchesParticipatedIn[] = new Reference($matchParticipatedIn, "vnd.ccp.eve.TournamentMatch");
        }
    }

    public function setRecentShips($recentShips)
    {
        foreach ($recentShips as $recentShip) {
            $this->recentShips[] = new Reference($recentShip, "Dear CCP please document this representation");
        }
    }

}
