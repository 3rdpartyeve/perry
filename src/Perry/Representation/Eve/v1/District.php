<?php

namespace Perry\Representation\Eve\v1;

use Perry\Representation\Base;

/**
 * Class District
 * this class is a guessed-class, since the interface is not available or documented yet,
 * however it is derived from how a DistrictCollection looks, and will be used to represent
 * the objects within that collection
 *
 * @package Perry\Representation\Eve\v1
 */
class District extends Base {
    protected static $_type = "vnd.ccp.eve.District-v1";

    /**
     * @var Reference
     */
    public $owner;

    /**
     * @var Reference
     */
    public $system;

    /**
     * @var Reference
     */
    public $infrastructure;

    /**
     * @var Reference
     */
    public $region;

    /**
     * @var Reference
     */
    public $planet;

    /**
     * @param array $infrastructure
     */
    public function setInfrastructure($infrastructure)
    {
        $this->infrastructure = new Reference($infrastructure, "Dear CCP please document this representation");
    }

    /**
     * @param array $owner
     */
    public function setOwner($owner)
    {
        $this->owner = new Reference($owner, "Dear CCP please document this representation");
    }

    /**
     * @param array $planet
     */
    public function setPlanet($planet)
    {
        $this->planet = new Reference($planet, "Dear CCP please document this representation");
    }

    /**
     * @param array $region
     */
    public function setRegion($region)
    {
        $this->region = new Reference($region, "Dear CCP please document this representation");
    }

    /**
     * @param array $system
     */
    public function setSystem($system)
    {
        $this->system = new Reference($system, "Dear CCP please document this representation");
    }
}