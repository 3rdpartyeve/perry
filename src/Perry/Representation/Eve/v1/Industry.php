<?php
namespace Perry\Representation\Eve\v1;

use \Perry\Representation\Reference as Reference;
use \Perry\Representation\Uri as Uri;
use \Perry\Representation\Base as Base;

class Industry extends Base
{
    public $specialities;

    public $teams;

    // by Warringer\Types\Reference
    public function setSpecialities($specialities)
    {
        $this->specialities = new Reference($specialities);
    }

    // by Warringer\Types\Reference
    public function setTeams($teams)
    {
        $this->teams = new Reference($teams);
    }

}
