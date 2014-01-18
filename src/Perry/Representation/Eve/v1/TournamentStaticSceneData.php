<?php
namespace Perry\Representation\Eve\v1;

use Perry\Representation\Base;

class TournamentStaticSceneData extends Base
{
    /**
     * @var array
     */
    public $globalObjects = array();

    /**
     * @var array
     */
    public $ships = array();

    /**
     * @param array $globalObjects
     */
    public function setGlobalObjects($globalObjects)
    {
        foreach ($globalObjects as $object) {
            $object->type = new Reference($object->type, "Dear CCP please document this representation");

            if (isset($object->planetOrMoonInfo) && !is_null($object->planetOrMoonInfo)) {
                $object->planetOrMoonInfo->heightMap1 = new Reference(
                    $object->planetOrMoonInfo->heightMap1,
                    "Dear CCP please document this representation"
                );
                $object->planetOrMoonInfo->shaderPreset = new Reference(
                    $object->planetOrMoonInfo->shaderPreset,
                    "Dear CCP please document this representation"
                );
                $object->planetOrMoonInfo->heightMap2 = new Reference(
                    $object->planetOrMoonInfo->heightMap2,
                    "Dear CCP please document this representation"
                );
            }
            $this->globalObjects[] = $object;
        }
    }

    /**
     * @param array $ships
     */
    public function setShips($ships)
    {
        foreach ($ships as $ship) {

            $ship->item = new Reference($ship->item, "Dear CCP please document this representation");
            $ship->type = new Reference($ship->type, "Dear CCP please document this representation");
            $ship->character = new Reference($ship->character, "vnd.ccp.eve.Character-v1");

            foreach ($ship->turrets as $tkey => $turret) {
                $ship->turrets[$tkey] = new Reference($turret, "Dear CCP please document this representation");
            }
            $this->ships[] = $ship;
        }
    }
}
