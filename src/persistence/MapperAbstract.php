<?php

namespace Foodalizr\Model;

abstract class MapperAbstract
{
    /**
     * @var \mysqli
     */
    private $db;
    
    /**
     * @param \mysqli $db
     */
    public final function __construct(\mysqli $db)
    {
        $this->db = $db;
    }
    
    /**
     * @return \mysqli
     */
    protected final function getDb()
    {
        return $this->db;
    }
    
    /**
     * @return string
     */
    abstract protected function getDbName();
}
