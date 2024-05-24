<?php

/**
 * This file is part of the Carbon package.
 *
 * (c) Brian Nesbitt <brian@nesbot.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
<<<<<<< HEAD

use Symfony\Component\Translation\PluralizationRules;

// @codeCoverageIgnoreStart
if (class_exists(PluralizationRules::class)) {
    PluralizationRules::set(static function ($number) {
        return PluralizationRules::get($number, 'sr');
    }, 'sr_Latn_XK');
}
// @codeCoverageIgnoreEnd

=======
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
return array_replace_recursive(require __DIR__.'/sr_Latn_BA.php', [
    'weekdays' => ['nedelja', 'ponedeljak', 'utorak', 'sreda', 'četvrtak', 'petak', 'subota'],
]);
