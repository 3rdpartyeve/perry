<?php
namespace Perry\Representation\Eve\v2;

use \Perry\Representation\Reference as Reference;
use \Perry\Representation\Base as Base;

class TournamentRealtimeMatchFrame extends Base
{
    public $redTeamShipData = [];

    public $blueTeamShipData = [];

    public $blueTeamFleetAttributes;

    public $frameNum;

    public $tidiFactor;

    public $time;

    public $redTeamFleetAttributes;

    public $prevFrame;

    public $nextFrame;

    // by Warringer\Types\ArrayType
    public function setRedTeamShipData($redTeamShipData)
    {
        // by Warringer\Types\Base
        $converters = [];
        $converters['physicsData'] = function ($value) { return $value; };
        $converters['missiles'] = function ($values) {
        // by Warringer\Types\Dict
        $converters = [];
        $converters['itemID'] = function ($value) { return $value; };
        $converters['physicsData'] = function ($value) { return $value; };
        $converters['type'] = function ($value) { return new Reference($value); };

        $func = function ($value) use($converters) {
            $return = new \ArrayObject($value, \ArrayObject::ARRAY_AS_PROPS);
            $return['itemID'] = isset($value->{'itemID'}) ? $converters['itemID']($value->{'itemID'}) : null;
            $return['physicsData'] = isset($value->{'physicsData'}) ? $converters['physicsData']($value->{'physicsData'}) : null;
            $return['type'] = isset($value->{'type'}) ? $converters['type']($value->{'type'}) : null;
            return $return;
        };

            foreach ($values as $key => $value) {
                 $values[$key] = $func($value);
            }
           return $values;
        };

        $converters['shield'] = function ($value) { return $value; };
        $converters['itemRef'] = function ($value) { return new Reference($value); };
        $converters['armor'] = function ($value) { return $value; };
        $converters['effects'] = function ($values) {
        // by Warringer\Types\Base
        $converters = [];
        $converters['ammoGraphicResource'] = function ($value) { return new Reference($value); };
        $converters['targetID'] = function ($value) { return $value; };
        $converters['modules'] = function ($values) {
        // by Warringer\Types\Dict
        $converters = [];
        $converters['moduleID'] = function ($value) { return $value; };

        $func = function ($value) use($converters) {
            $return = new \ArrayObject($value, \ArrayObject::ARRAY_AS_PROPS);
            $return['moduleID'] = isset($value->{'moduleID'}) ? $converters['moduleID']($value->{'moduleID'}) : null;
            return $return;
        };

            foreach ($values as $key => $value) {
                 $values[$key] = $func($value);
            }
           return $values;
        };

        $converters['effectName'] = function ($value) { return $value; };
        $converters['startTime'] = function ($value) { return $value; };
        $converters['duration'] = function ($value) { return $value; };
        $converters['guid'] = function ($value) { return $value; };

        $func = function ($value) use($converters) {
            $return = new \ArrayObject($value, \ArrayObject::ARRAY_AS_PROPS);
            $return['ammoGraphicResource'] = isset($value->{'ammoGraphicResource'}) ? $converters['ammoGraphicResource']($value->{'ammoGraphicResource'}) : null;
            $return['targetID'] = isset($value->{'targetID'}) ? $converters['targetID']($value->{'targetID'}) : null;
            $return['modules'] = isset($value->{'modules'}) ? $converters['modules']($value->{'modules'}) : null;
            $return['effectName'] = isset($value->{'effectName'}) ? $converters['effectName']($value->{'effectName'}) : null;
            $return['startTime'] = isset($value->{'startTime'}) ? $converters['startTime']($value->{'startTime'}) : null;
            $return['duration'] = isset($value->{'duration'}) ? $converters['duration']($value->{'duration'}) : null;
            $return['guid'] = isset($value->{'guid'}) ? $converters['guid']($value->{'guid'}) : null;
            return $return;
        };

            foreach ($values as $key => $value) {
                 $values[$key] = $func($value);
            }
           return $values;
        };

        $converters['drones'] = function ($values) {
        // by Warringer\Types\Dict
        $converters = [];
        $converters['itemID'] = function ($value) { return $value; };
        $converters['physicsData'] = function ($value) { return $value; };
        $converters['type'] = function ($value) { return new Reference($value); };
        $converters['effects'] = function ($values) {
        // by Warringer\Types\Base
        $converters = [];
        $converters['ammoGraphicResource'] = function ($value) { return new Reference($value); };
        $converters['targetID'] = function ($value) { return $value; };
        $converters['modules'] = function ($values) {
        // by Warringer\Types\Dict
        $converters = [];
        $converters['moduleID'] = function ($value) { return $value; };

        $func = function ($value) use($converters) {
            $return = new \ArrayObject($value, \ArrayObject::ARRAY_AS_PROPS);
            $return['moduleID'] = isset($value->{'moduleID'}) ? $converters['moduleID']($value->{'moduleID'}) : null;
            return $return;
        };

            foreach ($values as $key => $value) {
                 $values[$key] = $func($value);
            }
           return $values;
        };

        $converters['effectName'] = function ($value) { return $value; };
        $converters['startTime'] = function ($value) { return $value; };
        $converters['duration'] = function ($value) { return $value; };
        $converters['guid'] = function ($value) { return $value; };

        $func = function ($value) use($converters) {
            $return = new \ArrayObject($value, \ArrayObject::ARRAY_AS_PROPS);
            $return['ammoGraphicResource'] = isset($value->{'ammoGraphicResource'}) ? $converters['ammoGraphicResource']($value->{'ammoGraphicResource'}) : null;
            $return['targetID'] = isset($value->{'targetID'}) ? $converters['targetID']($value->{'targetID'}) : null;
            $return['modules'] = isset($value->{'modules'}) ? $converters['modules']($value->{'modules'}) : null;
            $return['effectName'] = isset($value->{'effectName'}) ? $converters['effectName']($value->{'effectName'}) : null;
            $return['startTime'] = isset($value->{'startTime'}) ? $converters['startTime']($value->{'startTime'}) : null;
            $return['duration'] = isset($value->{'duration'}) ? $converters['duration']($value->{'duration'}) : null;
            $return['guid'] = isset($value->{'guid'}) ? $converters['guid']($value->{'guid'}) : null;
            return $return;
        };

            foreach ($values as $key => $value) {
                 $values[$key] = $func($value);
            }
           return $values;
        };


        $func = function ($value) use($converters) {
            $return = new \ArrayObject($value, \ArrayObject::ARRAY_AS_PROPS);
            $return['itemID'] = isset($value->{'itemID'}) ? $converters['itemID']($value->{'itemID'}) : null;
            $return['physicsData'] = isset($value->{'physicsData'}) ? $converters['physicsData']($value->{'physicsData'}) : null;
            $return['type'] = isset($value->{'type'}) ? $converters['type']($value->{'type'}) : null;
            $return['effects'] = isset($value->{'effects'}) ? $converters['effects']($value->{'effects'}) : null;
            return $return;
        };

            foreach ($values as $key => $value) {
                 $values[$key] = $func($value);
            }
           return $values;
        };

        $converters['structure'] = function ($value) { return $value; };

        $func = function ($value) use($converters) {
            $return = new \ArrayObject($value, \ArrayObject::ARRAY_AS_PROPS);
            $return['physicsData'] = isset($value->{'physicsData'}) ? $converters['physicsData']($value->{'physicsData'}) : null;
            $return['missiles'] = isset($value->{'missiles'}) ? $converters['missiles']($value->{'missiles'}) : null;
            $return['shield'] = isset($value->{'shield'}) ? $converters['shield']($value->{'shield'}) : null;
            $return['itemRef'] = isset($value->{'itemRef'}) ? $converters['itemRef']($value->{'itemRef'}) : null;
            $return['armor'] = isset($value->{'armor'}) ? $converters['armor']($value->{'armor'}) : null;
            $return['effects'] = isset($value->{'effects'}) ? $converters['effects']($value->{'effects'}) : null;
            $return['drones'] = isset($value->{'drones'}) ? $converters['drones']($value->{'drones'}) : null;
            $return['structure'] = isset($value->{'structure'}) ? $converters['structure']($value->{'structure'}) : null;
            return $return;
        };

        foreach ($redTeamShipData as $key => $value) {
            $this->redTeamShipData[$key] = $func($value);
        }
    }

