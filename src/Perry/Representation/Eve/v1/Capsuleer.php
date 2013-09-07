<?php
namespace Perry\Representation\Eve\v1;

use Perry\Representation\Base;

class Capsuleer extends Base
{
    protected static $_type = "vnd.ccp.eve.Capsuleer-v1";

    public $skills;
    public $trainingQueue;

    protected function setSkills(array $ref)
    {
        $this->skills = new Reference($ref, "Dear CCP please document this representation");
    }
}
