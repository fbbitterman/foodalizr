<?php

namespace Knid\Http;

class Response
{
    /**
     * @var \SplObjectStorage
     */
    private $headers;
    
    /**
     * @var mixed
     */
    private $content;
    
    public function __construct()
    {
        $this->headers = new \SplObjectStorage();
    }
    
    /**
     * @param mixed $content
     */
    public function setContent($content)
    {
        $this->content = $content;
    }
    
    /**
     * @param Knid\Http\Header $header
     * @return Knid\Http\Response
     */
    public function addHeader(Knid\Http\Header $header)
    {
        $this->headers->attach($header);
        return $this;
    }
    
    /**
     * @param \Traversable $headers
     * @return Knid\Http\Response
     */
    public function addHeaders(\Traversable $headers)
    {
        foreach($headers as $header) {
            $this->addHeader($header);
        }
        return $this;
    }
    
    /**
     * Sends the response to the client
     * 
     * @return Knid\Http\Response
     */
    public function send()
    {
        $this->sendHeaders();
        $this->sendContent();
        return $this;
    }
    
    /**
     * Sends the headers
     * 
     * @return Knid\Http\Response
     */
    private function sendHeaders()
    {
        foreach ($this->headers as $header) {
            header((string) $header);
        }
        return $this;
    }
    
    /**
     * Sends the content
     * 
     * @return Knid\Http\Response
     */
    private function sendContent()
    {
        echo $this->content;
        return $this;
    }
}