    // by Warringer\Types\ArrayType
    public function setBlueTeamShipData($blueTeamShipData)
    {
        // by Warringer\Types\Base
        $converters = [];
        $converters['physicsData'] = function ($value) { return $value; };
        $converters['missiles'] = function ($values) {
        // by Warringer\Types\Dict
        $converters = [];
        $converters['itemID'] = function ($value) { return $value; };
        $converters['physicsData'] = function ($value) { return $value; };
        $converters['type'] = function ($value) { return new Reference($value); };

        $func = function ($value) use($converters) {
            $return = new \ArrayObject($value, \ArrayObject::ARRAY_AS_PROPS);
            $return['itemID'] = isset($value->{'itemID'}) ? $converters['itemID']($value->{'itemID'}) : null;
            $return['physicsData'] = isset($value->{'physicsData'}) ? $converters['physicsData']($value->{'physicsData'}) : null;
            $return['type'] = isset($value->{'type'}) ? $converters['type']($value->{'type'}) : null;
            return $return;
        };

            foreach ($values as $key => $value) {
                 $values[$key] = $func($value);
            }
           return $values;
        };

        $converters['shield'] = function ($value) { return $value; };
        $converters['itemRef'] = function ($value) { return new Reference($value); };
        $converters['armor'] = function ($value) { return $value; };
        $converters['effects'] = function ($values) {
        // by Warringer\Types\Base
        $converters = [];
        $converters['ammoGraphicResource'] = function ($value) { return new Reference($value); };
        $converters['targetID'] = function ($value) { return $value; };
        $converters['modules'] = function ($values) {
        // by Warringer\Types\Dict
        $converters = [];
        $converters['moduleID'] = function ($value) { return $value; };

        $func = function ($value) use($converters) {
            $return = new \ArrayObject($value, \ArrayObject::ARRAY_AS_PROPS);
            $return['moduleID'] = isset($value->{'moduleID'}) ? $converters['moduleID']($value->{'moduleID'}) : null;
            return $return;
        };

            foreach ($values as $key => $value) {
                 $values[$key] = $func($value);
            }
           return $values;
        };

        $converters['effectName'] = function ($value) { return $value; };
        $converters['startTime'] = function ($value) { return $value; };
        $converters['duration'] = function ($value) { return $value; };
        $converters['guid'] = function ($value) { return $value; };

        $func = function ($value) use($converters) {
            $return = new \ArrayObject($value, \ArrayObject::ARRAY_AS_PROPS);
            $return['ammoGraphicResource'] = isset($value->{'ammoGraphicResource'}) ? $converters['ammoGraphicResource']($value->{'ammoGraphicResource'}) : null;
            $return['targetID'] = isset($value->{'targetID'}) ? $converters['targetID']($value->{'targetID'}) : null;
            $return['modules'] = isset($value->{'modules'}) ? $converters['modules']($value->{'modules'}) : null;
            $return['effectName'] = isset($value->{'effectName'}) ? $converters['effectName']($value->{'effectName'}) : null;
            $return['startTime'] = isset($value->{'startTime'}) ? $converters['startTime']($value->{'startTime'}) : null;
            $return['duration'] = isset($value->{'duration'}) ? $converters['duration']($value->{'duration'}) : null;
            $return['guid'] = isset($value->{'guid'}) ? $converters['guid']($value->{'guid'}) : null;
            return $return;
        };

            foreach ($values as $key => $value) {
                 $values[$key] = $func($value);
            }
           return $values;
        };

        $converters['drones'] = function ($values) {
        // by Warringer\Types\Dict
        $converters = [];
        $converters['itemID'] = function ($value) { return $value; };
        $converters['physicsData'] = function ($value) { return $value; };
        $converters['type'] = function ($value) { return new Reference($value); };
        $converters['effects'] = function ($values) {
        // by Warringer\Types\Base
        $converters = [];
        $converters['ammoGraphicResource'] = function ($value) { return new Reference($value); };
        $converters['targetID'] = function ($value) { return $value; };
        $converters['modules'] = function ($values) {
        // by Warringer\Types\Dict
        $converters = [];
        $converters['moduleID'] = function ($value) { return $value; };

        $func = function ($value) use($converters) {
            $return = new \ArrayObject($value, \ArrayObject::ARRAY_AS_PROPS);
            $return['moduleID'] = isset($value->{'moduleID'}) ? $converters['moduleID']($value->{'moduleID'}) : null;
            return $return;
        };

            foreach ($values as $key => $value) {
                 $values[$key] = $func($value);
            }
           return $values;
        };

        $converters['effectName'] = function ($value) { return $value; };
        $converters['startTime'] = function ($value) { return $value; };
        $converters['duration'] = function ($value) { return $value; };
        $converters['guid'] = function ($value) { return $value; };

        $func = function ($value) use($converters) {
            $return = new \ArrayObject($value, \ArrayObject::ARRAY_AS_PROPS);
            $return['ammoGraphicResource'] = isset($value->{'ammoGraphicResource'}) ? $converters['ammoGraphicResource']($value->{'ammoGraphicResource'}) : null;
            $return['targetID'] = isset($value->{'targetID'}) ? $converters['targetID']($value->{'targetID'}) : null;
            $return['modules'] = isset($value->{'modules'}) ? $converters['modules']($value->{'modules'}) : null;
            $return['effectName'] = isset($value->{'effectName'}) ? $converters['effectName']($value->{'effectName'}) : null;
            $return['startTime'] = isset($value->{'startTime'}) ? $converters['startTime']($value->{'startTime'}) : null;
            $return['duration'] = isset($value->{'duration'}) ? $converters['duration']($value->{'duration'}) : null;
            $return['guid'] = isset($value->{'guid'}) ? $converters['guid']($value->{'guid'}) : null;
            return $return;
        };

            foreach ($values as $key => $value) {
                 $values[$key] = $func($value);
            }
           return $values;
        };


        $func = function ($value) use($converters) {
            $return = new \ArrayObject($value, \ArrayObject::ARRAY_AS_PROPS);
            $return['itemID'] = isset($value->{'itemID'}) ? $converters['itemID']($value->{'itemID'}) : null;
            $return['physicsData'] = isset($value->{'physicsData'}) ? $converters['physicsData']($value->{'physicsData'}) : null;
            $return['type'] = isset($value->{'type'}) ? $converters['type']($value->{'type'}) : null;
            $return['effects'] = isset($value->{'effects'}) ? $converters['effects']($value->{'effects'}) : null;
            return $return;
        };

            foreach ($values as $key => $value) {
                 $values[$key] = $func($value);
            }
           return $values;
        };

        $converters['structure'] = function ($value) { return $value; };

        $func = function ($value) use($converters) {
            $return = new \ArrayObject($value, \ArrayObject::ARRAY_AS_PROPS);
            $return['physicsData'] = isset($value->{'physicsData'}) ? $converters['physicsData']($value->{'physicsData'}) : null;
            $return['missiles'] = isset($value->{'missiles'}) ? $converters['missiles']($value->{'missiles'}) : null;
            $return['shield'] = isset($value->{'shield'}) ? $converters['shield']($value->{'shield'}) : null;
            $return['itemRef'] = isset($value->{'itemRef'}) ? $converters['itemRef']($value->{'itemRef'}) : null;
            $return['armor'] = isset($value->{'armor'}) ? $converters['armor']($value->{'armor'}) : null;
            $return['effects'] = isset($value->{'effects'}) ? $converters['effects']($value->{'effects'}) : null;
            $return['drones'] = isset($value->{'drones'}) ? $converters['drones']($value->{'drones'}) : null;
            $return['structure'] = isset($value->{'structure'}) ? $converters['structure']($value->{'structure'}) : null;
            return $return;
        };

        foreach ($blueTeamShipData as $key => $value) {
            $this->blueTeamShipData[$key] = $func($value);
        }
    }

