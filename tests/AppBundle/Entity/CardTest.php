<?php

namespace Tests\AppBundle\Entity;

use AppBundle\Entity\Card;
use PHPUnit\Framework\TestCase;

class CardTest extends TestCase
{
    public function testNewValidCard()
    {
        $card = new Card(1,1);

        $this->assertEquals(1, $card->getSuit());
        $this->assertEquals(1, $card->getValue());

    }

    /**
     * @expectedException     \InvalidArgumentException
     * @expectedExceptionMessage  Invalid suit was supplied
     */
    public function testNewInvalidSuitCard()
    {
        $card = new Card(5,1);

    }

    /**
     * @expectedException     \InvalidArgumentException
     * @expectedExceptionMessage Invalid value was supplied
     */
    public function testNewInvalidValueCard()
    {
        $card = new Card(1,20);

    }
}
