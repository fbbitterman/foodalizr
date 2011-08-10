<?php

namespace Knid\Http\Test;

use Knid\Http\Request;

class RequestTest extends \PHPUnit_Framework_TestCase
{
    protected $request;
    
    public function setUp()
    {
        $this->request = new \Knid\Http\Request(array(
            'cookie' => array('cookieName' => 'cookieValue'),
            'env' => array('envName' => 'envValue'),
            'files' => array('filesName' => 'filesValue'),
            'get' => array('getName' => 'getValue'),
            'post' => array('postName' => 'postValue'),
            'server' => array('serverName' => 'serverValue'),
        ));
    }
    
    public function testGetCookie()
    {
        $this->assertEquals('cookieValue', $this->request->getCookie('cookieName'));
    }
    
    /**
     * @expectedException \OutOfBoundsException
     */
    public function testGetInvalidCookie()
    {
        $this->request->getCookie('barfoo');
    }
    
    public function testGetEnv()
    {
        $this->assertEquals('envValue', $this->request->getEnv('envName'));
    }
    
    /**
     * @expectedException \OutOfBoundsException
     */
    public function testGetInvalidEnv()
    {
        $this->request->getEnv('barfoo');
    }
    
    public function testGetFiles()
    {
        $this->assertEquals('filesValue', $this->request->getFiles('filesName'));
    }
    
    /**
     * @expectedException \OutOfBoundsException
     */
    public function testGetInvalidFiles()
    {
        $this->request->getFiles('barfoo');
    }
    
    public function testGetGet()
    {
        $this->assertEquals('getValue', $this->request->getGet('getName'));
    }
    
    /**
     * @expectedException \OutOfBoundsException
     */
    public function testGetInvalidGet()
    {
        $this->request->getGet('barfoo');
    }
    
    public function testGetPost()
    {
        $this->assertEquals('postValue', $this->request->getPost('postName'));
    }
    
    /**
     * @expectedException \OutOfBoundsException
     */
    public function testGetInvalidPost()
    {
        $this->request->getPost('barfoo');
    }
    
    public function testGetServer()
    {
        $this->assertEquals('serverValue', $this->request->getServer('serverName'));
    }
    
    /**
     * @expectedException \OutOfBoundsException
     */
    public function testGetInvalidServer()
    {
        $this->request->getServer('barfoo');
    }
}
