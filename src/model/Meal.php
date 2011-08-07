<?php

namespace Foodalizr\Model;

class Meal
{
    /**
     * @var int
     */
    private $id;
    
    /**
     * @var string
     */
    private $name;
    
    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }
    
    /**
     * @param int $id
     * @return Meal
     */
    public function setId($id)
    {
        if (null !== $id) {
            $id = (int) $id;
        }
        $this->id = $id;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }
    
    /**
     * @param string $name
     * @return Meal
     */
    public function setName($name)
    {
        if (null !== $name) {
            $name = (string) $name;
        }
        $this->name = $name;
        return $this;
    }
}
