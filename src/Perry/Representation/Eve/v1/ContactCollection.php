<?php
namespace Perry\Representation\Eve\v1;

use Perry\Representation\Base;

class ContactCollection extends Base
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
            $this->items[] = new Contact($item);
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
