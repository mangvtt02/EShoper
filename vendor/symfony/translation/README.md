Translation Component
=====================

The Translation component provides tools to internationalize your application.

Getting Started
---------------

```
$ composer require symfony/translation
```

```php
use Symfony\Component\Translation\Translator;
<<<<<<< HEAD
use Symfony\Component\Translation\Loader\ArrayLoader;

$translator = new Translator('fr_FR');
$translator->addLoader('array', new ArrayLoader());
=======

$translator = new Translator('fr_FR');
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
$translator->addResource('array', [
    'Hello World!' => 'Bonjour !',
], 'fr_FR');

echo $translator->trans('Hello World!'); // outputs « Bonjour ! »
```

Resources
---------

<<<<<<< HEAD
 * [Documentation](https://symfony.com/doc/current/translation.html)
 * [Contributing](https://symfony.com/doc/current/contributing/index.html)
 * [Report issues](https://github.com/symfony/symfony/issues) and
   [send Pull Requests](https://github.com/symfony/symfony/pulls)
   in the [main Symfony repository](https://github.com/symfony/symfony)
=======
  * [Documentation](https://symfony.com/doc/current/translation.html)
  * [Contributing](https://symfony.com/doc/current/contributing/index.html)
  * [Report issues](https://github.com/symfony/symfony/issues) and
    [send Pull Requests](https://github.com/symfony/symfony/pulls)
    in the [main Symfony repository](https://github.com/symfony/symfony)
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
