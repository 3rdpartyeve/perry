<?php
namespace Perry\Representation\Eve\v1;

use Perry\Representation\Base;
use Perry\Representation\Reference;

class Api extends Base
{
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
    protected function setSearch($ref)
    {
        $this->search = new Reference($ref, "vnd.ccp.eve.Collection-v1");
    }

    /**
     * @param array $ref
     */
    protected function setCharacter($ref)
    {
        $this->character = new Reference($ref, "vnd.ccp.eve.Character-v1");
    }
}
