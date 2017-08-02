<?php

namespace AppBundle\Entity;


class Player
{

    /**
     * @var string $name
     */
    protected $name;

    /**
     * @var Hand $hand
     */
    protected $hand;

    /**
     * Player constructor.
     * @param string $name
     */
    public function __construct($name = null)
    {
        if (null === $name){
            throw new \InvalidArgumentException('No player name was supplied');
        }

        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return Hand
     */
    public function getHand(): ?Hand
    {
        return $this->hand;
    }

    /**
     * @param Hand $hand
     */
    public function newHand(Hand $hand)
    {
        $this->hand = $hand;
    }

}