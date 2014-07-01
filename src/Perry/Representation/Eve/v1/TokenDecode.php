<?php
namespace Perry\Representation\Eve\v1;

use \Perry\Representation\Reference as Reference;
use \Perry\Representation\Uri as Uri;
use \Perry\Representation\Base as Base;

class TokenDecode extends Base
{
    public $character;

    public $user;

    // by Warringer\Types\Reference
    public function setCharacter($character)
    {
        $this->character = new Reference($character);
    }

    // by Warringer\Types\Reference
    public function setUser($user)
    {
        $this->user = new Reference($user);
    }

}
