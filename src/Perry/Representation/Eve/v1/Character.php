<?php
namespace Perry\Representation\Eve\v1;

use \Perry\Representation\Reference as Reference;
use \Perry\Representation\Base as Base;

class Character extends Base
{
    public $standings;

    public $vivox;

    public $name;

    public $bloodLine;

    public $href;

    public $gender;

    public $description;

    public $contacts;

    public $mail;

    public $private;

    public $channels;

    public $mercenary;

    public $race;

    public $accounts;

    public $capsuleer;

    public $corporation;

    public $portrait;

    public $blocked;

    public $id;

    public $notifications;

    public $deposit;

    // by Warringer\Types\Reference
    public function setStandings($standings)
    {
        $this->standings = new Reference($standings);
    }

    // by Warringer\Types\Reference
    public function setVivox($vivox)
    {
        $this->vivox = new Reference($vivox);
    }

    // by Warringer\Types\String
    public function setName($name)
    {
        $this->name = $name;
    }

    // by Warringer\Types\Reference
    public function setBloodLine($bloodLine)
    {
        $this->bloodLine = new Reference($bloodLine);
    }

    // by Warringer\Types\Base
    public function setHref($href)
    {
        $this->href = $href;
    }

    // by Warringer\Types\Long
    public function setGender($gender)
    {
        $this->gender = $gender;
    }

    // by Warringer\Types\String
    public function setDescription($description)
    {
        $this->description = $description;
    }

    // by Warringer\Types\Reference
    public function setContacts($contacts)
    {
        $this->contacts = new Reference($contacts);
    }

    // by Warringer\Types\Reference
    public function setMail($mail)
    {
        $this->mail = new Reference($mail);
    }

    // by Warringer\Types\Reference
    public function setPrivate($private)
    {
        $this->private = new Reference($private);
    }

    // by Warringer\Types\Reference
    public function setChannels($channels)
    {
        $this->channels = new Reference($channels);
    }

    // by Warringer\Types\Reference
    public function setMercenary($mercenary)
    {
        $this->mercenary = new Reference($mercenary);
    }

    // by Warringer\Types\Reference
    public function setRace($race)
    {
        $this->race = new Reference($race);
    }

    // by Warringer\Types\Reference
    public function setAccounts($accounts)
    {
        $this->accounts = new Reference($accounts);
    }

    // by Warringer\Types\Reference
    public function setCapsuleer($capsuleer)
    {
        $this->capsuleer = new Reference($capsuleer);
    }

    // by Warringer\Types\Dict
    public function setCorporation($corporation)
    {
        // by Warringer\Types\Dict
        $converters = [];
        $converters['isNPC'] = function ($value) { return $value; };
        $converters['logo'] = function ($value) { return $value; };
        $converters['href'] = function ($value) { return $value; };
        $converters['id'] = function ($value) { return $value; };
        $converters['name'] = function ($value) { return $value; };

        $func = function ($value) use($converters) {
            $return = new \ArrayObject($value, \ArrayObject::ARRAY_AS_PROPS);
            $return['isNPC'] = isset($value->{'isNPC'}) ? $converters['isNPC']($value->{'isNPC'}) : null;
            $return['logo'] = isset($value->{'logo'}) ? $converters['logo']($value->{'logo'}) : null;
            $return['href'] = isset($value->{'href'}) ? $converters['href']($value->{'href'}) : null;
            $return['id'] = isset($value->{'id'}) ? $converters['id']($value->{'id'}) : null;
            $return['name'] = isset($value->{'name'}) ? $converters['name']($value->{'name'}) : null;
            return $return;
        };
        $this->corporation = $func($corporation);
    }

    // by Warringer\Types\Dict
    public function setPortrait($portrait)
    {
        // by Warringer\Types\Dict
        $converters = [];
        $converters['32x32'] = function ($value) { return new Reference($value); };
        $converters['64x64'] = function ($value) { return new Reference($value); };
        $converters['128x128'] = function ($value) { return new Reference($value); };
        $converters['256x256'] = function ($value) { return new Reference($value); };

        $func = function ($value) use($converters) {
            $return = new \ArrayObject($value, \ArrayObject::ARRAY_AS_PROPS);
            $return['32x32'] = isset($value->{'32x32'}) ? $converters['32x32']($value->{'32x32'}) : null;
            $return['64x64'] = isset($value->{'64x64'}) ? $converters['64x64']($value->{'64x64'}) : null;
            $return['128x128'] = isset($value->{'128x128'}) ? $converters['128x128']($value->{'128x128'}) : null;
            $return['256x256'] = isset($value->{'256x256'}) ? $converters['256x256']($value->{'256x256'}) : null;
            return $return;
        };
        $this->portrait = $func($portrait);
    }

    // by Warringer\Types\Reference
    public function setBlocked($blocked)
    {
        $this->blocked = new Reference($blocked);
    }

    // by Warringer\Types\Long
    public function setId($id)
    {
        $this->id = $id;
    }

    // by Warringer\Types\Reference
    public function setNotifications($notifications)
    {
        $this->notifications = new Reference($notifications);
    }

    // by Warringer\Types\Reference
    public function setDeposit($deposit)
    {
        $this->deposit = new Reference($deposit);
    }

}
