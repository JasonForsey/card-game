<?php

namespace Tests\AppBundle\Entity;

use AppBundle\Entity\Deck;
use PHPUnit\Framework\TestCase;

class DeckTest extends TestCase
{
    public function testNewDeckCount()
    {
        $deck = new Deck();

        $this->assertCount(52, $deck->getAllCards());

    }

}
