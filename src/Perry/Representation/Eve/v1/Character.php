<?php
namespace Perry\Representation\Eve\v1;

use Perry\Representation\Base;

class Character extends Base
{
    /**
     * @var Reference
     */
    public $corporation;

    /**
     * @var Reference
     */
    public $race;

    /**
     * @var Reference
     */
    public $bloodLine;

    /**
     * @var Reference
     */
    public $contacts;

    /**
     * @var Reference
     */
    public $capsuleer;

    /**
     * @param array $bloodLine
     */
    public function setBloodLine($bloodLine)
    {
        $this->bloodLine = new Reference($bloodLine);
    }

    /**
     * @param array $capsuleer
     */
    public function setCapsuleer($capsuleer)
    {
        $this->capsuleer = new Reference($capsuleer, "vnd.ccp.eve.Capsuleer-v1");
    }

    /**
     * @param array $contacts
     */
    public function setContacts($contacts)
    {
        $this->contacts = new Reference($contacts, "vnd.ccp.eve.ContactCollection-v1");
    }

    /**
     * @param array $corporation
     */
    public function setCorporation($corporation)
    {
        $this->corporation = new Reference($corporation, "vnd.ccp.eve.Corporation-v1");
    }

    /**
     * @param array $race
     */
    public function setRace($race)
    {
        $this->race = new Reference($race);
    }
}
