<?php
namespace Perry\Representation\Interfaces;

interface CanRefer
{
    /**
     * @param array $args
     * @return mixed
     */
    public function call($args);
}
