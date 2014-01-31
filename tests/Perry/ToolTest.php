<?php
namespace Perry;

use PHPUnit_Framework_TestCase;

class ToolTest extends PHPUnit_Framework_TestCase
{

    protected function setUp()
    {
    }

    public function testParseRepresentationToClass()
    {
        $this->assertEquals(
            '\Perry\Representation\Eve\v1\Killmail',
            Tool::parseRepresentationToClass('vnd.ccp.eve.Killmail-v1')
        );

        $this->assertEquals(
            '\Perry\Representation\OldApi\v1\server\ServerStatus',
            Tool::parseRepresentationToClass('net.3rdpartyeve.thora.server.ServerStatus-v1')
        );
    }

    public function testParseContentTypeToRepresentation()
    {
        $this->assertEquals(
            "vnd.ccp.eve.Killmail-v1",
            Tool::parseContentTypeToRepresentation('application/vnd.ccp.eve.Killmail-v1+json; charset=utf-8')
        );

        $this->assertFalse(Tool::parseContentTypeToRepresentation('fail'));
    }
}
