<?php
namespace Perry\Representation\Eve\v1;

use Perry\Representation\Base;

class TournamentMatch extends Base
{
    public $winner;
    public $redTeam;
    public $blueTeam;
    public $stats;
    public $series;
    public $tournament;
    public $bans;

    public function setWinner($winner)
    {
        $this->winner = new Reference($winner, "vnd.ccp.eve.TournamentTeam-v1");
    }

    public function setRedTeam($redTeam)
    {
        $this->redTeam = new Reference($redTeam, "vnd.ccp.eve.TournamentTeam-v1");
    }

    public function setBlueTeam($blueTeam)
    {
        $this->blueTeam = new Reference($blueTeam, "vnd.ccp.eve.TournamentTeam-v1");
    }

    public function setStats($stats)
    {
        $stats->pilots = new Reference($stats->pilots, "vnd.ccp.eve.TournamentPilotStatsCollection-v1");
        $this->stats = $stats;
    }

    public function setSeries($series)
    {
        $this->series = new Reference($series, "vnd.ccp.eve.TournamentSeries-v1");
    }

    public function setTournament($tournament)
    {
        $this->tournament = new Reference($tournament, "vnd.ccp.eve.TournamentCollection-v1");
    }

    public function setBans($bans)
    {
        $bans->self = new Reference($bans->self, "vnd.ccp.eve.TournamentTypeBanCollection-v1");

        $redTeam = array();
        foreach($bans->redTeam as $ban) {
            $ban->bannedBy = new Reference($ban->bannedBy, "vnd.ccp.eve.TournamentTeam-v1");
            $redTeam[] = $ban;
        }
        $bans->redTeam = $redTeam;

        $blueTeam = array();
        foreach($bans->blueTeam as $ban) {
            $ban->bannedBy = new Reference($ban->bannedBy, "vnd.ccp.eve.TournamentTeam-v1");
            $blueTeam[] = $ban;
        }
        $bans->blueTeam = $blueTeam;

        $this->bans = $bans;

    }
}
