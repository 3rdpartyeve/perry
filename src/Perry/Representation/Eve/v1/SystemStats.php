<?php
namespace Perry\Representation\Eve\v1;

use \Perry\Representation\Reference as Reference;
use \Perry\Representation\Uri as Uri;
use \Perry\Representation\Base as Base;

class SystemStats extends Base
{
    public $jumpsLast24Hours;

    public $href;

    public $shipsDestroyedLast24Hours;

    public $pilotsInSpace;

    public $stationCount;

    // by Warringer\Types\Long
    public function setJumpsLast24Hours($jumpsLast24Hours)
    {
        $this->jumpsLast24Hours = $jumpsLast24Hours;
    }

    // by Warringer\Types\Uri
    public function setHref($href)
    {
        $this->href = new Uri($href);
    }

    // by Warringer\Types\Long
    public function setShipsDestroyedLast24Hours($shipsDestroyedLast24Hours)
    {
        $this->shipsDestroyedLast24Hours = $shipsDestroyedLast24Hours;
    }

    // by Warringer\Types\Long
    public function setPilotsInSpace($pilotsInSpace)
    {
        $this->pilotsInSpace = $pilotsInSpace;
    }

    // by Warringer\Types\Long
    public function setStationCount($stationCount)
    {
        $this->stationCount = $stationCount;
    }

}
