<?php

namespace AppBundle\Entity;

class Deck
{

    /**
     * @var array $allCards
     */
    protected $allCards;

    /**
     * @var int $cardIndexToDeal
     */
    protected $cardIndexToDeal;

    /**
     * Deck constructor.
     */
    public function __construct()
    {
        
        $this->allCards = $this->newDeck();
        $this->cardIndexToDeal = 0;
        
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

    /**
     * Shuffle the deck
     */
    public function shuffle()
    {
        $this->allCards = array_reverse($this->allCards);
    }

    /**
     * @return Card
     */
    public function deal(): Card
    {

        $allCards = $this->getAllCards();
        $card = $allCards[$this->cardIndexToDeal];
        $this->cardIndexToDeal++;

        return $card;

    }

}