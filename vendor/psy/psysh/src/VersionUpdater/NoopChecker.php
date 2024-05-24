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

use Psy\Shell;

/**
<<<<<<< HEAD
 * A version checker stub which always thinks the current version is up to date.
 */
class NoopChecker implements Checker
{
    public function isLatest(): bool
=======
 * A version checker stub which always thinks the current verion is up to date.
 */
class NoopChecker implements Checker
{
    /**
     * @return bool
     */
    public function isLatest()
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    {
        return true;
    }

<<<<<<< HEAD
    public function getLatest(): string
=======
    /**
     * @return string
     */
    public function getLatest()
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    {
        return Shell::VERSION;
    }
}
