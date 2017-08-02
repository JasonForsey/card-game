<?php

namespace Tests\AppBundle\Entity;

use AppBundle\Entity\Hand;
use AppBundle\Entity\Player;
use PHPUnit\Framework\TestCase;

class PlayerTest extends TestCase
{
    public function testNewPlayer()
    {
        $player = new Player('testing');
        $this->assertEquals('testing', $player->getName());

    }

    public function testNoInitialHand()
    {
        $player = new Player('testing');

        $this->assertNull($player->getHand());

    }

    public function testGetHand()
    {
        $player = new Player('testing');
        $hand = new Hand();

        $player->newHand($hand);

        $this->assertInstanceOf('AppBundle\Entity\Hand', $player->getHand());

    }

}
