<?php

namespace Foodalizr\Model;

class PersonMapper extends MapperAbstract
{
    /**
     * @return string
     */
    protected function getDbName()
    {
        return 'person';
    }
    
    public function find($id)
    {
        'SELECT * FROM `' . $this->getDbName() . '` WHERE `id` = ' . (int) $id;
    }
    
    public function save(Person $person)
    {
        $sql = 'INSERT INTO `' . $this->getDbName() . '` (`name`) VALUES (\''
            . $this->getDb()->real_escape_string($person->getName()) . '\');';
        
        if (false === $this->getDb()->query($sql)) {
            // TODO fix exception message
            throw new Exception();
        }
        
        return $person;
    }
}
