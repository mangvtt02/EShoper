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

class IntervalChecker extends GitHubChecker
{
    private $cacheFile;
    private $interval;

    public function __construct($cacheFile, $interval)
    {
        $this->cacheFile = $cacheFile;
<<<<<<< HEAD
        $this->interval = $interval;
=======
        $this->interval  = $interval;
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    }

    public function fetchLatestRelease()
    {
        // Read the cached file
        $cached = \json_decode(@\file_get_contents($this->cacheFile, false));
        if ($cached && isset($cached->last_check) && isset($cached->release)) {
            $now = new \DateTime();
            $lastCheck = new \DateTime($cached->last_check);
            if ($lastCheck >= $now->sub($this->getDateInterval())) {
                return $cached->release;
            }
        }

        // Fall back to fetching from GitHub
        $release = parent::fetchLatestRelease();
        if ($release && isset($release->tag_name)) {
            $this->updateCache($release);
        }

        return $release;
    }

<<<<<<< HEAD
    /**
     * @throws \RuntimeException if interval passed to constructor is not supported
     */
    private function getDateInterval(): \DateInterval
=======
    private function getDateInterval()
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    {
        switch ($this->interval) {
            case Checker::DAILY:
                return new \DateInterval('P1D');
            case Checker::WEEKLY:
                return new \DateInterval('P1W');
            case Checker::MONTHLY:
                return new \DateInterval('P1M');
        }
<<<<<<< HEAD

        throw new \RuntimeException('Invalid interval configured');
=======
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    }

    private function updateCache($release)
    {
        $data = [
<<<<<<< HEAD
            'last_check' => \date(\DATE_ATOM),
=======
            'last_check' => \date(DATE_ATOM),
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
            'release'    => $release,
        ];

        \file_put_contents($this->cacheFile, \json_encode($data));
    }
}
