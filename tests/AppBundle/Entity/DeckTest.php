<?php

namespace Tests\AppBundle\Entity;

use AppBundle\Entity\Card;
use AppBundle\Entity\Deck;
use PHPUnit\Framework\TestCase;

class DeckTest extends TestCase
{
    public function testNewDeckCount()
    {
        $deck = new Deck();

        $this->assertCount(52, $deck->getAllCards());

    }

    /**
     * Check a few random cards to ensure the Deck has been
     * instantiated in the correct order
     */
    public function testNewDeckOrder()
    {
        $deck = new Deck();

        $allCards = $deck->getAllCards();
        /** @var Card $card1 */
        $card1 = $allCards[10];
        /** @var Card $card2 */
        $card2 = $allCards[23];
        /** @var Card $card3 */
        $card3 = $allCards[37];
        /** @var Card $card4 */
        $card4 = $allCards[45];
        /** @var Card $card5 */
        $card5 = $allCards[50];

        $this->assertEquals(1, $card1->getSuit());
        $this->assertEquals(11, $card1->getValue());
        $this->assertEquals(2, $card2->getSuit());
        $this->assertEquals(11, $card2->getValue());
        $this->assertEquals(3, $card3->getSuit());
        $this->assertEquals(12, $card3->getValue());
        $this->assertEquals(4, $card4->getSuit());
        $this->assertEquals(7, $card4->getValue());
        $this->assertEquals(4, $card5->getSuit());
        $this->assertEquals(12, $card5->getValue());

    }

    public function testShuffledDeck()
    {

        $deck = new Deck();
        $deck->shuffle();
        $allCardsShuffled = $deck->getAllCards();

        $cardsFoundInSequence = false;
        /**
         *
         * Loop through the shuffled cards and assess whether the next card is
         * in sequence or not.
         *
         * @var Card $shuffledCard
         *
         */
        foreach ($allCardsShuffled as $shuffledCardKey => $shuffledCard)
        {
            if (51 > $shuffledCardKey) {
                $nextShuffledCardKey = $shuffledCardKey + 1;
                /** @var Card $nextShuffledCard */
                $nextShuffledCard = $allCardsShuffled[$nextShuffledCardKey];

                $currentCardSuit = $shuffledCard->getSuit();
                $currentCardValue = $shuffledCard->getValue();
                $nextShuffledCardSuit = $nextShuffledCard->getSuit();
                $nextShuffledCardValue = $nextShuffledCard->getValue();

                if (13 === $currentCardValue){
                    if ($nextShuffledCardSuit === $currentCardSuit+1 && 1 === $nextShuffledCardValue){
                        $cardsFoundInSequence = true;
                        break;
                    }
                } else {
                    if ($nextShuffledCardSuit === $currentCardSuit && $nextShuffledCardValue === $currentCardValue+1){
                        $cardsFoundInSequence = true;
                        break;
                    }
                }
            }
        }

        $this->assertFalse($cardsFoundInSequence);

    }

    public function testDealCard()
    {

        $deck = new Deck();
        /** @var Card $dealtCard */
        $dealtCard = $deck->deal();

        $this->assertEquals(1, $dealtCard->getSuit());
        $this->assertEquals(1, $dealtCard->getValue());

        /** @var Card $dealtCard */
        $dealtCard = $deck->deal();

        $this->assertEquals(1, $dealtCard->getSuit());
        $this->assertEquals(2, $dealtCard->getValue());
    }

}
