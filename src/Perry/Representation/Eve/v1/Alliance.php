<?php
namespace Perry\Representation\Eve\v1;

use Perry\Representation\Base;
use Perry\Setup;

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
            $this->corporations[] = new Reference($item);
        }
    }

    /**
     * @param array|object $corp
     */
    public function setExecutorCorporation($corp)
    {
        $this->executorCorporation = new Reference($corp);
    }

    /**
     * @param array|object $corp
     */
    public function setCreatorCorporation($corp)
    {
        $this->creatorCorporation = new Reference($corp);
    }

    /**
     * @param array|object $char
     */
    public function setCreatorCharacter($char)
    {
        $this->creatorCharacter = new Reference($char);
    }

    /**
     * @param int $id
     * @return Alliance
     */
    public static function getInstanceByAllianceID($id)
    {
        return new Alliance(
            self::doGetRequest(Setup::$crestUrl.'/alliance/'.$id .'/', "vnd.ccp.eve.Alliance-v1")
        );
    }
}
