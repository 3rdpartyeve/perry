<?php
namespace Perry\Representation\Eve\v1;

use \Perry\Representation\Reference as Reference;
use \Perry\Representation\Uri as Uri;
use \Perry\Representation\Base as Base;

class TournamentTeamMember extends Base
{
    public $alliance;

    public $name;

    public $corporation;

    public $self;

    public $character;

    public $icon;

    // by Warringer\Types\Reference
    public function setAlliance($alliance)
    {
        $this->alliance = new Reference($alliance);
    }

    // by Warringer\Types\String
    public function setName($name)
    {
        $this->name = $name;
    }

    // by Warringer\Types\Reference
    public function setCorporation($corporation)
    {
        $this->corporation = new Reference($corporation);
    }

    // by Warringer\Types\Reference
    public function setSelf($self)
    {
        $this->self = new Reference($self);
    }

    // by Warringer\Types\Reference
    public function setCharacter($character)
    {
        $this->character = new Reference($character);
    }

    // by Warringer\Types\Reference
    public function setIcon($icon)
    {
        $this->icon = new Reference($icon);
    }

}
