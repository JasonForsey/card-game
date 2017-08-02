<?php

namespace Tests\AppBundle\Entity;

use AppBundle\Entity\Hand;
use PHPUnit\Framework\TestCase;

class HandTest extends TestCase
{
    public function testNewHand()
    {
        $hand = new Hand();
        $this->assertCount(0, $hand->getCardCount());

    }

    public function testAddCardToHand()
    {
        $hand = new Hand();

        $mockCard = $this->getMockClass('AppBundle\Entity\Card', null, [3, 7]);

        $hand->addCard($mockCard);

        $this->assertCount(1, $hand->getCardCount());

    }

}
