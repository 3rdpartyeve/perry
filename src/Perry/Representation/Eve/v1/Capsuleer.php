<?php
namespace Perry\Representation\Eve\v1;

use Perry\Representation\Base;

class Capsuleer extends Base
{
    /**
     * @var Reference
     */
    public $skills;

    /**
     * @var Reference
     */
    public $trainingQueue;

    /**
     * @param array $ref
     */
    protected function setSkills($ref)
    {
        $this->skills = new Reference($ref);
    }

    /**
     * @param array $ref
     */
    protected function trainingQueue($ref)
    {
        $this->skills = new Reference($ref);
    }
}
