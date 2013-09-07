<?php
namespace Perry\Representation\Eve\v1;

use Perry\Representation\Base;

class Collection extends Base
{
    /**
     * @var Reference
     */
    public $previous;

    /**
     * @var array
     */
    public $items;

    /**
     * @var Reference
     */
    public $next;

    /**
     * @param array $items
     */
    public function setItems($items)
    {
        foreach ($items as $item) {
            $this->items[] = new Reference($item, "Documentation did not give me any option on how to determine type");
        }
    }

    /**
     * @param array $next
     */
    public function setNext($next)
    {
        $this->next = new Reference($next, "vnd.ccp.eve.ContactCollection-v1");
    }

    /**
     * @param array $previous
     */
    public function setPrevious($previous)
    {
        $this->previous = new Reference($previous, "vnd.ccp.eve.ContactCollection-v1");
    }
}
