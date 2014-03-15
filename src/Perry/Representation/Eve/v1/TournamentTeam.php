<?php
namespace Perry\Representation\Eve\v1;


use Perry\Representation\Base;
use Perry\Representation\Reference;

class TournamentTeam extends Base
{
    /**
     * @var array
     */
    public $banFrequencyAgainst = array();

    /**
     * @var array
     */
    public $pilots = array();

    /**
     * @var array
     */
    public $matches = array();

    /**
     * @var array
     */
    public $banFrequency = array();

    /**
     * @var Reference
     */
    public $members;

    /**
     * @var Reference
     */
    public $captain;

    /**
     * @param array $banFrequency
     */
    public function setBanFrequency($banFrequency)
    {
        foreach ($banFrequency as $item) {
            $item->shipType = new Reference($item->shipType);
            $this->banFrequency[] = $item;
        }
    }

    /**
     * @param array $banFrequencyAgainst
     */
    public function setBanFrequencyAgainst($banFrequencyAgainst)
    {
        foreach ($banFrequencyAgainst as $item) {
            $item->shipType = new Reference($item->shipType);
            $this->banFrequencyAgainst[] = $item;
        }
    }

    /**
     * @param array $captain
     */
    public function setCaptain($captain)
    {
        $this->captain = new Reference($captain, "vnd.ccp.eve.Character-v1");
    }

    /**
     * @param array $matches
     */
    public function setMatches($matches)
    {
        foreach ($matches as $match) {
            $this->matches[] = new Reference($match, "vnd.ccp.eve.TournamentMatch-v1");
        }

    }

    /**
     * @param array $members
     */
    public function setMembers($members)
    {
        $this->members = new Reference($members, "vnd.ccp.eve.TournamentTeamMemberCollection-v1");
    }

    /**
     * @param array $pilots
     */
    public function setPilots($pilots)
    {
        foreach ($pilots as $pilot) {
            $this->pilots[] = new Reference($pilot, "vnd.ccp.eve.Character-v1");
        }
    }
}
