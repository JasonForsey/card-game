<?php

namespace Tests\AppBundle\Entity;

use AppBundle\Entity\Card;
use AppBundle\Entity\Hand;
use PHPUnit\Framework\TestCase;

class HandTest extends TestCase
{
    public function testNewHand()
    {
        $hand = new Hand();
        $this->assertEquals(0, $hand->getCardCount());

    }

    public function testAddCardToHand()
    {
        $hand = new Hand();

        $card = new Card(3, 7);

        $hand->addCard($card);

        $this->assertEquals(1, $hand->getCardCount());

    }

}
