<<<<<<< HEAD
<?php declare(strict_types = 1);
/*
 * This file is part of PharIo\Manifest.
 *
 * Copyright (c) Arne Blankerts <arne@blankerts.de>, Sebastian Heuer <sebastian@phpeople.de>, Sebastian Bergmann <sebastian@phpunit.de> and contributors
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 */
namespace PharIo\Manifest;

use const FILTER_VALIDATE_URL;
use function filter_var;

class Url {
    /** @var string */
    private $url;

    public function __construct(string $url) {
=======
<?php
/*
 * This file is part of PharIo\Manifest.
 *
 * (c) Arne Blankerts <arne@blankerts.de>, Sebastian Heuer <sebastian@phpeople.de>, Sebastian Bergmann <sebastian@phpunit.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace PharIo\Manifest;

class Url {
    /**
     * @var string
     */
    private $url;

    /**
     * @param string $url
     *
     * @throws InvalidUrlException
     */
    public function __construct($url) {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        $this->ensureUrlIsValid($url);

        $this->url = $url;
    }

<<<<<<< HEAD
    public function asString(): string {
=======
    /**
     * @return string
     */
    public function __toString() {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        return $this->url;
    }

    /**
<<<<<<< HEAD
     * @throws InvalidUrlException
     */
    private function ensureUrlIsValid(string $url): void {
        if (filter_var($url, FILTER_VALIDATE_URL) === false) {
=======
     * @param string $url
     *
     * @throws InvalidUrlException
     */
    private function ensureUrlIsValid($url) {
        if (filter_var($url, \FILTER_VALIDATE_URL) === false) {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
            throw new InvalidUrlException;
        }
    }
}
