<?php
namespace Perry\Representation\Eve\v1;

use Perry\Representation\Base;

class Alliance extends Base
{
    /**
     * @var array
     */
    public $corporations = array();

    /**
     * @var Reference
     */
    public $executorCorporation;

    /**
     * @var Reference
     */
    public $creatorCorporation;

    /**
     * @var Reference
     */
    public $creatorCharacter;


    /**
     * @param array $corps
     */
    public function setCorporations($corps)
    {
        foreach ($corps as $item) {
            $this->corporations[] = new Reference($item, "Dear CCP please document this representation");
        }
    }

    /**
     * @param array|object $corp
     */
    public function setExecutorCorporation($corp)
    {
        $this->executorCorporation = new Reference($corp, "Dear CCP please document this representation");
    }

    /**
     * @param array|object $corp
     */
    public function setCreatorCorporation($corp)
    {
        $this->creatorCorporation = new Reference($corp, "Dear CCP please document this representation");
    }

    /**
     * @param array|object $char
     */
    public function setCreatorCharacter($char)
    {
        $this->creatorCharacter = new Reference($char, "Dear CCP please document this representation");
    }
}
