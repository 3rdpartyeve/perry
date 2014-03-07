<?php

namespace Perry\Cache\File;


class FileItemTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var FileItem
     */
    private $item;

    public function setUp()
    {
        $fp = new FilePool("/tmp");
        $this->item = $fp->getItem("test");
        $this->item->set("testval", 60);
    }

    public function tearDown()
    {
        $this->item->delete();
    }

    public function testSet()
    {
        // set testval for key "test"
        $this->assertTrue($this->item->set("testval"));
    }

    public function testFromFile()
    {
        $map = FilePool::mapKey("test");
        $testItem = FileItem::fromFile('/tmp/'. $map['dir'] . '/' . $map['file'], "test");
        $this->assertInstanceOf('\Perry\Cache\File\FileItem', $testItem);
        $this->assertTrue($testItem->isHit());
        $this->assertTrue($testItem->exists());
        $this->assertEquals("testval", $testItem->get());
        $this->assertEquals($this->item->getKey(), $testItem->getKey());

    }


}
