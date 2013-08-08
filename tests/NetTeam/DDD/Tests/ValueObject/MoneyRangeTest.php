<?php

namespace NetTeam\DDD\Tests\ValueObject;

use NetTeam\DDD\ValueObject\Money;
use NetTeam\DDD\ValueObject\MoneyRange;

/**
 * @author Paweł A. Wacławczyk <p.a.waclawczyk@gmail.com>
 *
 * @group Unit
 */
class MoneyRangeTest extends \PHPUnit_Framework_TestCase
{

    public function testIfValueIsInRange()
    {
        $min = new Money(1000, 'PLN');
        $max = new Money(10000, 'PLN');
        $range = new MoneyRange($min, $max);

        $inRange = new Money(5000, 'PLN');
        $outOfRange = new Money(500000, 'PLN');

        $this->assertTrue($range->contains($inRange));
        $this->assertFalse($range->contains($outOfRange));
    }

    public function testIfLeftOpenedRangeDoesNotContainInLeftClosedRange()
    {
        $leftClosedRange = new MoneyRange(new Money(100, 'PLN'), null);
        $leftOpenedRange = new MoneyRange(null, null);

        $this->assertFalse($leftClosedRange->containsRange($leftOpenedRange));
    }

    public function testIfRightOpenedRangeDoesNotContainInRightCloseRange()
    {
        $rightClosedRange = new MoneyRange(null, new Money(100, 'PLN'));
        $rightOpenedRange = new MoneyRange(null, null);

        $this->assertFalse($rightClosedRange->containsRange($rightOpenedRange));
    }

    public function testIfClosedRangeContainsInClosedRange()
    {
        $range = new MoneyRange(new Money(100, 'PLN'), new Money(1000, 'PLN'));

        $leftExceedRange = new MoneyRange(new Money(10, 'PLN'), new Money(1000, 'PLN'));
        $rightExceedRange = new MoneyRange(new Money(100, 'PLN'), new Money(10000, 'PLN'));
        $exceedRange = new MoneyRange(new Money(10, 'PLN'), new Money(10000, 'PLN'));
        $innerRange = new MoneyRange(new Money(200, 'PLN'), new Money(900, 'PLN'));
        $sameRange = new MoneyRange(new Money(100, 'PLN'), new Money(1000, 'PLN'));

        $this->assertFalse($range->containsRange($leftExceedRange));
        $this->assertFalse($range->containsRange($rightExceedRange));
        $this->assertFalse($range->containsRange($exceedRange));
        $this->assertTrue($range->containsRange($innerRange));
        $this->assertTrue($range->containsRange($sameRange));
    }
}
