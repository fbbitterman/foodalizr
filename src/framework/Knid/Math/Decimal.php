<?php

namespace Knid\Math;

class Decimal
{
    /**
     * @var string
     */
    protected $value;

    /**
     * @var string
     */
    const DECIMAL_POINT = '.';

    /**
     * @param scalar $value
     */
    public function __construct($value)
    {
        $value = (string) $value;

        $valueParts = explode(static::DECIMAL_POINT, $value);
        if (count($valueParts) > 2) {
            throw new \InvalidArgumentException('The value is exepceted to be valid decimal');
        }

        foreach ($valueParts as $key => $valuePart) {
            if ('' === $valuePart) {
                $valueParts[$key] = '0';
            }
        }
        $value = implode(static::DECIMAL_POINT, $valueParts);

        // validate integer part
        $validatePart = $valueParts[0];
        if ('-' === $validatePart[0]) {
            $validatePart = substr($validatePart, 1);
        }
        if (!ctype_digit($validatePart)) {
            throw new \InvalidArgumentException('The integer part is exepceted to be digits only');
        }

        // validate decimal part
        if (isset($valueParts[1])) {
            if (!ctype_digit($valueParts[1])) {
                throw new \InvalidArgumentException('The decimal part is exepceted to be digits only');
            }
            $value = rtrim($value, '0');
        }

        $this->value = rtrim($value, '.');
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->value;
    }

    /**
     * @return int
     */
    public function getScale()
    {
        $scale = 0;

        $valueParts = explode(static::DECIMAL_POINT, $this->value);
        if (isset($valueParts[1])) {
            $scale = strlen($valueParts[1]);
        }

        return $scale;
    }

    /**
     * @param Decimal $value
     * @return int
     */
    private function getMaxScale(Decimal $value)
    {
        $scale = $this->getScale();
        if ($value->getScale() > $scale) {
            $scale = $value->getScale();
        }
        return $scale;
    }

    /**
     * @param Decimal $value
     * @return Decimal
     */
    public function add(Decimal $value)
    {
        $this->value = bcadd($this->value, $value, $this->getMaxScale($value));
        return $this;
    }

    /**
     * @param Decimal $value
     * @return Decimal
     */
    public function subtract(Decimal $value)
    {
        $this->value = bcsub($this->value, $value, $this->getMaxScale($value));
        return $this;
    }

    /**
     * @param Decimal $value
     * @return Decimal
     */
    public function multiply(Decimal $value)
    {
        $this->value = bcmul($this->value, $value, $this->getMaxScale($value));
        return $this;
    }

    /**
     * @param Decimal $value
     * @return Decimal
     */
    public function divide(Decimal $value)
    {
        $this->value = bcdiv($this->value, $value, $this->getMaxScale($value));
        return $this;
    }
}
