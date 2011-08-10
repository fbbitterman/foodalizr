<?php

namespace Knid\Http\Test;

use Knid\Http\Header;

class HeaderTest extends \PHPUnit_Framework_TestCase
{
    public function testConstructor()
    {
        $header = new Header('Content-Type', 'text/html');
        $this->assertInstanceOf('Knid\Http\Header', $header);
        return $header;
    }
    
    /**
     * @depends testConstructor
     * @param Knid\Http\Header $header
     */
    public function testToString($header)
    {
        $this->assertEquals('Content-Type: text/html', (string) $header);
    }
    
    /**
     * @expectedException \InvalidArgumentException
     */
    public function testNameValidation()
    {
        new Header('F oo', 'value');
    }
}
