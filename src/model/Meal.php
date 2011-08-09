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
     * @var Date
     */
    private $date;
    
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
    
    /**
     * @return Date
     */
    public function getDate()
    {
        return $this->date;
    }
    
    /**
     * @param Date $date
     */
    public function setDate(Date $date)
    {
        $this->date = $date;
    }
}
