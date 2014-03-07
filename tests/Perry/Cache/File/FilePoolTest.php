<?php

namespace Perry\Cache\File;


class FilePoolTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var FilePool
     */
    private $fp;

    public function setUp()
    {
        $this->fp = new FilePool("/tmp");
    }

    public function testClear()
    {
        $this->assertInstanceOf('\Perry\Cache\File\FilePool', $this->fp->clear());
    }


    public function testGetItem()
    {
        $item = $this->fp->getItem("empty");
        $this->checkItem($item, "empty");
    }

    public function testGetItems()
    {
        $keys = ["empty2", "empty3"];

        $items = $this->fp->getItems($keys);
        $this->assertTrue(is_array($items));

        foreach($keys as $key) {
            $this->assertArrayHasKey($key, $items);
            $this->checkItem($items[$key], $key);
        }
    }

    private function checkItem($item, $key)
    {
        // get Item
        $this->assertInstanceOf('\Perry\Cache\File\FileItem', $item);
        $this->assertFalse($item->exists());
        $this->assertFalse($item->isHit());
        $this->assertNull($item->get());
        $this->assertEquals($key, $item->getKey());
        $item->delete();

    }
}
 