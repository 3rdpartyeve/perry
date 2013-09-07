<?php
namespace Perry\Representation\Eve\v1;

use Perry\Representation\Base;

class TournamentSeries extends Base
{

    public $redTeam;
    public $blueTeam;
    public $winner;
    public $loser;
    public $structure;
    public $matches;
    public $self;

    /**
     * @param mixed $blueTeam
     */
    public function setBlueTeam($blueTeam)
    {
        $blueTeam->team = new Reference($blueTeam->team, "vnd.ccp.eve.TournamentTeam-v1");
        $this->blueTeam = $blueTeam;
    }

    /**
     * @param mixed $loser
     */
    public function setLoser($loser)
    {
        $loser->team = new Reference($loser->team, "vnd.ccp.eve.TournamentTeam-v1");
        $this->loser = $loser;
    }

    /**
     * @param mixed $matches
     */
    public function setMatches($matches)
    {
        $this->matches = new Reference($matches, "vnd.ccp.eve.TournamentMatchCollection-v1");
    }

    /**
     * @param mixed $redTeam
     */
    public function setRedTeam($redTeam)
    {
        $redTeam->team = new Reference($redTeam->team, "vnd.ccp.eve.TournamentTeam-v1");
        $this->redTeam = $redTeam;
    }

    /**
     * @param mixed $self
     */
    public function setSelf($self)
    {
        $this->self = new Reference($self, "vnd.ccp.eve.TournamentSeries-v1");
        $this->self = $self;
    }

    /**
     * @param mixed $structure
     */
    public function setStructure($structure)
    {
        if (isset($structure->outgoingLoser)) {
            $structure->outgoingLoser = new Reference($structure->outgoingLoser, "vnd.ccp.eve.TournamentSeries-v1");
        }
        if (isset($structure->outgoingWinner)) {
            $structure->outgoingWinner = new Reference($structure->outgoingWinner, "vnd.ccp.eve.TournamentSeries-v1");
        }
        if (isset($structure->incomingRed)) {
            $structure->incomingRed = new Reference($structure->incomingRed, "vnd.ccp.eve.TournamentSeries-v1");
        }
        if (isset($structure->incomingBlue)) {
            $structure->incomingBlue = new Reference($structure->incomingBlue, "vnd.ccp.eve.TournamentSeries-v1");
        }
        $this->structure = $structure;
    }

    /**
     * @param mixed $winner
     */
    public function setWinner($winner)
    {
        $winner->team = new Reference($winner->team, "vnd.ccp.eve.TournamentTeam-v1");
        $this->winner = $winner;
    }
}
