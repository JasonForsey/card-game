<?php

namespace AppBundle\Entity;

class Deck
{

    /**
     * @var array $allCards
     */
    protected $allCards;

    /**
     * Deck constructor.
     */
    public function __construct()
    {
        
        $this->allCards = $this->newDeck();
        
    }

    protected function newDeck() : array
    {

        $deck = [];

        $cardCount = 0;
        for ($suit = 1; $suit <= 4; $suit++){
            for ($value = 1; $value <= 13; $value++){
                $deck[$cardCount] = new Card($suit, $value);
                $cardCount++;
            }
        }

        return $deck;

    }

    /**
     * @return array
     */
    public function getAllCards(): array
    {
        return $this->allCards;
    }


}