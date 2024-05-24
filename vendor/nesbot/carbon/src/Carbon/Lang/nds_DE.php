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
 * - information from Kenneth Christiansen Kenneth Christiansen, Pablo Saratxaga kenneth@gnu.org, pablo@mandrakesoft.com
 */
return array_replace_recursive(require __DIR__.'/en.php', [
    'formats' => [
        'L' => 'DD.MM.YYYY',
    ],
    'months' => ['Jannuaar', 'Feberwaar', 'März', 'April', 'Mai', 'Juni', 'Juli', 'August', 'September', 'Oktober', 'November', 'Dezember'],
    'months_short' => ['Jan', 'Feb', 'Mär', 'Apr', 'Mai', 'Jun', 'Jul', 'Aug', 'Sep', 'Okt', 'Nov', 'Dez'],
    'weekdays' => ['Sünndag', 'Maandag', 'Dingsdag', 'Middeweek', 'Dunnersdag', 'Freedag', 'Sünnavend'],
<<<<<<< HEAD
    'weekdays_short' => ['Sdag', 'Maan', 'Ding', 'Midd', 'Dunn', 'Free', 'Svd.'],
    'weekdays_min' => ['Sd', 'Ma', 'Di', 'Mi', 'Du', 'Fr', 'Sa'],
=======
    'weekdays_short' => ['Sdag', 'Maan', 'Ding', 'Migg', 'Dunn', 'Free', 'Svd.'],
    'weekdays_min' => ['Sdag', 'Maan', 'Ding', 'Migg', 'Dunn', 'Free', 'Svd.'],
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    'first_day_of_week' => 1,
    'day_of_first_week_of_year' => 4,

    'year' => ':count Johr',
<<<<<<< HEAD
    'y' => ':countJ',
    'a_year' => '{1}een Johr|:count Johr',

    'month' => ':count Maand',
    'm' => ':countM',
    'a_month' => '{1}een Maand|:count Maand',

    'week' => ':count Week|:count Weken',
    'w' => ':countW',
    'a_week' => '{1}een Week|:count Week|:count Weken',

    'day' => ':count Dag|:count Daag',
    'd' => ':countD',
    'a_day' => '{1}een Dag|:count Dag|:count Daag',

    'hour' => ':count Stünn|:count Stünnen',
    'h' => ':countSt',
    'a_hour' => '{1}een Stünn|:count Stünn|:count Stünnen',

    'minute' => ':count Minuut|:count Minuten',
    'min' => ':countm',
    'a_minute' => '{1}een Minuut|:count Minuut|:count Minuten',

    'second' => ':count Sekunn|:count Sekunnen',
    's' => ':counts',
    'a_second' => 'en poor Sekunnen|:count Sekunn|:count Sekunnen',

    'ago' => 'vör :time',
    'from_now' => 'in :time',
    'before' => ':time vörher',
    'after' => ':time later',
=======
    'y' => ':count Johr',
    'a_year' => ':count Johr',

    'month' => ':count Maand',
    'm' => ':count Maand',
    'a_month' => ':count Maand',

    'week' => ':count Week',
    'w' => ':count Week',
    'a_week' => ':count Week',

    'day' => ':count Dag',
    'd' => ':count Dag',
    'a_day' => ':count Dag',

    'hour' => ':count Stünn',
    'h' => ':count Stünn',
    'a_hour' => ':count Stünn',

    'minute' => ':count Minuut',
    'min' => ':count Minuut',
    'a_minute' => ':count Minuut',

    'second' => ':count sekunn',
    's' => ':count sekunn',
    'a_second' => ':count sekunn',
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
]);
