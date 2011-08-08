<?php

namespace Foodalizr\Model;

class Participation
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var int
     */
    private $mealId;

    /**
     * @var int
     */
    private $personId;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Contribution
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
     * @return int
     */
    public function getMealId()
    {
        return $this->meal;
    }

    /**
     * @param int $mealId
     * @return Contribution
     */
    public function setMealId($mealId)
    {
        if (null !== $$mealId) {
            $mealId = (int) $mealId;
        }
        $this->mealId = $mealId;
        return $this;
    }

    /**
     * @return int
     */
    public function getPersonId()
    {
        return $this->personId;
    }

    /**
     * @param int $personId
     * @return Contribution
     */
    public function setPersonId($personId)
    {
        if (null !== $personId) {
            $personId = (int) $personId;
        }
        $this->personId = $personId;
        return $this;
    }
}
