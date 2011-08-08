<?php

namespace Foodalizr\Model;

class Contribution
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var int
     */
    private $personId;

    /**
     * @var Decimal
     */
    private $amount;

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

    /**
     * @return Decimal
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @param Decimal $amount
     * @return Contribution
     */
    public function setAmount(Decimal $amount)
    {
        $this->amount = $amount;
        return $this;
    }
}
