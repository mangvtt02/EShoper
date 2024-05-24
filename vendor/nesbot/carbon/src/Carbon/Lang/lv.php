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
use Carbon\CarbonInterface;

/**
 * This file is part of the Carbon package.
 *
 * (c) Brian Nesbitt <brian@nesbot.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

=======
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
/*
 * Authors:
 * - Philippe Vaucher
 * - pirminis
 * - Tsutomu Kuroda
 * - tjku
 * - Andris Zāģeris
 * - Max Melentiev
 * - Edgars Beigarts
 * - Juanito Fatas
 * - Vitauts Stočka
 * - Akira Matsuda
 * - Christopher Dell
 * - Enrique Vidal
 * - Simone Carletti
 * - Aaron Patterson
 * - Kaspars Bankovskis
 * - Nicolás Hock Isaza
 * - Viesturs Kavacs (Kavacky)
 * - zakse
 * - Janis Eglitis (janiseglitis)
 * - Guntars
<<<<<<< HEAD
 * - Juris Sudmalis
 */
$daysOfWeek = ['svētdiena', 'pirmdiena', 'otrdiena', 'trešdiena', 'ceturtdiena', 'piektdiena', 'sestdiena'];
$daysOfWeekLocativum = ['svētdien', 'pirmdien', 'otrdien', 'trešdien', 'ceturtdien', 'piektdien', 'sestdien'];

$transformDiff = function ($input) {
    return strtr($input, [
        // Nominative => "pirms/pēc" Dative
        'gads' => 'gada',
        'gadi' => 'gadiem',
        'gadu' => 'gadiem',
        'mēnesis' => 'mēneša',
        'mēneši' => 'mēnešiem',
        'mēnešu' => 'mēnešiem',
        'nedēļa' => 'nedēļas',
        'nedēļas' => 'nedēļām',
        'nedēļu' => 'nedēļām',
        'diena' => 'dienas',
        'dienas' => 'dienām',
        'dienu' => 'dienām',
        'stunda' => 'stundas',
        'stundas' => 'stundām',
        'stundu' => 'stundām',
        'minūte' => 'minūtes',
        'minūtes' => 'minūtēm',
        'minūšu' => 'minūtēm',
        'sekunde' => 'sekundes',
        'sekundes' => 'sekundēm',
        'sekunžu' => 'sekundēm',
    ]);
};

