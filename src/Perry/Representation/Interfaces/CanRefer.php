<?php
namespace Perry\Representation\Interfaces;

interface CanRefer
{
    /**
     * @param array $args
     * @return \Perry\Representation\Base
     */
    public function call($args);
}