    // by Warringer\Types\Dict
    public function setBlueTeamFleetAttributes($blueTeamFleetAttributes)
    {
        // by Warringer\Types\Dict
        $converters = [];
        $converters['totalEHP'] = function ($value) { return $value; };
        $converters['maxControl'] = function ($value) { return $value; };
        $converters['totalReps'] = function ($value) { return $value; };
        $converters['appliedDPS'] = function ($value) { return $value; };
        $converters['appliedControl'] = function ($value) { return $value; };
        $converters['maxDPS'] = function ($value) { return $value; };

        $func = function ($value) use($converters) {
            $return = new \ArrayObject($value, \ArrayObject::ARRAY_AS_PROPS);
            $return['totalEHP'] = isset($value->{'totalEHP'}) ? $converters['totalEHP']($value->{'totalEHP'}) : null;
            $return['maxControl'] = isset($value->{'maxControl'}) ? $converters['maxControl']($value->{'maxControl'}) : null;
            $return['totalReps'] = isset($value->{'totalReps'}) ? $converters['totalReps']($value->{'totalReps'}) : null;
            $return['appliedDPS'] = isset($value->{'appliedDPS'}) ? $converters['appliedDPS']($value->{'appliedDPS'}) : null;
            $return['appliedControl'] = isset($value->{'appliedControl'}) ? $converters['appliedControl']($value->{'appliedControl'}) : null;
            $return['maxDPS'] = isset($value->{'maxDPS'}) ? $converters['maxDPS']($value->{'maxDPS'}) : null;
            return $return;
        };
        $this->blueTeamFleetAttributes = $func($blueTeamFleetAttributes);
    }

