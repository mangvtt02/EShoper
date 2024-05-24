<?php

/*
 * This file is part of Psy Shell.
 *
<<<<<<< HEAD
 * (c) 2012-2023 Justin Hileman
=======
 * (c) 2012-2020 Justin Hileman
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Psy\VersionUpdater;

interface Checker
{
<<<<<<< HEAD
    const ALWAYS = 'always';
    const DAILY = 'daily';
    const WEEKLY = 'weekly';
    const MONTHLY = 'monthly';
    const NEVER = 'never';

    public function isLatest(): bool;

    public function getLatest(): string;
=======
    const ALWAYS  = 'always';
    const DAILY   = 'daily';
    const WEEKLY  = 'weekly';
    const MONTHLY = 'monthly';
    const NEVER   = 'never';

    /**
     * @return bool
     */
    public function isLatest();

    /**
     * @return string
     */
    public function getLatest();
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
}
