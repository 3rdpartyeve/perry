<?php
namespace Perry;

use Perry\Cache\CacheManager;
use Perry\Cache\File\FilePool;
use Perry\Cache\NoCache\NoCachePool;
use PHPUnit_Framework_TestCase;

class CacheManagerTest extends PHPUnit_Framework_TestCase
{

    protected function setUp()
    {
        // we will setup within the tests
    }

    public function testNoCache()
    {
        Setup::getInstance()->cacheImplementation = new NoCachePool();

        $this->assertTrue(CacheManager::getInstance()->save("mockurl", ['test' => 'something']));
        $this->assertFalse(CacheManager::getInstance()->load("mockurl"));
    }

    public function testFileCache()
    {
        Setup::getInstance()->cacheImplementation = new FilePool("/tmp");

        $this->assertTrue(CacheManager::getInstance()->save("mockurl", ['test' => 'something']));
        $this->assertEquals(['test' => 'something'], CacheManager::getInstance()->load("mockurl"));
    }

}
