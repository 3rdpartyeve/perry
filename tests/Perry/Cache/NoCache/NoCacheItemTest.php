<?php

namespace Perry\Cache\NoCache;


class NoCacheItemTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var FileItem
     */
    private $item;

    public function setUp()
    {
        $fp = new NoCachePool("/tmp");
        $this->item = $fp->getItem("test");
        $this->item->set("testval", 60);
    }

    public function testSet()
    {
        // set testval for key "test"
        $this->assertTrue($this->item->set("testval"));
    }


}
