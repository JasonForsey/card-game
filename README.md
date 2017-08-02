card-game
=========

A Symfony project to run a small game of cards.

**Please note that this application is written for PHP7.1**


Installation
------------

Please clone this repository in to a directory.

After the repository is on your computer you will need to initialise composer. If you have installed composer globally on your maching then you can use:
```shell
composer install
```

If you do not have composer installed globally then please use the instructions they give for your machine and setup on <https://getcomposer.org/download/>

When running composer install it will ask you to confirm some parameters. Please just accept the defaults by pressing enter for each one. We don't use these parameters in the application so the default values are acceptable.

Running the Game
----------------

To run the game and see how many cards each player has, please run the following command:
```shell
php bin/console app:run_game
```


Running Unit Tests
------------------

To run the unit test please run the following command:
```shell
./vendor/bin/phpunit
```