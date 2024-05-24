<?php

/**
 * This file is part of the Carbon package.
 *
 * (c) Brian Nesbitt <brian@nesbot.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/*
 * Authors:
 * - Glavić
 * - Milos Sakovic
 */
<<<<<<< HEAD

use Carbon\CarbonInterface;
use Symfony\Component\Translation\PluralizationRules;

// @codeCoverageIgnoreStart
if (class_exists(PluralizationRules::class)) {
    PluralizationRules::set(static function ($number) {
        return PluralizationRules::get($number, 'sr');
    }, 'sr_Latn_ME');
}
// @codeCoverageIgnoreEnd

=======
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
return array_replace_recursive(require __DIR__.'/sr.php', [
    'month' => ':count mjesec|:count mjeseca|:count mjeseci',
    'week' => ':count nedjelja|:count nedjelje|:count nedjelja',
    'second' => ':count sekund|:count sekunde|:count sekundi',
    'ago' => 'prije :time',
    'from_now' => 'za :time',
    'after' => ':time nakon',
    'before' => ':time prije',
    'week_from_now' => ':count nedjelju|:count nedjelje|:count nedjelja',
    'week_ago' => ':count nedjelju|:count nedjelje|:count nedjelja',
<<<<<<< HEAD
    'second_ago' => ':count sekund|:count sekunde|:count sekundi',
    'diff_tomorrow' => 'sjutra',
    'calendar' => [
        'nextDay' => '[sjutra u] LT',
        'nextWeek' => function (CarbonInterface $date) {
=======
    'diff_tomorrow' => 'sjutra',
    'calendar' => [
        'nextDay' => '[sjutra u] LT',
        'nextWeek' => function (\Carbon\CarbonInterface $date) {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
            switch ($date->dayOfWeek) {
                case 0:
                    return '[u nedjelju u] LT';
                case 3:
                    return '[u srijedu u] LT';
                case 6:
                    return '[u subotu u] LT';
                default:
                    return '[u] dddd [u] LT';
            }
        },
<<<<<<< HEAD
        'lastWeek' => function (CarbonInterface $date) {
=======
        'lastWeek' => function (\Carbon\CarbonInterface $date) {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
            switch ($date->dayOfWeek) {
                case 0:
                    return '[prošle nedjelje u] LT';
                case 1:
                    return '[prošle nedjelje u] LT';
                case 2:
                    return '[prošlog utorka u] LT';
                case 3:
                    return '[prošle srijede u] LT';
                case 4:
                    return '[prošlog četvrtka u] LT';
                case 5:
                    return '[prošlog petka u] LT';
                default:
                    return '[prošle subote u] LT';
            }
        },
    ],
    'weekdays' => ['nedjelja', 'ponedjeljak', 'utorak', 'srijeda', 'četvrtak', 'petak', 'subota'],
    'weekdays_short' => ['ned.', 'pon.', 'uto.', 'sri.', 'čet.', 'pet.', 'sub.'],
]);
