<?php

namespace Foodalizr\Model;

class MapperFactory
{
    /**
     * @var mysqli
     */
    private $db;
    
    /**
     * @var array
     */
    private $mappers = array();
    
    public function __construct(\mysqli $db)
    {
        $this->db = $db;
    }
    
    /**
     * @param string $mapperName
     * @return MapperAbstract
     */
    public function getMapper($mapperName)
    {
        if (!isset($this->mappers[$mapperName])) {
            $this->mappers[$mapperName] = new $mapperName($this->db);
        }
        return $this->mappers[$mapperName];
    }
}
