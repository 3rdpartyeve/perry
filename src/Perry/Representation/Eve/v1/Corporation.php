<?php
namespace Perry\Representation\Eve\v1;

use Perry\Representation\Base;

class Corporation extends Base
{
    protected static $_type = "vnd.ccp.eve.Corporation-v1";

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
    public function setAlliance(array $alliance)
    {
        $this->alliance = new Reference($alliance, "Dear CCP please document this representation");
    }

    /**
     * @param array $ceo
     */
    public function setCeo(array $ceo)
    {
        $this->ceo = new Reference($ceo, "vnd.ccp.eve.Character-v1");
    }

    /**
     * @param array $contacts
     */
    public function setContacts(array $contacts)
    {
        $this->contacts = new Reference($contacts, 'vnd.ccp.eve.ContactCollection-v1');
    }

    /**
     * @param array $creator
     */
    public function setCreator(array $creator)
    {
        $this->creator = new Reference($creator, "vnd.ccp.eve.Character-v1");
    }
}
