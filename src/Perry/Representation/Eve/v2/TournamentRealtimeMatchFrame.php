<?php
namespace Perry\Representation\Eve\v2;

use Perry\Representation\Base;
use Perry\Representation\Eve\v1\Reference;

class TournamentRealtimeMatchFrame extends Base
{
    /**
     * @var array
     */
    public $redTeamShipData = array();
    /**
     * @var array
     */
    public $blueTeamShipData = array();
    /**
     * @var Reference
     */
    public $prevFrame;
    /**
     * @var Reference
     */
    public $nextFrame;

    /**
     * @param \stdClass $frame
     */
    public function setPrevFrame($frame)
    {
        $this->prevFrame = new Reference($frame, "vnd.ccp.eve.TournamentRealtimeMatchFrame-v2");
    }

    /**
     * @param \stdClass $frame
     */
    public function setNextFrame($frame)
    {
        $this->nextFrame = new Reference($frame, "vnd.ccp.eve.TournamentRealtimeMatchFrame-v2");
    }

    /**
     * @param array $data
     */
    public function setRedTeamShipData($data)
    {
        foreach ($data as $ship) {
            $ship = $this->handleShip($ship);
            $this->redTeamShipData[] = $ship;
        }
    }

    /**
     * @param \stdClass $shipData
     * @return \stdClass
     */
    protected function handleShip($shipData)
    {
        // itemRef
        $shipData->itemRef = new Reference($shipData->itemRef, "Dear CCP please document this representation");

        // drones
        if (isset($shipData->drones) && !is_null($shipData->drones)) {
            foreach ($shipData->drones as $dkey => $drone) {
                $drone->type = new Reference($drone->type, "Dear CCP please document this representation");
                $shipData->drones[$dkey] = $drone;
            }
        }

        return $shipData;
    }

    /**
     * @param array $data
     */
    public function setBlueTeamShipData($data)
    {
        foreach ($data as $ship) {
            $ship = $this->handleShip($ship);
            $this->blueTeamShipData[] = $ship;
        }
    }
}
