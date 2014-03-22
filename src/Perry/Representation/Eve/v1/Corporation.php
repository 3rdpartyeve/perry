<?php
namespace Perry\Representation\Eve\v1;

use \Perry\Representation\Reference as Reference;
use \Perry\Representation\Base as Base;

class Corporation extends Base
{
    public $taxRate;

    public $alliance;

    public $founder;

    public $membersRoles;

    public $private;

    public $href;

    public $accounts;

    public $logo;

    public $id;

    public $acceptApplications;

    public $shares;

    public $homepage;

    public $description;

    public $faction;

    public $ceo;

    public $isNpcCorporation;

    public $applications;

    public $members;

    public $conflicts;

    public $ticker;

    public $displayName;

    public $name;

    public $stations = [];

    public $headquarters;

    public $districts;

    public $offices = [];

    public $deposit;

    // by Warringer\Types\Base
    public function setTaxRate($taxRate)
    {
        $this->taxRate = $taxRate;
    }

    // by Warringer\Types\Reference
    public function setAlliance($alliance)
    {
        $this->alliance = new Reference($alliance);
    }

    // by Warringer\Types\Reference
    public function setFounder($founder)
    {
        $this->founder = new Reference($founder);
    }

    // by Warringer\Types\Reference
    public function setMembersRoles($membersRoles)
    {
        $this->membersRoles = new Reference($membersRoles);
    }

    // by Warringer\Types\Reference
    public function setPrivate($private)
    {
        $this->private = new Reference($private);
    }

    // by Warringer\Types\Base
    public function setHref($href)
    {
        $this->href = $href;
    }

    // by Warringer\Types\Reference
    public function setAccounts($accounts)
    {
        $this->accounts = new Reference($accounts);
    }

    // by Warringer\Types\Dict
    public function setLogo($logo)
    {
        // by Warringer\Types\Dict
        $converters = [];
        $converters['32x32'] = function($value) { return new Reference($value); };
        $converters['logo'] = function($value) { return $value; };
        $converters['128x128'] = function($value) { return new Reference($value); };
        $converters['256x256'] = function($value) { return new Reference($value); };
        $converters['64x64'] = function($value) { return new Reference($value); };

        $func = function($value) use($converters) {
            $return = new \ArrayObject($value, \ArrayObject::ARRAY_AS_PROPS);
            $return['32x32'] = isset($value->{'32x32'}) ? $converters['32x32']($value->{'32x32'}) : null;
            $return['logo'] = isset($value->{'logo'}) ? $converters['logo']($value->{'logo'}) : null;
            $return['128x128'] = isset($value->{'128x128'}) ? $converters['128x128']($value->{'128x128'}) : null;
            $return['256x256'] = isset($value->{'256x256'}) ? $converters['256x256']($value->{'256x256'}) : null;
            $return['64x64'] = isset($value->{'64x64'}) ? $converters['64x64']($value->{'64x64'}) : null;
            return $return;
        };
        $this->logo = $func($logo);
    }

    // by Warringer\Types\Long
    public function setId($id)
    {
        $this->id = $id;
    }

    // by Warringer\Types\Base
    public function setAcceptApplications($acceptApplications)
    {
        $this->acceptApplications = $acceptApplications;
    }

    // by Warringer\Types\Long
    public function setShares($shares)
    {
        $this->shares = $shares;
    }

    // by Warringer\Types\String
    public function setHomepage($homepage)
    {
        $this->homepage = $homepage;
    }

    // by Warringer\Types\String
    public function setDescription($description)
    {
        $this->description = $description;
    }

    // by Warringer\Types\Reference
    public function setFaction($faction)
    {
        $this->faction = new Reference($faction);
    }

    // by Warringer\Types\Reference
    public function setCeo($ceo)
    {
        $this->ceo = new Reference($ceo);
    }

    // by Warringer\Types\Base
    public function setIsNpcCorporation($isNpcCorporation)
    {
        $this->isNpcCorporation = $isNpcCorporation;
    }

    // by Warringer\Types\Reference
    public function setApplications($applications)
    {
        $this->applications = new Reference($applications);
    }

    // by Warringer\Types\Reference
    public function setMembers($members)
    {
        $this->members = new Reference($members);
    }

    // by Warringer\Types\Reference
    public function setConflicts($conflicts)
    {
        $this->conflicts = new Reference($conflicts);
    }

    // by Warringer\Types\String
    public function setTicker($ticker)
    {
        $this->ticker = $ticker;
    }

    // by Warringer\Types\String
    public function setDisplayName($displayName)
    {
        $this->displayName = $displayName;
    }

    // by Warringer\Types\String
    public function setName($name)
    {
        $this->name = $name;
    }

    // by Warringer\Types\ArrayType
    public function setStations($stations)
    {
        // by Warringer\Types\Dict
        $converters = [];

        $func = function($value) use($converters) {
            $return = new \ArrayObject($value, \ArrayObject::ARRAY_AS_PROPS);
            return $return;
        };

        foreach ($stations as $key => $value) {
            $this->stations[$key] = $func($value);
        }
    }

    // by Warringer\Types\Reference
    public function setHeadquarters($headquarters)
    {
        $this->headquarters = new Reference($headquarters);
    }

    // by Warringer\Types\Reference
    public function setDistricts($districts)
    {
        $this->districts = new Reference($districts);
    }

    // by Warringer\Types\ArrayType
    public function setOffices($offices)
    {
        // by Warringer\Types\Dict
        $converters = [];

        $func = function($value) use($converters) {
            $return = new \ArrayObject($value, \ArrayObject::ARRAY_AS_PROPS);
            return $return;
        };

        foreach ($offices as $key => $value) {
            $this->offices[$key] = $func($value);
        }
    }

    // by Warringer\Types\Reference
    public function setDeposit($deposit)
    {
        $this->deposit = new Reference($deposit);
    }

}
