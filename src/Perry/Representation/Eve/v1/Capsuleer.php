<?php
namespace Perry\Representation\Eve\v1;

use Perry\Representation\Base;

class Capsuleer extends Base
{
    protected static $_type = "vnd.ccp.eve.Capsuleer-v1";

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
    protected function setSkills(array $ref)
    {
        $this->skills = new Reference($ref, "Dear CCP please document this representation");
    }

    /**
     * @param array $ref
     */
    protected function trainingQueue(array $ref)
    {
        $this->skills = new Reference($ref, "Dear CCP please document this representation");
    }
}