return [
    'ago' => function ($time) use ($transformDiff) {
        return 'pirms '.$transformDiff($time);
    },
    'from_now' => function ($time) use ($transformDiff) {
        return 'pēc '.$transformDiff($time);
    },

    'year' => '0 gadu|:count gads|:count gadi',
    'y' => ':count g.',
    'a_year' => '{1}gads|0 gadu|:count gads|:count gadi',
    'month' => '0 mēnešu|:count mēnesis|:count mēneši',
    'm' => ':count mēn.',
    'a_month' => '{1}mēnesis|0 mēnešu|:count mēnesis|:count mēneši',
    'week' => '0 nedēļu|:count nedēļa|:count nedēļas',
    'w' => ':count ned.',
    'a_week' => '{1}nedēļa|0 nedēļu|:count nedēļa|:count nedēļas',
    'day' => '0 dienu|:count diena|:count dienas',
    'd' => ':count d.',
    'a_day' => '{1}diena|0 dienu|:count diena|:count dienas',
    'hour' => '0 stundu|:count stunda|:count stundas',
    'h' => ':count st.',
    'a_hour' => '{1}stunda|0 stundu|:count stunda|:count stundas',
    'minute' => '0 minūšu|:count minūte|:count minūtes',
    'min' => ':count min.',
    'a_minute' => '{1}minūte|0 minūšu|:count minūte|:count minūtes',
    'second' => '0 sekunžu|:count sekunde|:count sekundes',
    's' => ':count sek.',
    'a_second' => '{1}sekunde|0 sekunžu|:count sekunde|:count sekundes',

    'after' => ':time vēlāk',
=======
 */
return [
    'year' => '0 gadiem|:count gads|:count gadiem',
    'y' => '0 gadiem|:count gads|:count gadiem',
    'a_year' => '{1}gads|0 gadiem|:count gads|:count gadiem',
    'month' => '0 mēnešiem|:count mēneša|:count mēnešiem',
    'm' => ':count mēn.',
    'a_month' => '{1}mēneša|0 mēnešiem|:count mēneša|:count mēnešiem',
    'week' => '0 nedēļām|:count nedēļas|:count nedēļām',
    'w' => ':count ned.',
    'a_week' => '{1}nedēļas|0 nedēļām|:count nedēļas|:count nedēļām',
    'day' => '0 dienām|:count dienas|:count dienām',
    'd' => '0 dienām|:count dienas|:count dienām',
    'a_day' => '{1}dienas|0 dienām|:count dienas|:count dienām',
    'hour' => '0 stundām|:count stundas|:count stundām',
    'h' => ':count st.',
    'a_hour' => '{1}stundas|0 stundām|:count stundas|:count stundām',
    'minute' => '0 minūtēm|:count minūtes|:count minūtēm',
    'min' => ':count min.',
    'a_minute' => '{1}minūtes|0 minūtēm|:count minūtes|:count minūtēm',
    'second' => '0 sekundēm|:count sekundes|:count sekundēm',
    's' => ':count sek.',
    'a_second' => '{1}dažas sekundes|0 sekundēm|:count sekundes|:count sekundēm',

    'ago' => 'pirms :time',
    'from_now' => 'pēc :time',

    'after' => ':time vēlāk',
    'before' => ':time pirms',

>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    'year_after' => '0 gadus|:count gadu|:count gadus',
    'a_year_after' => '{1}gadu|0 gadus|:count gadu|:count gadus',
    'month_after' => '0 mēnešus|:count mēnesi|:count mēnešus',
    'a_month_after' => '{1}mēnesi|0 mēnešus|:count mēnesi|:count mēnešus',
    'week_after' => '0 nedēļas|:count nedēļu|:count nedēļas',
    'a_week_after' => '{1}nedēļu|0 nedēļas|:count nedēļu|:count nedēļas',
    'day_after' => '0 dienas|:count dienu|:count dienas',
    'a_day_after' => '{1}dienu|0 dienas|:count dienu|:count dienas',
    'hour_after' => '0 stundas|:count stundu|:count stundas',
    'a_hour_after' => '{1}stundu|0 stundas|:count stundu|:count stundas',
    'minute_after' => '0 minūtes|:count minūti|:count minūtes',
    'a_minute_after' => '{1}minūti|0 minūtes|:count minūti|:count minūtes',
    'second_after' => '0 sekundes|:count sekundi|:count sekundes',
    'a_second_after' => '{1}sekundi|0 sekundes|:count sekundi|:count sekundes',

<<<<<<< HEAD
    'before' => ':time agrāk',
=======
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    'year_before' => '0 gadus|:count gadu|:count gadus',
    'a_year_before' => '{1}gadu|0 gadus|:count gadu|:count gadus',
    'month_before' => '0 mēnešus|:count mēnesi|:count mēnešus',
    'a_month_before' => '{1}mēnesi|0 mēnešus|:count mēnesi|:count mēnešus',
    'week_before' => '0 nedēļas|:count nedēļu|:count nedēļas',
    'a_week_before' => '{1}nedēļu|0 nedēļas|:count nedēļu|:count nedēļas',
    'day_before' => '0 dienas|:count dienu|:count dienas',
    'a_day_before' => '{1}dienu|0 dienas|:count dienu|:count dienas',
    'hour_before' => '0 stundas|:count stundu|:count stundas',
    'a_hour_before' => '{1}stundu|0 stundas|:count stundu|:count stundas',
    'minute_before' => '0 minūtes|:count minūti|:count minūtes',
    'a_minute_before' => '{1}minūti|0 minūtes|:count minūti|:count minūtes',
    'second_before' => '0 sekundes|:count sekundi|:count sekundes',
    'a_second_before' => '{1}sekundi|0 sekundes|:count sekundi|:count sekundes',

    'first_day_of_week' => 1,
    'day_of_first_week_of_year' => 4,
    'list' => [', ', ' un '],
<<<<<<< HEAD

    'diff_now' => 'tagad',
    'diff_today' => 'šodien',
    'diff_yesterday' => 'vakar',
    'diff_before_yesterday' => 'aizvakar',
    'diff_tomorrow' => 'rīt',
    'diff_after_tomorrow' => 'parīt',

=======
    'diff_now' => 'tagad',
    'diff_yesterday' => 'vakar',
    'diff_tomorrow' => 'rīt',
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    'formats' => [
        'LT' => 'HH:mm',
        'LTS' => 'HH:mm:ss',
        'L' => 'DD.MM.YYYY.',
        'LL' => 'YYYY. [gada] D. MMMM',
        'LLL' => 'DD.MM.YYYY., HH:mm',
        'LLLL' => 'YYYY. [gada] D. MMMM, HH:mm',
    ],
<<<<<<< HEAD

    'calendar' => [
        'sameDay' => '[šodien] [plkst.] LT',
        'nextDay' => '[rīt] [plkst.] LT',
        'nextWeek' => function (CarbonInterface $current, CarbonInterface $other) use ($daysOfWeekLocativum) {
            if ($current->week !== $other->week) {
                return '[nākošo] ['.$daysOfWeekLocativum[$current->dayOfWeek].'] [plkst.] LT';
            }

            return '['.$daysOfWeekLocativum[$current->dayOfWeek].'] [plkst.] LT';
        },
        'lastDay' => '[vakar] [plkst.] LT',
        'lastWeek' => function (CarbonInterface $current) use ($daysOfWeekLocativum) {
            return '[pagājušo] ['.$daysOfWeekLocativum[$current->dayOfWeek].'] [plkst.] LT';
        },
        'sameElse' => 'L',
    ],

    'weekdays' => $daysOfWeek,
    'weekdays_short' => ['Sv.', 'P.', 'O.', 'T.', 'C.', 'Pk.', 'S.'],
    'weekdays_min' => ['Sv.', 'P.', 'O.', 'T.', 'C.', 'Pk.', 'S.'],
    'months' => ['janvāris', 'februāris', 'marts', 'aprīlis', 'maijs', 'jūnijs', 'jūlijs', 'augusts', 'septembris', 'oktobris', 'novembris', 'decembris'],
    'months_standalone' => ['janvārī', 'februārī', 'martā', 'aprīlī', 'maijā', 'jūnijā', 'jūlijā', 'augustā', 'septembrī', 'oktobrī', 'novembrī', 'decembrī'],
    'months_short' => ['janv.', 'febr.', 'martā', 'apr.', 'maijā', 'jūn.', 'jūl.', 'aug.', 'sept.', 'okt.', 'nov.', 'dec.'],
=======
    'weekdays' => ['svētdiena', 'pirmdiena', 'otrdiena', 'trešdiena', 'ceturtdiena', 'piektdiena', 'sestdiena'],
    'weekdays_short' => ['Sv.', 'P.', 'O.', 'T.', 'C.', 'Pk.', 'S.'],
    'weekdays_min' => ['Sv.', 'P.', 'O.', 'T.', 'C.', 'Pk.', 'S.'],
    'months' => ['janvārī', 'februārī', 'martā', 'aprīlī', 'maijā', 'jūnijā', 'jūlijā', 'augustā', 'septembrī', 'oktobrī', 'novembrī', 'decembrī'],
    'months_short' => ['Janv', 'Feb', 'Mar', 'Apr', 'Mai', 'Jūn', 'Jūl', 'Aug', 'Sept', 'Okt', 'Nov', 'Dec'],
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    'meridiem' => ['priekšpusdiena', 'pēcpusdiena'],
];
