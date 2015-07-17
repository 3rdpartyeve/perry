<?php
namespace Perry\Representation\Eve\v1;

use \Perry\Representation\Reference as Reference;
use \Perry\Representation\Uri as Uri;
use \Perry\Representation\Base as Base;

class DustRoot extends Base
{
    public $dustPortraits;

    public $battleQueues;

    public $documents;

    public $dustSpecialties;

    public $l10nString;

    public $loyaltyStores;

    public $contentStreaming;

    public $pathToGame;

    public $fullMarketGroups;

    public $districtAttackable;

    public $battles;

    public $infantryMarketGroups;

    public $districtReinforce;

    public $devices;

    public $checkpoints;

    public $squads;

    public $configuration;

    public $districtInfrastructure;

    public $keepAlive;

    // by Warringer\Types\Reference
    public function setDustPortraits($dustPortraits)
    {
        $this->dustPortraits = new Reference($dustPortraits);
    }

    // by Warringer\Types\Reference
    public function setBattleQueues($battleQueues)
    {
        $this->battleQueues = new Reference($battleQueues);
    }

    // by Warringer\Types\Reference
    public function setDocuments($documents)
    {
        $this->documents = new Reference($documents);
    }

    // by Warringer\Types\Reference
    public function setDustSpecialties($dustSpecialties)
    {
        $this->dustSpecialties = new Reference($dustSpecialties);
    }

    // by Warringer\Types\Reference
    public function setL10nString($l10nString)
    {
        $this->l10nString = new Reference($l10nString);
    }

    // by Warringer\Types\Reference
    public function setLoyaltyStores($loyaltyStores)
    {
        $this->loyaltyStores = new Reference($loyaltyStores);
    }

    // by Warringer\Types\Reference
    public function setContentStreaming($contentStreaming)
    {
        $this->contentStreaming = new Reference($contentStreaming);
    }

    // by Warringer\Types\Reference
    public function setPathToGame($pathToGame)
    {
        $this->pathToGame = new Reference($pathToGame);
    }

    // by Warringer\Types\Reference
    public function setFullMarketGroups($fullMarketGroups)
    {
        $this->fullMarketGroups = new Reference($fullMarketGroups);
    }

    // by Warringer\Types\Reference
    public function setDistrictAttackable($districtAttackable)
    {
        $this->districtAttackable = new Reference($districtAttackable);
    }

    // by Warringer\Types\Reference
    public function setBattles($battles)
    {
        $this->battles = new Reference($battles);
    }

    // by Warringer\Types\Reference
    public function setInfantryMarketGroups($infantryMarketGroups)
    {
        $this->infantryMarketGroups = new Reference($infantryMarketGroups);
    }

    // by Warringer\Types\Reference
    public function setDistrictReinforce($districtReinforce)
    {
        $this->districtReinforce = new Reference($districtReinforce);
    }

    // by Warringer\Types\Reference
    public function setDevices($devices)
    {
        $this->devices = new Reference($devices);
    }

    // by Warringer\Types\Reference
    public function setCheckpoints($checkpoints)
    {
        $this->checkpoints = new Reference($checkpoints);
    }

    // by Warringer\Types\Reference
    public function setSquads($squads)
    {
        $this->squads = new Reference($squads);
    }

    // by Warringer\Types\Reference
    public function setConfiguration($configuration)
    {
        $this->configuration = new Reference($configuration);
    }

    // by Warringer\Types\Reference
    public function setDistrictInfrastructure($districtInfrastructure)
    {
        $this->districtInfrastructure = new Reference($districtInfrastructure);
    }

    // by Warringer\Types\Reference
    public function setKeepAlive($keepAlive)
    {
        $this->keepAlive = new Reference($keepAlive);
    }

}
