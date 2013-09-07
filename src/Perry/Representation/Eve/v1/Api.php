<?php
namespace Perry\Representation\Eve\v1;

use Perry\Representation\Base;

class Api extends Base
{
    protected static $_type = "vnd.ccp.eve.Api-v1";

    /**
     * @var Reference
     */
    public $search;

    /**
     * @var Reference
     */
    public $character;

    /**
     * @param array $ref
     */
    protected function setSearch(array $ref)
    {
        $this->search = new Reference($ref, "vnd.ccp.eve.Collection-v1");
    }

    /**
     * @param array $ref
     */
    protected function setCharacter(array $ref)
    {
        $this->character = new Reference($ref, "vnd.ccp.eve.Character-v1");
    }

}