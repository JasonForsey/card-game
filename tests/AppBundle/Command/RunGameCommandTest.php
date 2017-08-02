<?php

namespace Tests\AppBundle\Command;

use AppBundle\Command\RunGameCommand;
use Symfony\Bundle\FrameworkBundle\Console\Application;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\Component\Console\Tester\CommandTester;

class RunGameCommandTest extends KernelTestCase
{

    public function testExecute()
    {
        self::bootKernel();
        $application = new Application(self::$kernel);
        $application->add(new RunGameCommand());

        $command = $application->find('app:run_game');
        $commandTester = new CommandTester($command);
        $commandTester->execute(array(
            'command'  => $command->getName(),
        ));

        $output = $commandTester->getDisplay();
        $this->assertContains("Player 1 has a hand containing 7 cards.", $output);

    }

}
