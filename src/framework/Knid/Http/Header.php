<?php

namespace Knid\Http;

class Header
{
    /**
     * @var string
     */
    private $name;
    
    /**
     * @var string
     */
    private $value;
    
    /**
     * @throws InvalidArgumentException
     * @param string $name
     * @param string $value
     */
    public function __construct($name, $value)
    {
        $this->setName($name);
        $this->value = (string) $value;
    }
    
    /**
     * @throws InvalidArgumentException
     * @param string $name
     */
    private function setName($name)
    {
        if (!is_string($name) || !($name = trim($name)) || !preg_match('/^[a-zA-Z0-9-]+$/', $name)) {
            throw new \InvalidArgumentException('The argument should be a valid HTTP header name.');
        }
        $this->name = $name;
    }
    
    /**
     * @return string
     */
    public function __toString()
    {
        return $this->name . ': ' . $this->value;
    }
}
