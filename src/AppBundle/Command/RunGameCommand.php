<?php

namespace AppBundle\Command;

use AppBundle\Entity\Deck;
use AppBundle\Entity\Hand;
use AppBundle\Entity\Player;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class RunGameCommand extends ContainerAwareCommand
{
    /**
     * {@inheritdoc}
     */
    protected function configure()
    {
        $this
            ->setName('app:run_game')
            ->setDescription('Runs the game for 4 players');
    }

    /**
     * {@inheritdoc}
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {

        /**
         * Start a new deck.
         */
        $deck = new Deck();

        /**
         * Shuffle the deck ready for the start of play.
         */
        $deck->shuffle();

        /**
         * Create four players for the game.
         */
        $player1 = new Player('player 1');
        $player1Hand = new Hand();
        $player1->newHand($player1Hand);
        $player2 = new Player('player 2');
        $player2Hand = new Hand();
        $player2->newHand($player2Hand);
        $player3 = new Player('player 3');
        $player3Hand = new Hand();
        $player3->newHand($player3Hand);
        $player4 = new Player('player 4');
        $player4Hand = new Hand();
        $player4->newHand($player4Hand);

        for ($i = 1; $i <= 7; $i++){
            $dealtCard = $deck->deal();
            $player1Hand->addCard($dealtCard);
            $player1->newHand($player1Hand);

            $dealtCard = $deck->deal();
            $player2Hand->addCard($dealtCard);
            $player2->newHand($player2Hand);

            $dealtCard = $deck->deal();
            $player3Hand->addCard($dealtCard);
            $player3->newHand($player3Hand);

            $dealtCard = $deck->deal();
            $player4Hand->addCard($dealtCard);
            $player4->newHand($player4Hand);

        }

        $output->writeln("Player 1 has a hand containing " . print_r($player1Hand->getCardCount(),true)  . " cards.");
        $output->writeln("Player 2 has a hand containing " . print_r($player2Hand->getCardCount(),true)  . " cards.");
        $output->writeln("Player 3 has a hand containing " . print_r($player3Hand->getCardCount(),true)  . " cards.");
        $output->writeln("Player 4 has a hand containing " . print_r($player4Hand->getCardCount(),true)  . " cards.");

    }
}
