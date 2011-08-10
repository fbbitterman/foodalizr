<?php

namespace Knid\Http;

class Request
{
    /**
     * @var array
     */
    private $params;
    
    public function __construct(array $params)
    {
        $this->params = array_intersect_key($params, array(
            'cookie' => null,
            'env' => null,
            'files' => null,
            'get' => null,
            'post' => null,
            'server' => null,
        ));
    }
    
    /**
     * @throws \OutOfBoundsException
     * @param string $type
     * @param string $name
     * @return string
     */
    private function getParam($type, $name)
    {
        if (!isset($this->params[$type][$name])) {
            throw new \OutOfBoundsException();
        }
        return $this->params[$type][$name];
    }
    
    /**
     * @throws \OutOfBoundsException
     * @param string $name
     * @return string
     */
    public function getCookie($name)
    {
        return $this->getParam('cookie', $name);
    }
    
    /**
     * @throws \OutOfBoundsException
     * @param string $name
     * @return string
     */
    public function getEnv($name)
    {
        return $this->getParam('env', $name);
    }
    
    /**
     * @throws \OutOfBoundsException
     * @param string $name
     * @return string
     */
    public function getFiles($name)
    {
        return $this->getParam('files', $name);
    }
    
    /**
     * @throws \OutOfBoundsException
     * @param string $name
     * @return string
     */
    public function getGet($name)
    {
        return $this->getParam('get', $name);
    }
    
    /**
     * @throws \OutOfBoundsException
     * @param string $name
     * @return string
     */
    public function getPost($name)
    {
        return $this->getParam('post', $name);
    }
    
    /**
     * @throws \OutOfBoundsException
     * @param string $name
     * @return string
     */
    public function getServer($name)
    {
        return $this->getParam('server', $name);
    }
}