    // by Warringer\Types\Long
    public function setFrameNum($frameNum)
    {
        $this->frameNum = $frameNum;
    }

    // by Warringer\Types\Base
    public function setTidiFactor($tidiFactor)
    {
        $this->tidiFactor = $tidiFactor;
    }

    // by Warringer\Types\Long
    public function setTime($time)
    {
        $this->time = $time;
    }

    // by Warringer\Types\Dict
    public function setRedTeamFleetAttributes($redTeamFleetAttributes)
    {
        // by Warringer\Types\Dict
        $converters = [];
        $converters['totalEHP'] = function ($value) { return $value; };
        $converters['maxControl'] = function ($value) { return $value; };
        $converters['totalReps'] = function ($value) { return $value; };
        $converters['appliedDPS'] = function ($value) { return $value; };
        $converters['appliedControl'] = function ($value) { return $value; };
        $converters['maxDPS'] = function ($value) { return $value; };

        $func = function ($value) use($converters) {
            $return = new \ArrayObject($value, \ArrayObject::ARRAY_AS_PROPS);
            $return['totalEHP'] = isset($value->{'totalEHP'}) ? $converters['totalEHP']($value->{'totalEHP'}) : null;
            $return['maxControl'] = isset($value->{'maxControl'}) ? $converters['maxControl']($value->{'maxControl'}) : null;
            $return['totalReps'] = isset($value->{'totalReps'}) ? $converters['totalReps']($value->{'totalReps'}) : null;
            $return['appliedDPS'] = isset($value->{'appliedDPS'}) ? $converters['appliedDPS']($value->{'appliedDPS'}) : null;
            $return['appliedControl'] = isset($value->{'appliedControl'}) ? $converters['appliedControl']($value->{'appliedControl'}) : null;
            $return['maxDPS'] = isset($value->{'maxDPS'}) ? $converters['maxDPS']($value->{'maxDPS'}) : null;
            return $return;
        };
        $this->redTeamFleetAttributes = $func($redTeamFleetAttributes);
    }

    // by Warringer\Types\Reference
    public function setPrevFrame($prevFrame)
    {
        $this->prevFrame = new Reference($prevFrame);
    }

    // by Warringer\Types\Reference
    public function setNextFrame($nextFrame)
    {
        $this->nextFrame = new Reference($nextFrame);
    }

}
