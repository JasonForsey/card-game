<?php

namespace AppBundle\Entity;

class Card
{

    /**
     * Suits
     */
    const SUIT_HEARTS   = 1;
    const SUIT_CLUBS    = 2;
    const SUIT_SPADES   = 3;
    const SUIT_DIAMONDS = 4;

    /**
     * Picture Cards
     */
    const TYPE_ACE      = 1;
    const TYPE_JACK     = 11;
    const TYPE_QUEEN    = 12;
    const TYPE_KING     = 13;

    /**
     * @var array $suits
     */
    public $suits = array(
        self::SUIT_HEARTS   => 'hearts',
        self::SUIT_DIAMONDS => 'diamonds',
        self::SUIT_CLUBS    => 'clubs',
        self::SUIT_SPADES   => 'spades'
    );

    /**
     * @var int $suit
     */
    protected $suit;

    /**
     * @var int $value
     */
    protected $value;

    /**
     * Card constructor.
     * @param int $suit
     * @param int $value
     * @throws \InvalidArgumentException
     */
    public function __construct($suit, $value)
    {
        // Throw exception with relevant message if parameters are invalid.
        if (!array_key_exists($suit, $this->suits)){
            throw new \InvalidArgumentException('Invalid suit was supplied');
        }
        if (1 > $value || 13 < $value){
            throw new \InvalidArgumentException('Invalid value was supplied');
        }

        $this->suit = $suit;
        $this->value = $value;
    }

    /**
     * @return int
     */
    public function getSuit() : int
    {
        return $this->suit;
    }

    /**
     * @return int
     */
    public function getValue(): int
    {
        return $this->value;
    }

}