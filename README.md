## Domain Driven Design Example in Telco domain


Read something about [DDD](http://en.wikipedia.org/wiki/Domain-driven_design).
This project is created as presentation for [ZgPHP meetup #22](http://zgphp.org/2013/06/zgphp-meetup-22/).

**Purpose of this code is to illustrate presentation, not to be fully functional.**

### Installation

Git clone this repo and then use [composer](http://getcomposer.org).
`composer.json` file is already provided (via [Silex-Skeleton](https://github.com/silexphp/Silex-Skeleton))
Just run the `php composer.phar update` command to install it.

### Tests

You need [PHPUnit](https://github.com/sebastianbergmann/phpunit).

    $ phpunit --bootstrap vendor/autoload.php tests/DomainModelTestCase.php

### License

This project is licensed under [Attribution-NonCommercial-NoDerivs 3.0 Unported](http://creativecommons.org/licenses/by-nc-nd/3.0/)
