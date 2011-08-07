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
    
    public function testConstructorFromInteger()
    {
        $this->assertEquals('10', (string) new Decimal(10));
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
        $expected = new Decimal(0.001);
        $this->assertEquals($expected, $this->decimal->subtract(new Decimal('1.234')));
        $this->assertEquals($expected, $this->decimal);
    }

    public function testSubtractNegative()
    {
        $expected = new Decimal('3.5813');
        $this->assertEquals($expected, $this->decimal->subtract(new Decimal('-2.3463')));
        $this->assertEquals($expected, $this->decimal);
    }
    
    public function testMultiply()
    {
        $actual = new Decimal(0.2);
        $expected = new Decimal(0.8);
        
        $this->assertEquals($expected, $actual->multiply(new Decimal(4)));
    }
    
    public function testDivide()
    {
        $actual = new Decimal(120.8080);
        $expected = new Decimal(30.202);
        
        $this->assertEquals($expected, $actual->divide(new Decimal(4)));
    }
    
    public function testNoFloatFail()
    {
        // avoid float issues like: 7 === floor((0.1+0.7)*10)
        $decimal = new Decimal(0.1);
        $decimal->add(new Decimal(0.7));
        $decimal->multiply(new Decimal(10));
        $this->assertEquals(8, (string) $decimal);
    }
}
