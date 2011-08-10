<?php

namespace Knid\Http\Test;

use Knid\Http\Response;

class ResponseTest extends \PHPUnit_Framework_TestCase
{
    protected $response;
    
    public function setUp()
    {
        $this->response = new \Knid\Http\Response();
    }
    
    public function testAddHeader()
    {
        $header = $this->getMockBuilder('\Knid\Http\Header')
            ->disableOriginalConstructor()->getMock();
            
        $header->expects($this->once())
            ->method('send');
        
        $this->response->addHeader($header);
        $this->response->send();
    }
    
    public function testAddSameHeaderTwice()
    {
        $header = $this->getMockBuilder('\Knid\Http\Header')
            ->disableOriginalConstructor()->getMock();
            
        $header->expects($this->once())
            ->method('send');
        
        $this->response->addHeader($header);
        $this->response->addHeader($header);
        $this->response->send();
    }
    
    public function testAddTwoHeaders()
    {
        $headerOne = $this->getMockBuilder('\Knid\Http\Header')
            ->disableOriginalConstructor()->getMock();
        $headerOne->expects($this->once())
            ->method('send');
            
        $headerTwo = $this->getMockBuilder('\Knid\Http\Header')
            ->disableOriginalConstructor()->getMock();
        $headerTwo->expects($this->once())
            ->method('send');
        
        $this->response->addHeader($headerOne);
        $this->response->addHeader($headerTwo);
        $this->response->send();
    }
    
    public function testSetContent()
    {
        $this->response->setContent('foofoobar');
        ob_start();
        $this->response->send();
        $actual = ob_get_contents();
        ob_end_clean();
        $this->assertEquals('foofoobar', $actual);
    }
}
