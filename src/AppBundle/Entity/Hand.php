<?php

namespace AppBundle\Entity;

class Hand
{

    /**
     * @var array $cards
     */
    protected $cards = [];

    /**
     * @param Card $card
     */
    public function addCard(Card $card)
    {
        $this->cards[] = $card;
    }

    /**
     * @return int
     */
    public function getCardCount() : int
    {
        return count($this->cards);
    }

}