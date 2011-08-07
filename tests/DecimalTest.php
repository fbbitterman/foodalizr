<?php

use Knid\Math\Decimal;

class DecimalTest extends PHPUnit_Framework_TestCase
{
    private $decimal;

    public function setUp()
    {
        $this->decimal = new Decimal('1.235');
    }
    
    public function testConstructorAllowsNegative()
    {
        $this->assertEquals('-1.123', (string) new Decimal('-1.123'));
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testConstructorFailsOnChar()
    {
        new Decimal('a');
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testConstructorFailsMultipleDecimalSeperators()
    {
        new Decimal('1.1.1');
    }

    public function testConstructorSucceedsNothingAfterDecimalSeperator()
    {
        $this->assertEquals('1', (string) new Decimal('1.'));
    }

    public function testConstructorSucceedsNothingBeforeDecimalSeperator()
    {
        $this->assertEquals('0.1', (string) new Decimal('.1'));
    }

    public function testToString()
    {
        $this->assertEquals('1.235', (string) $this->decimal);
    }

    public function testGetScale()
    {
        $this->assertEquals(3, $this->decimal->getScale());
    }

    public function testGetEmptyScale()
    {
        $decimal = new Decimal('1');
        $this->assertEquals(0, $decimal->getScale());
    }

    public function testAdd()
    {
        $expected = new Decimal('3.5813');
        $this->assertEquals($expected, $this->decimal->add(new Decimal('2.3463')));
        $this->assertEquals($expected, $this->decimal);
    }

    public function testAddNegative()
    {
        $expected = new Decimal('0.001');
        $this->assertEquals($expected, $this->decimal->add(new Decimal('-1.234')));
        $this->assertEquals($expected, $this->decimal);
    }
    
    public function testSubtract()
    {
        $expected = new Decimal('0.001');
        $this->assertEquals($expected, $this->decimal->subtract(new Decimal('1.234')));
        $this->assertEquals($expected, $this->decimal);
    }

    public function testSubtractNegative()
    {
        $expected = new Decimal('3.5813');
        $this->assertEquals($expected, $this->decimal->subtract(new Decimal('-2.3463')));
        $this->assertEquals($expected, $this->decimal);
    }
}
