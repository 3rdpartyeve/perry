<?php
namespace Perry\Representation\Eve\v1;

use Perry\Representation\Base;

class Corporation extends Base
{
    /**
     * @var Reference
     */
    public $alliance;

    /**
     * @var Reference
     */
    public $creator;

    /**
     * @var Reference
     */
    public $ceo;

    /**
     * @var Reference
     */
    public $contacts;

    /**
     * @param array $alliance
     */
    public function setAlliance($alliance)
    {
        $this->alliance = new Reference($alliance, "vnd.ccp.eve.Alliance-v1");
    }

    /**
     * @param array $ceo
     */
    public function setCeo($ceo)
    {
        $this->ceo = new Reference($ceo, "vnd.ccp.eve.Character-v1");
    }

    /**
     * @param array $contacts
     */
    public function setContacts($contacts)
    {
        $this->contacts = new Reference($contacts, 'vnd.ccp.eve.ContactCollection-v1');
    }

    /**
     * @param array $creator
     */
    public function setCreator($creator)
    {
        $this->creator = new Reference($creator, "vnd.ccp.eve.Character-v1");
    }
}
